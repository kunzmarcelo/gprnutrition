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

@push('js')
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
    </script>
@endpush