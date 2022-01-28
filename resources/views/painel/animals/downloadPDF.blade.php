<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>


</head>

<body>










    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="{{url('vendor/adminlte/dist/img/farms_nutrition.png')}}" style="height:70px; width: 70px">
                                    Farms Nutrition
                                    <small class="float-right">{{Carbon::now()->format('d/m/Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->


                        <div class="row">
                            <div class="col-9">
                                <h4>
                                    Relatório de animais

                                </h4>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                          <th>Brinco</th>
                                          <th>Nome</th>
                                          <th>N° Regi.</th>
                                          <th>Sexo</th>
                                          <th>Mãe</th>
                                          <th>Pai</th>
                                          <th>Ativo</th>
                                          <th>Dis.</th>
                                          <th>Lote</th>
                                          <th>Ativo</th>

                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($iterable as $result)
                                          <tr>
                                              <td>{{$result->earring}}</td>
                                              <td>{{$result->name }}</td>
                                              <td>{{$result->record }}</td>
                                              <td>{{$result->sex }}</td>
                                              <td>
                                                @if($result->mother_on_the_property == 'Desconhecido')
                                                {{'Desc.'}}
                                              @else
                                                {{$result->mother_on_the_property }}
                                              @endif
                                              </td>
                                              <td>
                                                @if($result->father_on_the_property == 'Desconhecido')
                                                {{'Desc.'}}
                                              @else
                                                {{$result->father_on_the_property }}
                                              @endif
                                              </td>
                                              <td>{{$result->active }}</td>
                                              <td>
                                                  @if($result->to_discard == 'Não')
                                                      <span class="badge bg-success">{{$result->to_discard }}</span>
                                                      @else
                                                      <span class="badge bg-danger">{{$result->to_discard }}</span>
                                                      @endif
                                              </td>
                                              <td>{{$result->lot->name }}</td>
                                              <td>
                                                  @if($result->active == 'Sim')
                                                      <span class="badge bg-success">{{$result->active }}</span>
                                                      @else
                                                      <span class="badge bg-danger">{{$result->active }}</span>
                                                      @endif
                                              </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>


                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</body>

</html>
