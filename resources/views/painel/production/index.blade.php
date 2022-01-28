@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('css')
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
                    <li class="breadcrumb-item active">Produção</li>
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
                        <a href="{{url('painel/producao/create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

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
                                      <th>Data da ordenha</th>
                                        <th>Animal</th>
                                        <th>1° Ordenha</th>
                                        <th>2° Ordenha</th>
                                        <th>3° Ordenha</th>
                                        <th>Total Litros</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach($results as $result)

                                    <tr>
                                      <td>{{Carbon::parse($result->date_milking)->format('d/m/Y')}}</td>
                                        <td>{{$result->animal->name }}</td>
                                        <td>{{$result->first_milking }}</td>
                                        <td>{{$result->second_milking }}</td>
                                        <td>{{$result->third_milking }}</td>
                                        <td>{{$result->total_milking }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-id="{{ $result->id }}" data-action="{{ route('producao.destroy',$result->id) }}" onclick="deleteConfirmation({{$result->id}})"><i class="fas fa-trash"></i></button>
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
                      url: "producao/" + id,
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
