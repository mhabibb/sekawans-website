@extends('layouts.app')

@section('content')
<section class="container py-5 col-lg-8">
  <div class="article-header d-flex flex-column align-items-center gap-3 mb-2">
    <button class="link-secondary btn" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>
      Kembali</button>
    <h3 class="fw-bold text-center">{{ $info->title }}</h3>
    {{-- <p class="text-muted">Sumber : A caption information source</p> --}}
  </div>
  <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
    <figure class="figure">
      @if ($info->img)
      <img src="{{ asset('storage/'.$info->img) }}" class="figure-img img-fluid rounded" style="max-height: 600px"
        alt="..." loading="lazy">
      @endif
    </figure>
    <div class="body">
      {!! $info->contents !!}
    </div>
  </article>
</section>
@endsection