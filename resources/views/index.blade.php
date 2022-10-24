@extends('layouts.app')

@section('content')
<section id="hero" class="container col-xxl-8 py-5 border">
  <div class="row flex-lg-row-reverse align-items-center gap-5">
    <div class="mx-auto col-lg-7" style="max-width: 600px; max-height: 400px;">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://picsum.photos/600/400" class="img-fluid" alt="pic">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/600/400" class="img-fluid" alt="pic">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/600/400" class="img-fluid" alt="pic">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col-lg-5">
      <h1 class="display-5 fw-bold mb-3">Responsive hero with image</h1>
      <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
        popular front-end open source toolkit.</p>
    </div>
  </div>
</section>
<section id="tentang" class="container py-5 text-center border">
  <h1 class="fw-bold mb-3">Tentang Sekawan'S</h1>
  <p class="lead mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, voluptates dolorum nemo et
    veritatis officia reiciendis rem iusto nisi earum?</p>
  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    <button type="button" class="btn btn-secondary btn-lg px-4">Selengkapnya</button>
  </div>
</section>
<section id="riwayat" class="container py-5 border"></section>
@endsection