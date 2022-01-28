@extends('adminlte::page')
@section('title', 'Farms Nutrition')


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
                    <li class="breadcrumb-item active">Nova Produção</li>
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
                        <form class="forms-sample" action="{{route('producao.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class=" row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Data da Ordenha</label>
                                        {{-- <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="2021-05-21" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha"> --}}
                                        <input class="{{ $errors->has('date_milking') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="date_milking" id="date_milking" type="date" placeholder="data Ordenha">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Selecione o animal</label>
                                        <select name="animal_id" id="animal_id" class=" {{ $errors->has('animal_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione o animal</option>
                                            @foreach ($animals as $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>1° Ordenha</label>
                                        <input class="{{ $errors->has('first_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('first_milking')}}" name="first_milking" id="first_milking" type="number" min="0" max="60"
                                          placeholder="1° Ordenha">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>2° Ordenha</label>
                                        <input class="{{ $errors->has('second_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('second_milking')}}" name="second_milking" id="second_milking" type="number" min="0" max="60"
                                          placeholder="2° Ordenha">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>3° Ordenha</label>
                                        <input class="{{ $errors->has('third_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('third_milking')}}" name="third_milking" id="third_milking" type="number" min="0" max="60"
                                          placeholder="3° Ordenha">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Unica Ordenha</label>
                                        <input class="{{ $errors->has('single_milking') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('single_milking')}}" name="single_milking" id="single_milking" type="number" min="0" max="60"
                                          placeholder="Unica Ordenha">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total de Litros</label>

                                        <input class="{{ $errors->has('total_milking') ? 'form-control is-invalid' : 'form-control' }} " readonly="readonly" value="{{old('total_milking')}}" name="total_milking" id="resultado" type="text"
                                          placeholder="Total de Litros">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>

                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
  

    </div><!-- /.container-fluid -->
</section>
@section('js')

<script>
    var first_milking = document.getElementById("first_milking");
    var second_milking = document.getElementById("second_milking");
    var third_milking = document.getElementById("third_milking");
    var single_milking = document.getElementById("single_milking");


    var total_milking = document.getElementById("total_milking");
    var somenteNumeros = new RegExp("[^0-9]", "g");

    $('#first_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#second_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#third_milking').on({
        click: function() {
            single_milking.setAttribute("disabled", true)

        }
    })
    $('#single_milking').on({
        click: function() {
            first_milking.setAttribute("disabled", true)
            second_milking.setAttribute("disabled", true)
            third_milking.setAttribute("disabled", true)

        }
    })


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
        var first_milking1 = toNumber(first_milking.value);
        var second_milking1 = toNumber(second_milking.value);
        var third_milking1 = toNumber(third_milking.value);
        var single_milking1 = toNumber(single_milking.value);
        var calc = first_milking1 + second_milking1 + third_milking1 + single_milking1
        document.getElementById('resultado').value = eval(calc);
    }

    first_milking.addEventListener("input", somenteNumeros);
    second_milking.addEventListener("input", somenteNumeros);
    third_milking.addEventListener("input", somenteNumeros);
    single_milking.addEventListener("input", somenteNumeros);

    first_milking.addEventListener("input", onInput);
    second_milking.addEventListener("input", onInput);
    third_milking.addEventListener("input", onInput);
    single_milking.addEventListener("input", onInput);


    onInput();
</script>
@stop
@include('sweetalert::alert')
@endsection
