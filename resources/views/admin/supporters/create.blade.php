@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Patient Supporter</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.supporters.store') }}" method="POST" id="createForm">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Patient Supporter</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Patient Supporter" required>
                                    <span class="text-danger" id="errorName"></span>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                            </form>
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
        $(document).ready(function () {
            $('#createForm').submit(function (e) {
                e.preventDefault();

                $('#errorName').text('');

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location.href = "{{ route('admin.supporters.index') }}";
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: response.message,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status == 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('#error' + key.charAt(0).toUpperCase() + key.slice(1)).text(value);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
