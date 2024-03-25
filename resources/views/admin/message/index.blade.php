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
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="{{ route('admin.messages.create') }}" class="btn btn-primary">Tambah Nomor</a>
                                {{-- <a href="{{ route('admin.messages.compose') }}" class="btn btn-success">Kirim Pesan</a>  --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-head-fixed table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%">Nama</th>
                                            <th style="width: 40%">No. WA</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($messages as $message)
                                            <tr>
                                                <td>{{ $message->nama }}</td>
                                                <td>{{ $message->no_wa }}</td>
                                                <td>
                                                    <a href="{{ route('admin.messages.edit', $message->id) }}" class="badge badge-warning">Edit</a>
                                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="delete-form" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge badge-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Data Kosong</td>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        async function update(elm, id) {
            elm = $(elm).closest('tr').find('td');
            const { value: data } = await Swal.fire({
                title: `Update ${elm.eq(0).text().trim()}`, 
                html: `<input id="swal-input1" class="swal2-input" value="${elm.eq(0).text().trim()}" placeholder="Nama Pesan" autofocus>
                        <input id="swal-input2" class="swal2-input" value="${elm.eq(1).text().trim()}" placeholder="Nomor Whatsapp">`,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Batalkan',
                allowOutsideClick: false,
                preConfirm: () => {
                    const name = Swal.getPopup().querySelector('#swal-input1').value;
                    const no_wa = Swal.getPopup().querySelector('#swal-input2').value;
                    if (!name || !no_wa) {
                        Swal.showValidationMessage(`Nama dan Nomor Whatsapp harus diisi`);
                    }
                    return { name: name, no_wa: no_wa };
                }
            });

            if (data) {
                $.ajax({
                    type: 'PUT',
                    url: "{{ url('admin/message') }}" + '/' + id,
                    data: data,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil Diperbarui!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        elm.eq(0).text(data.name);
                        elm.eq(1).text(data.no_wa);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Terjadi Kesalahan!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        }

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
