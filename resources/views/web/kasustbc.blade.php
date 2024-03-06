@extends('layouts.app')

@section('content')
<section>
    <div class="bg-primary text-light py-5">
        <div class="container px-4">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col col-lg-6">
                    <img src="{{ asset('img/kasus-tbc.png') }}" class="d-block img-fluid" alt="..." width="600"
                        height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3 text-center">Kasus TBC di Jember dan Sekitarnya</h2>
                    <p class="lead text-center">Berikut data jumlah pasien TBC yang diterima Sekawan's di kabupaten Lumajang, Jember, Bondowoso, dan Situbondo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @foreach ($regencies as $regency)
        <div class="row py-5 border-bottom">
            <div class="col-lg-6 text-center">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="fw-bold mb-4">{{ $regency->total }} PASIEN TB DI {{ $regency->name }}</h2>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <p class="lead fw-bold">Sembuh</p>
                                <h3>{{ $regency->sembuh }}</h3>
                            </div>
                            <div class="col-6">
                                <p class="lead fw-bold">Berobat</p>
                                <h3>{{ $regency->berobat }}</h3>
                            </div>
                            <div class="col-6">
                                <p class="lead fw-bold">Mangkir</p>
                                <h3>{{ $regency->mangkir }}</h3>
                            </div>
                            <div class="col-6">
                                <p class="lead fw-bold">Loss To Follow Up</p>
                                <h3>{{ $regency->ltfu }}</h3>
                            </div>
                            <div class="col-6">
                                <p class="lead fw-bold">Meninggal</p>
                                <h3>{{ $regency->meninggal }}</h3>
                            </div>
                        </div>
                        @if ($regency->total)
                        <a href="{{ route('kasustbc.show', $regency) }}" class="btn btn-secondary mt-4">Lihat per Kecamatan</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <canvas id="chart_{{ $regency->id }}" width="300" height="300"></canvas>
                <script>
                    var ctx_{{ $regency->id }} = document.getElementById('chart_{{ $regency->id }}').getContext('2d');
                    var myChart_{{ $regency->id }} = new Chart(ctx_{{ $regency->id }}, {
                        type: 'pie',
                        data: {
                            labels: ['Sembuh', 'Berobat', 'Mangkir', 'Loss To Follow Up', 'Meninggal'],
                            datasets: [{
                                data: [{{ $regency->sembuh }}, {{ $regency->berobat }}, {{ $regency->mangkir }}, {{ $regency->ltfu }}, {{ $regency->meninggal }}],
                                backgroundColor: [
                                    '#4CAF50',
                                    '#2196F3',
                                    '#FFC107',
                                    '#9C27B0',
                                    '#FF5722'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                },
                            }
                        }
                    });
                </script>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
