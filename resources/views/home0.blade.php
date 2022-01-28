@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



@stop


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <img src="{{asset('vendor/adminlte/dist/img/cow.svg')}}" alt="">
                        {{-- <i class="fas fa-horse-head"></i> --}}
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Animais Produzindo</span>
                        <span class="info-box-number">
                            {{$animalsActive}}
                            <small>animais</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <img src="{{asset('vendor/adminlte/dist/img/cow.svg')}}" alt="">
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total de Animais</span>
                        <span class="info-box-number">
                            {{$animalsTotal}}
                            <small>animais</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <img src="{{asset('vendor/adminlte/dist/img/cow_udder.svg')}}" alt="">
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Litros Produzidos</span>
                        <span class="info-box-number">{{$productionTotal}}
                            <small>litros</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <img src="{{asset('vendor/adminlte/dist/img/Calendar-2.svg')}}" alt="">

                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">DEL<small> dias</small></span>
                        <span class="info-box-number">{{$mediaDel}}<small> média</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->


        <div class="row">

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$coverageDiagnosisP ?? ''}}</h3>

                        <p>Prenhas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <a href="{{url('/painel/cobertura/prenha')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a>
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
                      <i class="fas fa-spinner"></i>
                    </div>
                    <a href="{{url('/painel/cobertura/nao-diagnosticado')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a>
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
                        <i class="fas fa-thumbs-down"></i>
                    </div>
                    <a href="{{url('/painel/cobertura/falha')}}" class="small-box-footer">Saiba mais <i class="fas fa-arrow-circle-right"></i></a>
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



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Relatório de produção mensal</h5>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <!-- Sales Chart Canvas -->
                                    <div id="container"></div>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Relatório de produção diária</h5>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <!-- Sales Chart Canvas -->
                                    <div id="production"></div>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->

</section>


@stop

@section('js')

  <script>
  Highcharts.chart('container', {
      title: {
          text: 'Total por Entregas'
      },
      subtitle: {
                  text: 'Quantidade do mês atual'
              },
       xAxis: {
          categories: [
            @foreach ($results as $value)
            '{{Carbon::parse($value->collection_date)->format("d/m/Y")}}',
            @endforeach
        ]
      },
      yAxis: {
          title: {
              text: 'Litros por entrega'
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },
      plotOptions: {
          series: {
              allowPointSelect: true
          }
      },
      series: [{
          name: 'Litros',
          data: [
            @foreach ($results as $value)
                {{$value->total_liters_produced.','}}
                @endforeach
              ],
              pointStart: 0
      }],
      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }
  });


  Highcharts.chart('production', {

  title: {
      text: 'Produção diária'
  },

  subtitle: {
      text: 'Acompanhamento'
  },

  yAxis: {
      title: {
          text: 'Animais'
      }
  },

  // xAxis: {
  //     accessibility: {
  //         rangeDescription: 'Range: 2010 to 2017'
  //     }
  // },

  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
  },

  plotOptions: {
      series: {
          label: {
              connectorAllowed: false
          },
           pointStart: 0
      }
  },

  series: [
    @foreach ($production as $value)
       {
         name: "{{$value->earring.'/'.$value->name}}",
          data:[
         @foreach ($value['productions'] as  $value)
           {{$value->total_milking}},
         @endforeach
        ]
     },

    @endforeach
      ],

  responsive: {
      rules: [{
          condition: {
              maxWidth: 1500,
              maxHeight: 1500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }

  });



      Highcharts.chart('service', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: 0,
              plotShadow: false
          },
          title: {
              text: 'Taxa Serviço <br><b> {{ $servico ?? ''}}%</b>',
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
              text: 'Taxa Concepção <br><b> {{$concepcao ?? ''}}%</b>',
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
              text: 'Taxa Prenhez <br><b>{{$prenhez ?? ''}}%</b>',
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
  @include('sweet::alert')
  <script type="text/javascript">
      @if ($checksetting <1)

      const url = 'configuracao';
          swal({
            title: "Configurações pendentes!",
              text: "Para um bom funcionamento defina essas configurações!",
              icon: 'warning',
              confirmButtonText: "Sim",
              closeOnClickOutside: false,
              reverseButtons: !0
          }).then(function(value) {
              if (value) {
                  window.location.href = url;
              }
          });

      @endif

  </script>

{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop
