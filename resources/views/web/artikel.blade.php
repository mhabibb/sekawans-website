@extends('layouts.app')

@section('content')
<section class="container py-5">
  <h2 class="fw-bold mb-4 text-center text-primary">Artikel</h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4">
    @forelse ($articles as $article)
    <div class="col" style="max-width: 400px;">
      <div class="card shadow-sm h-100">
        <img src="{{ asset('storage/'.$article->img) }}" class="card-img-top thumbnail" alt="..." loading="lazy">
        <div class="card-body">
          <div class="mb-2 d-flex gap-3">
            <div class="col-4 font-sm text-truncate">
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
          <a href="{{ route('artikel.show', $article) }}" class="link-primary text-underline">Baca selengkapnya</a>
        </div>
      </div>
    </div>
    @empty
    <div class="col">
      <hr>
      <p class="text-center">Data Kosong</p>
    </div>
    @endforelse
  </div>
  <div class="d-flex justify-content-center mt-4">
    {{ $articles->onEachSide(2)->links() }}
  </div>
</section>
@endsection