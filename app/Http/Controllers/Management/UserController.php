<?php

namespace App\Http\Controllers\Management;

use App\Animal;
use App\Delivery;
use App\User;
use App\AdminUser;
use App\Reproduction;
use App\Coverage;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;
    public function __construct(){
        $this->middleware( 'auth:webadmin' );

    }

    public function index()
    {
      //$user = User::all();
        $results = AdminUser::where('admin_id', auth()->user()->id)->get();

        return view('homeManager', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $now = Carbon::now()->format('m');
      $last_3_months = ($now - 3);
      $last_month = ($now - 1);
      $iterable = $this->user->find($id);
      $animalsTotal = Animal::where('user_id',$id)->count();
      $animalsTotalActive = Animal::where('active','sim')->where('user_id',$id)->count();
      $mediaDel = Reproduction::where('user_id',$id)->avg('del');

      $production_last_3_months = Delivery::where('user_id',$id)->whereMonth('collection_date', '=', $last_3_months )->sum('total_liters_produced'); //Produção ultimo 3 mêses
      $production_last_month = Delivery::where('user_id',$id)->whereMonth('collection_date', '=', $last_month )->sum('total_liters_produced'); //Produção último mês
      $production_current_month = Delivery::where('user_id',$id)->whereMonth('collection_date', '=', $now)->sum('total_liters_produced'); //Produção mês atual

      $coverageDiagnosisP = Coverage::where('diagnosis','=','Prenha')->where('user_id',$id)->count();
      $coverageDiagnosisF = Coverage::where('diagnosis','=','Falha')->where('user_id',$id)->count();
      $coverageDiagnosisN = Coverage::where('diagnosis','=','Não Diagnosticado')->where('user_id',$id)->count();

      $animalsActive = Animal::where('active','=','sim')->where('user_id',$id)->count();
      $concepcao = Coverage::where('diagnosis','!=','Falha')->where('user_id',$id)->count();
      $vacas_inseminadas = Coverage::all()->where('user_id',$id)->count();

      if($animalsActive != 0){
          $servico = number_format(($vacas_inseminadas * 100) / $animalsActive, 2);
      }else {
        $servico = '';
      }
      if($servico != 0){
            $concepcao = number_format(($coverageDiagnosisP * 100) / $servico, 2);
            $prenhez = number_format($coverageDiagnosisP / $animalsActive, 2)*100;
      }else{
          $servico = '';
          $concepcao = '';
          $prenhez = '';
      }


        $iterable = $this->user->find($id);
        return view('admin.user.show', compact('iterable',
        'animalsTotal',
        'mediaDel',
        'production_last_3_months',
        'production_last_month',
        'production_current_month',
        'animalsTotalActive',
        'coverageDiagnosisP',
        'coverageDiagnosisF',
        'coverageDiagnosisN',
        'concepcao',
        'servico',
        'vacas_inseminadas',
        'concepcao',
        'prenhez'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
