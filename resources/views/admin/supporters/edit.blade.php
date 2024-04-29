@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Patient Supporter</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="editForm" action="{{ route('admin.supporters.update', $satellite->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama Patient Supporter</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $satellite->name }}" placeholder="Nama Fasyankes" required>
                                    <span class="text-danger" id="errorName"></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
        $(document).ready(function () {
            $('#editForm').submit(function (e) {
                e.preventDefault(); 

                var formData = $(this).serialize(); 
                var url = $(this).attr('action'); 
                var method = $(this).attr('method'); 

                // buat animasi doang saya frontend 
                $(this).find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...').prop('disabled', true);

                $.ajax({
                    type: method, 
                    url: url, 
                    data: formData, 
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function () {
                                // Redirect kembali ke index bro
                                location.href = "{{ route('admin.supporters.index') }}";
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
                                $('#error' + key.charAt(0).toUpperCase() + key.slice(1)).html(value);
                            });
                        }
                    },
                    complete: function() {
                        $('#editForm').find('button[type="submit"]').html('Simpan').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
