@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Fasyankes Satelit</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.fasyankes.store') }}" method="POST" id="createForm">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Fasyankes Satelit</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Fasyankes" required>
                                    <span class="text-danger" id="errorName"></span>
                                </div>
                                <div class="form-group">
                                    <label for="district">Kecamatan</label>
                                    <select name="district" id="district" class="form-control" required>
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach (\App\Models\District::orderBy('name', 'asc')->get() as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="errorDistrict"></span>
                                </div>
                                <div class="form-group">
                                    <label for="url_map">URL Peta Fasyankes</label>
                                    <input type="text" name="url_map" id="url_map" class="form-control" placeholder="URL Peta">
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
            $('#createForm').submit(function (e) {
                e.preventDefault();

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
                                // Redirect balek ke menu
                                window.location.href = "{{ route('admin.fasyankes.index') }}";
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
                    }
                });
            });
        });
    </script>
@endsection
