@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('screening.store') }}">
            @csrf
            <h2 class="fw-bold mb-4 text-center text-primary">Screening TBC</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">A. Persetujuan Skrining</h3>

                    <ol style="font-size: 16px;">
                        <li>Screening ini digunakan untuk mendeteksi dini penyakit TB.</li>
                        <li>Adapun hasil rencana tindak lanjut Screening berupa Rekomendasi tempat Fasilitas Layanan
                            kesehatan terdekat yang dapat melakukan Screening TB dan dibawah naungan Dinas Kesehatan.</li>
                        <li>Data dalam formulir ini sangat dijaga privasinya dari pihak yang tidak memiliki wewenang.</li>
                        <li>Saya mengerti tujuan mengisi Skrining ini, dan bersedia untuk melakukan investigasi kontak.</li>
                        <li>Saya bersedia mengisi semua data formulir Screening dengan sebenar-benarnya sesuai kondisi yang sedang saya alami.</li>
                    </ol>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement"
                            {{ old('agreement') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="agreement" style="font-size: 16px;">Ya, saya menyetujui</label>
                    </div>
                </div>
            </div>

            <!-- Identitas Diri -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">B. Identitas Diri</h3>
                    <div class="mb-3">
                        <label for="full Name" class="form-label" style="font-size: 16px;">1. Nama Lengkap</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="fullName" name="full_name" style="font-size: 16px;" value="{{ old('full_name') }}">
                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label" style="font-size: 16px;">2. NIK KTP (16 Angka)</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" maxlength="16"
                            style="font-size: 16px;" required value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label" style="font-size: 16px;">3. Nomor Telepon</label>
                        <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" style="font-size: 16px;"
                            required value="{{ old('contact') }}">
                        <small class="text-muted">Masukkan 10-13 digit nomor telepon</small>
                        @error('contact')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label" style="font-size: 16px;">4. Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender" required style="font-size: 16px;">
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label" style="font-size: 16px;">5. Usia (Tahun)</label>
                        <input type="number" class="form-control" id="age" name="age" style="font-size: 16px;" value="{{ old('age') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label" style="font-size: 16px;">6. Alamat Lengkap</label>
                        <input type="text" class="form-control" id="address" name="address" style="font-size: 16px;"
                            maxlength="100" required value="{{ old('address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="domicile_address" class="form-label" style="font-size: 16px;">7. Alamat Domisili
                            KTP</label>
                        <input type="text" class="form-control" id="domicile_address" name="domicile_address"
                            style="font-size: 16px;" maxlength="100" required value="{{ old('domicile_address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="district" class="form-label" style="font-size: 16px;">8. Domisili Kecamatan</label>
                        <select class="form-select" id="district" name="district" required style="font-size: 16px;">
                            <option value="" disabled {{ old('district') ? '' : 'selected' }}>Pilih Kecamatan di Jember</option>
                            @foreach ($district->where('regency_id', 3509)->sortBy('name') as $item)
                                <option value="{{ $item->name }}" {{ old('district') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="screeningDate" class="form-label" style="font-size: 16px;">9. Tanggal Screening</label>
                        <input type="date" class="form-control" id="screeningDate" name="screening_date"
                            style="font-size: 16px;">
                    </div>
                </div>
            </div>

            <!-- Skoring Batuk -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">C. Skoring Batuk</h3>

                    <div class="mb-3">
                        <label for="cough_two_weeks" style="font-size: 16px;">1. Apakah anda mengalami batuk selama 2 minggu
                            atau lebih?</label><br>
                        <input type="radio" id="coughYes" name="cough_two_weeks" value="1" {{ old('cough_two_weeks') == '1' ? 'checked' : '' }} required>
                        <label for="coughYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="coughNo" name="cough_two_weeks" value="0" {{ old('cough_two_weeks') == '0' ? 'checked' : '' }}>
                        <label for="coughNo" style="font-size: 16px;">Tidak</label>
                    </div>
                </div>
            </div>

            <!-- Skoring Gejala Lain -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">D. Skoring Gejala Lain</h3>

                    <div class="mb-3">
                        <label for="shortness_breath" style="font-size: 16px;">1. Apakah anda pernah mengalami sesak nafas
                            dalam 2 bulan terakhir?</label><br>
                        <input type="radio" id="breathYes" name="shortness_breath" value="1" {{ old('shortness_breath') == '1' ? 'checked' : '' }} required>
                        <label for="breathYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="breathNo" name="shortness_breath" value="0" {{ old('shortness_breath') == '0' ? 'checked' : '' }}>
                        <label for="breathNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3">
                        <label for="night_sweats" style="font-size: 16px;">2. Apakah anda pernah berkeringat saat malam hari
                            tanpa berkegiatan?</label><br>
                        <input type="radio" id="sweatYes" name="night_sweats" value="1" {{ old('night_sweats') == '1' ? 'checked' : '' }} required>
                        <label for="sweatYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="sweatNo" name="night_sweats" value="0" {{ old('night_sweats') == '0' ? 'checked' : '' }}>
                        <label for="sweatNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3">
                        <label for="fever_one_month" style="font-size: 16px;">3. Apakah anda pernah mengalami demam meriang
                            selama lebih dari 1 bulan?</label><br>
                        <input type="radio" id="feverYes" name="fever_one_month" value="1" {{ old('fever_one_month') == '1' ? 'checked' : '' }} required>
                        <label for="feverYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="feverNo" name="fever_one_month" value="0" {{ old('fever_one_month') == '0' ? 'checked' : '' }}>
                        <label for="feverNo" style="font-size: 16px;">Tidak</label>
                    </div>
                </div>
            </div>

            <!-- Skoring Faktor Risiko -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">E. Skoring Faktor Risiko</h3>

                    <div class="mb-3" id="pregnantQuestion">
                        <label for="pregnant" style="font-size: 16px;">1. Apakah anda ibu hamil?</label><br>
                        <input type="radio" id="pregnantYes" name="pregnant" value="1" {{ old('pregnant') == '1' ? 'checked' : '' }} required>
                        <label for="pregnantYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="pregnantNo" name="pregnant" value="0" {{ old('pregnant') == '0' ? 'checked' : '' }}>
                        <label for="pregnantNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3" id="elderlyQuestion">
                        <label for="elderly" style="font-size: 16px;">2. Apakah anda adalah lansia lebih dari 60
                            tahun?</label><br>
                        <input type="radio" id="elderlyYes" name="elderly" value="1" {{ old('elderly') == '1' ? 'checked' : '' }} required>
                        <label for="elderlyYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="elderlyNo" name="elderly" value="0" {{ old('elderly') == '0' ? 'checked' : '' }}>
                        <label for="elderlyNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3">
                        <label for="diabetes" style="font-size: 16px;">3. Apakah anda menderita diabetes melitus?</label><br>
                        <input type="radio" id="diabetesYes" name="diabetes" value="1" {{ old('diabetes') == '1' ? 'checked' : '' }} required>
                        <label for="diabetesYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="diabetesNo" name="diabetes" value="0" {{ old('diabetes') == '0' ? 'checked' : '' }}>
                        <label for="diabetesNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3">
                        <label for="smoking" style="font-size: 16px;">4. Apakah anda merokok?</label><br>
                        <input type="radio" id="smokingYes" name="smoking" value="1" {{ old('smoking') == '1' ? 'checked' : '' }} required>
                        <label for="smokingYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="smokingNo" name="smoking" value="0" {{ old('smoking') == '0' ? 'checked' : '' }}>
                        <label for="smokingNo" style="font-size: 16px;">Tidak</label>
                    </div>

                    <div class="mb-3">
                        <label for="incomplete_tb_treatment" style="font-size: 16px;">5. Apakah anda pernah berobat TBC dan
                            tidak tuntas?</label><br>
                        <input type="radio" id="treatmentYes" name="incomplete_tb_treatment" value="1" {{ old('incomplete_tb_treatment') == '1' ? 'checked' : '' }} required>
                        <label for="treatmentYes" style="font-size: 16px;">Ya</label>
                        <input type="radio" id="treatmentNo" name="incomplete_tb_treatment" value="0" {{ old('incomplete_tb_treatment') == '0' ? 'checked' : '' }}>
                        <label for="treatmentNo" style="font-size: 16px;">Tidak</label>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">F. Kontak</h3>
                    <div class="mb-3" style="font-size: 16px;">
                        Berikan informasi Screening ini kepada kontak erat terdekat anda
                    </div>
                    <div class="alert alert-info mb-3" style="font-size: 16px;">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Mengapa ini penting?</strong> TB adalah penyakit menular yang dapat menyebar melalui udara. Orang yang sering berinteraksi dengan Anda memiliki risiko lebih tinggi tertular jika Anda positif TB. Dengan mengundang mereka untuk skrining, kita dapat mendeteksi TB lebih awal dan mencegah penyebaran.
                        <p class="mt-2 mb-0">Silakan masukkan kontak orang terdekat anda yang sering anda temui saat beraktivitas sehari-hari untuk mendapatkan ajakan skrining juga.</p>
                    </div>
                    <div class="mb-3">
                        <label for="contact1Name" style="font-size: 16px;">1. Kontak Pertama</label><br>
                        <div class="d-flex">
                            <input class="form-control me-2 @error('contact1_name') is-invalid @enderror" type="text" id="contact1Name" name="contact1_name"
                                placeholder="Nama" style="font-size: 16px;" value="{{ old('contact1_name') }}">
                            <input class="form-control @error('contact1_number') is-invalid @enderror" type="tel" id="contact1" name="contact1_number"
                                placeholder="Nomor Kontak" style="font-size: 16px;" value="{{ old('contact1_number') }}">
                        </div>
                        <small class="text-muted">Masukkan 10-13 digit nomor telepon</small>
                        @error('contact1_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @error('contact1_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact2Name" style="font-size: 16px;">2. Kontak Kedua</label><br>
                        <div class="d-flex">
                            <input class="form-control me-2 @error('contact2_name') is-invalid @enderror" type="text" id="contact2Name" name="contact2_name"
                                placeholder="Nama" style="font-size: 16px;" value="{{ old('contact2_name') }}">
                            <input class="form-control @error('contact2_number') is-invalid @enderror" type="tel" id="contact2" name="contact2_number"
                                placeholder="Nomor Kontak" style="font-size: 16px;" value="{{ old('contact2_number') }}">
                        </div>
                        <small class="text-muted">Masukkan 10-13 digit nomor telepon</small>
                        @error('contact2_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @error('contact2_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact3Name" style="font-size: 16px;">3. Kontak Ketiga</label><br>
                        <div class="d-flex">
                            <input class="form-control me-2 @error('contact3_name') is-invalid @enderror" type="text" id="contact3Name" name="contact3_name"
                                placeholder="Nama" style="font-size: 16px;" value="{{ old('contact3_name') }}">
                            <input class="form-control @error('contact3_number') is-invalid @enderror" type="tel" id="contact3" name="contact3_number"
                                placeholder="Nomor Kontak" style="font-size: 16px;" value="{{ old('contact3_number') }}">
                        </div>
                        <small class="text-muted">Masukkan 10-13 digit nomor telepon</small>
                        @error('contact3_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @error('contact3_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <button type="submit" class="btn btn-danger me-md-2 mb-2 mb-md-0">Kirim Data Screening</button>
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

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .alert {
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 15px;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .text-muted {
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ("0" + (today.getMonth() + 1)).slice(-2);
        var day = ("0" + today.getDate()).slice(-2);
        var formattedDate = year + "-" + month + "-" + day;

        if (!document.getElementById("screeningDate").value) {
            document.getElementById("screeningDate").value = formattedDate;
        }

        const genderSelect = document.getElementById('gender');
        const ageInput = document.getElementById('age');
        const pregnantQuestion = document.getElementById('pregnantQuestion');
        const pregnantYes = document.getElementById('pregnantYes');
        const pregnantNo = document.getElementById('pregnantNo');
        const elderlyQuestion = document.getElementById('elderlyQuestion');
        const elderlyYes = document.getElementById('elderlyYes');
        const elderlyNo = document.getElementById('elderlyNo');

        function updatePregnancyQuestion() {
            console.log("Gender changed to:", genderSelect.value);
            if (genderSelect.value === 'male') {
                pregnantQuestion.style.display = 'none';
                pregnantNo.checked = true;
            } else {
                pregnantQuestion.style.display = 'block';
            }
        }

        function updateElderlyQuestion() {
            const age = parseInt(ageInput.value);
            console.log("Age changed to:", age);

            if (!isNaN(age)) {
                if (age >= 60) {
                    elderlyQuestion.style.display = 'none';
                    elderlyYes.checked = true;
                } else {
                    elderlyQuestion.style.display = 'none';
                    elderlyNo.checked = true;
                }
            } else {
                elderlyQuestion.style.display = 'block';
            }
        }

        const phoneInputs = [
            document.getElementById('contact'),
            document.getElementById('contact1'),
            document.getElementById('contact2'),
            document.getElementById('contact3')
        ];

        phoneInputs.forEach(input => {
            if (input) {
                input.addEventListener('input', function(e) {
                    if (this.value.length > 13) {
                        this.value = this.value.slice(0, 13);
                    }
                });
            }
        });

        genderSelect.addEventListener('change', updatePregnancyQuestion);
        ageInput.addEventListener('input', updateElderlyQuestion);

        updatePregnancyQuestion();
        updateElderlyQuestion();
    });
</script>
