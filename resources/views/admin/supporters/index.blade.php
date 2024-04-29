@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Patient Supporter</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <a href="{{ route('admin.supporters.create') }}" class="btn btn-primary">Tambah Patient Supporter</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;">Nama Patient Supporter</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($workers as $worker)
                                            <tr>
                                                <td>{{ $worker->name }}</td>
                                                <td>
                                                    <form class="form" action="{{ route('admin.supporters.destroy', ['worker', $worker->id]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('admin.supporters.edit', ['worker', $worker->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                                        <button class="btn btn-sm btn-danger delete-button" data-id="{{ $worker->id }}" data-nama="{{ $worker->name }}">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Data Kosong</td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-button').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var namaFasyankes = $(this).data('nama');
            Swal.fire({
                title: 'Anda yakin ingin menghapus ' + namaFasyankes + ' ?',
                text: "Anda tidak akan bisa mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('admin/supporters') }}" + '/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.message,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                location.reload();
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat memproses data.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Terjadi Kesalahan',
                                '',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endsection
