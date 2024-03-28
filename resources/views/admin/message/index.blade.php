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
                            <table class="table table-bordered table-striped" id="messagesTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
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
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $message->id }}">Hapus</button>
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
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
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
        });
    </script>
@endsection