@extends('layouts.app')

@section('content')
<div class="container">
  <section class="py-5"> {{-- profil organisasi --}}
    <div class="article-header  mb-3">
      <h2 class="fw-bold text-center">Profil Sekawan'S TB Jember</h2>
    </div>
    <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <figure class="figure">
        <img src="https://picsum.photos/854/480" class="figure-img img-fluid rounded" style="max-height: 600px"
          alt="...">
        <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption>
      </figure>
      <div class="body">
        <p> {{ $profil }} </p>
      </div>
    </article>
  </section>

  <section class="py-5"> {{-- visi misi --}}
    <div class="article-header mb-3">
      <h3 class="fw-bold text-center">Visi Misi</h3>
    </div>
    <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <div class="body">
        <p> {{ $visimisi }}</p>
      </div>
    </article>
  </section>

  <section class="py-5"> {{-- profil organisasi --}}
    <div class="article-header  mb-3">
      <h3 class="fw-bold text-center">Struktur Organisasi</h3>
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <figure class="figure">
        <img src="{{ $struktur }}" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
        <figcaption class="figure-caption text-center">Gambar Struktur Organisasi Sekawans TB</figcaption>
      </figure>
      {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/struktur" class="btn btn-secondary btn-lg px-4 ">Selengkapnya</a>
      </div> --}}
    </div>
  </section>
</div>

@endsection