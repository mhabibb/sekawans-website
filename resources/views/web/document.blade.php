@extends('layouts.app')

@section('content')
<section class="container py-5">
  <h2 class="fw-bold mb-4 text-center text-primary">Dokumen</h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4">
    @forelse ($documents as $document)
    <div class="col" style="max-width: 400px;">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <div class="mb-2 d-flex gap-3">
            <div class="col-4 text-truncate font-sm">
              <i class="fa-solid fa-calendar-days"></i>
              {{ date('d M Y', strtotime($document->updated_at)) }}
            </div>
          </div>
          <div class="module line-clamp">
            <h5>{{ $document->judul }}</h5>
          </div>
          <p>Kategori: {{ $document->kategori }}</p>
          <p>{{ $document->deskripsi }}</p>
          <a href="{{ asset('storage/'.$document->file_path) }}" class="link-primary text-underline">Lihat Dokumen</a>
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
</section>
@endsection
