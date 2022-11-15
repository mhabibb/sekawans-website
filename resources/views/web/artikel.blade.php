@extends('layouts.app')

@section('content')
<section class="container py-5 d-flex flex-column gap-4 align-items-center">
  <h1 class="fw-bold text-primary">Artikel</h1>
  <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($articles as $article)
    <div class="col" style="max-width: 400px;">
      <div class="card shadow-sm h-100 mx-auto">
        <img src="{{ $article->img }}" class="card-img-top thumbnail" alt="..." loading="lazy">
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
          <a href="{{ route('showArtikel', $article) }}" class="link-primary text-underline">Baca selengkapnya</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{ $articles->onEachSide(1)->links() }}
</section>
@endsection