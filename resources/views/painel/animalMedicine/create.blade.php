@extends('adminlte::page')
@section('title', 'Farms Nutrition')


@section('content')
@include('sweetalert::alert')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Nova Medição</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-body">
                        <form class="forms-sample form-signin" action="{{route('aplicacoes.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">


                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Selecione a Medição</label>
                                        <select name="medicine_id" id="medicine_id" class=" {{ $errors->has('medicine_id') ? 'form-control custom-select is-invalid' : 'form-control custom-select' }}">
                                            <option value="">Selecione a Medição</option>
                                            @foreach ($medicines as $value)
                                            <option data-valor="{{$value->grace_days}}" value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->description}}</option>
                                            @endforeach
                                        </select>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="application_date">Data de aplicação</label>
                                        <input class="{{ $errors->has('application_date') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="application_date" id="application_date" type="date"
                                          placeholder="Data de Aplicação">

                                        {{-- </span> --}}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="next_application">Próxima aplicação</label>
                                        <input readonly="readonly" class="{{ $errors->has('next_application') ? 'form-control is-invalid' : 'form-control' }} " value="" name="next_application" id="next_application" type="date"
                                          placeholder="Data de Aplicação">

                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="animals_id">Selecione o animal</label><br>
                                    </div>
                                </div>

                                @foreach ($animals as $value)
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <input type="checkbox" name="animals_id[]" value="{{$value->id}}" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm">
                                        {{$value->earring.' / '.$value->name}}
                                    </div>
                                </div>
                                @endforeach

                            </div>


                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>
                            </div>
                        </form>


                        {{-- <input name="dPrev" type="date" class="form-control" id="dPrev" value=""  placeholder="DD/MM/YYYY" required >


                            <button type="submit" id="button" name="button" class="btn btn-success pull-right"></i> Salvar</button> --}}

                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container-fluid -->
</section>
@section('js')

<script>
// // -----------> esse aqui funcina ----------
$('#application_date')[0].valueAsDate = new Date();
  //var tempo = $("#grace_days option:selected").val();
  var tempo = $('#medicine_id option:selected').attr('data-valor');
  var tempo2 = (parseInt(tempo));
    $('#application_date').change(function() {
        var date = this.valueAsDate;
        date.setDate(date.getDate() + 12);
        $('#next_application')[0].valueAsDate = date;
    });
    $('#application_date').change();

// $('#application_date')[0].valueAsDate = new Date();
//       $('#application_date').change(function() {
//
//         var tempo = $('#medicine_id option:selected').attr('data-valor');
//         var tempo2 = (parseInt(tempo)); //
//
//             var dias = tempo2;
//             var dataAtual = this.valueAsDate;
//             var previsao = new Date();
//
//             previsao.setDate(dataAtual.getDate() + dias);
//             n = previsao.getDate()  +"/" + (previsao.getMonth() + 1)+ "/" + previsao.getFullYear();
//     		      $("#next_application").val(n);
//
//     });



// aqui não está funcionando ---------->
    // $('#application_date')[0].valueAsDate = new Date();
    //   var tempo = $('#medicine_id option:selected').attr('data-valor');
    //   var tempo2 = (parseInt(tempo)); //
    //
    //   $('#application_date').change(function() {
    //       var date = this.valueAsDate;
    //       date.setDate(date.getDate() + tempo2);
    //       $('#next_application')[0].valueAsDate = date;
    //   });
    //   $('#application_date').change();
</script>

@stop

@endsection
