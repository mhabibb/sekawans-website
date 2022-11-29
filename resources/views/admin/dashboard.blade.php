@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <h1>Dashboard</h1>
    </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Small boxes -->
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5">
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$info}}</h3>
                        <h5>Info TBC</h5>
                    </div>
                    <a href="{{ route('admin.infotbc.index') }}" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$artikel}}</h3>
                        <h5>Artikel</h5>
                    </div>
                    <a href="{{ route('admin.articles.index') }}" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$kegiatan}}</h3>
                        <h5>Kegiatan</h5>
                    </div>
                    <a href="{{ route('admin.kegiatan.index') }}" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$ps}}</h3>
                        <h5>PS</h5>
                    </div>
                    <a href="{{ route('admin.fasyankes.index') }}" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$pasien}}</h3>
                        <h5>Pasien</h5>
                    </div>
                    <a href="{{ route('admin.patients.index') }}" class="small-box-footer">Selengkapnya <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            @foreach ($kabupaten as $kab)
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $kab->name }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart{{ $kab->id }}"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>

                    <div class="card-footer">
                        <h5 class="card-title">DATA {{ $kab->name }}</h5>
                        <p class="card-text"> <a href="{{ route('admin.patients.index') }}"
                                class="card-link">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> </p>

                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
            @endforeach
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content -->
@endsection

@section('js')
{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function () {
      @foreach ($kabupaten as $kab) 
      const chart{{ $kab->id }} = $('#pieChart{{ $kab->id }}')
      new Chart(chart{{ $kab->id }}, {
        type: 'pie',
        data: {
          labels: ['Sembuh', 'Berobat', 'Mangkir', 'LTFU', 'Meninggal'],
          datasets: [{
            label: ' ~ Pasien',
            data: [
              {{ $kab->sembuh }}, 
              {{ $kab->berobat }}, 
              {{ $kab->mangkir }}, 
              {{ $kab->ltfu }}, 
              {{ $kab->meninggal }}
            ],
            backgroundColor: [
              '#5dff4d',
              '#f7ff1a',
              '#ff7200',
              '#ff0000',
              '#474347',
            ],
            borderWidth: 1,
            hoverOffset: 30
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
      @endforeach
    })
</script>
@endsection