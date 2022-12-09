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
          <div class="card-header">Setiap log akan otomatis hilang setelah 360 hari</div>
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
                      {{-- <a href="{{ route('admin.logs.show', $log) }}" class="btn badge badge-info">Show</a> --}}
                      <a role="button" onclick="restoreLog({{ $log->id }})" class="btn badge badge-success">Restore</a>
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
            order: [[1, 'desc']]
        });
      })

      function restoreLog(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = "{{ route('admin.logs.restore', 'id') }}";
        url = url.replace('id', id)

        Swal.fire({
            title: 'Yakin Untuk Memulihkan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batalkan',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        type: "PUT",
                        url: url,
                        data: id,
                    })
                    .done(function(status) {
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Data telah dipulihkan',
                            icon: 'success',
                            showConfirmButton: false
                        })
                        setTimeout(() => {
                          location.href = "{{ route('admin.logs.index') }}";
                        }, 1500);
                    })
                    .fail(function() {
                        Swal.fire(
                            'Terjadi Kesalahan',
                            '',
                            'error'
                        )
                    });
            }
        })
      }
    </script>
@endsection
