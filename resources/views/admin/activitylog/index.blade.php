@extends('layouts.admin')

@section('css')
<style>
  .truncate {
    display: -webkit-box;
    overflow:hidden;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;  
  }

</style>
@endsection

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Log Aktivitas</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <div>
              <table id="logsData" class="table table-bordered table-striped mx-auto">
                <thead>
                  <tr>
                    <th style="white-space: nowrap;">Deskripsi Aktivitas</th>
                    <th>Tanggal/Waktu</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($logs as $log)
                  <tr>
                    <td><div class="truncate">{{ $log->description }}</div></td>
                    <td>{{ date('j F Y, H:i:s', strtotime($log->updated_at)) }}</td>
                    <td style="white-space: nowrap;">
                      <button class="btn badge badge-info border-0">Show</button>
                      <button class="btn badge badge-success border-0">Restore</button>
                      <button class="btn badge badge-danger border-0">Delete</button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td>Log Kosong</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js')
    <script>
      $(document).ready(function() {
        $('#logsData').DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": false
        });
      })
    </script>
@endsection