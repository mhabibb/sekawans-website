@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Buat Dokumen Baru</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3 col-md-6">
        <label for="judul" class="form-label">Judul Dokumen (maksimal 128 karakter)</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Tulis judul..." value="{{ old('judul') }}">
        @error('judul')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Tulis kategori..." value="{{ old('kategori') }}">
        @error('kategori')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-12">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Tulis deskripsi...">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-12">
        <label for="file" class="form-label">File</label>
        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
        @error('file')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection
