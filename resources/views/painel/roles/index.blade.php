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
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">List Roles</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Label</th>
                                        <th class="project-actions text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($results as $result)

                                    <tr>
                                        <td>{{$result->name}}</td>
                                        <td>{{$result->label}}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="{{url("/painel/role/$result->id/permissions")}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                        </td>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.container-fluid -->
</section>


@section('js')


<script>
    $(document).ready(function() {
        $('.data-table').dataTable();
    });
</script>

@stop
@endsection
