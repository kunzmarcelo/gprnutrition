@extends('adminlte::page')
@section('title', 'Painel Admin')
@section('content')



<div class="container-fluid">
  <div class="col-lg-12">
    @if(count($errors))

    <div class="alert alert-danger">

      <strong>Whoops!</strong> O seu cadastro possui muitos erros, verifique as informações abaixo apresentadas.

      <br />

      <ul>

        @foreach($errors->all() as $error)

          <li>{{ $error }}</li>

          @endforeach

      </ul>

    </div>
    @endif
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">
        {{session('error')}}
      </div>
    @endif
  </div>
    <div class="col-xl-12 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> {{ucwords(Auth::user()->name)}}, deseja alterar sua senha?</h1>
                            </div>
                            <form method="POST" action="{{route('users.update',auth()->user()->id)}}" accept-charset="UTF-8" id="upload" class="user" enctype="multipart/form-data">
                              {!! csrf_field()!!}
                              {!! method_field('PATCH')!!}

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input class="form-control" name="email" type="email" value="{{auth()->user()->email}}" id="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Nome completo:</label>
                                <input class="form-control" name="name" type="text" value="{{auth()->user()->name}}" id="name">
                            </div>

                            <div class="form-group">
                                <label for="newPassword">Nova Senha:</label>
                                <input class="form-control"  name="password" type="password" value="">
                            </div>


                            <div class="form-group">
                                <input class="btn btn-success mr-2" type="submit" value="Alterar Senha">

                            </div>
                            </form>
                            @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
