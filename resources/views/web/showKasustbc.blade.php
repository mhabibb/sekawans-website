@extends('layouts.app')

@section('content')
<section>
  <div class="bg-primary text-light py-5">
    <div class="container">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col col-lg-6 mx-auto">
          <img src="https://picsum.photos/600/400" class="d-block mx-auto img-fluid" alt="..." width="600" height="400"
            loading="lazy">
        </div>
        <div class="col-lg-6">
          <h2 class="fw-bold mb-3"> KASUS TBC DI {{ $regency->name }} </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Sembuh</th>
          <th scope="col">Dalam Pengobatan</th>
          <th scope="col">Loss to Follow Up</th>
          <th scope="col">Mangkir</th>
          <th scope="col">Meninggal</th>
        </tr>
      </thead>
      <tbody>
        <tr>

          <th scope="row">Jember</th>
          <td>20</td>
          <td>20</td>
          <td>20</td>
          <td>20</td>
          <td>20</td>

        </tr>
      </tbody>
    </table>
  </div>
</section>
@endsection