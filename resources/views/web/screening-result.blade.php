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
<<<<<<< HEAD
            <p style="font-size: 16px;">Formulir TBC:</p>
            <br>
            <hr>
            <html>
                <head>
                    <title> KOP SURAT </title>
                    <style type= "text/css">
                    body {font-family: arial; background-color : #ccc }
                    .rangkasurat {width : 980px;margin:0 auto;background-color : #fff;height: 500px;padding: 20px;}
                    table {border-bottom : 5px solid # 000; padding: 2px}
                    .tengah {text-align : center;line-height: 5px;}
                    </style >
                </head>
                <body>
                    <div class = "rangkasurat">
                        <table width = "100%">
                            <tr>
                                <td> <img src="../../../public/img/logo-stakeholder/germas.png" width="140px"> </td>
                                <td class = "tengah">
                                    <h3>SEKAWAN'S TB JEMBER</h3>
                                    <h5>SK.MENTERI HUKUM DAN HAK ASASI MANUSIA RI</h5>
                                    <h5>NOMOR: AHU-0016828.AH.01.07.TAHUN 2017</h5>
                                    <h6>Alamat: Jl.Udang Windu No.17, Mangli-Jember</h6>
                                    <h6>No.HP : 085732480822 Email : sekawansjember@gmail.com</h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="tanggal_screening">Jember, ….. (Tanggal Bulan Tahun Skrining)</td>
                            </tr>
                        </table >
                    </div>
                </body>
            </html>
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

<<<<<<< HEAD
    .tanggal_screening {
        text-align: right;
    }
</style>
=======
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
>>>>>>> 14e53932e623a0dd3da134df3a394ac66012ab0f
