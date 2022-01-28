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
                                <img src="{{url('vendor/adminlte/dist/img/gpr_site.png')}}" style="height:70px; width: 70px">
                                Nutrição Animal
                                <small class="float-right">Realizado em: {{Carbon::parse($date)->format('d/m/Y')}}</small>
                            </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->


                        <div class="row">
                            <div class="col-9">
                                <h4>
                                    Relatório de prenhez

                                </h4>
                            </div>

                        </div>

                        <div class="row">
                            
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                          <th>Animal</th>
                                          <th>Último Parto</th>
                                          <th>Cobertura</th>
                                          <th>Prox. Parto</th>
                                          <th>Secar</th>
                                          <th>Pré parto</th>
                                          <th>DEL</th>
                                          <th>Situação</th>
                                          <th>1° Observação</th>
                                          <th>2° Observação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($iterable as $result)
                                        <tr>
                                              <td>{{$result->animals->earring.' / '.$result->animals->name }}</td>

                                            <td>
                                                @empty (!$result->delivery_date)
                                                {{Carbon::parse($result->delivery_date)->format('d/m/Y') }}
                                                @endempty
                                            </td>

                                            <td>
                                                @empty (!$result->coverage_date)
                                                {{Carbon::parse($result->coverage_date)->format('d/m/Y') }}
                                                @endempty
                                            </td>

                                            <td>
                                                @empty (!$result->expected_delivery_date)
                                                {{Carbon::parse($result->expected_delivery_date)->format('d/m/Y') }}
                                                @endempty
                                            </td>

                                            <td>
                                                @empty (!$result->dry_date)
                                                {{Carbon::parse($result->dry_date)->format('d/m/Y') }}
                                                @endempty
                                            </td>

                                            <td>
                                                @empty (!$result->pre_delivery_date)
                                                {{Carbon::parse($result->pre_delivery_date)->format('d/m/Y')}}
                                                @endempty
                                            </td>

                                            <td>{{$result->del }}</td>
                                           

                                            <td>{{$result->situation }}</td>

                                            <td>{{$result->observation1 }}</td>

                                            <td>{{$result->observation2 }}</td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            
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
