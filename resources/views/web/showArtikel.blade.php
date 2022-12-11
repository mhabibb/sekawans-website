@extends('layouts.app')

@section('content')
<section class="container py-5 col-lg-8">
  <div class="article-header d-flex flex-column align-items-center gap-3 mb-2">
    <button class="link-secondary btn" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
    <h3 class="fw-bold text-center">{{ $article->title }}</h3>
  </div>
  <div class="d-flex justify-content-center gap-5 mb-3 text-muted">
    <div>
      <i class="fa-solid fa-user"></i>
      <small class="ms-1">{{ $article->user->name ?? 'Deleted User' }}</small>
    </div>
    <div>
      <i class="fa-solid fa-calendar-days"></i>
      <small class="ms-1">{{ date('d M Y', strtotime($article->updated_at)) }}</small>
    </div>
  </div>
  <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
    <figure class="figure">
      @if ($article->img)
      <img src="{{ asset('storage/'.$article->img) }}" class="figure-img img-fluid rounded" style="max-height: 600px"
        alt="..." loading="lazy">
      @endif
      {{-- <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption> --}}
    </figure>
    <div class="body">
      {!! $article->contents !!}
    </div>
  </article>
</section>
@endsection