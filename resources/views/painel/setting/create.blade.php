@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Configurações Gerais</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Configurações</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">

                        <form class="form-horizontal" action="{{route('configuracao.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="dry_animal" class="col-sm-4 col-form-label">Secar animal<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('dry_animal') ? 'form-control is-invalid' : 'form-control' }} " value="222" name="dry_animal" id="dry_animal" type="number" placeholder="Secar animal" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="pre_delivery" class="col-sm-4 col-form-label">Pré parto<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('pre_delivery') ? 'form-control is-invalid' : 'form-control' }} " value="261" name="pre_delivery" id="pre_delivery" type="number" placeholder="Pré parto" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="animal_birth" class="col-sm-4 col-form-label">parto animal<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('animal_birth') ? 'form-control is-invalid' : 'form-control' }} " value="282" name="animal_birth" id="animal_birth" type="number" placeholder="parto animal" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="pregnancy_confirmation" class="col-sm-4 col-form-label">confirmação de prenhez<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('pregnancy_confirmation') ? 'form-control is-invalid' : 'form-control' }} " value="21" name="pregnancy_confirmation" id="pregnancy_confirmation" type="number"
                                              placeholder="confirmação de prenhez" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="released_for_ultrasound" class="col-sm-4 col-form-label">Liberado para Ultrasson<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('released_for_ultrasound') ? 'form-control is-invalid' : 'form-control' }} " value="35" name="released_for_ultrasound" id="released_for_ultrasound" type="number"
                                              placeholder="Liberado para Ultrasson" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="days_to_weaning" class="col-sm-4 col-form-label">Dias para desmame<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('days_to_weaning') ? 'form-control is-invalid' : 'form-control' }} " value="21" name="days_to_weaning" id="days_to_weaning" type="number" placeholder="Dias para desmame"
                                              min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="voluntary_waiting_period" class="col-sm-4 col-form-label">Periodo voluntario de espera (PVE)<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('voluntary_waiting_period') ? 'form-control is-invalid' : 'form-control' }} " value="45" name="voluntary_waiting_period" id="voluntary_waiting_period" type="number"
                                              placeholder="Periodo voluntario de espera (PVE)" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="average_day_of_the_month" class="col-sm-4 col-form-label">Média em dias dos meses do ano<small> (em dias)</small> </label>
                                        <div class="col-sm-2">
                                            <input class="{{ $errors->has('average_day_of_the_month') ? 'form-control is-invalid' : 'form-control' }} " value="30.5" name="average_day_of_the_month" id="average_day_of_the_month" type="text"
                                              placeholder="Média em dias dos meses do ano" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Limpar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container-fluid -->
</section>

@include('sweetalert::alert')

@endsection
