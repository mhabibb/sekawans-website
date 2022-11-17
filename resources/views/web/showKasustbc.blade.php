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
          <h2 class="fw-bold mb-3"> KASUS TBC DI {{ $regency->name }} </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-5">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr class="align-middle text-center">
            <th scope="col" class="col-2 text-start">Kecamatan</th>
            <th scope="col" class="col-2">Sembuh</th>
            <th scope="col" class="col-2">Berobat</th>
            <th scope="col" class="col-2">Mangkir</th>
            <th scope="col" class="col-2">LTFU</th>
            <th scope="col" class="col-2">Meninggal</th>
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
            <td>{{ $district->matek }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection