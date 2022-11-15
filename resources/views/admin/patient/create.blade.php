@extends('layouts.admin')

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
          <div class="col-sm-6 form-group">
            <label for="fasyankes">Nama Fasyankes TB RO</label>
            <input type="text" name="fasyankes" id="fasyankes" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label for="satelite">Nama Fasyankes Satelit</label>
            <input type="text" name="satelite" id="satelite" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label for="dateStart">Tanggal Mulai Berobat</label>
            <input type="date" name="dateStart" id="dateStart" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label for="regNum">No. Registrasi Pasien</label>
            <input type="number" name="regNum" id="regNum" class="form-control">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Identitas Pasien</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="nik">NIK KTP</label>
            <input type="number" name="nik" id="nik" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label class="d-block">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexs" id="lakilaki" value="laki-laki">
              <label class="form-check-label" for="lakilaki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexs" id="perempuan" value="perempuan">
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label class="d-block">Agama</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($religions as $religion)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="religions" id="{{'religion' . $religion->id}}"
                  value="{{ $religion->id }}">
                <label class="form-check-label" for="{{'religion' . $religion->id}}">
                  {{ $religion->name }}
                </label>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label for="address">Alamat KTP</label>
            <input type="text" name="address" id="address" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="addressNow">Alamat Domisili</label>
            <input type="text" name="addressNow" id="addressNow" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="age">Umur (Tahun)</label>
            <input type="number" name="age" id="age" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="phone">No. Telepon / HP</label>
            <input type="number" name="phone" id="phone" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label class="d-block">Status Pendidikan</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($educations as $edu)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="educations" id="{{'edu' . $edu->id}}"
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
                <input class="form-check-input" type="radio" name="maritals" id="menikah" value="menikah">
                <label class="form-check-label" for="menikah">
                  Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="maritals" id="belum-menikah" value="belum menikah">
                <label class="form-check-label" for="belum-menikah">
                  Belum Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="maritals" id="janda-duda" value="Janda/Duda">
                <label class="form-check-label" for="janda-duda">
                  Janda/Duda
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label class="d-block">Status Pekerjaan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jobstat" id="bekerja" value="1">
              <label class="form-check-label" for="bekerja">
                Bekerja
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jobstat" id="tidak-kerja" value="2">
              <label class="form-check-label" for="tidak-kerja">
                Tidak Bekerja
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label for="workplace">Tempat Bekerja</label>
            <input type="text" name="workplace" id="workplace" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="workAddr">Alamat Tempat Bekerja</label>
            <input type="text" name="workAddr" id="workAddr" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="depend">Jumlah Tanggungan</label>
            <input type="number" name="depend" id="depend" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="height">Tinggi Badan (cm)</label>
            <input type="number" name="height" id="height" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="weight">Berat Badan (kg)</label>
            <input type="number" name="weight" id="weight" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label for="d-block">Status Pasien</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($statuses as $status)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="statuses" id="{{'status' . $status->id}}"
                  value="{{ $status->id }}">
                <label class="form-check-label" for="{{'status' . $status->id}}">
                  {{ $status->status }}
                </label>
              </div>
              @endforeach
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
<script>
  $('#summernote').summernote({
    
    tabsize: 2,
    height: 300
  });
</script>
@endsection