@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Edit Faskes</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-3 col-md-6">
        <label for="name" class="form-label">Nama Faskes</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama faskes" value="{{ old('name', $facility->name) }}">
        @error('judul')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-md-6">
      <select class="form-select" id="district" name="district" required style="font-size: 16px;">
            <option value="" selected disabled style="font-size: 16px;">Pilih Kecamatan di Jember</option>
            @foreach ($districts as $item)
            <option value="{{ $item->name }}" style="font-size: 16px;">{{ $item->name }}</option>
            @endforeach
      </select>
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="url_map">URL Map</label>
        <textarea name="url_map" id="url_map" class="form-control @error('url_map') is-invalid @enderror" placeholder="Masukkan url map">{{ old('url_map', $facility->url_map) }}</textarea>
        @error('url_map')
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
    const image = facility.querySelector('#file');
    const imgPreview = facility.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
