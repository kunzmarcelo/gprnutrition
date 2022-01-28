@extends('adminlte::page')

@section('title', 'Admin Dashboard')
@section('css')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



@stop


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard do Admin {{auth()->user()->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Admin Dashboard </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
              <div class="col-md-4">
                  <a href="{{route('adminuser.create')}}" class="btn btn-outline-info btn-block btn-lg"><b>Cadastrar</b></a>

              </div>

            </div>
        </div>

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>

@stop
