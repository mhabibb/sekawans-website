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
              <select class="custom-select @error('tb_health_facility') is-invalid @else @if(old('tb_health_facility') ?? false) is-valid @endif @enderror" name="tb.health.facility" required>
                <option disabled selected>Pilih Fasyankes</option>
                @foreach ($fasyankes as $rs)
                <option value="{{ $rs }}" @selected(old('tb_health_facility') == $rs)>{{ $rs }}</option>
                @endforeach
              </select>
            </div>
          </div>
          {{-- @if ($errors->any())
            @dd($errors)
          @endif --}}
          <div class="col-sm-6 form-group">
            {{-- @error('satelite_health_facility_id')
              <div class="error errorSelect2" id="cekSatelite"></div>
            @else
                @if(old('satelite_health_facility_id') ?? false)
                    <div class="error validSelect2" id="cekSatelite"></div>
                @endif
            @enderror --}}
            <label>Fasyankes Satelit</label>
            <select class="form-control tags" id="satelite" name="satelite.health.facility.id" style="width: 100%;">
              <option disabled selected>Pilih Fasyankes Satelit</option>
              @foreach ($satelites as $satelite)
                <option value="{{ $satelite->id }}" @selected(old('satelite_health_facility_id') == $satelite->id)>{{ $satelite->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-6 form-group">
            <label>Tanggal Mulai Berobat</label>
            <input type="date" name="start_treatment" max="{{ date('Y-m-d', strtotime(now())) }}" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>No. Registrasi Pasien</label>
            <input type="number" name="no.regis" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>Pendamping/Patient Supporter (PS)</label>
            <select class="form-control tags 
            @error('worker_id') is-invalid @else @if(old('worker_id') ?? false) is-valid @endif @enderror" name="worker.id" style="width: 100%;">
              <option disabled selected>Pilih Pendamping/Patient Supporter (PS)</option>
              @foreach ($workers as $worker)
                <option value="{{ $worker->id }}">{{ $worker->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Identitas Pasien</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>NIK KTP</label>
            <input type="number" name="id.number" class="form-control">
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
                <input class="form-check-input" type="radio" name="religion.id" id="{{'religion' . $religion->id}}"
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
            <input type="text" name="id.card.address" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            {{-- <label>Kecamatan KTP</label>
            <input type="text" name="districtKtp" class="form-control"> --}}
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat Domisili</label>
            <input type="text" name="residence.address" class="form-control">
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control select2" name="district.id" style="width: 100%;">
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
            <input type="text" name="phone" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pendidikan</label>
            <div class="row row-cols-2 mx-1">
              @foreach ($educations as $edu)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="education.id" id="{{'edu' . $edu->id}}"
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
                <input class="form-check-input" type="radio" name="marital.status" id="menikah" value="menikah">
                <label class="form-check-label" for="menikah">
                  Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="marital.status" id="belum-menikah"
                  value="belum menikah">
                <label class="form-check-label" for="belum-menikah">
                  Belum Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="marital.status" id="janda-duda" value="janda/duda">
                <label class="form-check-label" for="janda-duda">
                  Janda/Duda
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pekerjaan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="has.job" id="bekerja" value="1">
              <label class="form-check-label" for="bekerja">
                Bekerja
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="has.job" id="tidak-kerja" value="0">
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
            <input type="text" name="work.address" class="form-control">
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

          {{-- <div class="col-sm-6 form-group">
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
          </div> --}}
        </div>

        <div class="row mb-4">
          <div class="col-12 card-title">
            <h5>Identitas Orang Tua/Wali</h5>
          </div>
          <div class="col-sm-6 form-group">
            <label>Nama Ibu</label>
            <input type="text" name="mother.name" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama Bapak</label>
            <input type="text" name="father.name" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="guardian.address" class="form-control">
          </div>

          {{-- <div class="col-sm-6 form-group">
            <label>Kecamatan</label>
            <input type="text" name="parentDistrict" class="form-control">
          </div> --}}

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="guardian.phone" class="form-control">
          </div>
        </div>

        <div class="row mb-4 pb-2 border-bottom">
          <div class="col-12 card-title">
            <h5>Kontak Darurat</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama</label>
            <input type="text" name="emergency[name]" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Hubungan</label>
            <input type="text" name="emergency[relation]" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="emergency[address]" class="form-control">
          </div>

          {{-- <div class="col-sm-6">
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
          </div> --}}

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="emergency[phone]" class="form-control">
          </div>

          <div class="col-sm-6 form-group">
            <label>Tahu Penyakit Pasien</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="emergency[is_know]" id="ya-tahu" value="1">
              <label class="form-check-label" for="ya-tahu">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="emergency[is_know]" id="tidak-tahu" value="0">
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
        theme: 'bootstrap4',
        selectOnClose: true
    });

    {{-- Dynamic option select2 --}}
    $(".tags").select2({
        theme: 'bootstrap4',
        selectOnClose: true,
        tags: true
    });

    function cekErrorSelect2(){
        @error('satelite_health_facility_id')
            $('#satelite').addClass('is-invalid')
                @else
                    @if(old('satelite_health_facility_id') ?? false)
                        $('#satelite').addClass('is-valid')
                    @endif
        @enderror
    }

    cekErrorSelect2();

    // $('#satelite').find(':selected')

    // $('#satelite').trigger('change');

    {{-- Auto focus search select2 --}}
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});
</script>
@endsection