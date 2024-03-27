@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Formulir Pesan -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form method="POST" action="{{ route('pesan.store') }}" enctype="multipart/form-data">
    @csrf
    <h2 class="fw-bold mb-4 text-center text-primary">Hubungi Kami</h2>
        <div class="card mb-4">
            <div class="card-body">
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" required>
                </div>
                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="nomor" name="nomor" required>
                </div>
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan/Keterangan</label>
                    <textarea class="form-control" id="keperluan" name="keperluan" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload File (opsional doc/pdf)</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit" class="btn btn-primary me-md-2 mb-2 mb-md-0">Kirim Pesan</button>
        </div>
    </form>
</div>
@endsection

<style>
    .card {
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .form-label {
        font-size: 16px;
    }

    .form-check-label {
        font-size: 16px;
        margin-left: 10px;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
