@extends('layouts.admin')

@section('admin-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('admin.patients.index') }}" class="btn text-muted mb-3">
            <i class="fa-solid fa-arrow-left"></i> Kembali</a>
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
                            <div class="form-control">{{ $patientDetail->tb_health_facility }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="satellite">Fasyankes Satelit</label>
                            <div class="form-control">
                                {{ $patientDetail->satelliteHealthFacility->name ?? 'Deleted Satellite Health Facility' }}
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="dateStart">Tanggal Mulai Berobat</label>
                            <div class="form-control">
                                {{ date('d M Y', strtotime($patientDetail->patient->start_treatment)) }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="regNum">No. Registrasi Pasien</label>
                            <div class="form-control">{{ $patientDetail->no_regis }}</div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Pendamping/Patient Supporter (PS)</label>
                            <div class="form-control">{{ $patientDetail->worker->name ?? 'Deleted Worker' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Status Pasien</label>
                            <div class="form-control">{{ $patientDetail->patientStatus->status }}</div>
                        </div>
                    </div>
                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Identitas Pasien</h5>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Nama Lengkap</label>
                            <div class="form-control">{{ $patientDetail->patient->name }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>NIK KTP</label>
                            <div class="form-control">{{ $patientDetail->patient->id_number }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-control">{{ ucwords($patientDetail->patient->sex) }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Agama</label>
                            <div class="form-control">{{ $patientDetail->patient->religion->name ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Alamat KTP</label>
                            <div class="form-control">{{ $patientDetail->patient->id_card_address }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Alamat Domisili</label>
                            <div class="form-control">{{ $patientDetail->patient->residence_address ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Kecamatan</label>
                            <div class="form-control">{{ $patientDetail->patient->district->name }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Kabupaten</label>
                            <div class="form-control">{{ $patientDetail->patient->district->regency->name }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Umur (Tahun)</label>
                            <div class="form-control">{{ $patientDetail->age ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>No. Telepon/Hp</label>
                            <div class="form-control">{{ $patientDetail->patient->phone ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Status Pendidikan</label>
                            <div class="form-control">{{ $patientDetail->patient->education->education ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Status Pernikahan</label>
                            <div class="form-control">{{ ucwords($patientDetail->patient->marital_status) ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Status Pekerjaan</label>
                            <div class="form-control" id="isJob">
                                {{ $patientDetail->patient->has_job == true ? 'Bekerja' : 'Tidak Bekerja' }}
                            </div>
                        </div>

                        <div class="col-sm-6 form-group job-place">
                            <label>Tempat Bekerja</label>
                            <div class="form-control">{{ $patientDetail->patient->workplace ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group job-place">
                            <label>Alamat Tempat Bekerja</label>
                            <div class="form-control">{{ $patientDetail->patient->work_address ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Jumlah Tanggungan</label>
                            <div class="form-control">{{ $patientDetail->patient->dependent ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Tinggi Badan (cm)</label>
                            <div class="form-control">{{ $patientDetail->height ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Berat Badan (kg)</label>
                            <div class="form-control">{{ $patientDetail->weight ?? '' }}</div>
                        </div>
                    </div>

                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Identitas Orang Tua/Wali</h5>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Nama Ibu</label>
                            <div class="form-control">{{ $patientDetail->patient->mother_name ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Nama Bapak</label>
                            <div class="form-control">{{ $patientDetail->patient->father_name ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Alamat</label>
                            <div class="form-control">{{ $patientDetail->patient->guardian_address ?? '' }}
                            </div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>No. Telepon/Hp</label>
                            <div class="form-control">{{ $patientDetail->patient->guardian_phone ?? '' }}</div>
                        </div>
                    </div>

                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Kontak Darurat</h5>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Nama</label>
                            <div class="form-control">{{ $patientDetail->patient->emergency_contact->name ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Hubungan</label>
                            <div class="form-control">
                                {{ ucfirst($patientDetail->patient->emergency_contact->relation) ?? '' }}
                            </div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Alamat</label>
                            <div class="form-control">{{ $patientDetail->patient->emergency_contact->address ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>No. Telepon/Hp</label>
                            <div class="form-control">{{ $patientDetail->patient->emergency_contact->phone ?? '' }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Tahu Penyakit Pasien</label>
                            <div class="form-control">
                                {{ $patientDetail->patient->emergency_contact->is_know == null
                                    ? ''
                                    : ($patientDetail->patient->emergency_contact->is_know == true
                                        ? 'Ya'
                                        : 'Tidak') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.patients.edit', $patientDetail) }}" class="btn btn-warning">Edit
                                Data</a>
                            <a role="button" class="btn btn-danger"
                                onclick="deletePatient({{ $patientDetail->id }})">Hapus Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let text = $('#isJob').text();
            $.trim(text) == "Tidak Bekerja" ? $('.job-place').addClass('d-none') : $('.job-place').removeClass(
                'd-none');
        })
    </script>

    <script>
        function deletePatient(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ route('admin.patients.destroy', 'id') }}";
            url = url.replace('id', id)

            Swal.fire({
                title: 'Yakin Untuk Menghapus?',
                text: "Data akan terhapus dari database",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            type: "DELETE",
                            url: url,
                            data: id,
                        })
                        .done(function(status) {
                            Swal.fire({
                                title: 'Data telah Terhapus',
                                icon: 'success',
                                showConfirmButton: false
                            })
                            setTimeout(function() {
                                window.location.href = "{{ route('admin.patients.index') }}";
                            }, 1500);
                        })
                        .fail(function() {
                            Swal.fire(
                                'Terjadi Kesalahan',
                                '',
                                'error'
                            )
                        });
                }
            })
        }
    </script>
@endsection
