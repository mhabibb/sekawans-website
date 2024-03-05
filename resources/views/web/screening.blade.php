@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Pertanyaan 1 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda merasa tidak enak badan?</h3>
            <p class="card-text">Jawab dengan Ya atau Tidak.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="yes1" value="yes">
                    <label class="form-check-label" for="yes1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="no1" value="no">
                    <label class="form-check-label" for="no1">Tidak</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 2 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apa agama Anda?</h3>
            <p class="card-text">Pilih salah satu dari opsi berikut.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question2" id="islam" value="islam">
                    <label class="form-check-label" for="islam">Islam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question2" id="kristen" value="kristen">
                    <label class="form-check-label" for="kristen">Kristen</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question2" id="budha" value="budha">
                    <label class="form-check-label" for="budha">Budha</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question2" id="konghucu" value="konghucu">
                    <label class="form-check-label" for="konghucu">Anies</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 3 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda sering batuk lebih dari 2 minggu?</h3>
            <p class="card-text">Jawab dengan Ya atau Tidak.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question3" id="yes3" value="yes">
                    <label class="form-check-label" for="yes3">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question3" id="no3" value="no">
                    <label class="form-check-label" for="no3">Tidak</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 4 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda mengalami penurunan berat badan yang signifikan?</h3>
            <p class="card-text">Jawab dengan Ya atau Tidak.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="yes4" value="yes">
                    <label class="form-check-label" for="yes4">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="no4" value="no">
                    <label class="form-check-label" for="no4">Tidak</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 5 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda mengalami demam?</h3>
            <p class="card-text">Jawab dengan Ya atau Tidak.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="yes5" value="yes">
                    <label class="form-check-label" for="yes5">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="no5" value="no">
                    <label class="form-check-label" for="no5">Tidak</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 6 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda memiliki riwayat kontak dengan penderita TBC?</h3>
            <p class="card-text">Pilih salah satu dari opsi berikut.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <select class="form-select" aria-label="Kontak dengan penderita TBC" name="question6">
                    <option selected disabled>Pilih jawaban</option>
                    <option value="yes">Ya</option>
                    <option value="no">Tidak</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 7 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda memiliki riwayat perjalanan ke daerah endemis TBC?</h3>
            <p class="card-text">Pilih salah satu dari opsi berikut.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <select class="form-select" aria-label="Perjalanan ke daerah endemis TBC" name="question7">
                    <option selected disabled>Pilih jawaban</option>
                    <option value="yes">Ya</option>
                    <option value="no">Tidak</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 8 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda memiliki riwayat pengobatan TBC sebelumnya?</h3>
            <p class="card-text">Pilih salah satu dari opsi berikut.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <select class="form-select" aria-label="Pengobatan TBC sebelumnya" name="question8">
                    <option selected disabled>Pilih jawaban</option>
                    <option value="yes">Ya</option>
                    <option value="no">Tidak</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 9 -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda memiliki gejala lain yang ingin Anda ceritakan?</h3>
            <p class="card-text">Silakan ketik gejala Anda di sini.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <textarea class="form-control me-md-2 mb-2 mb-md-0" rows="3" name="question9"></textarea>
            </div>
        </div>
    </div>

    <!-- Pertanyaan 10 -->
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Apakah Anda memiliki pertanyaan tambahan?</h3>
            <p class="card-text">Silakan tulis pertanyaan Anda di sini.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <textarea class="form-control me-md-2 mb-2 mb-md-0" rows="3" name="question10"></textarea>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-danger me-md-2 mb-2 mb-md-0">Kirim</button>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        line-height: 1.5;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
