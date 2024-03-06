@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Persetujuan Skrining -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Persetujuan Skrining</h3>
            <ol>
                <li>Skrining ini digunakan untuk mendeteksi dini penyakit TB.</li>
                <li>Adapun hasil rencana tindak lanjut skrining berupa Rekomendasi tempat Fasilitas Layanan kesehatan terdekat yang dapat melakukan skrining TB dan dibawah nanungan Dinas Kesehatan.</li>
                <li>Data dalam formulir ini sangat dijaga privasinya dari pihak yang tidak memiliki wewenang.</li>
                <li>Saya mengerti tujuan mengisi skrining ini, dan bersedia untuk melakukan investigasi kontak.</li>
                <li>Saya bersedia mengisi semua data formulir skrining dengan sebenar-benarnya sesuai kondisi yang sedang saya alami.</li>
            </ol>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agreement">
                <label class="form-check-label" for="agreement">Ya, saya menyetujui</label>
            </div>
        </div>
    </div>

    <!-- Identitas Diri -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Identitas Diri</h3>
            <form>
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="fullName">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Kontak:</label>
                    <input type="tel" class="form-control" id="contact">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin:</label>
                    <select class="form-select" id="gender">
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Umur:</label>
                    <input type="number" class="form-control" id="age">
                </div>
                <div class="mb-3">
                    <label for="district" class="form-label">Domisili Kecamatan:</label>
                    <select class="form-select" id="district">
                        <option value="Kaliwates">Kaliwates</option>
                        <option value="Patrang">Patrang</option>
                        <option value="Sumbersari">Sumbersari</option>
                        <option value="Arjasa">Arjasa</option>
                        <option value="Pakusari">Pakusari</option>
                        <option value="Sukorambi">Sukorambi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="screeningDate" class="form-label">Tanggal Skrining:</label>
                    <input type="date" class="form-control" id="screeningDate">
                </div>
            </form>
        </div>
    </div>

    <!-- Pertanyaan Skrining -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Pertanyaan Skrining</h3>
            <!-- Pertanyaan-pertanyaan skrining disini -->
        </div>
    </div>

    <!-- Kontak -->
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Kontak</h3>
            <!-- Formulir kontak terdekat disini -->
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
        <button class="btn btn-danger me-md-2 mb-2 mb-md-0">Kirim</button>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-body {
        font-size: 14px;
        line-height: 1.5;
    }

    .form-check-label {
        margin-left: 10px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
