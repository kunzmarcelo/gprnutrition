<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Das {{$vacas_inseminadas ?? ''}} femeas aptas para inseminação entre
                    {{ \Carbon\Carbon::parse($vacasInseminadasNosUltimosVinteUnDias ?? '')->format('d/m/Y').' e '.  \Carbon\Carbon::parse($dataHojeMenosTrintaDias ?? '')->format('d/m/Y')}}, {{$vacas_inseminadas ?? ''}} foram inseminadas.</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <input type="text" class="knob" data-thickness="0.3" data-angleArc="250" data-angleOffset="-125" value="{{$servico ?? ''}}" data-fgColor="#00c0ef" readonly title="Taxa de Serviço">


                                <div class="knob-label">Taxa de Serviço {{$servico ?? ''}}%</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-12 col-md-4 text-center">
                                <input type="text" class="knob" data-thickness="0.3" data-angleArc="250" data-angleOffset="-125" value="{{$concepcao ?? ''}}" data-fgColor="#f56954" readonly title="Taxa de Concepção">


                                <div class="knob-label">Taxa de Concepção {{$concepcao ?? ''}}%</div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <input type="text" class="knob" data-thickness="0.3" data-angleArc="250" data-angleOffset="-125" value="{{$prenhez ?? ''}}" data-fgColor="#00a65a" readonly title="Taxa de Prenhez">


                                <div class="knob-label">Taxa de Prenhez {{$prenhez ?? ''}}%</div>
                            </div>
                            <!-- ./col -->

                        </div>
                        <!-- /.row -->

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <h3>
                                <span class="description-percentage text-info"> {{$animals_able_to_get_pregnant ?? ''}} <i class="fas fa-check-circle"></i> </span>
                            </h3>
                            <h5 class="description-header">Aptos a Emprenhar</h5>
                            <span class="description-header">
                              {{-- @can('ROLE_PRODUCER', auth()->role()) --}}
                                <a href="{{route('cobertura.create')}}" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              {{-- @endcan --}}
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <h3>
                                <span class="description-percentage text-success"> {{$coverageDiagnosisP ?? ''}} <i class="fas fa-thumbs-up"></i></span>
                            </h3>
                            <h5 class="description-header">Prenhas</h5>
                            <span class="description-header">
                                <a href="{{route('cobertura.show','prenha')}}" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <h3>
                                <span class="description-percentage text-warning">
                                    {{$coverageDiagnosisN ?? ''}} <i class="fas fa-spinner"></i>
                                </span>
                            </h3>
                            <h5 class="description-header">Não Diagnosticado</h5>
                            <span class="description-header">
                                <a href="{{route('cobertura.show','nao-diagnosticado')}}" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            <h3>
                                <span class="description-percentage text-danger"> {{$coverageDiagnosisF ?? ''}} <i class="fas fa-thumbs-down"></i> </span>
                            </h3>
                            <h5 class="description-header">Falhas</h5>
                            <span class="description-header">
                                <a href="{{route('cobertura.show','falha')}}" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
