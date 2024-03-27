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
                                        <th>Waktu Pengiriman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->nama }}</td>
                                        <td>{{ $message->nomor }}</td>
                                        <td>{{ $message->keperluan }}</td>
                                        <td>{{ $message->file_path }}</td>
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
    <script>
        $(document).ready(function() {
            // Event listener untuk tombol delete
            $('.delete-btn').click(function() {
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
                        // Kirim permintaan hapus dengan Ajax
                        $.ajax({
                            url: '/admin/messages/' + messageId,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    // Hapus baris dari tabel
                                    $('#messagesTable').DataTable().row($(this).parents('tr')).remove().draw();
                                    Swal.fire(
                                        'Terhapus!',
                                        'Data pesan telah dihapus.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan saat menghapus data pesan.',
                                        'error'
                                    );
                                }
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
