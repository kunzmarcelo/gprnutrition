    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Confirmação de Prenhez</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body">
                    @if(isset($cofirmar_prenhes) && $cofirmar_prenhes->count() > 0)
                    @foreach($cofirmar_prenhes as $value)
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text-xl">
                            <a href="{{ url('painel/cobertura/nao-diagnosticado') }}" class="text-muted">
                                <i class="fas fa-cogs"></i>
                            </a>
                        </p>
                        <p class="text-success text-xl">
                            <span>{{$value->animal->earring.'/'.$value->animal->name }}</span>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="font-weight-bold">
                                <i class="ion ion-android-arrow-up text-success"></i> {{ \Carbon\Carbon::parse($value->insemination_date)->format('d/m/Y')}}
                            </span>
                            <span class="text-muted">DATA DE COBERTURA </span>
                        </p>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Aviso!</h5>
                        Nenhum Registro encontrado.
                    </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Confirmar data de secagem</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    @if(isset($vacas_por_secar) && $vacas_por_secar->count() > 0)
                    @foreach($vacas_por_secar as $value)


                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text-xl">
                            {{--https://github.com/Hujjat/laravel-crud documentação do modal para edição --}}
                            <button class="btn btn-info" data-drydate="{{$value->dry_date}}" data-checkddrydate="informado" data-coverageid={{$value->id}} data-toggle="modal" data-target="#edit">Informar</button>
                        </p>
                        <p class="text-success">
                            <span>{{$value->animal->earring.'/'.$value->animal->name }}</span>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="font-weight-bold">
                                <i class="ion ion-android-arrow-up text-success"></i> {{ \Carbon\Carbon::parse($value->dry_date)->format('d/m/Y')}}
                            </span>
                            <span class="text-muted">DATA DE SECAGEM </span>
                        </p>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Aviso!</h5>
                        Nenhum Registro encontrado.
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Confirmar a data do Parto</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body">
                    @if(isset($animais_por_parir) && $animais_por_parir->count() > 0)
                    @foreach($animais_por_parir as $value)
                    @if($value->situation == '')
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <div class="btn-group btn-group-sm text-left">
                                @if($value->situation =='')
                                    <button name="situation" data-animal_id="{{ $value->animal_id }}" data-id="{{ $value->id }}" value="Pariu" class="situation btn btn-info">Pariu</button>
                                    <button name="situation" data-animal_id="{{ $value->animal_id }}" data-id="{{ $value->id }}" value="Falhou" class="situation btn btn-danger">Falhou</button>

                                    @endif
                            </div>
                            <p class="text-success">
                                <span>{{$value->animal->earring.'/'.$value->animal->name }}</span>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-up text-success"></i> {{ \Carbon\Carbon::parse($value->delivery_date)->format('d/m/Y')}}
                                </span>
                                <span class="text-muted">DATA DE PARIR </span>
                            </p>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Aviso!</h5>
                            Nenhum Registro encontrado.
                        </div>
                        @endif

                </div>
            </div>
        </div>
    </div>




    <!-- INICIO MODAL DE CONFIRMAR SECAGEM-->
    <!-- Attachment Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Confirmar data de secagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form action="{{route('cobertura.update','test')}}" method="post">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <input type="hidden" name="coverage_id" id="id">
                            <label class="col-form-label" for="modal-input-dry_date">Data de Secagem</label>
                            <input type="date" name="dry_date" class="form-control" id="valdrydate">
                            <input type="hidden" name="checkd_dry_date" class="form-control" id="des">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Attachment Modal -->
    <!-- FIM MODAL DE CONFIRMAR SECAGEM-->

    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    @stop
    @section('js')


    <script type="text/javascript">
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var dry_date = button.data('drydate')
            var checkd_drydate = button.data('checkddrydate')
            var coverage_id = button.data('coverageid')
            var modal = $(this)
            modal.find('.modal-body #valdrydate').val(dry_date);
            modal.find('.modal-body #des').val(checkd_drydate);
            modal.find('.modal-body #id').val(coverage_id);

        });

        $(".situation").on('click', function(event) {

            var situation = $(this).val();

            var id = $(this).data('id');
            var animal_id = $(this).data('animal_id');

            //console.log(id  + situation);

            validUrl = '{{url("/painel/home/confirmSituation")}}';
            $.ajax({
                type: "GET",
                dataType: "json",
                url: validUrl,
                data: {
                    'animal_id': animal_id,
                    'situation': situation,
                    'id': id
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
    </script>

    @stop
