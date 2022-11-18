@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Data Fasyankes</h1>
  </div>
</section>

<section class="conten">
  <div class="container-fluid">
    <div class="row">
      <div class="col col-lg-6">
        <div class="card">
          <div class="card-body table-responsive p-0" style="height: 480px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>Daftar Fasyankes Satelit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($facilities as $facility)
                <tr>
                  <td> {{ $facility->name }} </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection