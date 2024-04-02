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
                    <h2 class="fw-bold mb-3">PASIEN TB DI JEMBER</h2>
                    <p class="lead">Berikut data jumlah pasien TBC yang diterima Sekawan's di Jember <br><br></p>
                    <p class="lead">Cek data penyakit TBC dari tahun ke tahun</p>
                    <a href="https://public.tableau.com/app/profile/alya.mirza/viz/Dashboardsekawanstbcjember1/Dashboard1" class="btn btn-secondary">Cek Data TBC</a>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @if (isset($regencies) && count($regencies) > 0)
        @foreach ($regencies as $regency)
        @if ($regency->name == 'KABUPATEN JEMBER')
        <div class="py-5 text-center border-bottom">
            <h2 class="fw-bold mb-5">{{ $regency->total }} PASIEN TB DI {{ $regency->name }}</h2>
            <div class="row gap-4 justify-content-center mb-3">
                <div class="col-12 col-sm-4 col-md-2 text-center" style="width: 150px;">
                    <h1>{{ $regency->sembuh }}</h1>
                    <p class="lead fw-bold">Sembuh</p>
                </div>
                <div class="col-12 col-sm-4 col-md-2 text-center" style="width: 150px;">
                    <h1>{{ $regency->berobat }}</h1>
                    <p class="lead fw-bold">Berobat</p>
                </div>
                <div class="col-12 col-sm-4 col-md-2 text-center" style="width: 150px;">
                    <h1>{{ $regency->mangkir }}</h1>
                    <p class="lead fw-bold">Mangkir</p>
                </div>
                <div class="col-12 col-sm-4 col-md-2 text-center" style="width: 150px;">
                    <h1>{{ $regency->ltfu }}</h1>
                    <p class="lead fw-bold">Loss To Follow Up</p>
                </div>
                <div class="col-12 col-sm-4 col-md-2 text-center" style="width: 150px;">
                    <h1>{{ $regency->meninggal }}</h1>
                    <p class="lead fw-bold">Meninggal</p>
                </div>
            </div>
            @if ($regency->total)
            <a href="{{ route('kasustbc.show', $regency) }}" class="btn btn-secondary">Lihat per Kecamatan</a>
            @endif
        </div>
        @endif
        @endforeach
        @else
        <div class="py-5 text-center border-bottom">
            <p class="lead">Data tidak tersedia.</p>
        </div>
        @endif
    </div>    
</section>
@endsection

