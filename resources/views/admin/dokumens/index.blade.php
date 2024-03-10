@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Daftar Dokumen</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.dokumen.create') }}" class="mb-2 mr-2 btn btn-primary">Buat Dokumen Baru</a>
                            @can('superAdmin')
                                <div class="mb-2 btn btn-info toggler" id="trashBtn">Lihat Sampah</div>
                                <div class="trash-desc"></div>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="dokumensData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Judul Dokumen</th>
                                            <th class="text-nowrap">Waktu Update</th>
                                            <th class="text-nowrap">Author</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        moment.locale('id');
        $(function() {
            var table = $("#dokumensData");
            var time = $('#time');
            var path = window.location.pathname.split('/')[2];
            var url = "{{ route('admin.dokumen.index') }}";
            url = url.replace('dokumens', path);
            var date = 'updated_at';
            tableAjax();

            @can('superAdmin')
                var toggler = $('.toggler');
                toggler.click(function() {
                    if ($(this).hasClass('trash')) {
                        $(this).removeClass('trash');
                        $('.toggler').text('Lihat Sampah');
                        $('.trash-desc').text('');
                        time.html('Waktu Update');
                        url = "{{ route('admin.dokumens.index') }}";
                        url = url.replace('dokumens', path);
                        date = 'updated_at';
                        tableAjax();
                    } else {
                        $(this).addClass('trash');
                        $('.toggler').text('Tutup Sampah');
                        $('.trash-desc').text('Tiap entri sampah akan hilang dalam 3 bulan');
                        time.html('Waktu Hapus');
                        url = "{{ route('admin.trashed.index', 'path') }}";
                        url = url.replace('path', path);
                        date = 'deleted_at';
                        tableAjax();
                    }
                });
            @endcan

            function tableAjax() {
                table.DataTable().destroy();
                $.fn.dataTable.moment('D MMMM YYYY, HH:mm:ss');

                table.DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "lengthChange": true,
                    order: [
                        [1, 'desc']
                    ],
                    columnDefs: [{
                        searchable: false,
                        orderable: false,
                        targets: 3,
                    }],
                    ajax: {
                        'url': url,
                        'type': "GET",
                        'dataSrc': 'dokumens'
                    },
                    columns: [{
                            data: "title",
                            render: function(data) {
                                return `<div class="truncate">${data}</div>`;
                            }
                        },
                        {
                            data: date,
                            render: function(data) {
                                var date = new Date(data);
                                return moment(date).format('D MMMM YYYY, HH:mm:ss');
                            }
                        },
                        {
                            data: "user",
                            render: function(data) {
                                data = data || 'Deleted User';
                                return data.name || 'Deleted User';
                            }
                        },
                        {
                            targets: 0,
                            data: "id",
                            render: function(data) {
                                @can('superAdmin')
                                    if (time.html() !== 'Waktu Update') {
                                        return `<div class="d-flex"><a role="button" class="badge badge-success" onclick="action('restore',` + data + `)">
                                                <i class="fa-solid fa-rotate-left"></i> Pulihkan</a>
                                            <a role="button" class="badge badge-danger" onclick="action('forceDelete',` + data + `)">
                                                <i class="fa-solid fa-xmark"></i> Hapus Permanen</a></div>`;
                                    } else {
                                @endcan
                                return `<div class="d-flex"><a role="button" onclick="action('show',` + data + `)" class="badge badge-primary">
                                        <i class="fa-solid fa-eye"></i> Lihat</a>
                                    <a role="button" onclick="action('edit',` + data + `)" class="badge badge-warning">
                                        <i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                                    <a role="button" id="` + data + `" onclick="action('delete',` + data + `)" class="badge badge-danger">
                                        <i class="fa-solid fa-trash-can"></i> Hapus</a></div>`;
                            }
                        }
                    }]
                });
            }
        });

        function action(action, id) {
            var text;
            var url;

            switch (action) {
                case 'show':
                    url = "{{ route('admin.dokumen.show', 'id') }}";
                    url = url.replace('dokumens', path).replace('id', id);
                    location.href = url;
                    break;
                case 'edit':
                    url = "{{ route('admin.dokumen.edit', 'id') }}";
                    url = url.replace('dokumens', path).replace('id', id);
                    location.href = url;
                    break;
                case 'delete':
                    url = "{{ route('admin.dokumen.destroy', 'id') }}";
                    url = url.replace('dokumens', path).replace('id', id);
                    text = {
                        title: 'Yakin Untuk Menghapus?',
                        text: 'Data akan dibuang ke sampah',
                        success: {
                            title: 'Terhapus',
                            text: 'Data telah dibuang ke sampah'
                        }
                    };
                    btnAjax('DELETE');
                    break;
                @can('superAdmin')
                    case 'restore':
                        url = "{{ route('admin.dokumen.restore', 'id') }}";
                        url = url.replace('dokumens', path).replace('id', id);
                        text = {
                            title: 'Yakin Untuk Memulihkan?',
                            text: 'Data akan dapat diakses kembali',
                            success: {
                                title: 'Sukses',
                                text: 'Data telah dipulihkan'
                            }
                        };
                        btnAjax('PUT');
                        break;
                    case 'forceDelete':
                        url = "{{ route('admin.dokumen.forceDelete', 'id') }}";
                        url = url.replace('dokumens', path).replace('id', id);
                        text = {
                            title: 'Yakin Untuk Hapus Permanen?',
                            text: 'Data akan hilang selamanya dan tidak dapat dikembalikan',
                            success: {
                                title: 'Terhapus',
                                text: 'Data telah dihapus permanen'
                            }
                        };
                        btnAjax('DELETE');
                        break;
                @endcan
                default:
                    break;
            }

            function btnAjax(type) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                Swal.fire({
                    title: text.title,
                    text: text.text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batalkan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                type: type,
                                url: url,
                                data: id,
                            })
                            .done(function(status) {
                                Swal.fire({
                                    title: text.success.title,
                                    text: text.success.text,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                table.DataTable().ajax.reload();
                            })
                            .fail(function() {
                                Swal.fire(
                                    'Terjadi Kesalahan',
                                    '',
                                    'error'
                                );
                            });
                    }
                });
            }
        }
    </script>
@endsection
