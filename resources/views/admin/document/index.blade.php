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
                            <a href="{{ route('admin.documents.create') }}" class="mb-2 mr-2 btn btn-primary">Input Dokumen Baru</a>
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="documentsData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Nama Dokumen</th>
                                            <th class="text-nowrap">Kategori Dokumen</th>
                                            <th class="text-nowrap">Deskripsi</th>
                                            <th class="text-nowrap">Waktu Update</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->judul }}</td>
                                                <td>{{ $document->kategori }}</td>
                                                <td>{{ $document->deskripsi }}</td>
                                                <td>{{ $document->updated_at->format('d M Y, H:i:s') }}</td>
                                                <td>
                                                    <div class="btn-toolbar" role="toolbar">
                                                        <div class="btn-group mr-2" role="group">
                                                            <a href="{{ route('admin.documents.show', $document->id) }}" class="btn btn-primary btn-sm">
                                                                <i class="fa-solid fa-eye"></i> Lihat
                                                            </a>
                                                        </div>
                                                        <div class="btn-group mr-2" role="group">
                                                            <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-warning btn-sm">
                                                                <i class="fa-solid fa-pencil"></i> Ubah
                                                            </a>
                                                        </div>
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $document->id }}">
                                                                <i class="fa-solid fa-trash"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var documentId = $(this).data('id');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus dokumen ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/admin/documents') }}/" + documentId,
                            type: "DELETE",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Dokumen telah dihapus.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal menghapus dokumen. Silakan coba lagi.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection