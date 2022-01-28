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

@push('js')

<script>
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
            layout: 'vertical'
            , align: 'right'
            , verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                }
                , pointStart: 0
            }
        },

        series: [
            
            @foreach($production as $value) {
                name: "{{$value->earring.'/'.$value->name}}",
                data: [@foreach($value['productions'] as $value){{ $value->total_milking}}, @endforeach]
            },
            @endforeach
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 1500
                    , maxHeight: 1500
                }
                , chartOptions: {
                    legend: {
                        layout: 'horizontal'
                        , align: 'center'
                        , verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

</script>
@endpush
@section('css')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




@stop