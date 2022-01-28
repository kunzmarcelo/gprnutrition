<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\procedure;
use Illuminate\Http\Request;
use App\Semen;
class ProcedureController extends Controller
{
  private $procedure;
  public function __construct(Procedure $procedure){
    $this->procedure = $procedure;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->procedure->all();
        return view('painel.procedure.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $semens = Semen::all();
      return view('painel.procedure.create',compact('semens'));
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

      $insert = $this->procedure->create($all);
      if ($insert) {
          alert()->success('Registro inserido!','Sucesso')->persistent('Fechar')->autoclose(1500);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1500);
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
        //
    }
}
