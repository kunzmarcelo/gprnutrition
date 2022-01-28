@extends('adminlte::page')
@section('title', "Site: Detalhes do Trabalho {$iterable->title} - Painel Admin")
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Trabalhos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sobre {{$iterable->title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-7 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight text-primary">Proprietário <strong>{{$iterable->owner}}</strong></h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src='{{asset($iterable->img)}}'>
                    </div>
                    <p> Situação: <input data-id="{{$iterable->status}}" id="status" name="status" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publicado" data-off="Pendente"
                          {{ $iterable->status ? 'checked' : '' }}></p>
                    <p>Titulo: <b>{{$iterable->title}}</b></p>
                    <p>Slug: <b>{{$iterable->slug}}</b></p>
                    <p>Proprietário: <b>{{$iterable->owner}}</b></p>
                    <p>Tipo de Cliente: <b>{{$iterable->type}}</b></p>
                    <p>Cidade: <b>{{$iterable->city->name}}</b></p>
                    <p>Estado: <b>{{$iterable->state->name}}</b></p>
                    <p>Tipo de Cliente: <b>{{$iterable->client_type}}</b></p>
                    <p>Capacidade de Geração Mensal Média: <b>{{$iterable->capacity}}</b></p>
                    <p>Área de Ocupação: <b>{{$iterable->occupation_area}}</b></p>
                    <p>Potencia: <b>{{$iterable->power}}</b></p>
                    <p>Marca dos Módulos Fotovoltaicos: <b>{{$iterable->brand}}</b></p>
                    <p>Quantidade de Módulos Fotovoltaicos: <b>{{$iterable->number_technology}}</b></p>
                    <p>Marca do(s) Inversor(es): <b>{{$iterable->technology}}</b></p>
                    <p>Numero de Inversores: <b>{{$iterable->number_inverters}}</b></p>
                    <p>Tipo de Telhado: <b>{{$iterable->roof_type}}</b></p>
                    <p>Concessionária: <b>{{$iterable->concessionaire}}</b></p>
                    <p>Detalhes: <b>{{$iterable->details}}</b></p>

                    <form action="{{route('works.destroy', $iterable->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete" />

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza?');" style="width:100%">EXCLUIR</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight text-primary">Galeria</h6>
                </div>
                <div class="card-body">

                    @if($images->isEmpty())
                        <p class="mb-4">
                            <a href="{{route('image.create', ['work_id' =>  $iterable->id])}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Nova Galeria</span>
                            </a>
                        </p>

                        @else

                        @foreach ($images as $key => $value)
                        <div class="col-lg-12 text-left py-4">
                            <a href="{{url($value->img)}}" class="" data-fancybox="images">
                                <img class="img-responsive img-fluid" src="{{url($value->img)}}" style="width: 100%; height: 100%">
                            </a>
                            <form action="{{route('image.destroy', $value->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="delete" />

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza?');" style="width:100%">EXCLUIR</button>

                            </form>
                        </div>

                        @endforeach
                        @endif
                </div>
            </div>

        </div>
    </div>
</div>
@section('js')
  <script type="text/javascript">
  $("#status").change(function(){
    $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
           }

       });
       var value_id = {{$iterable->id}};
       validUrl = '{{route("works.update",$iterable->id)}}';

      if($(this).prop("checked") == true){

        $.ajax({
              type: "PUT",
              dataType: "json",
              url: validUrl,
               data:{
                 "_token" : $('meta[name="csrf-token"]').attr('content'),
                 'id': value_id,
                  'status': "1"
                },

               success: function(data){
                document.location.reload(true);
               }
            });

      }else{
        $.ajax({
              type: "PUT",
              dataType: "json",
              url: validUrl,
               data:{
                 "_token" : $('meta[name="csrf-token"]').attr('content'),
                 'id': value_id,
                  'status': "0"
                },

               success: function(data){
                document.location.reload(true);
               }
            });

      }
  });
  </script>

@stop
@include('layouts.includes.toastr_messages')
@endsection
