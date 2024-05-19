@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Fasyankes Satelit</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">Tambah Fasyankes Satelit</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;">Nama Fasyankes Satelit</th>
                                            <th style="width: 40%;">Kecamatan</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($satellites as $satellite)
                                            <tr>
                                                <td><a href="{{ route('admin.facilities.show', $satellite->id) }}">{{ $satellite->name }}</a></td>
                                                <td>{{ optional($satellite->district)->name }}</td> 
                                                <td>
                                                    <form class="form" action="{{ route('admin.facilities.destroy', $satellite->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="d-flex justify-content-start">
                                                            <a href="{{ route('admin.facilities.edit', $satellite->id) }}" class="badge badge-warning mr-2 no-border">
                                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                                            </a>
                                                            <form class="form" action="{{ route('admin.facilities.destroy', $satellite->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="badge badge-danger delete-button no-border" data-id="{{ $satellite->id }}" data-nama="{{ $satellite->name }}">
                                                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>                                                                                                                
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

<style>
    .no-border {
        border: none;
    }
</style>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
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
                            url: "{{ url('admin/facilities') }}" + '/' + id,
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
        });
    </script>
@endsection
