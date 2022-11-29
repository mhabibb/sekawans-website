@extends('layouts.app')

@section('content')
<section>
  <div class="bg-primary text-light py-5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center py-5 gap-3">
        <div>
          <button class="btn link-secondary" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>
            Kembali</button>
        </div>
        <div>
          <h3 class="fw-bold mb-3"> KASUS TBC DI {{ $regency->name }} </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-5">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr class="align-middle text-center">
            <th scope="col" class="text-start">Kecamatan</th>
            <th scope="col" class="col-1">Sembuh</th>
            <th scope="col" class="col-1">Berobat</th>
            <th scope="col" class="col-1">Mangkir</th>
            <th scope="col" class="col-1">LTFU</th>
            <th scope="col" class="col-1">Meninggal</th>
            <th scope="col" class="col-2">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($regency->districts as $district)
          <tr class="text-center">
            <th scope="row" class="text-start">{{$district->name}}</th>
            <td>{{ $district->sembuh }}</td>
            <td>{{ $district->berobat }}</td>
            <td>{{ $district->mangkir }}</td>
            <td>{{ $district->ltfu }}</td>
            <td>{{ $district->meninggal }}</td>
            <td>{{ $district->total }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection