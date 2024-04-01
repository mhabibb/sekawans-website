@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Buat Faskes Baru</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3 col-md-6">
        <label for="name" class="form-label">Nama Faskes</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Faskes" value="{{ old('name') }}">
        @error('name')
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
      <div class="form-group mb-3 col-12">
        <label for="url_map" class="form-label">URL Map</label>
        <textarea name="url_map" id="url_map" class="form-control @error('url_map') is-invalid @enderror" rows="5" placeholder="Masukkan URL Map">{{ old('url_map') }}</textarea>
        @error('url_map')
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
