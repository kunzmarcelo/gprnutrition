<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Animal;
use App\Delivery;
use App\Setting;
use App\Coverage;
use App\Production;
use App\Reproduction;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;
class HomeController extends Controller
{

  public function __construct(){

//dd(Gate::denies('admin'));

        $this->middleware('auth');
  }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //dd(Auth::user()->status);
      if(Auth::user()->status == 'sim'){
          switch(Auth::user()->role->role) {
            case('ROLE_ADMINISTRATOR'):

                  return view('homeAdmin');
                  break;

            case('ROLE_MANAGER'):


                  return view('homeManager');
                  break;


            case('ROLE_SUPERVISOR'):
                  return view('homeManager');
                  break;


            case('ROLE_PRODUCER'): // se usuário for produtor vai mostrar isso aqui
            try {
              $checksetting = Setting::checkSetting(); //verifica se o usuário tem configuração definida
              //dd($checksetting);
              if($checksetting >0){

                  $data_agora = Carbon::now()->format('Y-m-d');
                  $now = Carbon::now()->format('m');


                  $results = Delivery::totalMonthDelivery();  // funcao que retorna total de entrega nos ultimos 2 meses
                  $productionTotal = Delivery::productionTotalMonth(); // producao de leite individual por animal
                  $checksetting = Setting::checkSetting(); //verifica se o usuário tem configuração definida

                  $animals_producing = Animal::where('active','Sim')->where('user_id','=',auth()->user()->id)->count(); // total de animais produzindo
                  $animalsTotal = Animal::where('user_id','=',auth()->user()->id)->count();// total de animais na propriedade
                  $mediaDel = Reproduction::where('user_id','=',auth()->user()->id)->avg('del'); //media do del na propriedade realizado na ultrasson

                  $setting = Setting::where('user_id','=',auth()->user()->id)->first(); // pega os dados da primeira configuracao do usuário


                  $dataDaAptidaoDoAnimal = date('Y-m-d', strtotime("- $setting->voluntary_waiting_period days", strtotime("$data_agora")));


                   //dd($dataDaAptidaoDoAnimal);

                  $dataHojeMenosTrintaDias = date('Y-m-d', strtotime("- 30 days", strtotime("$data_agora"))); //data de hoje menos 30 dias
                  $vacasInseminadasNosUltimosVinteUnDias = date('Y-m-d', strtotime("- 21 days", strtotime("$dataHojeMenosTrintaDias"))); // vacas inseminadas entre
                  //dd($vacasInseminadasNosUltimosVinteUnDias);
                  $animals_able_to_get_pregnant = Animal::where([
                    ['active','=','Sim'],
                    ['to_discard','=','Não'],
                  //  ['date_of_last_delivery','>=',$vacasInseminadasNosUltimosVinteUnDias],
                  //  ['date_of_last_delivery','<=',$dataHojeMenosTrintaDias],
                    //['animal_stage','=','Novilha'],
                    ['date_of_last_delivery', '<=', $dataDaAptidaoDoAnimal], //animais aptos é a (data do ultimo parto menor ou igual a (data de hoje menos os dias do PEV))
                    ['user_id','=',auth()->user()->id],
                  ])->count(); // verificar e conta se os animais passaram do Periodo voluntario de espera PEV nos ultimos 21 ;
                  //dd($animals_able_to_get_pregnant);


                //$taxa de servico
                  $vacas_inseminadas = Coverage::where([
                    ['insemination_date','>=',$vacasInseminadasNosUltimosVinteUnDias],
                    ['insemination_date','<=',$dataHojeMenosTrintaDias],
                    ['diagnosis','!=','Não Diagnosticado'],
                    ['user_id','=',auth()->user()->id],
                    ])->count(); //esse aqui está funcionando
                    // print($vacas_inseminadas);
                    //
                    // dd();
                /*
                  $vacas_inseminadas =  Coverage::join('coverages', 'coverages.animal_id', '=', 'animals.id')
                                      //->groupBy('animal_id')
                                      ->get();
                                      //->count();

                  print($vacas_inseminadas);

                dd();
                */


                  $coverageDiagnosisP = Coverage::where('diagnosis','=','Prenha')->where('user_id','=',auth()->user()->id)->count();
                  $coverageDiagnosisF = Coverage::where('diagnosis','=','Falha')->where('user_id','=',auth()->user()->id)->count();
                  $coverageDiagnosisN = Coverage::where('diagnosis','=','Não Diagnosticado')->where('user_id','=',auth()->user()->id)->count();

                  $concepcao = Coverage::where('diagnosis','!=','Falha')->where('user_id','=',auth()->user()->id)->count();

                  //dd($vacas_inseminadas);
                  if($animals_able_to_get_pregnant != 0){
                      $servico = ((number_format(($vacas_inseminadas / $animals_able_to_get_pregnant) *100,1))); //TS (%) =  Número Vacas Inseminadas / Número Vacas Aptas
                //dd($servico);
                      //$servico =  number_format(($vacas_inseminadas * 100) / $animals_able_to_get_pregnant, 2); //TS (%) =  Número Vacas Inseminadas / Número Vacas Aptas
                  }else {
                    $servico = '';
                  }
                  if($servico != 0){
                      $concepcao = number_format(($coverageDiagnosisP / ($vacas_inseminadas)*100),1); // TAXA DE CONCEPÇÃO = Número de prenhes confirmado / Número de animais inseminados
                        $prenhez = number_format(($coverageDiagnosisP * $animals_able_to_get_pregnant ),1); //Taxa de prenhez = Nº de animais prenhes / Nº de animais aptos
                  }else{
                      $servico = 0;
                      $concepcao = 0;
                      $prenhez = 0;
                  }



                  $production = Animal::with('productions')->where('user_id','=',auth()->user()->id)
                          ->whereHas('Productions')->get();

                  $cofirmar_prenhes = Coverage::where('diagnosis','=','Não Diagnosticado')->where('user_id','=',auth()->user()->id)->get(); //lista de animais que estão por confirmar prenhez
                  $vacas_por_secar = Coverage::where([
                  ['diagnosis','=','Prenha'],
                  ['dry_date', '<=', $data_agora],
                  ['checkd_dry_date', '=', 'não informado'],
                  ['user_id','=',auth()->user()->id],
                  ])->get(); //lista de animais que estão para secar

                  $animais_por_parir = Coverage::where([
                  ['diagnosis','=','Prenha'],

                  ['delivery_date', '<=', $data_agora],
                  ['user_id','=',auth()->user()->id],
                  ])->get(); //lista de animais que estão para parir
                  //dd($animais_por_parir);
                  return response(view('home',compact(
                                                  'results',
                                                  'animals_able_to_get_pregnant',
                                                  'animals_producing',
                                                  'animalsTotal',
                                                  'productionTotal',
                                                  'mediaDel',
                                                  'production',
                                                  'coverageDiagnosisP',
                                                  'coverageDiagnosisF',
                                                  'coverageDiagnosisN',
                                                  'concepcao',
                                                  'servico',
                                                  'vacas_inseminadas',
                                                  'concepcao',
                                                  'prenhez',
                                                  'checksetting',
                                                  'cofirmar_prenhes',
                                                  'vacas_por_secar',
                                                  'animais_por_parir',
                                                  'vacasInseminadasNosUltimosVinteUnDias',
                                                  'dataHojeMenosTrintaDias',
                                                  'animals_able_to_get_pregnant',
                                                  'vacas_inseminadas'
                                                ),array('production'=>$production)),200);
              }else{
                alert()->warning('Aviso!','Existem configurações iniciais pendentes ')->persistent('Fechar');
                return redirect('painel/configuracao');
              }
            } catch (\Exception $e) {
                alert()->warning('Aviso!','Existem configurações iniciais pendentes ')->persistent('Fechar');
                return redirect('painel/configuracao');

            }

                            break;

          default:
                  abort(500, 'Estamos passando por instabilidades, em breve estamos de volta');

          }
        }else{
          abort(401, 'Something went wrong');
        }


/*

      if( Auth::user()->level  == 'admin' || Auth::user()->level  == 'gerente' && Auth::user()->status == 'sim') {
            $now = Carbon::now()->format('m');

            // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
            $results = Delivery::whereMonth('collection_date', '=', $now)->get();

            $animalsActive = Animal::where('active','=','sim')->count();
            $animalsTotal = Animal::count();
            $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->sum('total_liters_produced');
            $mediaDel = Reproduction::avg('del');
            $production = Animal::with('productions')->where('user_id','=',auth()->user()->id)
                       ->whereHas('Productions')->get();
            return view('home',compact('results','animalsActive','animalsTotal','productionTotal','mediaDel','production'));


        }else{
          if( Auth::user()->level  == 'produtor' && Auth::user()->status == 'sim') {





              // return view('home',compact('results','animalsActive','animalsTotal','productionTotal','mediaDel','production'));
          }
          else{
            abort(401, 'Something went wrong');
          }
      }
*/



        // if(Gate::denies('produtor')){
        //
        //     $now = Carbon::now()->format('m');
        //
        //     // /$results = $this->delivery->whereMonth('collection_date', '=', $now)->get();
        //     $results = $this->delivery->where('user_id','=',auth()->user()->id)->whereMonth('collection_date', '=', $now)->get();
        //
        //     $animalsActive = Animal::where('active','=','sim')->where('user_id','=',auth()->user()->id)->count();
        //     $animalsTotal = Animal::where('user_id','=',auth()->user()->id)->count();
        //     $productionTotal = Delivery::whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->sum('total_liters_produced');
        //
        //       return view('home',compact('results','animalsActive','animalsTotal','productionTotal'));
        //     }
    }
}
