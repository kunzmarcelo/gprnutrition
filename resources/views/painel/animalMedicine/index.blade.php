@extends('adminlte::page')
@section('title', 'Nutrition')
@section('css')
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
                    <li class="breadcrumb-item active">Aplicações</li>
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
                        <a href="{{url('painel/aplicacoes/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                        <th>#</th>
                                        <th>Animal</th>
                                        <th>Medicamento</th>
                                        <th>Data aplicação</th>
                                        <th>Próxima aplicação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)

                                    <tr>

                                        <td>{{$result->id }}</td>
                                        <td>{{$result->animals->earring.' / '. $result->animals->name }}</td>
                                        <td>{{$result->medicines->description }}</td>
                                        @if($result->application_date <= Carbon::now())
                                          <td>
                                            {{Carbon::parse($result->application_date)->format('d/m/Y')}}
                                                </td>
                                                @endif
                                                <td>
                                                    @if($result->next_application <= Carbon::now()) <span class="badge bg-success">
                                                            {{Carbon::parse($result->next_application)->format('d/m/Y')}}
                                                            </span>
                                                            @else
                                                            <span class="badge bg-warning">
                                                                {{Carbon::parse($result->next_application)->format('d/m/Y')}}
                                                            </span>
                                                            @endif
                                                </td>

                                                <td>

                                                    <button class="btn btn-danger btn-sm" data-id="{{ $result->id }}" data-action="{{ route('aplicacoes.destroy',$result->id) }}" onclick="deleteConfirmation({{$result->id}})"><i
                                                          class="fas fa-trash"></i></button>

                                                    {{-- <form action="{{route('aplicacoes.destroy', $result->id)}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" align="right" class="btn btn-danger btn-sm" onClick="enviaDivida(event)"><i class="fas fa-trash"></i> </button>
                                                    </form> --}}



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

<script type="text/javascript">


    function deleteConfirmation(id) {
        swal({
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
                    url: "aplicacoes/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": CSRF_TOKEN,
                    },
                    success: function() {
                        swal({
                            title: "Sucesso!",
                            text: "Registro deletado com sucesso",
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

    $(document).ready(function() {
        $('.data-table').dataTable();
    });



</script>
{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop

@endsection
