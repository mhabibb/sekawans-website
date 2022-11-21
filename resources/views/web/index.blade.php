@extends('layouts.app')

@section('content')
{{-- HERO --}}
<section id="hero">
    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 pb-5">
            <div class="col col-lg-6 mx-auto">
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
                <h1 class="fw-bold mb-3">Yuk, Lawan TBC
                    Dengan Hidup Bersih dan Sehat </h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most
                    popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive
                    prebuilt components, and powerful JavaScript plugins.</p>
            </div>
        </div>
    </div>
    </div>
    <div class="container mx-auto row text-center pt-4 mb-5 border-top">
        <div class="col p-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Logo_of_the_Ministry_of_Health_of_the_Republic_of_Indonesia.svg/1280px-Logo_of_the_Ministry_of_Health_of_the_Republic_of_Indonesia.svg.png"
                alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="https://tbindonesia.or.id/wp-content/uploads/2019/10/logo-tosstb.png" alt="" height="80px">
        </div>
        <div class="col p-3">
            <img src="https://poptbindonesia.org/wp-content/uploads/2020/10/Samping-trans-300x162.png" alt=""
                height="80px">
        </div>
        <div class="col p-3">
            <img src="https://promkes.kemkes.go.id/__asset/__images/content_wysiwyg//LOGO_GERMAS_NORMAL.png" alt=""
                height="80px">
        </div>
    </div>
</section>

{{-- TENTANG --}}
<section id="tentang" class="container-fluid py-5 text-center bg-primary">
    <div class="container text-white">
        <h1 class="fw-bold mb-3">Tentang Sekawan'S</h1>
        <p class="lead mb-3">{{ $about[0] }}</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('tentang')}}" class="btn btn-secondary btn-lg px-4">Selengkapnya</a>
        </div>
    </div>
</section>

{{-- RIWAYAT --}}
<section id="riwayat" class="container py-5 text-center">
    <h1 class="fw-bold mb-5">Riwayat Jumlah Pasien TBC</h1>
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
    <h1 class="fw-bold mb-5 text-center text-primary">Artikel Terbaru</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4">
        @foreach ($articles as $article)
        <div class="col">
            <div class="card border h-100">
                <img src="{{ $article->img }}" class="card-img-top thumbnail" alt="card-image">
                <div class="card-body">
                    <div class="mb-1 d-flex gap-3">
                        <div class="col-4 text-truncate" style="font-size: 14px;">
                            <i class="fa-solid fa-user"></i>
                            {{ $article->user->name }}
                        </div>
                        <div class="px-2" style="font-size: 14px;">
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