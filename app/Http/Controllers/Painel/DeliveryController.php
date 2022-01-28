<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Delivery;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;

class DeliveryController extends Controller
{
  private $delivery;
  public function __construct(Delivery $delivery){
    $this->delivery = $delivery;
      $this->middleware('auth');
  }
    public function index()
    {

      $now = Carbon::now()->format('m');

      $results = $this->delivery->whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->orderBy('collection_date','ASC')->get();
      $results = $this->delivery->where('user_id','=',auth()->user()->id)->orderBy('collection_date','ASC')->get();
      //$results = $this->delivery->whereMonth('collection_date', '=', 5)->get();

        return view('painel.delivery.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.delivery.create');
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

      $insert = $this->delivery->create($all);

      if ($insert) {
        alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1800);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1800);
             return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $dado = $this->delivery->find($id);

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
