@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Fasyankes Satelit</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="editForm" action="{{ route('admin.facilities.update', $satellite->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama Fasyankes Satelit</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $satellite->name }}" placeholder="Nama Fasyankes" required>
                                    <span class="text-danger" id="errorName"></span>
                                </div>
                                <div class="form-group">
                                    <label for="district_id">Kecamatan</label>
                                    <select name="district_id" id="district_id" class="form-control" required>
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" {{ $district->id == $satellite->district_id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="errorDistrict"></span>
                                </div>
                                <div class="form-group">
                                    <label for="url_map">URL Peta Fasyankes</label>
                                    <input type="text" name="url_map" id="url_map" class="form-control" value="{{ $satellite->url_map }}" placeholder="URL Peta">
                                    <span class="text-danger" id="errorUrlMap"></span>
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
                                // Redirect balek ke index bro
                                location.href = "{{ route('admin.fasyankes.index') }}";
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
