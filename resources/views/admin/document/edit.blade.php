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
    <form action="{{ route('admin.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-3 col-md-6">
        <label for="judul" class="form-label">Judul Dokumen</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan judul dokumen" value="{{ old('judul', $document->judul) }}">
        @error('judul')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- <div class="form-group mb-3 col-md-6">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Masukkan kategori dokumen" value="{{ old('kategori', $document->kategori) }}">
        @error('kategori')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div> --}}
      <div class="form-group mb-3 col-md-6">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi dokumen">{{ old('deskripsi', $document->deskripsi) }}</textarea>
        @error('deskripsi')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="file">File Dokumen</label>
        <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror" id="file">
        @error('file')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->
@endsection

@section('js')
<!-- Script untuk preview gambar -->
<script>
  function previewImg() {
    const image = document.querySelector('#file');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
