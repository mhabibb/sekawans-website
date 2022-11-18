@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>{{ $title }}</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('admin.patients.create') }}" class="card-title">Input Data</a>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No. Registrasi</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Fasyankes</th>
                    <th>Mulai Berobat</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($patients as $patient)
                  <tr>
                    <td>{{ $patient->id_number }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>Sehat</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center justify-content-md-end">
              {{ $patients->onEachSide(1)->links() }}
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</section>
@endsection