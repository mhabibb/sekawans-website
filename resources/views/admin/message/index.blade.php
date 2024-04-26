@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Pesan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="loading" class="text-center mb-3" style="display: none;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped" id="messagesTable" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor Telepon</th>
                                        <th>Keperluan</th>
                                        <th>File</th>
                                        <th>Waktu Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->nama }}</td>
                                        <td>{{ $message->nomor }}</td>
                                        <td>{{ $message->keperluan }}</td>
                                        <td>
                                            @if ($message->file_path)
                                                <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">Unduh File</a>
                                            @else
                                                Tidak Ada File
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at }}</td>
                                        <td>
                                            @if ($message->trashed())
                                                <button class="btn btn-success btn-sm restore-btn" data-id="{{ $message->id }}">Pulihkan</button>
                                            @else
                                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $message->id }}">Hapus</button>
                                            @endif
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
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var messagesTable = $('#messagesTable').DataTable();

            // Show loading
            $('#loading').show();

            $('.delete-btn').click(function() {
                var row = $(this).closest('tr');
                var messageId = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("admin.messages.destroy", ":id") }}'.replace(':id', messageId),
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                row.remove();
                                messagesTable.draw();
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                );
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data pesan.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('#loading').hide();
            $('#messagesTable').show();

            // Tambahkan event listener untuk tombol restore
            $('#messagesTable tbody').on('click', '.restore-btn', function() {
                var row = $(this).closest('tr');
                var messageId = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan memulihkan pesan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, pulihkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("admin.messages.restore", ":id") }}'.replace(':id', messageId),
                            type: 'GET',
                            success: function(response) {
                                if (response.status === 'success') {
                                    row.remove();
                                    messagesTable.draw();
                                    Swal.fire(
                                        'Berhasil!',
                                        response.message,
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat memulihkan data pesan.',
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
