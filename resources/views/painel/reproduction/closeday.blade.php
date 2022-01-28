@extends('adminlte::page')
@section('title', 'Nutrition')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Relatório</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Relatório Reprodução</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Nota:</h5>
                    Antes de imprimir confira se todas as informações foram lançadas de forma correta.
                </div>

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
                    {{-- <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info
                                @almasaeedstudio.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe
                                @example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div> --}}
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
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
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->



                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                            {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                            </button> --}}

                            <a href="{{url('painel/fechamento_dia/pdf',$date)}}" rel="noopener" target="_blank" class="btn btn-primary float-right">
                              <i class="fas fa-download"></i>
                              Gerar PDF
                            </a>
                            {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Gerar PDF
                            </button> --}}
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@section('js')



{{-- <script src="{{asset('vendor/jquery/jquery.js')}}"></script> --}}
@stop

@endsection
