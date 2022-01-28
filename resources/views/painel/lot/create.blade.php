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
                    <li class="breadcrumb-item active">Novo Lote</li>
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

                        <form class="forms-sample" action="{{route('lote.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Nome do Lote*</label>
                                        <input class="{{ $errors->has('name') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nome do Lote*">
                                        <span>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Fase do Lote*</label>
                                        <select class="{{ $errors->has('phase') ? 'form-control is-invalid' : 'form-control' }} " name="phase">
                                            <option value='Vacas em Lactação'>Vacas em Lactação</option>
                                            <option value='Bezerros(as) até 6 meses'>Bezerros(as) até 6 meses</option>
                                            <option value='Bezerros(as) de 7 até meses'>Bezerros(as) de 7 até meses</option>
                                            <option value='Novilhos(as) acima de 12 meses'>Novilhos(as) acima de 12 meses</option>
                                            <option value='Novilhas prenhas'>Novilhas prenhas</option>
                                            <option value='Vacas Seca'>Vacas Seca</option>
                                            <option value='Enfermaria'>Enfermaria</option>
                                            <option value='Touros'>Touros</option>
                                            <option value='Engorda'>Engorda</option>
                                            <option value='Pré-Parto'>Pré-Parto</option>
                                        </select>


                                    </div>
                                </div>


                            </div>
                            <div class=" row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Descrição do Lote</label>
                                        <input class="{{ $errors->has('description') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('description')}}" name="description" id="description" type="text" placeholder="Descrição">
                                        <span>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="head">Cor do lote</label>
                                        <input type="color" id="color" name="color" value="#FFFFFF" class="{{ $errors->has('color') ? 'form-control is-invalid' : 'form-control' }} ">



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
