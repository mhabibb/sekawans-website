@extends('layouts.app')

@section('content')
<section>
    <div class="bg-primary text-light py-5">
        <div class="container px-4">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col col-lg-6">
                    <img src="https://picsum.photos/600/400" class="d-block img-fluid" alt="..." width="600"
                        height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Kasus TBC di Jember dan Sekitarnya</h2>
                    {{-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos dignissimos
                        voluptates quibusdam. Perspiciatis dolorem odit dignissimos? Suscipit, pariatur quae!</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @foreach ($regencies as $regency)
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
        @endforeach
    </div>
</section>
@endsection