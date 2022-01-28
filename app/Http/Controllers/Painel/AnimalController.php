<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnimalFormRequest;
use App\Setting;
use App\Animal;
use App\Coverage;
use App\Lot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller {
    private $animal;

    public function __construct( Animal $animal ) {
        $this->animal = $animal;
        $this->middleware( 'auth' );
    }

    public function index() {
      

        $results = $this->animal->orderBy( 'id', 'ASC' )->where( 'user_id', '=', auth()->user()->id )->get();



        return view( 'painel.animals.index', compact( 'results' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $lots = Lot::where( 'user_id', '=', auth()->user()->id )->get();
        $phase = ['Novilha','Vaca em Lactação','Vaca para descarte futuro','Bezerro'];

        return view( 'painel.animals.create', compact( 'lots','phase') );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( AnimalFormRequest $request ) {

        //dd( $request->all() );
        $nameFile = null;
        $setting = Setting::where( 'user_id', '=', auth()->user()->id )->first();

        if ( $request->input( 'animal_stage' ) == 'Novilha' ) {
            $date_of_last_delivery = NULL;
            $able_to_get_pregnant = NULL;
        } else {
            $date_of_last_delivery = $request->input( 'date_of_last_delivery' );

            $able_to_get_pregnant = Carbon::parse( $date_of_last_delivery )->addDays( $setting->voluntary_waiting_period );
        }

        //dd( $able_to_get_pregnant );
        $file = $request->file( 'image' );
        if ( !empty( $file ) ) {

            //dd( $file );
            $nameImage = uniqid( date( 'HisYmd' ) );
            $extension = $file->extension();
            $nameFile = "{$nameImage}.{$extension}";

            $imagem = 'uploads/';
            //$extensao = $extension;
            //                $nome = $nameImage . '.' . $extensao;

            $insert = $this->animal->create( [
                'earring' => $request->input( 'earring' ),
                'record' => $request->input( 'record' ),
                'name' => $request->input( 'name' ),
                'lot_id' => $request->input( 'lot_id' ),
                'birth_date' => $request->input( 'birth_date' ),
                'breed' => $request->input( 'breed' ),
                'blood_grade' => $request->input( 'blood_grade' ),
                'sex' => $request->input( 'sex' ),
                'origin' => $request->input( 'origin' ),
                'date_of_last_delivery' => $request->input( 'date_of_last_delivery' ),
                'able_to_get_pregnant' => $able_to_get_pregnant,
                'value' => $request->input( 'value' ),
                'weaning_date' => $request->input( 'weaning_date' ),
                'mother_on_the_property' => $request->input( 'mother_on_the_property' ),
                'father_on_the_property' => $request->input( 'father_on_the_property' ),
                'image' =>  $imagem . $nameFile,
                'active' => $request->input( 'active' ),
                'comments' => $request->input( 'comments' ),
                'to_discard' => $request->input( 'to_discard' ),
                'animal_stage' => $request->input( 'animal_stage' ),
                'user_id' => $request->input( 'user_id' ),
            ] );
            Storage::disk( 'uploads' )->put( $nameFile, file_get_contents( $file ) );
        } else {
            $insert = $this->animal->create(
                [
                    'earring' => $request->input( 'earring' ),
                    'record' => $request->input( 'record' ),
                    'name' => $request->input( 'name' ),
                    'lot_id' => $request->input( 'lot_id' ),
                    'birth_date' => $request->input( 'birth_date' ),
                    'breed' => $request->input( 'breed' ),
                    'blood_grade' => $request->input( 'blood_grade' ),
                    'sex' => $request->input( 'sex' ),
                    'origin' => $request->input( 'origin' ),
                    'date_of_last_delivery' => $request->input( 'date_of_last_delivery' ),
                    'able_to_get_pregnant' => $able_to_get_pregnant,
                    'value' => $request->input( 'value' ),
                    'weaning_date' => $request->input( 'weaning_date' ),
                    'mother_on_the_property' => $request->input( 'mother_on_the_property' ),
                    'father_on_the_property' => $request->input( 'father_on_the_property' ),
                    'active' => $request->input( 'active' ),
                    'comments' => $request->input( 'comments' ),
                    'to_discard' => $request->input( 'to_discard' ),
                    'animal_stage' => $request->input( 'animal_stage' ),
                    'user_id' => $request->input( 'user_id' ),
                ]
            );
        }

        if ( $insert ) {
            alert()->success( 'Registro inserido!', 'Sucesso' )->persistent( 'Fechar' )->autoclose( 1800 );
            return redirect()->back();
        }
        alert()->error( 'Ocorreu um erro por favor tente novamente mais tarde!', 'Woops' )->persistent( 'Fechar' )->autoclose( 1800 );
        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $lots = Lot::where( 'user_id', '=', auth()->user()->id )->get();
        $iterable = $this->animal->find( $id );
         $phase = ['Novilha','Vaca em Lactação','Vaca para descarte futuro','Bezerro'];

        return view( 'painel.animals.edit', compact( 'iterable', 'lots','phase' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $dados =  $this->animal->find( $id );

        $setting = Setting::where( 'user_id', '=', auth()->user()->id )->first();
        $date_of_last_delivery = $request->date_of_last_delivery;

        $able_to_get_pregnant = Carbon::parse( $date_of_last_delivery )->addDays( $setting->voluntary_waiting_period );

        $dados->earring = $request->earring;
        $dados->record = $request->record;
        $dados->name = $request->name;
        $dados->lot_id = $request->lot_id;
        $dados->birth_date = $request->birth_date;
        $dados->breed = $request->breed;
        $dados->blood_grade = $request->blood_grade;
        $dados->sex = $request->sex;
        $dados->origin = $request->origin;
        $dados->date_of_last_delivery = $request->date_of_last_delivery;
        $dados->able_to_get_pregnant = $able_to_get_pregnant;
        $dados->value = $request->value;
        $dados->weaning_date = $request->weaning_date;
        $dados->mother_on_the_property = $request->mother_on_the_property;
        $dados->father_on_the_property = $request->father_on_the_property;
        $dados->active = $request->active;
        $dados->comments = $request->comments;
        $dados->to_discard = $request->to_discard;
        $dados->animal_stage = $request->animal_stage;

        $insert = $dados->save();
        if ( $insert ) {
            alert()->success( 'Registro alterado!', 'Sucesso' )->persistent( 'Fechar' )->autoclose( 1500 );
            return redirect()->back();
        }
        alert()->error( 'Ocorreu um erro por favor tente novamente mais tarde!', 'Woops' )->persistent( 'Fechar' )->autoclose( 1500 );
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }

    public function downloadPDF() {

        $iterable = $this->animal
        ->where( 'user_id', '=', auth()->user()->id )->get();

        return \PDF::loadView( 'painel.animals.downloadPDF', compact( 'iterable' ) )

        ->setPaper( 'a4', 'landscape' )
        ->download( 'relatorio.pdf' );

        //return view( 'management.proposition.downloadPDF', compact( 'proposition' ) );

    }
}
