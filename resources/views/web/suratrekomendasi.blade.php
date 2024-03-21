<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: auto;
            height: auto; 
            margin: 0;
            padding: 20mm;
            border: 2px solid black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }
        .content {
            margin-top: 0px;
        }
        .content p {
            margin-bottom: 10px;
        }
        .content .info {
            margin-bottom: 20px;
        }
        .content .info label {
            font-weight: bold;
        }
        .content .info span {
            margin-left: 10px;
        }
        .content .checkboxes {
            margin-bottom: 20px;
        }
        .content .checkboxes label {
            display: inline-block;
            width: 50%; 
        }
        .content .checkboxes input {
            margin-right: 5px;
        }
        .content .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <th colspan="3" style="background-color: #d3d3d3;">Surat Pengantar Pemeriksaan TBC</th>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="content">
                        <p>Kepada,</p>
                        <p>Puskesmas .......................</p>
                        <p>Di tempat</p>
                        <p>Mohon untuk dilakukan pemeriksaan kepada:</p>
                        <div class="info">
                            <p><label>Nama:</label><span>____________________</span></p>
                            <p><label>Umur:</label><span>____________________</span></p>
                            <p><label>Jenis Kelamin:</label><span>____________________</span></p>
                            <p><label>Alamat:</label><span>____________________</span></p>
                        </div>
                        <div class="checkboxes">
                            <p>Hasil Skrining oleh Kader: </p>
                            <label><input type="checkbox"> Kontak Serumah</label>
                            <label><input type="checkbox"> Kontak Erat</label>
                            <label><input type="checkbox"> Batuk</label>
                        </div>
                        <div class="checkboxes">
                            <p>Gejala lain :</p>
                            <div style="display: flex;">
                                <div style="flex: 1;">
                                    <label><input type="checkbox"> Batuk Berdarah</label><br>
                                    <label><input type="checkbox"> Sesak Nafas</label><br>
                                    <label><input type="checkbox"> Berkeringat di Malam Hari</label><br>
                                    <label><input type="checkbox"> Demam/Mering >1 bulan</label>
                                </div>
                                <div style="flex: 1;">
                                    <label><input type="checkbox"> DM</label><br>
                                    <label><input type="checkbox"> Umur > 60th</label><br>
                                    <label><input type="checkbox"> Ibu Hamil</label><br>
                                    <label><input type="checkbox"> Perokok</label><br>
                                    <label><input type="checkbox"> Pernah berobat TB tapi tidak tuntas</label>
                                </div>
                            </div>
                        </div>
                        <div class="signature">
                            <p>Atas perhatiannya diucapkan terima kasih.</p>
                            <p>_______________________</p>
                            <p>Kader</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
