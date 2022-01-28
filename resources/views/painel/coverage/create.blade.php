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
                    <li class="breadcrumb-item sexed">Nova Cobertura</li>
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

                        <form class="forms-sample" action="{{route('cobertura.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Selecione o animal*</label>
                                        <select name="animal_id" id="animal_id" class=" {{ $errors->has('animal_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="">Selecione o animal</option>
                                            @foreach ($animals as $value)
                                            <option value="{{$value->id}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->earring.' / '.$value->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="last_birth">Data do último parto</label>
                                        <input class="{{ $errors->has('last_birth') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('last_birth')}}" name="last_birth" id="last_birth" type="date" placeholder="Data do último parto">
                                    </div>
                                </div>
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="insemination_date">Data de Cobertura*</label>
                                        <input class="{{ $errors->has('insemination_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('insemination_date')}}" name="insemination_date" id="insemination_date" type="date"
                                          placeholder="Data da Inseminação*">
                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="diagnosis">Selecione o Diagnostico</label>
                                        <select class=" {{ $errors->has('diagnosis') ? 'form-control is-invalid' : 'form-control' }}" name="diagnosis" id="diagnosis">
                                            {{-- <option value="">Selecione....</option> --}}
                                            <option value="Não Diagnosticado">Não Diagnosticado</option>
                                            <option value="Prenha">Prenha</option>
                                            <option value="Falha">Falha</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="detail">Detalhes</label>
                                        <input class="{{ $errors->has('detail') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('detail')}}" name="detail" id="detail" type="text" placeholder="Detalhe">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="insinuating">Inserminador / Assistente</label>
                                        <select name="insinuating" id="insinuating" class=" {{ $errors->has('insinuating') ? 'form-control is-invalid' : 'form-control' }}">
                                            <option value="Nenhum">Nenhum</option>
                                            @foreach ($employees as $value)
                                            <option value="{{$value->name}}" {{old('type') == '{$value}' ? 'selected' : '' }}>{{$value->name}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Limpar</button>

                            </div>
                        </form>


                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
</section>
@include('sweetalert::alert')
@section('js')
  <script type="text/javascript">
      $(document).ready(function() {
          $('select[name="animal_id"]').on('change', function() {
              var animal_id = $(this).val();
              if (animal_id) {
                  $.ajax({
                      url: '/painel/cobertura_get/' + animal_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function(data) {
                          $("#last_birth").val(data);

                      }
                  });
              } else {

              }
          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('select[name="animal_id"]').on('change', function() {
              var animal_id = $(this).val();
              if (animal_id) {
                  $.ajax({
                      url: '/painel/cobertura_apto_get/' + animal_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function(data) {
                        console.log(data);
                          //$("#last_birth").val(data);

                      }
                  });
              } else {

              }
          });
      });
  </script>
@stop

@section('jsas')

<script>
    // <----- calculo del está OK Aqui------->
    $(document).ready(function() {
        $("#last_birth").on("change", function() {
            const last_birth = moment(new Date($("#last_birth").val()));
            const date = moment(new Date());
            const duration = moment.duration(date.diff(last_birth));
            // Mostra a diferença em dias
            const days = duration.asDays();

            document.getElementById('del').value = eval(days.toFixed(0));

        });
    });
    // <----- calculo del está OK Até aqui------->

    // <----- calculo proximo cio aqui------->

    $(document).ready(function() {
        $("#insemination_date").on("change", function() {
            var date_cio = new Date($("#insemination_date").val()); // data do proximo cio
            var date_toque = new Date($("#insemination_date").val()); // data para o proximo toque
            var date_para_secar = new Date($("#insemination_date").val()); //data de secar
            var date_previsao_parto = new Date($("#insemination_date").val()); //  data de previsao de parto
            var date_pre_parto = new Date($("#insemination_date").val()); // data do transicao
            //days = parseInt($("#days").val(), 10);

            if (!isNaN(date_cio.getTime())) {

                // console.log(date_para_secar.setDate(date_para_secar.getDate() + (282 - 60)));

                date_cio.setDate(date_cio.getDate() + {{$setting->pregnancy_confirmation}}); // data do proximo cio
                date_toque.setDate(date_toque.getDate() + {{$setting->released_for_ultrasound}}); // data para o proximo toque
                date_previsao_parto.setDate(date_previsao_parto.getDate() + {{$setting->animal_birth}}); // data de previsao de parto
                date_para_secar.setDate(date_para_secar.getDate() + {{$setting->dry_animal}}); //data para secar
                date_pre_parto.setDate(date_pre_parto.getDate() + {{$setting->pre_delivery}}); //data para pré parto


                $('#date_next_heat')[0].valueAsDate = date_cio;
                $('#date_touch')[0].valueAsDate = date_toque;
                $('#delivery_date')[0].valueAsDate = date_previsao_parto;
                $('#dry_date')[0].valueAsDate = date_para_secar;
                $('#transition_date')[0].valueAsDate = date_pre_parto;


                const last_birth = moment(new Date($("#last_birth").val())); // data do ultmo parto
                const dated_teste = moment(new Date($("#delivery_date").val()));
                const duration = moment.duration(dated_teste.diff(last_birth));
                // Mostra a diferença em dias
                const days = duration.asDays();
                // const days = duration.asDays() / {{$setting->average_day_of_the_month}};

                document.getElementById('iep').value = eval(days.toFixed(0));

            } else {
                sweetAlert({
                    title: 'Woops!',
                    text: 'Informe a data corretamente!',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonText: 'Fechar',
                    autoclose: 1500,
                });
                $("#insemination_date").focus();
            }
        });

        Date.prototype.toInputFormat = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString();
            var dd = this.getDate().toString();
            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
        };
    });

</script>

@stop
@endsection
