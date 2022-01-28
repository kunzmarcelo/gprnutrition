<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemenFormRequest;
use Illuminate\Http\Request;
use App\Blood;
use App\Breed;
use App\Semen;

class SemenController extends Controller
{
  private $semen;
  public function __construct(Semen $semen){
    $this->semen = $semen;
      $this->middleware('auth');
  }
    public function index()
    {
      $results = $this->semen->where('user_id','=',auth()->user()->id)->get();
        return view('painel.semen.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bloods = Blood::all();
      $breeds = Breed::all();
        return view('painel.semen.create', compact('bloods','breeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemenFormRequest $request)
    {
      $all = $request->all();

        //dd($all);

      $insert = $this->semen->create($all);
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
