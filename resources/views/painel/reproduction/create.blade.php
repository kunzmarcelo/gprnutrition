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
                    <li class="breadcrumb-item active">Nova Reprodução</li>
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
                        <form class="forms-sample" action="{{route('reproducao.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de realização</label>
                                        <input class="{{ $errors->has('created') ? 'form-control is-invalid' : 'form-control' }} " value="<?php echo date('Y-m-d'); ?>" name="created" id="created" type="date" placeholder="Data de realização">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- text input -->
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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Último Parto</label>
                                        <input class="{{ $errors->has('delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('delivery_date')}}" name="delivery_date" id="delivery_date" type="date" placeholder="Último Parto">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de Cobertura</label>
                                        <input class="{{ $errors->has('coverage_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('coverage_date')}}" name="coverage_date" id="coverage_date" type="date"
                                          placeholder="Previsão de Cobertura">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Próximo Parto</label>
                                        <input class="{{ $errors->has('expected_delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('expected_delivery_date')}}" name="expected_delivery_date" id="expected_delivery_date"
                                          type="date" readonly placeholder="Data Previsão de Parto">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de Secar</label>
                                        <input class="{{ $errors->has('dry_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('dry_date')}}" name="dry_date" id="dry_date" type="date" placeholder="Data Previsão de Secar" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de pré parto</label>
                                        <input class="{{ $errors->has('pre_delivery_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('pre_delivery_date')}}" name="pre_delivery_date" id="pre_delivery_date" type="date"
                                          placeholder="Data previsão de pré parto" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Dias em Lactação (DEL)</label>
                                        <input class="{{ $errors->has('del') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('del')}}" name="del" id="del" type="text" placeholder="Dias em Lactação (DEL)" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Situação</label>
                                        <input class="{{ $errors->has('situation') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('situation')}}" name="situation" id="situation" type="text" placeholder="Situação">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>1° observação</label>
                                        <input class="{{ $errors->has('observation1') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('observation1')}}" name="observation1" id="observation1" type="text" placeholder="1° observação">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>2° observação</label>
                                        <input class="{{ $errors->has('observation2') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('observation2')}}" name="observation2" id="observation2" type="text" placeholder="2° observação">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="del_total">Dias em Lactação Total (DEL)</label>
                                        <input class="{{ $errors->has('del_total') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('del_total')}}" name="del_total" id="del_total" type="text" placeholder="Dias em Lactação Total (DEL)" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@include('sweetalert::alert')
@section('js')
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="/vendor/adminlte/dist/js/moment.min.js"></script>
<script>
    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate(date.getDate() + {{$setting->animal_birth}});
                //2012-12-17
                $('#expected_delivery_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
                  Swal.fire({
                    title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
                });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });

    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate((date.getDate() + {{$setting->dry_animal}}));
                //2012-12-17
                $('#dry_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
                  Swal.fire({
                    title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
                });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });
    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
            var date = new Date($("#coverage_date").val()),
                days = parseInt($("#days").val(), 10);

            if (!isNaN(date.getTime())) {
                date.setDate((date.getDate() + {{$setting->pre_delivery}}));
                //2012-12-17
                $('#pre_delivery_date')[0].valueAsDate = date;
                //$("#expected_delivery_date").val(date.toInputFormat());
            } else {
                  Swal.fire({
                    title: 'Woops!',
                    text: 'Informe a data de previsão de cobertura corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1800,
                });
                $("#coverage_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });


    $(document).ready(function() {
        $("#delivery_date").on("change", function() {
          const delivery_date = moment(new Date($("#delivery_date").val()));
          const dry_date = moment(new Date());
          const duration = moment.duration(dry_date.diff(delivery_date));
          // Mostra a diferença em dias
          const days = duration.asDays();

          document.getElementById('del').value = eval(days.toFixed(0));

        });
    });

    $(document).ready(function() {
        $("#coverage_date").on("change", function() {
                const delivery_date = moment(new Date($("#delivery_date").val())); // Data de hoje
                const dry_date = moment($("#dry_date").val()); // Outra data no passado
                const duration = moment.duration(dry_date.diff(delivery_date));
                // Mostra a diferença em dias
                const days = duration.asDays();

                document.getElementById('del_total').value = eval(days.toFixed(0));
            //}
        });
    });


    //del total = data de secagem - ultimo parto
</script>

@stop

@endsection
