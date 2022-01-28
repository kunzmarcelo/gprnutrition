@extends('layouts.app')



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
                    <li class="breadcrumb-item active">Novo Estoque</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">

                        <form class="forms-sample" action="{{route('estoque.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">

                            <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="name">Descrição</label>
                                      <input class="{{ $errors->has('description') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('description')}}" name="description" id="description" type="text" placeholder="Descrição">
                                      <span>

                                      </span>
                                  </div>
                              </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="registration_date">Data de Entrada*</label>
                                        <input class="{{ $errors->has('registration_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('registration_date')}}" name="registration_date" id="registration_date" type="date" placeholder="Data de entrada*">
                                        <span>

                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price">Valor Unitário*</label>
                                        <input class="{{ $errors->has('price') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('price')}}" name="price" id="price" type="text" placeholder="Valor Unitário*">
                                        </span>
                                    </div>
                                </div>




                            </div>
                            <div class=" row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="the_amount">Quantidade</label>
                                      <input class="{{ $errors->has('the_amount') ? 'form-control is-invalid' : 'form-control' }} " value="1" name="the_amount" id="the_amount" type="text" placeholder="Quantidade">

                                  </div>
                              </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="unity">Unidade de entrada</label>
                                        <select class="{{ $errors->has('unity') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('unity')}}" name="unity" id="unity">
                                          <option value="">Selecione...</option>
                                          <option value="Quilograma">Quilograma</option>
                                          <option value="Unidade">Unidade</option>
                                          <option value="Bisnaga">Bisnaga</option>
                                          <option value="Litro">Litro</option>
                                          <option value="Tonelada">Tonelada</option>
                                          <option value="Metro">Metro</option>
                                          <option value="Dose">Dose</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="provider">Fornecedor</label>
                                        <input class="{{ $errors->has('provider') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('provider')}}" name="provider" id="provider" type="text" placeholder="Fornecedor">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Ativo</label>
                                      <select class="{{ $errors->has('active') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('active')}}" name="active" id="active">
                                          <option value="Sim">Sim</option>
                                          <option value="Não">Não</option>
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
            </div>
        </div>


    </div><!-- /.container-fluid -->
</section>
@include('sweetalert::alert')

@endsection
