@extends('layouts.admin')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Input Data Pasien</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.patients.store') }}" method="POST" enctype="multipart/form-data" class="card">
      @csrf
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Data Dasar Pasien</h5>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Fasyankes TB RO</label>
              <select class="custom-select" name="fasyankes" required>
                <option disabled selected>Pilih Fasyankes</option>
                @foreach ($fasyankes as $rs)
                <option value="{{ $rs }}">{{ $rs }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-6 form-group">
            <label>Fasyankes Satelit</label>
            <input type="text" name="satelite" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>Tanggal Mulai Berobat</label>
            <input type="date" name="dateStart" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>No. Registrasi Pasien</label>
            <input type="number" name="registrationNumber" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>Pendamping/Patient Supporter (PS)</label>
            <input type="text" name="supporter" class="form-control">
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Identitas Pasien</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="fullName" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>NIK KTP</label>
            <input type="number" name="nik" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="lakilaki" value="laki-laki">
              <label class="form-check-label" for="lakilaki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="perempuan" value="perempuan">
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Agama</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($religions as $religion)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="religion" id="{{'religion' . $religion->id}}"
                  value="{{ $religion->id }}">
                <label class="form-check-label" for="{{'religion' . $religion->id}}">
                  {{ $religion->name }}
                </label>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat KTP</label>
            <input type="text" name="addressKtp" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Kecamatan KTP</label>
            <input type="text" name="districtKtp" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat Domisili</label>
            <input type="text" name="addressNow" class="form-control">
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control select2" name="district" style="width: 100%;">
                <option disabled selected>Pilih Kecamatan</option>
                @foreach ($regencies as $regency)
                <optgroup label="{{ $regency->name }}">
                  @foreach ($regency->districts as $district)
                  <option value="{{ $district->id }}">{{ $district->name }}</option>
                  @endforeach
                </optgroup>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Umur (Tahun)</label>
            <input type="number" name="age" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="phoneNumber" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pendidikan</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($educations as $edu)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="education" id="{{'edu' . $edu->id}}"
                  value="{{ $edu->id }}">
                <label class="form-check-label" for="{{'edu' . $edu->id}}">
                  {{ $edu->education }}
                </label>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label class="d-block">Status Pernikahan</label>
            <div class="row row-cols-2 mx-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="maritalStatus" id="menikah" value="menikah">
                <label class="form-check-label" for="menikah">
                  Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="maritalStatus" id="belum-menikah"
                  value="belum menikah">
                <label class="form-check-label" for="belum-menikah">
                  Belum Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="maritalStatus" id="janda-duda" value="janda/duda">
                <label class="form-check-label" for="janda-duda">
                  Janda/Duda
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pekerjaan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="hasJob" id="bekerja" value="1">
              <label class="form-check-label" for="bekerja">
                Bekerja
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="hasJob" id="tidak-kerja" value="0">
              <label class="form-check-label" for="tidak-kerja">
                Tidak Bekerja
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Tempat Bekerja</label>
            <input type="text" name="workplace" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat Tempat Bekerja</label>
            <input type="text" name="workAddress" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Jumlah Tanggungan</label>
            <input type="number" name="dependent" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="height" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Berat Badan (kg)</label>
            <input type="number" name="weight" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pasien</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($statuses as $status)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="patientStatus" id="{{'status' . $status->id}}"
                  value="{{ $status->id }}">
                <label class="form-check-label" for="{{'status' . $status->id}}">
                  {{ $status->status }}
                </label>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Identitas Orang Tua/Wali</h5>
          </div>
          <div class="col-sm-6 form-group">
            <label>Nama Ibu</label>
            <input type="text" name="motherName" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama Bapak</label>
            <input type="text" name="fatherName" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="parentAddress" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Kecamatan</label>
            <input type="text" name="parentDistrict" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="parentPhone" class="form-control">
          </div>
        </div>

        <div class="row mb-4 pb-2 border-bottom">
          <div class="col-12 card-title">
            <h5>Kontak Darurat</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama</label>
            <input type="text" name="emergencyContactName" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Hubungan</label>
            <input type="text" name="emergencyContactRelations" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="emergencyContactAddress" class="form-control">
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="select2" name="emergencyContactDistrict" style="width: 100%;">
                <option disabled selected>Pilih Kecamatan</option>
                @foreach ($regencies as $regency)
                <optgroup label="{{ $regency->name }}">
                  @foreach ($regency->districts as $district)
                  <option value="{{ $district->id }}">{{ $district->name }}</option>
                  @endforeach
                </optgroup>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="emergencyContactPhone" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Tahu Penyakit Pasien</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="isKnow" id="ya-tahu" value="1">
              <label class="form-check-label" for="ya-tahu">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="isKnow" id="tidak-tahu" value="0">
              <label class="form-check-label" for="tidak-tahu">
                Tidak
              </label>
            </div>
          </div>
        </div>

        <div class="col-12">
          <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select2').select2({
      theme: 'bootstrap4'
    });
});
</script>
@endsection