@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


@stop
@include('sweet::alert')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$iterable->name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
                        </div>

                        <h3 class="profile-username text-center">{{$iterable->name}}</h3>

                        <p class="text-muted text-center">{{$iterable->level}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Animais Cadastrados</b> <a class="float-right">{{$animalsTotal}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Animais Produzindo</b> <a class="float-right">{{$animalsTotalActive}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Media DEL</b> <a class="float-right">{{$mediaDel}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção mês atual</b> <a class="float-right">{{$production_current_month}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção último mês</b> <a class="float-right">{{$production_last_month}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção ultimo 3 mêses</b> <a class="float-right">{{$production_last_3_months}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ativo no Sistema</b>

                                <input type="checkbox" name="status" data-id="{{ $iterable->id }}" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm" class="js-switch" {{ $iterable->status == 'sim' ? 'checked' : '' }}>

                                {{-- <input type="checkbox" data-id="{{ $iterable->id }}" name="status" class="js-switch float-right" {{ $iterable->status == 'sim' ? 'checked' : '' }}> --}}
                            </li>
                        </ul>
                        {{-- @if ($iterable->status == 'sim')
                              <a href="#" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Finalizado</span>
                              </a>
                              @else
                              <button type="button" name="status" class=" btn btn-warning btn-icon-split status">
                                <span class="icon text-white-50">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Marcar como Finalizado?</span>
                              </button>

                              @endif --}}



                        {{-- <input type="checkbox" class="custom-control-input" id="user-{{$iterable->id}}" {{($iterable->status) ? 'checked' : ''}} onclick="changeUserStatus(event.target, {{ $iterable->id }});"> --}}

                        {{-- <button class="btn btn-primary btn-block mybtn-{{$iterable->id}}" rel="{{ $iterable->id }}" rel2="1">
                        Active
                        </button> --}}
                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                {{-- <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sobre</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div> --}}
                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                  <div class="row">
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                              <div class="inner">
                                  <h3>{{$coverageDiagnosisP ?? ''}}</h3>

                                  <p>Prenhas</p>
                              </div>
                              <div class="icon">
                                  <i class="far fa-chart-bar"></i>
                              </div>
                              {{-- <a href="{{url('/painel/cobertura/prenha')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a> --}}
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                              <div class="inner">
                                  <h3>{{$coverageDiagnosisN ?? ''}}</h3>

                                  <p>Não Diagnosticado</p>
                              </div>
                              <div class="icon">
                                <i class="far fa-chart-bar"></i>
                              </div>
                              {{-- <a href="{{url('/painel/cobertura/nao-diagnosticado')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a> --}}
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                              <div class="inner">
                                  <h3>{{$coverageDiagnosisF ?? ''}}</h3>

                                  <p>Falhas</p>
                              </div>
                              <div class="icon">
                                  <i class="far fa-chart-bar"></i>
                              </div>
                              {{-- <a href="{{url('/painel/cobertura/falha')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a> --}}
                          </div>
                      </div>
                      <!-- ./col -->
                </div>
                <div class="row">

                    <div class="col-lg-4">

                        <figure>
                            <div id="service"></div>

                        </figure>
                    </div>
                    <div class="col-lg-4">

                        <figure>
                            <div id="conception"></div>

                        </figure>
                    </div>
                    <div class="col-lg-4">

                        <figure>
                            <div id="prenhez"></div>

                        </figure>
                    </div>



                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@section('js')

{{-- <script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
</script> --}}

<script type="text/javascript">

    $(document).ready(function() {
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 'sim' : 'não';
            let userId = $(this).data('id');
            validUrl = '{{url("/painel/changeStatus")}}';
            $.ajax({
                type: "GET",
                dataType: "json",
                url: validUrl,
                data: {
                    'status': status,
                    'user_id': userId
                },
                success: function() {
                  swal({
                      title: "Sucesso!",
                      text: "Registro alterado com sucesso",
                      type: "success",
                      timer: 1500,
                  });
                  document.location.reload(true);
                }
            });
        });
    });

</script>
<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>


  <script>



      Highcharts.chart('service', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
          },
          title: {
              text: 'Taxa Serviço <br><b> {{ $servico.'%' ?? ''}}</b>',
              align: 'center',
              verticalAlign: 'middle',
              y: 60
          },
          // tooltip: {
          //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          // },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  dataLabels: {
                      enabled: true,
                      distance: -50,
                      style: {
                          fontWeight: 'bold',
                          color: 'white'
                      }
                  },
                  startAngle: -90,
                  endAngle: 90,
                  center: ['50%', '75%'],
                  size: '110%'
              }
          },
          series: [{
              type: 'pie',
              name: 'Taxa de Serviço',
              innerSize: '60%',
              data: [
                {
                name: 'Taxa',
                y: {{$servico ?? 0}},
                color: '#17a2b8'
              },
                {
                name: '',
                y: 100,
                color: 'white'
              },]
          }]
      });
      Highcharts.chart('conception', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
          },
          title: {
              text: 'Taxa Concepção <br><b> {{$concepcao.'%' ?? '' }}</b>',
              align: 'center',
              verticalAlign: 'middle',
              y: 60
          },
          // tooltip: {
          //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          // },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  dataLabels: {
                      enabled: true,
                      distance: -50,
                      style: {
                          fontWeight: 'bold',
                          color: 'white'
                      }
                  },
                  startAngle: -90,
                  endAngle: 90,
                  center: ['50%', '75%'],
                  size: '110%'
              }
          },
          series: [{
              type: 'pie',
              name: 'Taxa Concepção',
              innerSize: '60%',
              data: [
                {
                name: 'Taxa',
                y: {{$concepcao ?? 0}},
                color: 'rgb(136, 14, 79)'
              },
                {
                name: '',
                y: 100,
                color: 'white'
              },

              ]
          }]
      });

      Highcharts.chart('prenhez', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
          },
          title: {
              text: 'Taxa Prenhez <br><b>{{$prenhez.'%' ?? ''}}</b>',
              align: 'center',
              verticalAlign: 'middle',
              y: 60
          },
          // tooltip: {
          //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          // },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  dataLabels: {
                      enabled: true,
                      distance: -50,
                      style: {
                          fontWeight: 'bold',
                          color: 'white'
                      }
                  },
                  startAngle: -90,
                  endAngle: 90,
                  center: ['50%', '75%'],
                  size: '110%'
              }
          },
          series: [{
              type: 'pie',
              name: 'Taxa de Prenhez',
              innerSize: '60%',
              data: [
                {
                name: 'Taxa',
                y: {{$prenhez ?? 0}},
                color: 'green'
              },
                {
                name: '',
                y: 100,
                color: 'white'
              },

              ]
          }]
      });
  </script>


{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop
@endsection
