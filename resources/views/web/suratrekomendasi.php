<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Rekomendasi</title>
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
</head>
<body>
    <div class="rangkasurat">
        <table style="width: 100%;">
        <div class="kop-surat">
                <div class="d-flex justify-content-between">
                    <div style="width: 30%; margin-left: 100px;">
                    <img src="{{ asset('img/logo.png') }}" width="80%" alt="Logo">
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
            <td class="kiri">Jember, <?php echo \Carbon\Carbon::parse($screening['screening_date'])->isoFormat('LL'); ?> <br><br></td>

            <tr>
                <td colspan="2">Perihal : Rekomendasi Pemeriksaan Lanjutan Suspek TBC</td>
            </tr>
            <tr>
                <td colspan="2">Kepada : Yth. Penanggung Jawab Tuberkulosis di <?php echo $screening['district']; ?><br><br></td>
            </tr>
            <tr>
                <td colspan="2">Mohon pemeriksaan dan penanganan lebih lanjut pada suspek :<br><br></td>
            </tr>                  
            <tr>
                <td colspan="2">
                    Nama : <?php echo $screening['full_name']; ?><br>
                    Umur : <?php echo $screening['age']; ?><br>
                    Jenis Kelamin : <?php echo $screening['gender']; ?><br><br>
                    Diagnosis,  
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
                            <td><?php echo $screening['contact_with_tb']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda mengalami batuk selama 2 minggu atau lebih ?</td>
                            <td><?php echo $screening['batuk']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda pernah mengalami sesak nafas dalam 2 bulan terakhir ?</td>
                            <td><?php echo $screening['sesak_nafas']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda pernah berkeringat saat malam hari tanpa berkegiatan ?</td>
                            <td><?php echo $screening['keringat_malam_hari']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda pernah mengalami demam meriang selama lebih dari 1 bulan ?</td>
                            <td><?php echo $screening['demam_meriang']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda ibu hamil ?</td>
                            <td><?php echo $screening['ibu_hamil']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda adalah lansia lebih dari 60 tahun ?</td>
                            <td><?php echo $screening['lansia']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda menderita diabetes melitus ?</td>
                            <td><?php echo $screening['diabetes_melitus']; ?></td>
                        </tr>
                        <tr>
                            <td>Apakah anda merokok ?</td>
                            <td><?php echo $screening['merokok']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
