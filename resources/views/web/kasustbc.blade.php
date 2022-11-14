@extends('layouts.app')

@section('content')
<section>
    <div class="bg-primary text-light py-5">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col col-lg-6 mx-auto">
                    <img src="https://picsum.photos/600/400" class="d-block mx-auto img-fluid" alt="..." width="600"
                        height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">Kasus TBC di Jember dan Sekitarnya</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos dignissimos
                        voluptates quibusdam. Perspiciatis dolorem odit dignissimos? Suscipit, pariatur quae!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @foreach ($regencies as $regency)
        <div class="py-5 text-center border-bottom mb-5">
            <h3 class="fw-bold mb-5">JUMLAH PASIEN TB DI {{ $regency->name }}</h3>
            <div class="row">
                <div class="px-2 text-center col-md-6 col-lg">
                    <h1>20</h1>
                    <p class="lead fw-bold">Sembuh</p>
                </div>
                <div class="px-2 text-center col-md-6 col-lg">
                    <h1>20</h1>
                    <p class="lead fw-bold">Dalam Pengobatan</p>
                </div>
                <div class="px-2 text-center col-md-6 col-lg">
                    <h1>20</h1>
                    <p class="lead fw-bold">Loss to Follow Up</p>
                </div>
                <div class="px-2 text-center col-md-6 col-lg">
                    <h1>20</h1>
                    <p class="lead fw-bold">Mangkir</p>
                </div>
                <div class="px-2 text-center col-md-6 col-lg">
                    <h1>20</h1>
                    <p class="lead fw-bold">Meninggal</p>
                </div>
            </div>
            <a href="{{ route('showKasustbc', $regency) }}" class="btn btn-secondary">Lihat per Kecamatan</a>
        </div>
        @endforeach
    </div>
</section>
@endsection