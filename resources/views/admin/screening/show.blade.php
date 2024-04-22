@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('admin.screening.index') }}" class="btn text-muted mb-3">
            <i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="container-fluid">
            <h1>Detail Screening</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Data Dasar Screening</h5>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="full_name">Nama Lengkap</label>
                            <div class="form-control">{{ $screening->full_name }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="full_name">NIK KTP</label>
                            <div class="form-control">{{ $screening->nik }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="contact">No Telepon</label>
                            <div class="form-control">{{ $screening->contact }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <div class="form-control">{{ $screening->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="age">Usia (Tahun)</label>
                            <div class="form-control">{{ $screening->age }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="age">Alamat Lengkap</label>
                            <div class="form-control">{{ $screening->address }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="district">Domisili Kecamatan</label>
                            <div class="form-control">{{ $screening->district }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="screening_date">Tanggal Skrining</label>
                            <div class="form-control">{{ \Carbon\Carbon::parse($screening->screening_date)->format('d/m/Y') }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="is_positive">Hasil Skrining</label>
                            <div class="form-control">{{ $screening->is_positive ? 'Positif' : 'Negatif' }}</div>
                        </div>
                    </div>

                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Pertanyaan Jawaban Pasien Screening</h5>
                        </div>
                        <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section>
    <!-- /.content -->
@endsection

<style>
    
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
