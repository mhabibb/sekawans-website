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
    <div class="card">
      <div class="card-body">
        <div class="row mb-4 pb-2 border-bottom">
          <div class="col-12 card-title">
            <h5>Detail Facility</h5>
          </div>
          <form action="{{ route('admin.fasyankes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Ubah metode menjadi POST untuk pembuatan baru -->
            @method('POST')
            <div class="col-sm-6 form-group">
              <label>Nama Fasyankes</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama faskes">
              @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="col-sm-6 form-group">
                <label>Kecamatan</label>
                <select class="form-select" id="district_id" name="district_id" required>
                    <option value="" selected disabled>Pilih Kecamatan di Jember</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-6 form-group">
              <label>URL Map</label>
              <textarea name="url_map" id="url_map" class="form-control @error('url_map') is-invalid @enderror" placeholder="Masukkan url map"></textarea>
              @error('url_map')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="row">
              <div class="col-12">
                <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
