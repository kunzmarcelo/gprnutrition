@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Propriedade de {{$iterable->name}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$iterable->name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">



        @include('painel.home_includes.inline_cards')


        {{-- @include('painel.home_includes.lista_prenhas') --}}


        @include('painel.home_includes.arc_chart')

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <svg height="74" width="74">
                                <circle cx="32" cy="32" r="32" />
                                <text font-size="32" font-family="Arial, Helvetica, sans-serif" fill="white" text-anchor="middle" x="32" y="43">
                                    {{$iterable->name[0] . substr($iterable->name, strpos(' ', $iterable->name), 1)}}
                                </text>
                            </svg>
                        </div>

                        <h3 class="profile-username text-center">{{$iterable->name}}</h3>

                        <p class="text-muted text-center">{{$iterable->level}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Animais Cadastrados</b> <a class="float-right">{{$animalsTotal ?? ''}} animais</a>
                            </li>
                            <li class="list-group-item">
                                <b>Animais Produzindo</b> <a class="float-right">{{$animalsTotalActive ?? ''}} animais</a>
                            </li>
                            <li class="list-group-item">
                                <b>Media DEL</b> <a class="float-right">{{number_format($mediaDel, 0, ',', ' ') ?? ''}} dias</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção mês atual</b> <a class="float-right">{{$production_current_month ?? ''}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção último mês</b> <a class="float-right">{{$production_last_month ?? ''}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produção ultimo 3 mêses</b> <a class="float-right">{{$production_last_3_months ?? ''}} lts</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ativo no Sistema</b>

                                <input type="checkbox" name="status" data-id="{{ $iterable->id }}" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm" class="js-switch"
                                  {{ $iterable->status == 'sim' ? 'checked' : '' }}>

                                {{-- <input type="checkbox" data-id="{{ $iterable->id }}" name="status" class="js-switch float-right" {{ $iterable->status == 'sim' ? 'checked' : '' }}> --}}
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
</section>
@push('js')


<script>
    $(function() {
        $(".knob").knob();
    });
</script>
@endpush

@endsection
