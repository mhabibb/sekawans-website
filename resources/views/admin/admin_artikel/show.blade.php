@extends('layouts.admin')

@section('admin-content')
<section class="container p-3">
  <div class="article-header d-flex flex-column align-items-center mb-2">
    <button class="btn mb-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>
      Kembali</button>
    <a href="{{route('articles.edit', $article)}}" class="btn btn-warning btn-sm mb-3">Edit Artikel</a>
    <div class="article-title">
      <h3 class="fw-bold text-center"> {{ $article->title }} </h3>
    </div>
  </div>
  <div class="d-flex justify-content-center mb-3 text-muted">
    <div class="mr-5">
      <i class="fa-solid fa-user"></i>
      <span class="ml-1">{{ $article->user->name }}</span>
    </div>
    <div>
      <i class="fa-solid fa-calendar-days"></i>
      <span class="ml-1">{{ date('d M Y', strtotime($article->updated_at)) }}</span>
    </div>
  </div>
  <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
    <figure class="figure">
      <img src="{{ $article->img }}" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
      <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption>
    </figure>
    <div class="body">
      <p> {{ $article->contents }} </p>
    </div>
  </article>
</section>
@endsection