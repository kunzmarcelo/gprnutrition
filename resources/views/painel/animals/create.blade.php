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
                    <li class="breadcrumb-item active">Novo Animal</li>
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
                        <form class="forms-sample" action="{{route('animais.store')}}" method="POST" enctype="multipart/form-data" id="form">
                            {{csrf_field()}}
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Número do Brinco*</label>
                                        <input class="{{ $errors->has('earring') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('earring')}}" name="earring" id="earring" type="text" placeholder="Número do Brinco*">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nome do Animal*</label>
                                        <input class="{{ $errors->has('name') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nome do Animal*">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Fase do Animal</label>
                                        <select class="{{ $errors->has('animal_stage') ? 'form-control is-invalid' : 'form-control' }} " name="animal_stage" id="animal_stage">

                                            <option value="">Selecione ...</option> @foreach($phase as $value)

                                            <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                    <!-- text input -->

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data do Ultimo parto</label>
                                        <input class="{{ $errors->has('date_of_last_delivery') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('date_of_last_delivery')}}" name="date_of_last_delivery" id="date_of_last_delivery" type="date" placeholder="Data do Ultimo parto" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input class="{{ $errors->has('birth_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('birth_date')}}" name="birth_date" id="birth_date" type="date" placeholder="data nascimento">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Raça</label>
                                        <select class="{{ $errors->has('breed') ? 'form-control is-invalid' : 'form-control' }} " name="breed" id="breed">
                                            <option value="Desconhecido">Desconhecido</option>
                                            <option value="Holandês preto e branco" label="Holandês preto e branco">
                                                Holandês preto e branco</option>
                                            <option value="Jersey" label="Jersey">Jersey</option>
                                            <option value="Ayrshire" label="Ayrshire">Ayrshire</option>
                                            <option value="Gir leiteiro" label="Gir leiteiro">Gir leiteiro</option>
                                            <option value="Girolando" label="Girolando">Girolando</option>
                                            <option value="Guernsey" label="Guernsey">Guernsey</option>
                                            {{-- <option value="Não informada" label="Não informada">Não informada
                                            </option> --}}
                                            <option value="Normando" label="Normando">Normando</option>
                                            <option value="Pardo suíça" label="Pardo suíça">Pardo suíça</option>
                                            <option value="Pitangueiras" label="Pitangueiras">Pitangueiras</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Grau Sangue</label>
                                        <select class="{{ $errors->has('blood_grade') ? 'form-control is-invalid' : 'form-control' }} " name="blood_grade" id="blood_grade">
                                            <option value="Desconhecido">Desconhecido</option>
                                            <option value="1/8">1/8</option>
                                            <option value="1/4">1/4</option>
                                            <option value="3/8">3/8</option>
                                            <option value="7/16">7/16</option>
                                            <option value="1/2">1/2</option>
                                            <option value="9/16">9/16</option>
                                            <option value="5/8">5/8</option>
                                            <option value="11/16">11/16</option>
                                            <option value="3/4">3/4</option>
                                            <option value="13/16">13/16</option>
                                            <option value="7/8">7/8</option>
                                            <option value="15/16">15/16</option>
                                            <option value="31/32">31/32</option>
                                            <option value="PC">PC</option>
                                            <option value="PCOD">PCOD</option>
                                            <option value="PCOC">PCOC</option>
                                            <option value="PO">PO</option>
                                            <option value="LA">LA</option>
                                            <option value="CG">CG</option>
                                            <option value="63/34">63/34</option>
                                            <option value="127/128">127/128</option>
                                            <option value="255/256">255/256</option>
                                            <option value="GC-01">GC-01</option>
                                            <option value="GC-02">GC-02</option>
                                            <option value="GC-03">GC-03</option>
                                            <option value="GC-04">GC-04</option>
                                            <option value="GC-05">GC-05</option>
                                            <option value="GC-06">GC-06</option>
                                            <option value="GC-07">GC-07</option>
                                            <option value="17/32">17/32</option>
                                            <option value="23/32">23/32</option>
                                            <option value="25/32">25/32</option>
                                            <option value="41/64">41/64</option>
                                            <option value="57/64">57/64</option>
                                            <option value="1023/1024">1023/1024</option>
                                            <option value="63/37">63/37</option>
                                            <option value="50/50">50/50</option>
                                            <option value="75/25">75/25</option>
                                            <option value="88/12">88/12</option>
                                            <option value="81/19">81/19</option>
                                            <option value="62/37">62/37</option>
                                            <option value="56/44">56/44</option>
                                            <option value="56/43">56/43</option>
                                            <option value="72/28">72/28</option>
                                            <option value="25/25">25/25</option>
                                            <option value="31/18">31/18</option>
                                            <option value="69/31">69/31</option>
                                            <option value="PS">PS</option>
                                            <option value="CEIP">CEIP</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="{{ $errors->has('sex') ? 'form-control is-invalid' : 'form-control' }} " name="sex">
                                            <option value="Femea">Femea</option>
                                            <option value="Macho">Macho</option>
                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Lote do Animal*</label>
                                        <select name="lot_id" id="lot_id" class=" {{ $errors->has('lot_id') ? 'form-control is-invalid' : 'form-control' }}">
                                            @foreach ($lots as $value)
                                            <option value="{{$value->id}}" {{old('type')=='{$value}' ? 'selected' : ''
                                                }}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Origem</label>
                                        <select class="{{ $errors->has('origin') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('origin')}}" name="origin" id="origin">
                                            <option value="Desconhecido">Desconhecido</option>
                                            <option value="Nascimento">Nascimento</option>
                                            <option value="Compra">Compra</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input class="{{ $errors->has('value') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('value')}}" name="value" id="value" type="text" placeholder="Valor" onkeyup="formatarMoeda(this);">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Data do desmame</label>
                                        <input class="{{ $errors->has('weaning_date') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('weaning_date')}}" name="weaning_date" id="weaning_date" type="date" placeholder="data do demame">
                                    </div>
                                </div>
                            </div> {{-- row--}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Mãe da propriedade</label>
                                        <select class="{{ $errors->has('mother_on_the_property') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('mother_on_the_property')}}" name="mother_on_the_property" id="mother_on_the_property">
                                            <option value="Desconhecido">Desconhecido</option>

                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Pai da propriedade</label>
                                        <select class="{{ $errors->has('father_on_the_property') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('father_on_the_property')}}" name="father_on_the_property" id="father_on_the_property">
                                            <option value="Desconhecido">Desconhecido</option>

                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Imagem</label>
                                        <input class="{{ $errors->has('image') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('image')}}" name="image" id="image" type="file" placeholder="imagem">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Ativo</label>
                                        <select class="{{ $errors->has('active') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('active')}}" name="active" id="active">
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Número do registro</label>
                                        <input class="{{ $errors->has('record') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('record')}}" name="record" id="record" type="text" placeholder="Número de registro">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Para descarte?</label>
                                        <select class="{{ $errors->has('to_discard') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('to_discard')}}" name="to_discard" id="to_discard">
                                            <option value="Não">Não</option>
                                            <option value="Sim">Sim</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea placeholder="Observações" class="{{ $errors->has('comments') ? 'form-control is-invalid' : 'form-control' }} " value="{{old('comments')}}" name="comments" id="comments" rows="4" cols="80">{{old('comments')}}</textarea>

                                    </div>
                                </div>

                            </div>

                            <div class="card-footer ">
                                <button type="submit" name="button" class="btn btn-outline-info btn-lg  float-right">Enviar</button>
                                <button type="reset" name="button" class="btn btn-outline-danger btn-lg" onClick="history.go(-1)">Voltar</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@section('js')
  <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
     $(document).ready(function() {
        $("#animal_stage").on("change", function() {
            event.preventDefault();
        const mySelectValue = document.querySelector('#animal_stage').value;
        if (mySelectValue === 'Novilha' || mySelectValue === 'Bezerro') {
            document.getElementById("date_of_last_delivery").disabled = true;
            document.getElementById("date_of_last_delivery").required = false;
        }
        if (mySelectValue === 'Vaca em Lactação') {
            document.getElementById("date_of_last_delivery").disabled = false;
            document.getElementById("date_of_last_delivery").required = true;
        }
        if (mySelectValue === 'Vaca para descarte futuro') {
            document.getElementById("date_of_last_delivery").disabled = false;
            document.getElementById("date_of_last_delivery").required = true;
        }

        });
     });


    function formatarMoeda(i) {
        var v = i.value.replace(/\D/g, '');
        v = (v / 100).toFixed(2) + '';
        v = v.replace(".", ",");
        v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
        v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
        i.value = v;
    }

</script>

@stop
@include('sweetalert::alert')
@endsection
