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
                            <label for="contact">Kontak</label>
                            <div class="form-control">{{ $screening->contact }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <div class="form-control">{{ $screening->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="age">Usia</label>
                            <div class="form-control">{{ $screening->age }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="district">Kecamatan</label>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Apakah ada kontak satu rumah dengan pasien TBC?</td>
                                        <td>{{ $screening->home_contact ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda mengalami batuk selama 2 minggu atau lebih?</td>
                                        <td>{{ $screening->cough ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda pernah mengalami sesak nafas dalam 2 bulan terakhir?</td>
                                        <td>{{ $screening->breath ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda pernah berkeringat saat malam hari tanpa berkegiatan?</td>
                                        <td>{{ $screening->sweat ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda pernah mengalami demam meriang selama lebih dari 1 bulan?</td>
                                        <td>{{ $screening->fever ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda mengalami penurunan berat badan drastis disertasi nafsu makan yang berkurang?</td>
                                        <td>{{ $screening->weight_loss ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda ibu hamil?</td>
                                        <td>{{ $screening->pregnant ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda adalah lansia lebih dari 60 tahun?</td>
                                        <td>{{ $screening->elderly ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda menderita diabetes melitus?</td>
                                        <td>{{ $screening->diabetes ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda merokok?</td>
                                        <td>{{ $screening->smoking ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah anda pernah melakukan pengobatan Tuberkulosis?</td>
                                        <td>{{ $screening->ever_treatment ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section>
    <!-- /.content -->
@endsection
