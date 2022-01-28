@extends('adminlte::page')

@section('title', 'Dashboard')
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
                <h1>Dashboard do(a) {{auth()->user()->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard {{auth()->user()->name}}</li>
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
                @foreach ($results as $value)


                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            {{$value->adminUser->level}}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">

                                    <h2 class="lead"><b>{{ $value->adminUser->name }}</b></h2>
                                    <p class="text-muted text-sm"><b>CPF: </b> {{$value->adminUser->cpf}}</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Endereço: {{$value->adminUser->address}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>Telefone: {{$value->adminUser->phone}}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                  <svg height="74" width="74" >
                                      <circle cx="32" cy="32" r="32" />
                                      <text font-size="32" font-family="Arial, Helvetica, sans-serif" fill="white" text-anchor="middle" x="32" y="43">
                                        {{$value->adminUser->name[0] . substr($value->adminUser->name, strpos(' ', $value->adminUser->name), 1)}}
                                      </text>
                                  </svg>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">

                                <a href="{{route('propriedade.show',$value->adminUser->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Ver propriedade
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>


@stop

@push('js')





  @include('sweetalert::alert')

@endpush
