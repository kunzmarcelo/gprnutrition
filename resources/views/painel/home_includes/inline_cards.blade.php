<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <img src="{{asset('vendor/adminlte/dist/img/cow.svg')}}" alt="">
                {{-- <i class="fas fa-horse-head"></i> --}}
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Animais Produzindo</span>
                <span class="info-box-number">
                    {{$animals_producing ??''}}
                    <small>animais</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <img src="{{asset('vendor/adminlte/dist/img/cow.svg')}}" alt="">
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Total de Animais</span>
                <span class="info-box-number">
                    {{$animalsTotal ??''}}
                    <small>animais</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
                <img src="{{asset('vendor/adminlte/dist/img/cow_udder.svg')}}" alt="">
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Litros Produzidos</span>
                <span class="info-box-number">{{$productionTotal ??''}}
                    <small>litros</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->



    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
                <img src="{{asset('vendor/adminlte/dist/img/Calendar-2.svg')}}" alt="">

            </span>

            <div class="info-box-content">
                <span class="info-box-text">DEL<small> médio</small></span>
                <span class="info-box-number">{{number_format($mediaDel, 0, ',', ' ') ??''}}<small> dias</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
