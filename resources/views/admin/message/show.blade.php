@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Detail Pesan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <strong>Nama:</strong> {{ $message->nama }}
                            </div>
                            <div>
                                <strong>No. WA:</strong> {{ $message->no_wa }}
                            </div>
                            <div>
                                <!-- Jika pingin ditambah ntar -->
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.message.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('admin.message.edit', $message->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST" class="delete-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Yakin untuk hapus pesan ini?',
                text: "Aksi ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
