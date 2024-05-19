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
                            <a href="{{ route('admin.documents.create') }}" class="mb-2 mr-2 btn btn-primary">Buat Dokumen Baru</a>
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="documentsData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Nama Dokumen</th>
                                            <th class="text-nowrap" style="width: 35%;">Deskripsi</th>
                                            <th class="text-nowrap">Waktu Update</th>
                                            <th style="width: 20%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($documents as $document)
                                            <tr>
                                                <td>{{ $document->judul }}</td>
                                                <td>{{ $document->deskripsi }}</td>
                                                <td>{{ $document->updated_at->format('d M Y, H:i:s') }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start">
                                                        <a role="button" onclick="action('show', {{ $document->id }})" class="badge badge-primary mr-2">
                                                            <i class="fa-solid fa-eye"></i> Lihat
                                                        </a>
                                                        <a role="button" onclick="action('edit', {{ $document->id }})" class="badge badge-warning mr-2">
                                                            <i class="fa-solid fa-pen-to-square"></i> Ubah
                                                        </a>
                                                        <a role="button" onclick="action('delete', {{ $document->id }})" class="badge badge-danger">
                                                            <i class="fa-solid fa-trash-can"></i> Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No data available in table</td>
                                            </tr>
                                        @endforelse
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
        function action(action, id) {
            switch (action) {
                case 'show':
                    url = "{{ route('admin.documents.show', ':id') }}";
                    url = url.replace(':id', id);
                    location.href = url;
                    break;
                case 'edit':
                    url = "{{ route('admin.documents.edit', ':id') }}";
                    url = url.replace(':id', id);
                    location.href = url;
                    break;
                case 'delete':
                    url = "{{ route('admin.documents.destroy', ':id') }}";
                    url = url.replace(':id', id);
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
                            data: { id: id },
                        })
                        .done(function(status) {
                            Swal.fire({
                                title: text.success.title,
                                text: text.success.text,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
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
