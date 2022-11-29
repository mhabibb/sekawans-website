@extends('layouts.admin')

@section('admin-content')
<section class="container py-5 col-lg-8">
  <div class="article-header d-flex flex-column align-items-center mb-2">
    <a href="{{ route($indexRoute) }}" class="btn text-muted mb-3">
      <i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <div class="d-flex mb-3">
      <a href="{{route($editRoute , $article)}}" class="btn btn-warning btn-sm mx-2">
        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
      <form action="{{route('admin.articles.destroy', $article)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mx-2"
          onclick="return confirm('Yakin untuk menghapus {{ $article->title }} ?')">
          <i class="fa-solid fa-trash-can"></i> Hapus</button>
      </form>
    </div>
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
      @if ($article->img)
      <img src="{{ asset('storage/'.$article->img) }}" class="figure-img img-fluid rounded" style="max-height: 600px"
        alt="...">
      @endif
      {{-- <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption> --}}
    </figure>
    <div class="body">
      {!! $article->contents !!}
    </div>
  </article>
</section>
@endsection