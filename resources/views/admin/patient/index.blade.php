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
          {{-- <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div> --}}

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
            <div class="d-flex justify-content-center">
              {{ $patients->onEachSide(1)->links() }}
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</section>
@endsection