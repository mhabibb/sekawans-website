@extends('layouts.app')

@section('content')
{{-- HERO --}}
<section id="hero">
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 pb-4">
            <div class="col col-lg-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/600/400" style="height: 400px; object-fit: cover;"
                                class="d-block mx-auto" alt="pic">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/500/500" style="height: 400px; object-fit: cover;"
                                class="d-block mx-auto" alt="pic">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400/600" style="height: 400px; object-fit: cover;"
                                class="d-block mx-auto" alt="pic">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Yuk, Lawan TBC Dengan Hidup Bersih dan Sehat! </h2>
                <p class="lead">Pahami penyakit TBC dan gejalanya, dan terapkan perilaku hidup bersih dan sehat untuk menghindari dan mencegah penyakit TBC.</p>
            </div>
        </div>
    </div>
    <div class="container mx-auto row text-center justify-content-between pt-4 mb-5 border-top">
        <div class="col p-3">
            <img src="{{ asset('img/logo-stakeholder/kemenkes.png') }}"
                alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="{{ asset('img/logo-stakeholder/rsdsoebandi.png') }}"
                alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="{{ asset('img/logo-stakeholder/rsparu.png') }}"
                alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="{{ asset('img/logo-stakeholder/tosstb.png') }}"
                alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="{{ asset('img/logo-stakeholder/poptb.png') }}"
                alt="" height="80px">
        </div>
    </div>
</section>

{{-- TENTANG --}}
<section id="tentang" class="container-fluid py-5 text-center bg-primary">
    <div class="container text-white">
        <h2 class="fw-bold mb-3">Tentang Sekawan'S</h2>
        <p class="lead mb-3">{{ $about[0] }}</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('tentang')}}" class="btn btn-secondary btn-lg px-4">Selengkapnya</a>
        </div>
    </div>
</section>

{{-- RIWAYAT --}}
<section id="riwayat" class="container py-5 text-center border-bottom">
    <h2 class="fw-bold mb-5">Riwayat Jumlah Pasien TBC</h2>
    <div class="row gap-4">
        @foreach ($regencies as $regency)
        <div class="p-2 text-center col-md mx-auto" style="max-width: 200px;">
            <h1>{{ $regency->patients_count }}</h1>
            <p class="lead fw-bold">{{ $regency->name }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ARTIKEL --}}
<section id="artikel" class="container py-5">
    <h2 class="fw-bold mb-5 text-center text-primary">Artikel Terbaru</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4">
        @foreach ($articles as $article)
        <div class="col" style="max-width: 400px;">
            <div class="card border h-100">
                <img src="{{ asset('storage/'.$article->img) }}" class="card-img-top thumbnail" alt="...">
                <div class="card-body">
                    <div class="mb-2 d-flex gap-3">
                        <div class="col-4 text-truncate font-sm">
                            <i class="fa-solid fa-user"></i>
                            {{ $article->user->name ?? 'Deleted User' }}
                        </div>
                        <div class="px-2 font-sm">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ date('d M Y', strtotime($article->updated_at)) }}
                        </div>
                    </div>
                    <div class="module line-clamp">
                        <h5>{{ $article->title }}</h5>
                    </div>
                    <a href="{{ route('artikel.show', $article)}}" class="link-primary">Baca
                        selengkapnya</i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection