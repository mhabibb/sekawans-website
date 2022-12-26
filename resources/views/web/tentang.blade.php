@extends('layouts.app')

@section('content')
<div class="container col-lg-8 ">
  <section class="py-5"> {{-- profil organisasi --}}
    <div class="article-header mb-3">
      <h2 class="fw-bold text-center">Profil Sekawan'S TB Jember</h2>
    </div>
    <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <figure class="figure">
        <img src="{{ $figure['image'] }}" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
        <figcaption class="figure-caption text-center">{{ $figure['caption'] }}</figcaption>
      </figure>
      <div class="body text-justify">
        <p style="white-space: break-spaces;">{{ $profile->contents }}</p>
      </div>
    </article>
  </section>

  <section class="py-5"> {{-- visi misi --}}
    <div class="article-header mb-3">
      <h3 class="fw-bold text-center">Visi Misi</h3>
    </div>
    <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <div class="body text-justify">
        <p style="white-space: break-spaces;">{{ $visimisi->contents }}</p>
      </div>
    </article>
  </section>

  <section class="py-5"> {{-- profil organisasi --}}
    <div class="article-header  mb-3">
      <h3 class="fw-bold text-center">Struktur Organisasi</h3>
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
      <figure class="figure">
        <img src="{{ $structure->contents != "" ? asset('storage/' . $structure->contents) : asset('img/struktur.png') }}" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
        <!--<figcaption class="figure-caption text-center">Gambar Struktur Organisasi Sekawans TB</figcaption>-->
      </figure>
      {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/struktur" class="btn btn-secondary btn-lg px-4 ">Selengkapnya</a>
      </div> --}}
    </div>
  </section>
</div>

@endsection
