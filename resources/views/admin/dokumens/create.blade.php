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
    <form action="{{ route('dokumens.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3 col-md-6">
        <label for="judul" class="form-label">Judul Dokumen (maksimal 50 karakter)</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Tulis judul..." value="{{ old('judul') }}">
        @error('judul')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="file">File</label>
        <input type="file" class="form-control-file" name="file" id="file">
        @error('file')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="keterangan">Keterangan (maksimal 150 karakter)</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
        @error('keterangan')
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
