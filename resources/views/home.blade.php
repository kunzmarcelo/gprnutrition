@extends('layouts.app')
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
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">

        {{-- @include('painel.home_includes.inline_cards') --}}


        @include('painel.home_includes.lista_prenhas')


        @include('painel.home_includes.arc_chart')



        {{-- @include('painel.home_includes.producao_animal') --}}

        {{-- @include('painel.home_includes.producao_mensal') --}}

    </div>
</section>


@stop


@push('js')


  <script>
      $(function() {
          $(".knob").knob();
      });
  </script>


@include('sweetalert::alert')

<script type="text/javascript">
  @if($checksetting < 1)

    const url = 'configuracao';
      Swal.fire({
        title: "Configurações pendentes!",
        text: "Para um bom funcionamento defina essas configurações!",
        icon: 'warning',
        confirmButtonText: "Sim",
        closeOnClickOutside: false,
        reverseButtons: !0
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });

    @endif
</script>

{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@endpush
