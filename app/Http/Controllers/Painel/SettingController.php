<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting){
      $this->setting = $setting;
        $this->middleware('auth');
    }
    public function index()
    {
      $checksetting = $this->setting->where('user_id','=',auth()->user()->id)->count();


        if ($checksetting < 1){
            return view('painel.setting.create');
        }else {
            $setting = $this->setting->where('user_id','=',auth()->user()->id)->first();
          return redirect()->route('configuracao.edit', $setting->id);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $checksetting = $this->setting->where('user_id','=',auth()->user()->id)->count();
      $setting = $this->setting->where('user_id','=',auth()->user()->id)->first();
      if ($checksetting < 1){
          return view('painel.setting.create');
      }else {
          $setting = $this->setting->where('user_id','=',auth()->user()->id)->first();
        return redirect()->route('configuracao.edit', $setting->id);

      }
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

      $insert = $this->setting->create($all);

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
      $iterable = $this->setting->find($id);

      return view('painel.setting.edit',compact('iterable'));
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
      $dados =  $this->setting->find($id);

      $dados->dry_animal = $request->dry_animal;
      $dados->pre_delivery = $request->pre_delivery;
      $dados->animal_birth = $request->animal_birth;
      $dados->pregnancy_confirmation = $request->pregnancy_confirmation;
      $dados->released_for_ultrasound = $request->released_for_ultrasound;
      $dados->days_to_weaning = $request->days_to_weaning;
      $dados->voluntary_waiting_period = $request->voluntary_waiting_period;


      $update = $dados->save();

      if ($update) {
        alert()->success('Registro alterado!','Sucesso')->persistent('Fechar')->autoclose(1500);
                 return redirect()->back();
             }
             alert()->error('Ocorreu um erro por favor tente novamente mais tarde!','Woops')->persistent('Fechar')->autoclose(1500);
             return back();
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
