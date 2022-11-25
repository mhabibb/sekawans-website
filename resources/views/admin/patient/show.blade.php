@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <button class="btn text-muted mb-3" onclick="history.back()">
        <i class="fa-solid fa-arrow-left"></i> Kembali</button>
    <div class="container-fluid">
        <h1>Data Pasien</h1>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid pb-5">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4 pb-2 border-bottom">
                    <div class="col-12 card-title">
                        <h5>Data Dasar Pasien</h5>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="fasyankes">Fasyankes TB RO</label>
                        <div class="form-control">RS PARU JEMBER</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="satelite">Fasyankes Satelit</label>
                        <div class="form-control">{{ $patient->patientDetail->sateliteHealthFacility->name }}</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="dateStart">Tanggal Mulai Berobat</label>
                        <div class="form-control">{{ $patient->start_treatment }}</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="regNum">No. Registrasi Pasien</label>
                        <div class="form-control">{{ $patient->patientDetail->no_regis }}</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Pendamping/Patient Supporter (PS)</label>
                        <div class="form-control">Faisol</div>
                    </div>
                </div>
                <div class="row mb-4 pb-2 border-bottom">
                    <div class="col-12 card-title">
                        <h5>Identitas Pasien</h5>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Nama Lengkap</label>
                        <div class="form-control">{{ $patient->name }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>NIK KTP</label>
                        <div class="form-control">{{ $patient->id_number }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-control">{{ ucwords($patient->sex) }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Agama</label>
                        <div class="form-control">{{ $patient->religion->name }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Alamat KTP</label>
                        <div class="form-control">{{ $patient->id_card_address }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Kecamatan KTP</label>
                        <div class="form-control">{{ $patient->id_card_district }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Alamat Domisili</label>
                        <div class="form-control">{{ $patient->residence_address }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Kecamatan</label>
                        <div class="form-control">{{ $patient->district->name }}, {{
                            $patient->district->regency->name
                            }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Umur (Tahun)</label>
                        <div class="form-control">{{ $patient->patientDetail->age }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>No. Telepon/Hp</label>
                        <div class="form-control">{{ $patient->phone }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Status Pendidikan</label>
                        <div class="form-control">{{ $patient->education->education }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Status Pernikahan</label>
                        <div class="form-control">{{ ucwords($patient->marital_status) }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Status Pekerjaan</label>
                        <div class="form-control">{{ $patient->has_job == true ? "Bekerja" : "Tidak Bekerja" }}
                        </div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Tempat Bekerja</label>
                        <div class="form-control">{{ $patient->workplace }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Alamat Tempat Bekerja</label>
                        <div class="form-control">{{ $patient->work_address }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Jumlah Tanggungan</label>
                        <div class="form-control">{{ $patient->dependent }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Tinggi Badan (cm)</label>
                        <div class="form-control">{{ $patient->patientDetail->height }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Berat Badan (kg)</label>
                        <div class="form-control">{{ $patient->patientDetail->weight }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Status Pasien</label>
                        <div class="form-control">{{ $patient->patientDetail->patientStatus->status }}</div>
                    </div>
                </div>

                <div class="row mb-4 pb-2 border-bottom">
                    <div class="col-12 card-title">
                        <h5>Identitas Orang Tua/Wali</h5>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Nama Ibu</label>
                        <div class="form-control">{{ $patient->mother_name }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Nama Bapak</label>
                        <div class="form-control">{{ $patient->father_name }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Alamat</label>
                        <div class="form-control">{{ $patient->guardian_address }}, {{ $patient->guardian_district
                            }}
                        </div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>No. Telepon/Hp</label>
                        <div class="form-control">{{ $patient->guardian_phone }}</div>
                    </div>
                </div>

                <div class="row mb-4 pb-2 border-bottom">
                    <div class="col-12 card-title">
                        <h5>Kontak Darurat</h5>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Nama</label>
                        <div class="form-control">{{ $patient->emergency_contact->name }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Hubungan</label>
                        <div class="form-control">{{ ucfirst($patient->emergency_contact->relation) }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Alamat</label>
                        <div class="form-control">{{ $patient->emergency_contact->address }}</div>
                    </div>

                    {{-- <div class="col-sm-6 form-group">
                        <label>Kecamatan</label>
                        <div class="form-control">{{ $patient->emergency_contact->district->name }}
                        </div>
                    </div> --}}

                    <div class="col-sm-6 form-group">
                        <label>No. Telepon/Hp</label>
                        <div class="form-control">{{ $patient->emergency_contact->phone }}</div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Tahu Penyakit Pasien</label>
                        <div class="form-control">{{ $patient->emergency_contact->is_know == true ? "Ya" : "Tidak"
                            }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.patients.edit', $patient) }}" class="btn btn-warning">Edit Data</a>
                        <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin untuk menghapus data {{ $patient->name }} ?')">
                                Hapus Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection