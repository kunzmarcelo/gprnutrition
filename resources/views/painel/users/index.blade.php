@extends('adminlte::page')
@section('title', 'Farms Nutrition')
@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listagem</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('painel/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
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
                @foreach($results as $result)
                @can('admin', $result)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{$result->name}}</b></h2>
                                    <p class="text-muted text-sm"><b>Sobre: </b> {{$result->about}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Endereço: {{$result->address}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Contato: {{$result->phone}}</li>
                                    </ul>
                                </div>
                                {{-- <div class="col-5 text-center">
                                  <img src="{{asset('vendor/adminlte/dist/img/cow_udder.svg')}}" alt="" class="img-circle img-fluid">
                                </div> --}}

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                @if($result->level == 'admin')
                                  <a href="#" class="btn btn-sm bg-teal">
                                      <i class="fas fa-user"></i> {{$result->level}}
                                  </a>
                                @endif
                                @if($result->level == 'produtor')
                                  <a href="#" class="btn btn-sm bg-maroon">
                                      <i class="fas fa-user"></i> {{$result->level}}
                                  </a>
                                @endif
                              <a href="{{route('users.show',$result->id)}}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-user"></i> Ver informações
                              </a>
                            </div>
                          </div>
                        {{-- <div class="card-footer">
                            <div class="text-left">

                                @if($result->level == 'admin')
                                    <button class="btn btn-sm bg-teal">

                                        {{$result->level}}
                                    </button>
                                    @endif
                                    @if($result->level == 'produtor')
                                        <button class="btn btn-sm bg-gradient-success">

                                            {{$result->level}}
                                        </button>
                                        @endif
                                        @if($result->level == 'manager')
                                            <button class="btn btn-sm bg-gradient-warning">

                                                {{$result->level}}
                                            </button>
                                            @endif
                                            @if($result->level == 'seller')
                                                <button class="btn btn-sm  bg-gradient-info">

                                                    {{$result->level}}
                                                </button>
                                                @endif
                                                @if($result->level == 'owner')
                                                    <button class="btn btn-sm  bg-gradient-danger">

                                                        {{$result->level}}
                                                    </button>
                                                    @endif






                            </div>
                            <div class="text-right">

                                <a href="{{route('users.show',$result->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Ver informações
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                @endcan
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul>
            </nav>
        </div> --}}
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>



@section('js')


<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>

@stop
@endsection
