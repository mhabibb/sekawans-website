@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>{{ $title }}</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route($createRoute) }}" class="btn btn-primary">Buat {{ $title }} Baru</a>
                            @can('superAdmin')
                                <div class="mx-1 btn btn-info toggler" id="trashBtn">Lihat Sampah</div>
                            @endcan
                            <button class="mx-1 btn btn-info d-none" id="dataBtn">Tutup</button>
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="articlesData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th>Judul {{ $title }}</th>
                                            <th id="time">Waktu Update</th>
                                            <th>Author</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.1/sorting/datetime-moment.js"></script>

    <script>
        moment.locale('id');
        $(function() {
            table = $("#articlesData");
            time = $('#time')
            path = window.location.pathname.split('/')[2];
            url = "{{ route('admin.articles.index') }}";
            url = url.replace('articles', path)
            date = 'updated_at';
            tableAjax();

            @can('superAdmin')
                toggler = $('.toggler')
                toggler.click(function() {
                    if ($(this).hasClass('trash')) {
                        $(this).removeClass('trash')
                        $('.toggler').text('Lihat Sampah')
                        time.html('Waktu Update')
                        url = "{{ route('admin.articles.index') }}";
                        url = url.replace('articles', path)
                        date = 'updated_at';
                        tableAjax();
                    } else {
                        $(this).addClass('trash');
                        $('.toggler').text('Tutup Sampah');
                        time.html('Waktu Hapus');
                        url = "{{ route('admin.trashed.index', 'path') }}";
                        url = url.replace('path', path);
                        date = 'deleted_at';
                        tableAjax();
                    }
                })
            @endcan

            function tableAjax() {
                table.DataTable().destroy();
                $.fn.dataTable.moment('D MMMM YYYY, hh:mm:ss');

                table.DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "lengthChange": true,
                    order: [
                        [1, 'desc']
                    ],
                    ajax: {
                        'url': url,
                        'type': "GET",
                        'dataSrc': 'articles'
                    },
                    columns: [{
                            data: "title"
                        },
                        {
                            data: date,
                            render: function(data) {
                                date = new Date(data);
                                return moment(date).format('D MMMM YYYY, hh:mm:ss');
                            }
                        },
                        {
                            data: "user.name"
                        },
                        {
                            targets: 0,
                            data: "id",
                            render: function(data) {
                                @can('superAdmin')
                                    if (time.html() !== 'Waktu Update') {
                                        return `<a href="#" class="btn badge badge-success" onclick="action('restore',` +
                                            data + `)"><i class="fa-solid fa-rotate-left"></i> Pulihkan</a>
                                        <a href="#" class="btn badge badge-danger" onclick="action('forceDelete',` +
                                            data +
                                            `)"><i class="fa-solid fa-xmark"></i> Hapus Permanen</a>`;
                                    } else
                                @endcan
                                return `<a href="#" onclick="action('show',` + data + `)" class="badge badge-primary mr-2">
                                    <i class="fa-solid fa-eye"></i> Lihat</a>
                                    <a href="#" onclick="action('edit',` + data + `)" class="badge badge-warning mr-2">
                                    <i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                                    <a href="#" id="` + data + `" onclick="action('delete',` + data + `)" class="badge badge-danger">
                                    <i class="fa-solid fa-trash-can"></i> Hapus</a>`
                            }
                        }
                    ]
                })
            }
        })

        function action(action, id) {
            switch (action) {
                case 'show':
                    url = "{{ route('admin.articles.show', 'id') }}"
                    url = url.replace('articles', path).replace('id', id)
                    location.href = url;
                    break;
                case 'edit':
                    url = "{{ route('admin.articles.edit', 'id') }}"
                    url = url.replace('articles', path).replace('id', id)
                    location.href = url;
                    break;
                case 'delete':
                    url = "{{ route('admin.articles.destroy', 'id') }}";
                    url = url.replace('articles', path).replace('id', id)
                    text = {
                        title: 'Yakin Untuk Menghapus?',
                        text: 'Data akan dibuang ke sampah',
                        success: {
                            title: 'Terhapus',
                            text: 'Data telah dibuang ke sampah'
                        }
                    }
                    btnAjax('DELETE')
                    break;

                    @can('superAdmin')
                        case 'restore':
                        url = "{{ route('admin.articles.restore', 'id') }}";
                        url = url.replace('articles', path).replace('id', id)
                        text = {
                            title: 'Yakin Untuk Memulihkan?',
                            text: 'Data akan dapat diakses kembali',
                            success: {
                                title: 'Sukses',
                                text: 'Data telah dipulihkan'
                            }
                        }
                        btnAjax('PUT')
                        break;
                        case 'forceDelete':
                        url = "{{ route('admin.articles.forceDelete', 'id') }}";
                        url = url.replace('articles', path).replace('id', id)
                        text = {
                            title: 'Yakin Untuk Hapus Permanen?',
                            text: 'Data akan hilang selamanya dan tidak dapat dikembalikan',
                            success: {
                                title: 'Terhapus',
                                text: 'Data telah dihapus permanen'
                            }
                        }
                        btnAjax('DELETE')
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
                                })
                                table.DataTable().ajax.reload();
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
        }
    </script>
@endsection
