@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data User</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createAdmin">Buat Akun
                                Baru</a>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 360px;">
                            <table class="table table-head-fixed text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-5">Nama</th>
                                        <th class="col-5">Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="#" id="bt{{ $user->id }}" class="badge badge-success"
                                                    border-0 onclick="resetUser({{ $user->id }})">
                                                    <i class="fa-solid fa-rotate-left"></i>Reset</a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger border-0"
                                                        onclick="return confirm('Yakin untuk menghapus akun ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="create-modal">
        @include('admin.user.create')
    </section>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if($errors->any())
            Swal.fire(
                'Gagal Menambah Akun',
                '',
                'error'
            )
            $('#createAdmin').modal('show');
        @endif

        function resetUser(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ route('admin.users.reset', 'id') }}";
            url = url.replace('id', id)
            name = $('#bt' + id).parent().parent().find('td').html();

            Swal.fire({
                title: 'Yakin Reset Akun?',
                text: "Autentikasi akun " + name + " akan direset",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Setuju',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            type: "POST",
                            url: url,
                            data: id,
                        })
                        .done(function(status) {
                            Swal.fire(
                                'Berhasil Reset Akun',
                                '',
                                'success'
                            )
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
    </script>
@endsection
