@extends('adminlte::page')
@section('title', 'Farms Nutrition')


@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastro</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item sexed">Adicionar propriedade ao responsavel</li>
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
                <form class="forms-sample" action="{{route('adminuser.store')}}" method="POST" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Selecione a propriedade*</label>
                                <select name="user_id" id="user_id" class=" {{ $errors->has('user_id') ? 'form-control is-invalid' : 'form-control' }}">
                                    <option value="">Selecione a propriedade</option>
                                    @foreach ($users as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Selecione o responsavel pela propriedade*</label>
                                <select name="admin_id" id="admin_id" class=" {{ $errors->has('admin_id') ? 'form-control is-invalid' : 'form-control' }}">
                                    <option value="">Selecione o responsavel pela propriedade</option>
                                    @foreach ($managements as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                        <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Limpar</button>

                    </div>
                </form>

            </div>
        </div>

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>
@endsection
