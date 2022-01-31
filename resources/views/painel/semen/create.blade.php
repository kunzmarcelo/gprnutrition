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
                    <li class="breadcrumb-item sexed">Novo Sêmem</li>
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

                        <form class="forms-sample" action="{{route('semem.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nome*</label>
                                        <input class="{{ $errors->has('name') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Registro*</label>
                                        <input class="{{ $errors->has('record') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('record')}}" name="record" id="record" type="text" placeholder="Registro">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Raça*</label>
                                        <select name="breed_id" id="breed_id" class=" {{ $errors->has('breed_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione...</option>
                                            @foreach ($breeds as $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <div class=" row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Grau de Sangue*</label>
                                        <select name="blood_id" id="blood_id" class=" {{ $errors->has('blood_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione...</option>
                                            @foreach ($bloods as $value)

                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="supplier_company">Empresa Fornecedora*</label>
                                        <input class="{{ $errors->has('supplier_company') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('supplier_company')}}" name="supplier_company" id="supplier_company" type="text"
                                          placeholder="Empresa Fornecedora">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sexado?</label>
                                        <select class="{{ $errors->has('sexed') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('sexed')}}" name="sexed" id="sexed">
                                            <option value="Não">Não</option>
                                            <option value="Sim">Sim</option>

                                        </select>

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
