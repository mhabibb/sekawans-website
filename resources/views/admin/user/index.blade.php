@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data User</h1><br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAdmin">
                <i class="fa fa-plus"></i> Tambah Patient Supporter
            </button>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Tabel untuk Admin -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin Divisi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="adminUserTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-4">Nama</th>
                                        <th class="col-4">Email</th>
                                        <th class="col-4">Nomor Whatsapp</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adminUsers as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->number }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a role="button" id="bt{{ $user->id }}" class="badge badge-success" onclick="resetUser({{ $user->id }})">
                                                        <i class="fa-solid fa-rotate-left"></i> Reset</a>
                                                    <a role="button" id="bt{{ $user->id }}" class="badge badge-danger" onclick="deleteUser({{ $user->id }})">
                                                        <i class="fa-solid fa-trash-can"></i> Hapus</a>
                                                </div>
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

            <!-- Tabel untuk AdminPS -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Patient Supporter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="adminPSTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-4">Nama</th>
                                        <th class="col-4">Email</th>
                                        <th class="col-4">Nomor Whatsapp</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adminPSUsers as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->number }}</td>
                                            <td>
                                                <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                                                <div class="d-flex">
                                                    <a role="button" id="bt{{ $user->id }}" class="badge badge-success" onclick="resetUser({{ $user->id }})">
                                                        <i class="fa-solid fa-rotate-left"></i> Reset</a>
                                                    <a role="button" id="bt{{ $user->id }}" class="badge badge-danger" onclick="deleteUser({{ $user->id }})">
                                                        <i class="fa-solid fa-trash-can"></i> Hapus</a>
                                                </div>
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
        $(function() {
            table()
        })

        function table() {
            $('#userTable').DataTable({
                "responsive": true,
                "autoWidth": false,
                "searching": false,
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 2,
                }, ],
                paging: false,
                order: [
                    [0, 'asc']
                ],
            })
        }

        @if ($errors->any())
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
            ajax = {
                url: url.replace('id', id),
                id: id,
                text: 'Berhasil Reset Akun',
                type: 'POST'
            }
            name = $('#bt' + id).parents('tr').find('td').html();
            swal = {
                text: "Autentikasi akun " + name + " akan direset",
                title: 'Yakin Reset Akun?'
            }
            swalFn()
        }

        function deleteUser(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ route('admin.users.destroy', 'id') }}";
            ajax = {
                url: url.replace('id', id),
                id: id,
                text: 'Akun Berhasil Dihapus',
                type: 'DELETE'
            }
            name = $('#bt' + id).parents('tr').find('td').html();
            swal = {
                text: "Autentikasi akun " + name + " akan dihapus",
                title: 'Yakin Hapus Akun?'
            }
            swalFn()
        }

        function swalFn() {
            Swal.fire({
                title: swal.title,
                text: swal.text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    ajaxFn()
                }
            })
        }

        function ajaxFn() {
            $.ajax({
                    type: ajax.type,
                    url: ajax.url,
                    data: ajax.id,
                })
                .done(function(status) {
                    Swal.fire(
                        ajax.text,
                        '',
                        'success'
                    )
                    if (ajax.type == 'DELETE') {
                        $('#userTable').DataTable().destroy();
                        $('#bt' + ajax.id).parents('tr').remove()
                        table();
                    }
                })
                .fail(function() {
                    Swal.fire(
                        'Terjadi Kesalahan',
                        '',
                        'error'
                    )
                });
        }
    </script>
@endsection
