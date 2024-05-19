@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-eS2lWNyMqNu6D4f3k1hdp8F+laVBNADNvUQ8dgRoj4y8+ndET3L2oqr1c4PKUs4/ObA6mD3K3ScK9Xx6A1ky0Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .col {
    flex: 1 0 auto;
    margin: 10px; 
    max-width: 400px;
  }

  .card {
    border: none;
    transition: transform 0.3s;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-body {
    padding: 20px;
  }

  .card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333; 
    margin-bottom: 10px;
  }

  .card-description {
    color: #333; 
    margin-bottom: 20px;
  }

  .card-link {
    color: #007bff; 
    text-decoration: none;
    transition: color 0.3s;
  }

  .card-link:hover {
    color: #0056b3; 
  }

  .card-date {
    font-size: 0.9rem;
    color: #999; 
  }
</style>

<section class="container py-5">
  <h2 class="fw-bold mb-4 text-center text-primary">Dokumen</h2>
  <div class="row justify-content-center g-4">
    @forelse ($documents as $document)
    <div class="col">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between align-items-center">
            <div class="card-date">
              <i class="fa-solid fa-calendar-days"></i>
              {{ date('d M Y', strtotime($document->updated_at)) }}
            </div>
          </div>
          <h5 class="card-title">{{ $document->judul }}</h5>
          <p class="card-description">{{ $document->deskripsi }}</p>
          <a href="{{ asset('storage/'.$document->file_path) }}" class="card-link">Lihat Dokumen</a>
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
