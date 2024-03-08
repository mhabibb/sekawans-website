@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Edit Dokumen</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route($route, $document) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-3 col-md-6">
        <label for="title" class="form-label">Judul Dokumen (maksimal 128 karakter)</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="title" placeholder="Tulis judul..." value="{{ old('judul', $document->judul) }}">
        @error('judul')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="3">{{ old('keterangan', $document->keterangan) }}</textarea>
        @error('keterangan')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="d-flex align-items-center mb-3 col-md-6">
        <label for="link" class="form-label me-3">Link</label>
        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Tulis link..." value="{{ old('link', $document->link) }}">
        @error('link')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="reset" onclick="history.back()" class="btn btn-secondary me-2">Batalkan</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script>
  // Fungsi untuk menampilkan preview gambar sebelum diupload
  function previewImg() {
    const image = document.querySelector('#img');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
