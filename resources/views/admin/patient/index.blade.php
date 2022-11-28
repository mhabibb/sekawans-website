@extends('layouts.admin')

@section('css')

<style>
  div.dataTables_paginate ul.pagination {
    display: flex;
    flex-wrap: wrap;
  }
</style>

@endsection

@section('admin-content')

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
            <a href="{{ route('admin.patients.create') }}" class="btn btn-primary card-title">Input Data</a>
          </div>

          <div class="card-body">
            <table id="patientsData" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No. Registrasi</th>
                  <th>Nama Lengkap</th>
                  <th>Kecamatan</th>
                  <th>Mulai Berobat</th>
                  <th>PS</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($patients as $patient)
                <tr>
                  <td>{{ $patient->no_regis }}</td>
                  <td><a href="{{ route('admin.patients.show', $patient->patient) }}">{{ $patient->patient->name }}</a>
                  </td>
                  <td>{{ $patient->patient->district->name }}</td>
                  <td>{{ date('d M Y', strtotime($patient->patient->start_treatment)) }}</td>
                  <td>{{ $patient->worker->name }}</td>
                  <td>{{ $patient->patientStatus->status }}</td>
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

@section('js')

<script>
  $(function () {
    $("#patientsData").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"],
      order: [[3, 'desc']],
    }).buttons().container().appendTo('#patientsData_wrapper .col-md-6:eq(0)');
  });
</script>

@endsection