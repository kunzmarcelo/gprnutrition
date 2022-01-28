<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Reproduction;
use App\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use App\Setting;

class ReproductionController extends Controller
{
  private $reproduction;
  public function __construct(Reproduction $reproduction){
    $this->reproduction = $reproduction;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->reproduction->where('user_id','=',auth()->user()->id)->get();
      //$results = $this->reproduction->all();
      //dd($results);
        return view('painel.reproduction.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $animals = Animal::where('user_id','=',auth()->user()->id)->get();
      $setting = Setting::where('user_id','=',auth()->user()->id)->first();
        return view('painel.reproduction.create', compact('animals','setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $all = $request->all();

        //dd($all);

      $insert = $this->reproduction->create($all);

      // $insert = $this->reproduction->create([
      //   'animal_id'=>$request->input('animal_id'),
      //   'user_id'=>auth()->user()->id,
      //   'created'=>$request->input('created'),
      //   'delivery_date'=>$request->input('delivery_date'),
      //   'coverage_date'=>$request->input('coverage_date'),
      //   'expected_delivery_date'=>$request->input('expected_delivery_date'),
      //   'dry_date'=>$request->input('dry_date'),
      //   'pre_delivery_date'=>$request->input('pre_delivery_date'),
      //   'del'=>$request->input('del'),
      //   'situation'=>$request->input('situation'),
      //   'observation1'=>$request->input('observation1'),
      //   'observation2'=>$request->input('observation2'),
      // ]);
      if ($insert) {
          alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
             return back();


    }


    public function closeDay()
    {
      $results = Reproduction::where('user_id','=',auth()->user()->id)
              ->orderBy('created')
              ->get()
              ->groupBy(function ($val) {
                  return Carbon::parse($val->created)->format('d-m-Y');
              });


        return view('painel.reproduction.indexgroup', compact('results'));
    }


    public function show($date)
    {
// dd($date);
  $date = $date;
      $iterable = $this->reproduction
                          ->where('created','=',Carbon::parse($date)->format('Y-m-d'))
                          ->where('user_id','=',auth()->user()->id)->get();
// dd($iterable);
        return view('painel.reproduction.closeday', compact('iterable','date'));
    }

    public function downloadPDF($date){
      $date = $date;
      $iterable = $this->reproduction
                          ->where('created','=',Carbon::parse($date)->format('Y-m-d'))
                          ->where('user_id','=',auth()->user()->id)->get();


//dd($iterable);
                                //  $pdf = \PDF::loadView('painel.reproduction.downloadPDF', compact('iterable'));
                                //   return $pdf->download("relatorio.pdf");
           return \PDF::loadView('painel.reproduction.downloadPDF', compact('iterable','date'))

                      ->setPaper('a4', 'landscape')
                       ->download("relatorio.pdf");

  //return view('management.proposition.downloadPDF', compact('proposition'));

    }
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
      $dado = $this->reproduction->find($id);

        $detele = $dado->delete();


      if ($detele){
        return response()->json([
                'success' => 'Registro deletado com sucesso!'
            ]);
          }else{
            return response()->json([
                    'success' => 'Ocorreu um erro por favor tente novamente mais tarde!'
                ]);
          }
    }

}
