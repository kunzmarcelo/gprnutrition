@extends('layouts.app')
@section('css')
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>


@stop
@include('sweetalert::alert')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listagem</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Listagem</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">
                <div class="form-group row">
                    <div class="col-md-8"></div>

                    <div class="col-md-4">
                        <a href="{{url('painel/entrega/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

                    </div>


                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Data Coleta</th>
                                        <th>litros entregues</th>
                                        <th>litros consumo</th>
                                        <th>litros consumo interno</th>
                                        <th>litros descartados</th>
                                        <th>total</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)

                                    <tr>
                                        <td>{{Carbon\Carbon::parse($result->collection_date)->format('d/m/Y')}}</td>
                                        <td>{{$result->liters_delivered }}</td>
                                        <td>{{$result->liters_consumption }}</td>
                                        <td>{{$result->liters_internal_consumption }}</td>
                                        <td>{{$result->discarded_liters }}</td>
                                        <td>{{$result->total_liters_produced }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-id="{{ $result->id }}" data-action="{{ route('entrega.destroy',$result->id) }}" onclick="deleteConfirmation({{$result->id}})"><i
                                                  class="fas fa-trash"></i>
                                                </button>
                                        </td>
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.container-fluid -->
</section>


@section('js')
<script src="//code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
    function deleteConfirmation(id) {
        Swal.fire({
            title: "Woops!",
            text: "Deseja realmente excluir esse registro?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Sim",
            cancelButtonText: "Não",
            reverseButtons: !0
        }).then(function(e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "entrega/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": CSRF_TOKEN,
                    },
                    success: function() {
                      Swal.fire({
                            title: "Sucesso!",
                            text: "Registro deletado com sucesso",
                            icon: "success",
                            type: "success",
                            timer: 1500,
                        });
                        document.location.reload(true);
                    }
                });

            } else {
                e.dismiss;
            }

        }, function(dismiss) {
            return false;
        })
    }


</script>
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $.noConflict();
        var table = $('#dataTable').DataTable();
    });
</script>
@stop
@endsection
