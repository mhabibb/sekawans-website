@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <h2 class="fw-bold mb-4 text-center text-primary">Hasil Screening</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <p class="d-flex justify-content-center">{{ $screening['full_name'] }}</p>
            @if ($screening['is_positive'] == true)
            <div class="d-flex justify-content-center">
                <p class="fw-bold fs-4">Anda diduga Positive TBC <br><br></p>
            </div>
            <div class="d-flex justify-content-center">
                <div>
                    <div class="text-center">
                        <blockquote style="margin: 0; padding: 0 20px; background-color: #f9f9f9;">
                            <p style="color: #333;">" Tenang saja, TB dapat diobati dengan melakukan pengobatan, </p>
                            <p style="color: #333;">Segera pastikan status Anda dengan melakukan tes ke dokter "</p>
                        </blockquote>
                    </div>                                                                                                   
                </div>
            </div>      

            {{-- Download Surat Rekomendasi Screening --}}
            <br><br>      
            @php
                $selectedFaskes = session('selectedFaskes');
            @endphp

            <input type="hidden" name="selectedFaskes" value="{{ $selectedFaskes }}">

            <a href="{{ route('download.surat.rekomendasi') }}" class="btn btn-secondary" style="display: block; width: fit-content; margin: 0 auto;">Download Surat Rekomendasi</a>
            <br><br>

            <p style="font-size: 16px;">Berikut adalah beberapa fasilitas kesehatan yang tersedia di kecamatan Anda:</p>

            <!-- Fasilitas Kesehatan -->
            <select id="faskes-select" class="form-control">
                <option value="">Pilih Fasilitas Kesehatan</option>
                @foreach ($faskes as $name => $url)
                    <option value="{{ $name }}" data-url-map="{{ $url }}">{{ $name }}</option>
                @endforeach
            </select>            

            {{-- <!-- untuk menampilkan peta -->
            <div id="map-container" style="margin-top: 20px; position: relative;">
                <!-- Placeholder untuk loading -->
                <div id="map-loading" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.7); z-index: 999; display: none;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        Loading...
                    </div>
                </div>
                <div id="map" style="width: 100%; height: 400px;"></div>
            </div> --}}
            
            <br><br>
            <p style="font-size: 16px;">Anda bisa menunjukkan hasil skrining awal ini ke fasilitas kesehatan terdekat diatas. Terima kasih!</p>
            <br>
            <p style="font-size: 16px;">Formulir TBC:</p>
            <hr>
            <div class="rangkasurat">
                <table style="width: 100%;">
                    <div class="kop-surat">
                        <div class="d-flex justify-content-between">
                            <div style="width: 30%; margin-left: 100px;">
                                <img src="/img/logo.png" width="80%" alt="Logo">
                            </div>
                            <div style="width: 100%;">
                                <h3><strong class="unique-font">SEKAWAN'S</strong> <strong class="unique-font" style="color: red;">TB</strong> <strong class="unique-font">JEMBER</strong></h3>
                                <h5><strong>SK.MENTERI HUKUM DAN HAK ASASI MANUSIA RI</strong></h5>
                                <h5><strong>NOMOR: AHU-0016828.AH.01.07.TAHUN 2017</strong></h5>
                                <h6>Alamat: Jl.Udang Windu No.17, Mangli-Jember</h6>
                                <h6>No.HP : 085732480822 Email : sekawansjember@gmail.com</h6>
                            </div>
                        </div>
                    </div>                                                                      
                  <hr>    
                  <td class="kiri">Jember, {{ \Carbon\Carbon::parse($screening['screening_date'])->isoFormat('LL') }} <br><br></td>
                    <tr>
                        <td colspan="2">Perihal : Rekomendasi Pemeriksaan Lanjutan Suspek TBC</td>
                    </tr>
                    <tr>
                        <td colspan="2">Kepada: Yth. Penanggung Jawab Tuberkulosis <span id="selected-faskes-info"></span><br><br></td>
                  </tr>
                  <tr>
                      <td colspan="2">Mohon pemeriksaan dan penanganan lebih lanjut pada suspek :<br><br></td>
                  </tr>                  
                    <tr>
                      <td colspan="2">
                          Nama : {{ $screening['full_name'] }}<br>
                          NIK : {{ $screening['nik'] }}<br>
                          Umur : {{ $screening['age'] }} Tahun<br>
                          Alamat : {{ $screening['address'] }}<br>
                          Jenis Kelamin : {{ $screening['gender'] === 'male' ? 'Laki-laki' : ($screening['gender'] === 'female' ? 'Perempuan' : 'Tidak Diketahui') }}
                          <br><br>
                          Diagnosis,  
                          Suspek TBC dengan hasil skrining kesehatan yakni : <br>
                      </td>
                  </tr>                  
                    <tr>
                        <td colspan="2">
                            <table class="pertanyaan" style="width: 100%;">
                                <tr>
                                    <th style="width: 80%;">Skrining Awal</th>
                                    <th style="width: 20%;">Jawaban</th>
                                </tr>

                                <tr>
                                    <td>Apakah Anda mengalami batuk?</td>
                                    <td>{{ $screening['cough'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda pernah terdiagnosa TBC?</td>
                                    <td>
                                        @if($screening['tb_diagnosed'] == 'a')
                                            Pernah terdiagnosa, dan sudah melakukan pengobatan sampai sembuh
                                        @elseif($screening['tb_diagnosed'] == 'b')
                                            Pernah terdiagnosa, dan belum melakukan pengobatan sampai sembuh
                                        @elseif($screening['tb_diagnosed'] == 'c')
                                            Tidak pernah
                                        @else
                                            
                                        @endif
                                    </td>
                                </tr>                                

                                <tr>
                                    <td>Apakah ada kontak satu rumah dengan pasien Tuberkulosis (TBC)?</td>
                                    <td>{{ $screening['home_contact'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah anda pernah melakukan kontak erat dengan penderita Tuberkulosis (TBC)?</td>
                                    <td>{{ $screening['close_contact'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <table class="pertanyaan" style="width: 100%;">
                                <tr>
                                    <th style="width: 80%;">Gejala Lain</th>
                                    <th style="width: 20%;">Jawaban</th>
                                </tr>

                                <tr>
                                    <td>Apakah anda mengalami penurunan berat badan drastis disertasi nafsu makan yang berkurang?</td>
                                    <td>{{ $screening['weight_loss'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda mengalami demam?</td>
                                    <td>{{ $screening['fever'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda pernah mengalami sesak nafas tanpa nyeri dada?</td>
                                    <td>{{ $screening['breath'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda pernah mengalami pembesaran getah bening di leher atau di ketiak?</td>
                                    <td>{{ $screening['smoking'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda pernah mengalami badan terasa lemas/lesu?</td>
                                    <td>{{ $screening['sluggish'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda berkeringat di malam hari tanpa kegiatan?</td>
                                    <td>{{ $screening['sweat'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <table class="pertanyaan" style="width: 100%;">
                                <tr>
                                    <th style="width: 80%;">Faktor Risiko</th>
                                    <th style="width: 20%;">Jawaban</th>
                                </tr>

                                <tr>
                                    <td>Apakah anda pernah melakukan pengobatan Tuberkulosis (TBC)?</td>
                                    <td>{{ $screening['ever_treatment'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda adalah lansia lebih dari 60 tahun?</td>
                                    <td>{{ $screening['elderly'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda adalah ibu hamil?</td>
                                    <td>{{ $screening['pregnant'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>

                                <tr>
                                    <td>Apakah Anda memiliki riwayat penyakit Diabetes Melitus?</td>
                                    <td>{{ $screening['diabetes'] ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>

                </table>
            </div>
            @else
            <div class="d-flex justify-content-center">
                <p class="fw-bold">Anda Tidak Positive TBC</p>
            </div>
            
            <div class="d-flex justify-content-center">
                <a href="{{ route('infotbc') }}"><br><br>Informasi Tentang TBC -></a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('custom_css')
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Niconne&display=swap');
    .unique-font {
        font-family: 'Srisakdi', cursive;
    }

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var faskesSelect = document.getElementById('faskes-select');

    faskesSelect.addEventListener('change', function() {
        var selectedFaskes = faskesSelect.value;

        document.getElementById('selected-faskes-info').textContent = selectedFaskes;

        var selectedFaskesUrl = @json($faskes) [selectedFaskes];

        if (selectedFaskesUrl) {
            var mapContainer = document.getElementById('map-container');
            mapContainer.innerHTML = '<iframe src="' + selectedFaskesUrl + '" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
        } else {
            console.error('URL peta untuk fasilitas kesehatan tidak ditemukan.');
        }
    });
});
</script>
