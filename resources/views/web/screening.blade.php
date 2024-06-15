@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Persetujuan Screening -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form method="POST" action="{{ route('screening.store') }}">
    @csrf
    <h2 class="fw-bold mb-4 text-center text-primary">Screening TBC</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Persetujuan Skrining</h3>
                
                <ol style="font-size: 16px;">
                    <li>Screening ini digunakan untuk mendeteksi dini penyakit TB.</li>
                    <li>Adapun hasil rencana tindak lanjut Screening berupa Rekomendasi tempat Fasilitas Layanan kesehatan terdekat yang dapat melakukan Screening TB dan dibawah naungan Dinas Kesehatan.</li>
                    <li>Data dalam formulir ini sangat dijaga privasinya dari pihak yang tidak memiliki wewenang.</li>
                    <li>Saya mengerti tujuan mengisi Skrining ini, dan bersedia untuk melakukan investigasi kontak.</li>
                    <li>Saya bersedia mengisi semua data formulir Screening dengan sebenar-benarnya sesuai kondisi yang sedang saya alami.</li>
                </ol>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement" required>
                    <label class="form-check-label" for="agreement" style="font-size: 16px;">Ya, saya menyetujui</label>
                </div>
            </div>
        </div>

        <!-- Identitas Diri -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Identitas Diri</h3>
                    <div class="mb-3">
                        <label for="full Name" class="form-label" style="font-size: 16px;">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label" style="font-size: 16px;">NIK KTP (16 Angka)</label>
                        <input type="text" class="form-control" id="nik" name="nik" maxlength="16" style="font-size: 16px;" required>
                    </div>                    
                    <div class="mb-3">
                        <label for="contact" class="form-label" style="font-size: 16px;">Nomor Telepon</label>
                        <input type="text" class="form-control" id="contact" name="contact" style="font-size: 16px;" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label" style="font-size: 16px;">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender" required style="font-size: 16px;">
                            <option value="" selected disabled style="font-size: 16px;">Pilih Jenis Kelamin</option>
                            <option value="male" style="font-size: 16px;">Laki-laki</option>
                            <option value="female" style="font-size: 16px;">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label" style="font-size: 16px;">Usia (Tahun)</label>
                        <input type="number" class="form-control" id="age" name="age" style="font-size: 16px;">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label" style="font-size: 16px;">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="address" name="address" style="font-size: 16px;" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="domicile_address" class="form-label" style="font-size: 16px;">Alamat Domisili KTP</label>
                        <input type="text" class="form-control" id="domicile_address" name="domicile_address" style="font-size: 16px;" maxlength="100" required>
                    </div>                    
                    <div class="mb-3">
                        <label for="district" class="form-label" style="font-size: 16px;">Domisili Kecamatan</label>
                        <select class="form-select" id="district" name="district" required style="font-size: 16px;">
                            <option value="" selected disabled style="font-size: 16px;">Pilih Kecamatan di Jember</option>
                            @foreach ($district->where('regency_id', 3509)->sortBy('name') as $item)
                                <option value="{{ $item->name }}" style="font-size: 16px;">{{ $item->name }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="mb-3">
                        <label for="screeningDate" class="form-label" style="font-size: 16px;">Tanggal Screening</label>
                        <input type="date" class="form-control" id="screeningDate" name="screening_date" style="font-size: 16px;">
                    </div>
                    <script>
                        var today = new Date();
                
                        var year = today.getFullYear();
                        var month = ("0" + (today.getMonth() + 1)).slice(-2);
                        var day = ("0" + today.getDate()).slice(-2);
                    
                        var formattedDate = year + "-" + month + "-" + day;
                    
                        document.getElementById("screeningDate").value = formattedDate;
                    </script>            
            </div>
        </div>

        <!-- Screening Awal -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title" style="font-size: 16px;">Pertanyaan Skrining</h3>
                <h3 class="card-title">Skrining Awal</h3>

                <div class="mb-3">
                    <label for="cough" style="font-size: 16px;">Apakah Anda mengalami batuk?</label><br>
                    <input type="radio" id="coughYes" name="cough" value="1" required>
                    <label for="coughYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="coughNo" name="cough" value="0">
                    <label for="coughNo" style="font-size: 16px;">Tidak</label>
                </div>  

                <div class="mb-3">
                    <label for="tb_diagnosed" class="form-label" style="font-size: 16px;">Apakah anda pernah terdiagnosa TBC?</label>
                    <select class="form-select" id="tb_diagnosed" name="tb_diagnosed" required style="font-size: 16px;">
                        <option value="" selected disabled style="font-size: 16px;">Pilih jawaban</option>
                        <option value="a" style="font-size: 16px;">Pernah terdiagnosa, dan sudah melakukan pengobatan sampai sembuh</option>
                        <option value="b" style="font-size: 16px;">Pernah terdiagnosa, dan belum melakukan pengobatan sampai sembuh</option>
                        <option value="c" style="font-size: 16px;">Tidak pernah</option>
                    </select>
                </div>                

                <div class="mb-3">
                    <label for="contactWithTB" style="font-size: 16px;">Apakah ada kontak satu rumah dengan pasien Tuberkulosis (TBC)?</label><br>
                    <input type="radio" id="contactYes" name="home_contact" value="1" required>
                    <label for="contactYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="contactNo" name="home_contact" value="0">
                    <label for="contactNo" style="font-size: 16px;">Tidak</label>
                </div>  

                <div class="mb-3">
                    <label for="closeContact" style="font-size: 16px;">Apakah anda pernah melakukan kontak erat dengan penderita Tuberkulosis (TBC)?</label><br>
                    <label for="closeContact" style="font-size: 16px;">(teman kerja/teman sekolah/tetangga/saudara, atau yang lainnya)</label><br>
                    <input type="radio" id="closeContactYes" name="close_contact" value="1" required>
                    <label for="closeContactYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="closeContactNo" name="close_contact" value="0">
                    <label for="closeContactNo" style="font-size: 16px;">Tidak</label>
                </div>

            </div>
        </div>

         <!-- Gejala Lain -->
         <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Gejala Lain</h3>

                <div class="mb-3">
                    <label for="weightLoss" style="font-size: 16px;">Apakah anda mengalami penurunan berat badan drastis disertasi nafsu makan yang berkurang?</label><br>
                    <input type="radio" id="weightLossYes" name="weight_loss" value="1" required>
                    <label for="weightLossYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="weightLossNo" name="weight_loss" value="0">
                    <label for="weightLossNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="fever" style="font-size: 16px;">Apakah Anda mengalami demam?</label><br>
                    <input type="radio" id="feverYes" name="fever" value="1" required>
                    <label for="feverYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="feverNo" name="fever" value="0">
                    <label for="feverNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="breath" style="font-size: 16px;">Apakah Anda pernah mengalami sesak nafas tanpa nyeri dada?</label><br>
                    <input type="radio" id="breathYes" name="breath" value="1" required>
                    <label for="breathYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="breathNo" name="breath" value="0">
                    <label for="breathNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="smoke" style="font-size: 16px;">Apakah Anda pernah mengalami pembesaran getah bening di leher atau di ketiak?</label><br>
                    <input type="radio" id="smokeYes" name="smoking" value="1" required>
                    <label for="smokeYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="smokeNo" name="smoking" value="0">
                    <label for="smokeNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="sluggish" style="font-size: 16px;">Apakah Anda pernah mengalami badan terasa lemas/lesu?</label><br>
                    <input type="radio" id="sluggishYes" name="sluggish" value="1" required>
                    <label for="sluggishYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="sluggishNo" name="sluggish" value="0">
                    <label for="sluggishNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="sweat" style="font-size: 16px;">Apakah Anda berkeringat di malam hari tanpa kegiatan?</label><br>
                    <input type="radio" id="sweatYes" name="sweat" value="1" required>
                    <label for="sweatYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="sweatNo" name="sweat" value="0">
                    <label for="sweatNo" style="font-size: 16px;">Tidak</label>
                </div>

            </div>
        </div>

         <!-- Faktor Risiko -->
         <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Faktor Risiko</h3>

                <div class="mb-3">
                    <label for="everTreatment" style="font-size: 16px;">Apakah anda pernah melakukan pengobatan Tuberkulosis (TBC)?</label><br>
                    <input type="radio" id="everTreatmentYes" name="ever_treatment" value="1" required>
                    <label for="everTreatmentYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="everTreatmentNo" name="ever_treatment" value="0">
                    <label for="everTreatmentNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="elderly" style="font-size: 16px;">Apakah Anda adalah lansia lebih dari 60 tahun?</label><br>
                    <input type="radio" id="elderlyYes" name="elderly" value="1" required>
                    <label for="elderlyYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="elderlyNo" name="elderly" value="0">
                    <label for="elderlyNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="pregnant" style="font-size: 16px;">Apakah Anda adalah ibu hamil?</label><br>
                    <input type="radio" id="pregnantYes" name="pregnant" value="1" required>
                    <label for="pregnantYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="pregnantNo" name="pregnant" value="0">
                    <label for="pregnantNo" style="font-size: 16px;">Tidak</label>
                </div>

                <div class="mb-3">
                    <label for="diabetes" style="font-size: 16px;">Apakah Anda memiliki riwayat penyakit Diabetes Melitus?</label><br>
                    <input type="radio" id="diabetesYes" name="diabetes" value="1" required>
                    <label for="diabetesYes" style="font-size: 16px;">Ya</label>
                    <input type="radio" id="diabetesNo" name="diabetes" value="0">
                    <label for="diabetesNo" style="font-size: 16px;">Tidak</label>
                </div>

            </div>
        </div>

        <!-- Kontak -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Kontak</h3>
                <div class="mb-3" style="font-size: 16px;">
                    Berikan informasi Screening ini kepada kontak erat terdekat anda
                </div>            
                <div class="mb-3">
                    <label for="contact1Name" style="font-size: 16px;">Kontak 1</label><br>
                    <div class="d-flex">
                        <input class="form-control me-2" type="text"  id="contact1Name" name="contact1_name" placeholder="Nama" style="font-size: 16px;">
                        <input class="form-control" type="tel" id="contact1" name="contact1_number" placeholder="Nomor Kontak" style="font-size: 16px;">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="contact2Name" style="font-size: 16px;">Kontak 2</label><br>
                    <div class="d-flex">
                        <input class="form-control me-2" type="text" id="contact2Name" name="contact2_name" placeholder="Nama" style="font-size: 16px;">
                        <input class="form-control" type="tel" id="contact2" name="contact2_number" placeholder="Nomor Kontak" style="font-size: 16px;">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="contact3Name" style="font-size: 16px;">Kontak 3</label><br>
                    <div class="d-flex">
                        <input class="form-control me-2" type="text" id="contact3Name" name="contact3_name" placeholder="Nama" style="font-size: 16px;">
                        <input class="form-control" type="tel" id="contact3" name="contact3_number" placeholder="Nomor Kontak" style="font-size: 16px;">
                    </div>
                </div>
                
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit"  class="btn btn-danger me-md-2 mb-2 mb-md-0">Kirim Data Screening</button>
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
</style>
