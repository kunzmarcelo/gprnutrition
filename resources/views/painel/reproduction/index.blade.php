@extends('layouts.app')

@section('css')

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
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
                    <li class="breadcrumb-item active">Reprodução</li>
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
                        <a href="{{url('painel/reproducao/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                        <th>Data</th>
                                        <th>Animal</th>
                                        <th>Último parto</th>
                                        <th>Cobertura</th>
                                        <th>Prox. Parto</th>
                                        <th>Secar</th>
                                        <th>Pré parto</th>
                                        <th>DEL</th>
                                        <th>Situação</th>
                                        <th>1° Observação</th>
                                        <th>2° Observação</th>
                                        <th>#</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($result->created)->format('d/m/Y')}}</td>
                                        <td>{{$result->animals->earring.' / '.$result->animals->name }}</td>

                                        <td>
                                            @empty (!$result->delivery_date)
                                            {{Carbon\Carbon::parse($result->delivery_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>

                                        <td>
                                            @empty (!$result->coverage_date)
                                            {{Carbon\Carbon::parse($result->coverage_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->expected_delivery_date)
                                            {{Carbon\Carbon::parse($result->expected_delivery_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->dry_date)
                                            {{Carbon\Carbon::parse($result->dry_date)->format('d/m/Y') }}
                                            @endempty
                                        </td>
                                        <td>
                                            @empty (!$result->pre_delivery_date)
                                            {{Carbon\Carbon::parse($result->pre_delivery_date)->format('d/m/Y')}}
                                            @endempty
                                        </td>
                                        <td>{{$result->del }}</td>

                                        <td>{{$result->situation }}</td>
                                        <td>{{$result->observation1 }}</td>
                                        <td>{{$result->observation2 }}</td>



                                        <td>
                                            <button class="btn btn-danger btn-sm" data-id="{{ $result->id }}" data-action="{{ route('reproducao.destroy',$result->id) }}" onclick="deleteConfirmation({{$result->id}})"><i
                                                  class="fas fa-trash"></i></button>
                                        </td>
                                        {{--<td>
                                            <a href='{{route('works.edit',$result->id)}}' align="right" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('works.destroy', $result->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" align="right" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza?');"><i class="fas fa-trash"></i> Deletar</button>
                                            </form>



                                        </td> --}}
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
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    function deleteConfirmation(id) {
        Swal.fire({
            icon: "warning",
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
                    url: "reproducao/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": CSRF_TOKEN,
                    },
                    success: function() {
                          Swal.fire({
                            title: "Sucesso!",
                            text: "Registro deletado com sucesso",
                            type: "success",
                            icon: "success",
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
{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
<script>
$(document).ready(function () {
    $.noConflict();
    var table = $('#dataTable').DataTable();
});
</script>
@stop
@endsection
