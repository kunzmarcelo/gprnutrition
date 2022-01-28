@extends('adminlte::page')
@section('title', 'Farms Nutrition')


@section('css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stop
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
                    <li class="breadcrumb-item sexed">Novo Inseminação</li>
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

                        <form class="forms-sample" action="{{route('inseminacao.store')}}" method="POST" enctype="multipart/form-data">

                        {{csrf_field()}}
                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <select class=" {{ $errors->has('type') ? 'form-control is-invalid' : 'form-control' }}" name="type" id="type">
                                      <option value="Artificial">Artificial</option>
                                      <option value="Monta Natural">Monta Natural</option>
                                      <option value="Transferência de Embrião">Transferência de Embrião</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="date">data da Inseminação*</label>
                                    <input class="{{ $errors->has('date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('date')}}" name="date" id="date" type="date" placeholder="data da Inseminação*">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="semen_id">Sêmen*</label>
                                    <select name="semen_id" id="semen_id" class=" {{ $errors->has('semen_id') ? 'form-control is-invalid' : 'form-control' }}">
                                        @foreach ($semens as $value)
                                        <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="insinuating">Inserminador / Assistente</label>
                                    <input class="{{ $errors->has('insinuating') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('insinuating')}}" name="insinuating" id="insinuating" type="text"
                                      placeholder="Inserminador / Assistente">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="note">Observação</label>
                                    <input class="{{ $errors->has('note') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('note')}}" name="note" id="note" type="text"
                                      placeholder="Observação">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pre_delivery">Lançar também o parto?</label>
                                    <select class="{{ $errors->has('pre_delivery') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('pre_delivery')}}" name="pre_delivery" id="pre_delivery">
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
@include('sweet::alert')

@endsection
