@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Data Fasyankes</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Fasyankes TB RO</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fasyankes as $rs)
                <tr>
                  <td>{{ $rs }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body table-responsive" style="height: 480px;">
            <table class="table">
              <thead>
                <tr>
                  <th>Fasyankes Satelit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($satelites as $satelite)
                <tr>
                  <td> {{ $satelite->name }} </td>
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