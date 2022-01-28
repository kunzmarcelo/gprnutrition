@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Roles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">List User Roles {{$user->name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">




    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight text-primary">User <-> Roles: <strong>{{$user->name}}</strong></h6>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Label</th>
                            {{-- <th>Ver</th> --}}
                        </tr>
                    </thead>

                    <tbody>


                        @foreach($roles as $result)

                        <tr>
                            <td>{{$result->name}}</td>
                            <td>{{$result->label}}</td>
                            {{-- <td><a href="{{url("/painel/permissions/$result->id/delete")}}">Deletar</a></td> --}}

                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
