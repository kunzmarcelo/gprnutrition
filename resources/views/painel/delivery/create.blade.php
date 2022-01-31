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
                    <li class="breadcrumb-item active">Nova entrega</li>
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
                        <form class="forms-sample form-signin" action="{{route('entrega.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="collection_date">Data da Coleta</label>
                                        <input class="{{ $errors->has('collection_date') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="collection_date" id="collection_date" type="date"
                                          placeholder="Data da Coleta">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="liters_delivered">Litros Entregues</label>
                                        <input class="{{ $errors->has('liters_delivered') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('liters_delivered')}}" name="liters_delivered" id="liters_delivered" type="number"
                                          placeholder="Litros Entregues">

                                        {{-- </span> --}}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="liters_consumption">Litros Consumidos Bezerros(as)</label>
                                        <input class="{{ $errors->has('liters_consumption') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('liters_consumption')}}" name="liters_consumption" id="liters_consumption" type="number"
                                          placeholder="Litros Consumidos Bezerros(as)">

                                        {{-- </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="liters_internal_consumption">Litros Consumidos Interno</label>
                                        <input class="{{ $errors->has('liters_internal_consumption') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('liters_internal_consumption')}}" name="liters_internal_consumption"
                                          id="liters_internal_consumption" type="number" placeholder="Litros Consumidos Interno">

                                        {{-- </span> --}}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="discarded_liters">Litros Descartados</label>
                                        <input class="{{ $errors->has('discarded_liters') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('discarded_liters')}}" name="discarded_liters" id="discarded_liters" type="number"
                                          placeholder="Litros Descartados">

                                        {{-- </span> --}}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="total_liters_produced">Total Litros Produzidos</label>
                                        <input readonly="readonly" class="{{ $errors->has('total_liters_produced') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('total_liters_produced')}}" name="total_liters_produced"
                                          id="total_liters_produced" type="number" placeholder="Total Litros Produzidos">

                                        {{-- </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="milk_price">Preço do Leite</label>
                                        <input class="{{ $errors->has('milk_price') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('milk_price')}}" name="milk_price" id="milk_price" type="text" placeholder="Preço do Leite"
                                          onkeyup="formatarMoeda(this);">

                                        {{-- </span> --}}
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
    </div>

    </div><!-- /.container-fluid -->
</section>
@section('js')
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var liters_delivered = document.getElementById("liters_delivered");
    var liters_consumption = document.getElementById("liters_consumption");
    var liters_internal_consumption = document.getElementById("liters_internal_consumption");
    var discarded_liters = document.getElementById("discarded_liters");


    var total_liters_produced = document.getElementById("total_liters_produced");
    var somenteNumeros = new RegExp("[^0-9]", "g");



    var toNumber = function(value) {
        var number = value.replace(somenteNumeros, "");
        number = parseInt(number);
        if (isNaN(number))
            number = 0;
        return number;
    }

    var somenteNumeros = function(event) {
        event.target.value = toNumber(event.target.value);
    }

    var onInput = function(event) {
        var liters_delivered1 = toNumber(liters_delivered.value);
        var liters_consumption1 = toNumber(liters_consumption.value);
        var liters_internal_consumption1 = toNumber(liters_internal_consumption.value);
        var discarded_liters1 = toNumber(discarded_liters.value);
        var calc = liters_delivered1 + liters_consumption1 + liters_internal_consumption1 + discarded_liters1
        document.getElementById('total_liters_produced').value = eval(calc);
    }

    liters_delivered.addEventListener("input", somenteNumeros);
    liters_consumption.addEventListener("input", somenteNumeros);
    liters_internal_consumption.addEventListener("input", somenteNumeros);
    discarded_liters.addEventListener("input", somenteNumeros);

    liters_delivered.addEventListener("input", onInput);
    liters_consumption.addEventListener("input", onInput);
    liters_internal_consumption.addEventListener("input", onInput);
    discarded_liters.addEventListener("input", onInput);


    onInput();

    function formatarMoeda(i) {
        var v = i.value.replace(/\D/g, '');
        v = (v / 100).toFixed(2) + '';
        v = v.replace(".", ",");
        v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
        v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
        i.value = v;
    }
</script>

@stop
@include('sweetalert::alert')
@endsection
