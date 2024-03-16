@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Hasil Screening</h3>
            <p class="d-flex justify-content-center">{{ $screening['full_name'] }}</p>
            @if ($screening['is_positive'] == true)
            <div class="d-flex justify-content-center">
                <p class="fw-bold">Anda Positive TBC</p>
            </div>
            <p style="font-size: 16px;">Berikut adalah beberapa fasilitas kesehatan yang tersedia di kecamatan Anda:</p>
            <ol style="font-size: 16px;">
                @foreach ($faskes as $item)
                <li>{{ $item->name }}</li>
                @endforeach
            </ol>
            <p style="font-size: 16px;">Formulir TBC:</p>
            <br>
            <hr>
            <div class="rangkasurat">
                <table style="width: 100%;">
                  <div class="kop-surat">
                    <img src="/img/logo.png" width="10%">
                    <h3>SEKAWAN'S TB JEMBER</h3>
                    <h5>SK.MENTERI HUKUM DAN HAK ASASI MANUSIA RI</h5>
                    <h5>NOMOR: AHU-0016828.AH.01.07.TAHUN 2017</h5>
                    <h6>Alamat: Jl.Udang Windu No.17, Mangli-Jember</h6>
                    <h6>No.HP : 085732480822 Email : sekawansjember@gmail.com</h6>
                  </div>            
                  <hr>    
                     <td class="kiri">Jember, ….. (Tanggal Bulan Tahun Skrining) <br><br></td>



                    <tr>
                        <td colspan="2">Perihal : Rekomendasi Pemeriksaan Lanjutan Suspek TBC</td>
                    </tr>
                    <tr>
                      <td colspan="2">Kepada : Yth. Penanggung Jawab Tuberkulosis di ….. (Fasyankes yang dituju dipilih saat skrining)<br><br></td>
                  </tr>
                  <tr>
                      <td colspan="2">Mohon pemeriksaan dan penanganan lebih lanjut pada suspek :<br><br></td>
                  </tr>                  
                    <tr>
                      <td colspan="2">
                          Nama : <br>
                          Umur : <br>
                          Jenis Kelamin : <br><br>
                          Diagnosis : 
                          Suspek TBC dengan hasil skrining kesehatan yakni : <br>
                      </td>
                  </tr>                  
                    <tr>
                        <td colspan="2">
                            <table class="pertanyaan" style="width: 100%;">
                                <tr>
                                    <th>Pertanyaan Skrining</th>
                                    <th>Jawaban</th>
                                </tr>
                                <tr>
                                    <td>Apakah ada kontak satu rumah dengan pasien TBC ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda mengalami batuk selama 2 minggu atau lebih ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda pernah mengalami sesak nafas dalam 2 bulan terakhir ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda pernah berkeringat saat malam hari tanpa berkegiatan ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda pernah mengalami demam meriang selama lebih dari 1 bulan ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda ibu hamil ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda adalah lansia lebih dari 60 tahun ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda menderita diabetes melitus ?</td>
                                    <td>Tidak</td>
                                </tr>
                                <tr>
                                    <td>Apakah anda merokok ?</td>
                                    <td>Tidak</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- <iframe src="{{ asset('document/screening.pdf') }}" width="100%" height="650px"></iframe> -->
            @else
            <div class="d-flex justify-content-center">
                <p class="fw-bold">Anda Tidak Positive TBC</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('custom_css')
<style>
    .kop-surat {
        text-align: center;
        margin-bottom: 20px; 
    }

    .kop-surat img {
        display: block;
        margin: 0 auto 10px; 
    }

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

    .tanggal_screening {
        text-align: right;
    }

    .kiri {
        text-align: right;
    }

    .kanan {
        text-align: right;
    }

    .pertanyaan {
        width: 100%;
        border-collapse: collapse;
    }

    .pertanyaan th, .pertanyaan td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .pertanyaan th {
        background-color: #f2f2f2;
    }

    @media only screen and (max-width: 768px) {
        .kop-surat img {
            width: 50%;
        }
    }

    @media only screen and (max-width: 576px) {
        .kop-surat img {
            width: 70%;
        }
    }
</style>
