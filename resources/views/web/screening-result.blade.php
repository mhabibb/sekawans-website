@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Persetujuan Screening -->
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
            <p style="font-size: 16px;">Berikut adalah beberapa fasilitas kesehatan yang tersedia di kecamatan anda:</p>
            <ol style="font-size: 16px;">
                @foreach ($faskes as $item)
                <li>{{ $item->name }}</li>
                @endforeach
            </ol>
            <h4 style="font-size: 16px;">Formulir TBC:</h4>
            <br>
            <hr>
            <div>
              <div>
                <header>
                  <div class="row">
                    <div id="img" class="col-md-3">
                      <img id="logo" src="https://getasanbersinar.files.wordpress.com/2016/02/logo-kabupaten-semarang-jawa-tengah.png" width="140" height="160" />
                    </div>
                    <div id="text-header" class="col-md-9">
                      <h3 class="kablogo">PEMERINTAH KABUPATEN SEMARANG</h3>
                      <h1 class="keclogo"><strong>KECAMATAN BERGAS</strong></h1>
                      <h6 class="alamatlogo">Jl. Soekarno-Hatta, No. 68, Telepon/Faximile (0298) 523024</h6>
                      <h5 class="kodeposlogo"><strong>BERGAS 50552</strong></h5>
                    </div>
                  </div>
                </header>

                <div class="container">
                  <hr class="garis1"/>
                  <div id="alamat" class="row">
                    <div id="lampiran" class="col-md-6">
                      Nomor : 005 / <br />
                      Lampiran : - <br />
                      Perihal : Undangan
                    </div>
                    <div id="tgl-srt" class="col-md-6">
                      <p id="tls">Bergas, 30 April 2018</p>

                      <p class="alamat-tujuan">Kepada Yth. :<br />
                        Kepala Desa</p>

                      <p class="alamat-tujuan">se - Kecamatan Bergas
                      </p>
                    </div>
                  </div>
                  <div id="pembuka" class="row">&emsp; &emsp; &emsp; Menindak lanjuti surat dari Sekretariat Daerah Kabupaten Semarang Nomor : 005/001819/2018 perihal Peraturan Baru mengenai Badan Permusyawaratan Desa (BPD) berdasarkan Perda Nomor 4 Tahun 2018 dan Perbup Nomor 21 Tahun 2018 serta Tahapan Pengisian Anggota BPD, bersama ini kami mengharap atas kehadiran saudara besok pada :</div>
                  <div id="tempat-tgl">
                    <table>
                      <tr>
                        <td>Hari</td>
                        <td>:</td>
                        <td>Kamis</td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>28 Juni 2018</td>
                      </tr>
                      <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <td>08.00 WIB</td>
                      </tr>
                      <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <td>Aula PP PAUD dan Dikmas Jawa Tengah Jl. Diponegoro No 250 Ungaran</td>
                      </tr>
                      <tr>
                        <td>Catatan</td>
                        <td>:</td>
                        <td>-</td>
                      </tr>
                    </table>
                  </div>
                  <div id="penutup">Demikian untuk menjadikan perhatian dan atas kehadirannya diucapkan terimakasih.</div>
                  <div id="ttd" class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <p id="camat"><strong>CAMAT BERGAS</strong></p>
                      <div id="nama-camat"><strong><u>TRI MARTONO, SH, MM</u></strong><br />
                        Pembina Tk. I<br />
                        NIP. 196703221995031001</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
    /* CSS yang telah dipindahkan ke sini */
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

    h1,h3,h5,h6{
    text-align:center;
    padding-right:200px;
    }
    .row{
    margin-top: 20px;
    }
    .keclogo{
    font-size:24px;
    font-size:3vw;
    }
    .kablogo{
    font-size:2vw;
    }
    .alamatlogo{
    font-size:1.5vw;
    }
    .kodeposlogo{
    font-size:1.7vw;
    }
    #tls{
    text-align:right; 
    }
    .alamat-tujuan{
    margin-left:50%;
    }
    .garis1{
    border-top:3px solid black;
    height: 2px;
    border-bottom:1px solid black;
    }
    #logo{
    margin: auto;
    margin-left: 50%;
    margin-right: auto;
    }
    #tempat-tgl{
    margin-left:120px;
    }
    #camat{
    text-align:center;
    }
    #nama-camat{
    margin-top:100px;
    text-align:center;
    }
</style>
@endsection
