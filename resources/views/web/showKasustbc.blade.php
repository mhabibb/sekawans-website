@extends('layouts.app')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="row align-items-center justify-content-between mb-4">
      <div>
        <a href="#" onclick="history.back()" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
      </div>
      <div class="text-center">
        <br><h3 class="fw-bold">KASUS TBC DI {{ $regency->name }}</h3>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
      @foreach ($regency->districts as $district)
      <div class="col">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold mb-3 text-center">{{ $district->name }}</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Sembuh
                <span class="badge bg-success rounded-pill">{{ $district->sembuh }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Berobat
                <span class="badge bg-warning text-dark rounded-pill">{{ $district->berobat }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Mangkir
                <span class="badge bg-danger rounded-pill">{{ $district->mangkir }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                LTFU
                <span class="badge bg-secondary rounded-pill">{{ $district->ltfu }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Meninggal
                <span class="badge bg-dark rounded-pill">{{ $district->meninggal }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Total
                <span class="badge bg-info rounded-pill">{{ $district->total }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  .list-group-item .badge {
    min-width: 40px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }
</style>

@endsection
