@extends('adminlte::page')
@section('title', 'Painel Admin')
@section('content')
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Roles</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                      <li class="breadcrumb-item active">List Roles {{$permission->label}}</li>
                  </ol>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </section>
<div class="container-fluid">




  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight text-primary">Roles: <strong>{{$permission->label}}</strong></h6>
    </div>



    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Label</th>

            </tr>
          </thead>

          <tbody>


            @foreach($roles as $result)

            <tr>
              <td>{{$result->name}}</td>
              <td>{{$result->label}}</td>


            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>
@endsection
