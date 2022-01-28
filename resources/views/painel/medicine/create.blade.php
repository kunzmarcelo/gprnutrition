@extends('layouts.app')


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Novo Medicamento</li>
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

                        <form class="forms-sample" action="{{route('medicamento.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="description">Descrição*</label>
                                        <input class="{{ $errors->has('description') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('description')}}" name="description" id="description" type="text" placeholder="Descrição*">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="grace_days">Dias de ação/carência*</label>
                                        <select class="{{ $errors->has('grace_days') ? 'form-control is-invalid' : 'form-control' }} " name="grace_days">
                                            @for ($i=0; $i < 30; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>
                                        {{-- <input class="{{ $errors->has('grace_days') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('grace_days')}}" name="grace_days" id="grace_days" type="text" placeholder="Dias de
                                        ação/carência*"> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="mode_of_use">Modo de uso</label>
                                        <input class="{{ $errors->has('mode_of_use') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('mode_of_use')}}" name="mode_of_use" id="mode_of_use" type="text" placeholder="Modo de uso">
                                        <span>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="unit_of_measurement">Unidade de medida</label>
                                        <select class="{{ $errors->has('unit_of_measurement') ? 'form-control is-invalid' : 'form-control' }} " name="unit_of_measurement">

                                            <option value="Unidade">Unidade</option>
                                            <option value="Bisnaga">Bisnaga</option>
                                            <option value="Centímetro">Centímetro</option>
                                            <option value="Dose">Dose</option>
                                            <option value="Litro">Litro</option>
                                            <option value="Alqueire">Alqueire</option>
                                            <option value="Hora">Hora</option>
                                            <option value="Bag">Bag</option>
                                            <option value="Balde">Balde</option>
                                            <option value="Caixa">Caixa</option>
                                            <option value="Fardo">Fardo</option>
                                            <option value="Frasco">Frasco</option>
                                            <option value="Galão">Galão</option>
                                            <option value="Grama">Grama</option>
                                            <option value="Hectare">Hectare</option>
                                            <option value="Metro">Metro</option>
                                            <option value="Metro Cúbico">Metro Cúbico</option>
                                            <option value="Metro Quadrado">Metro Quadrado</option>
                                            <option value="Micrograma">Micrograma</option>
                                            <option value="Mililitro">Mililitro</option>
                                            <option value="Pacote">Pacote</option>
                                            <option value="Par">Par</option>
                                            <option value="Peça">Peça</option>
                                            <option value="Quilograma">Quilograma</option>
                                            <option value="Rolo">Rolo</option>
                                            <option value="Saco">Saco</option>
                                            <option value="Tonelada">Tonelada</option>

                                        </select>
                                        {{-- <input class="{{ $errors->has('grace_days') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('grace_days')}}" name="grace_days" id="grace_days" type="text" placeholder="Dias de
                                        ação/carência*"> --}}

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
