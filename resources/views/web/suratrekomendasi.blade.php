<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Pemeriksaan Lanjutan Suspek TBC</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Niconne&display=swap');
        .unique-font {
            font-family: 'Srisakdi', cursive;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .kop-surat .logo {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .kop-surat .logo img {
            max-width: 100px;
            height: auto;
        }

        .kop-surat .text {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .kop-surat .text div {
            white-space: nowrap;
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

    </style>
</head>
<body>
    <div class="rangkasurat" style="text-align: center;">
        <table style="width: 100%; margin: 0 auto; text-align: center;">
            <tr>
                <td style="width: 20%;">
                    <div class="logo">
                        <img src="data:image/png;base64, <?php echo base64_encode(file_get_contents('img/logo.png')); ?>" alt="Logo" style="max-width: 140px; height: auto;">
                    </div>
                </td>
                <td style="width: 80%; text-align: center;">
                    <div class="text">
                        <h3 style="margin: 0;"><strong class="unique-font">SEKAWAN'S</strong> <strong class="unique-font" style="color: red;">TB</strong> <strong class="unique-font">JEMBER</strong></h3>
                        <h5 style="margin: 5px 0;"><strong>SK.MENTERI HUKUM DAN HAK ASASI MANUSIA RI</strong></h5>
                        <h5 style="margin: 5px 0;"><strong>NOMOR: AHU-0016828.AH.01.07.TAHUN 2017</strong></h5>
                        <p style="margin: 5px 0;">Alamat: Jl.Udang Windu No.17, Mangli-Jember</p>
                        <p style="margin: 5px 0;">No.HP : 085732480822 Email : sekawansjember@gmail.com</p>
                    </div>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width: 100%; margin: 0 auto;">
            <tr>
                <td colspan="2" class="kanan">Jember, {{ \Carbon\Carbon::parse($screening['screening_date'])->isoFormat('LL') }}</td>
            </tr>
                <td colspan="2">Perihal : Rekomendasi Pemeriksaan Lanjutan Suspek TBC</td>
            </tr>
            <tr>
                <td colspan="2">Kepada: Yth. Penanggung Jawab Tuberkulosis di Tempat<span id="selected-faskes-info">{{ $selectedFaskes }}</span><br><br></td>
            </tr>
            <tr>
                <td colspan="2">Mohon pemeriksaan dan penanganan lebih lanjut pada suspek :<br><br></td>
            </tr>
            <tr>
                <td colspan="2">
                    Nama : {{ $screening['full_name'] }}<br>
                    NIK : {{ $screening['nik'] }}<br>
                    Umur : {{ $screening['age'] }} Tahun<br>
                    Alamat Lengkap : {{ $screening['address'] }}<br>
                    Alamat Domisili KTP : {{ $screening['domicile_address'] }}<br>
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
                            <th style="width: 80%;">Skoring Batuk</th>
                            <th style="width: 20%;">Jawaban</th>
                        </tr>

                        <tr>
                            <td>Apakah anda mengalami batuk selama 2 minggu atau lebih?</td>
                            <td>{{ $screening['cough_two_weeks'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table class="pertanyaan" style="width: 100%;">
                        <tr>
                            <th style="width: 80%;">Skoring Gejala Lain</th>
                            <th style="width: 20%;">Jawaban</th>
                        </tr>

                        <tr>
                            <td>Apakah anda pernah mengalami sesak nafas dalam 2 bulan terakhir?</td>
                            <td>{{ $screening['shortness_breath'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda pernah berkeringat saat malam hari tanpa berkegiatan?</td>
                            <td>{{ $screening['night_sweats'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda pernah mengalami demam meriang selama lebih dari 1 bulan?</td>
                            <td>{{ $screening['fever_one_month'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table class="pertanyaan" style="width: 100%;">
                        <tr>
                            <th style="width: 80%;">Skoring Faktor Risiko</th>
                            <th style="width: 20%;">Jawaban</th>
                        </tr>

                        <tr>
                            <td>Apakah anda ibu hamil?</td>
                            <td>{{ $screening['pregnant'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda adalah lansia lebih dari 60 tahun?</td>
                            <td>{{ $screening['elderly'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda menderita diabetes melitus?</td>
                            <td>{{ $screening['diabetes'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda merokok?</td>
                            <td>{{ $screening['smoking'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>

                        <tr>
                            <td>Apakah anda pernah berobat TBC dan tidak tuntas?</td>
                            <td>{{ $screening['incomplete_tb_treatment'] ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right;">
                    <br><br>
                    <div style="display: inline-block; text-align: center;">
                        Hormat Kami,<br>
                        <img src="data:image/png;base64, <?php echo base64_encode(file_get_contents('img/capsekawan.png')); ?>" alt="Tanda Tangan" style="max-width: 200px; height: auto;"><br>
                        <span style="font-weight: bold; text-decoration: underline;">Achmad Zaini</span><br>
                        Ketua Sekawan'S TB Jember
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
