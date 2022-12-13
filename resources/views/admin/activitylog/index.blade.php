@extends('layouts.admin')

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
                        <div class="card-header">Tiap log akan hilang setelah 365 hari</div>
                        <div class="card-body">
                            <div>
                                <table id="logsData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Deskripsi Aktivitas</th>
                                            <th>Tanggal/Waktu</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($logs as $log)
                                            <tr id="{{ $log->id }}">
                                                <td>
                                                    <div class="truncate">{{ $log->description }}</div>
                                                </td>
                                                <td>{{ $log->updated_at }}</td>
                                                <td style="white-space: nowrap;">
                                                    <a role="button" onclick="restoreLog({{ $log->id }})"
                                                        class="btn badge badge-success">Restore</a>
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
        moment.locale('id');
        $(document).ready(function() {
            crPage = 0;
            crPageLength = 10;
            table();
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
                                showConfirmButton: false,
                            })
                            crPageLength = dtTable.page.info().length;
                            crPage = dtTable.page.info().page;
                            $('#logsData').DataTable().destroy();
                            $('#' + id).remove();
                            table();
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

        function table() {
            $.fn.dataTable.moment('D MMMM YYYY, HH:mm:ss');
            dtTable = $('#logsData').DataTable({
                "pageLength": crPageLength,
                "responsive": true,
                "autoWidth": false,
                displayStart: 4,
                columnDefs: [{
                        targets: 2,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            date = new Date(data) == 'Invalid Date' ? moment(data,
                                'D MMMM YYYY, HH:mm:ss').toDate() : data;
                            return moment(date).format('D MMMM YYYY, HH:mm:ss')
                        }
                    },
                    {
                        targets: 0,
                        orderable: false,
                    }
                ],
                order: [
                    [1, 'desc']
                ],
                initComplete: function() {
                    this.api().page(crPage).draw('page');
                }
            });
        }
    </script>
@endsection
