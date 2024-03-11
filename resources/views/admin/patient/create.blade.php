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
              <select
                class="custom-select @error('tb_health_facility') is-invalid @else @if(old('tb_health_facility') ?? false) is-valid @endif @enderror"
                name="tb.health.facility">
                <option disabled selected>Pilih Fasyankes</option>
                @foreach ($fasyankes as $rs)
                <option value="{{ $rs }}" @selected(old('tb_health_facility')==$rs)>{{ $rs }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-6 form-group">
            <label>Fasyankes Satelit</label>
            <select
              class="form-control tags @error('satellite_health_facility_id') is-invalid @else @if(old('satellite_health_facility_id') ?? false) is-valid @endif @enderror"
              id="satellite" name="satellite.health.facility.id" style="width: 100%;">
              <option disabled selected>Pilih Fasyankes Satelit</option>
              @foreach ($satellites as $satellite)
              <option value="{{ $satellite->id }}" @selected(old('satellite_health_facility_id')==$satellite->id)>{{
                $satellite->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-6 form-group">
            <label>Tanggal Mulai Berobat</label>
            <input type="date" name="start_treatment" max="{{ date('Y-m-d', strtotime(now())) }}"
              class="form-control @error('start_treatment') is-invalid @else @if(old('start_treatment') ?? false) is-valid @endif @enderror"
              value="{{ old('start_treatment') }}">
          </div>
          <div class="col-sm-6 form-group">
            <label>No. Registrasi Pasien (max 10 digit)</label>
            <input type="text" name="no.regis" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
              class="input-number form-control @error('no_regis') is-invalid @else @if(old('no_regis') ?? false) is-valid @endif @enderror"
              value="{{ old('no_regis') }}">
          </div>
          <div class="col-sm-6 form-group">
            <label>Pendamping/Patient Supporter (PS)</label>
            <select id="worker" class="form-control tags 
            @error('worker_id') is-invalid @else @if(old('worker_id') ?? false) is-valid @endif @enderror"
              name="worker.id" style="width: 100%;">
              <option disabled selected>Pilih Pendamping/Patient Supporter (PS)</option>
              @foreach ($workers as $worker)
              <option value="{{ $worker->id }}" @selected(old('worker_id')==$worker->id)>{{
                $worker->name }}</option>
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
            <input type="text" name="name"
              class="form-control @error('name') is-invalid @else @if(old('name') ?? false) is-valid @endif @enderror"
              value="{{ old('name') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>NIK KTP (16 digit)</label>
            <input type="text" name="id.number" maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
              class="form-control @error('id_number') is-invalid @else @if(old('id_number') ?? false) is-valid @endif @enderror"
              value="{{ old('id_number') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Jenis Kelamin</label>
            @error('sex')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="lakilaki" value="laki-laki"
                @checked(old('sex')=='laki-laki' )>
              <label class="form-check-label" for="lakilaki">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="perempuan" value="perempuan"
                @checked(old('sex')=='perempuan' )>
              <label class="form-check-label" for="perempuan">
                Perempuan
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Agama</label>
            @error('religion_id')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="row row-cols-2 mx-1">
              @foreach ($religions as $religion)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="religion.id" id="{{'religion' . $religion->id}}"
                  value="{{ $religion->id }}" @checked(old('religion_id')==$religion->id)>
                <label class="form-check-label" for="{{'religion' . $religion->id}}">
                  {{ $religion->name }}
                </label>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat KTP</label>
            <input type="text" name="id.card.address"
              class="form-control @error('id_card_address') is-invalid @else @if(old('id_card_address') ?? false) is-valid @endif @enderror"
              value="{{ old('id_card_address') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat Domisili</label>
            <input type="text" name="residence.address" class="form-control @error('residence_address') is-invalid
            @else @if(old('residence_address') ?? false) is-valid @endif @enderror"
              value="{{ old('residence_address') }}">
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <select
                class="form-control select2 @error('district_id') is-invalid @else @if(old('district_id') ?? false) is-valid @endif @enderror"
                name="district.id" style="width: 100%;">
                <option disabled selected>Pilih Kecamatan</option>
                @foreach ($regencies as $regency)
                <optgroup label="{{ $regency->name }}">
                  @foreach ($regency->districts as $district)
                  <option value="{{ $district->id }}" @selected(old('district_id')==$district->id)>{{ $district->name }}
                  </option>
                  @endforeach
                </optgroup>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Umur (Tahun)</label>
            <input type="number" name="age" class="form-control @error('age') is-invalid
            @else @if(old('age') ?? false) is-valid @endif @enderror" value="{{ old('age') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid
            @else @if(old('phone') ?? false) is-valid @endif @enderror" value="{{ old('phone') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pendidikan</label>
            @error('education_id')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="row row-cols-2 mx-1">
              @foreach ($educations as $edu)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="education.id" id="{{'edu' . $edu->id}}"
                  value="{{ $edu->id }}" @checked(old('education_id')==$edu->id)>
                <label class="form-check-label" for="{{'edu' . $edu->id}}">
                  {{ $edu->education }}
                </label>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pernikahan</label>
            @error('marital_status')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="row row-cols-2 mx-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="marital.status" id="menikah" value="menikah"
                  @checked(old('marital_status')=='menikah' )>
                <label class="form-check-label" for="menikah">
                  Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="marital.status" id="belum-menikah"
                  value="belum menikah" @checked(old('marital_status')=='belum menikah' )>
                <label class="form-check-label" for="belum-menikah">
                  Belum Menikah
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="marital.status" id="janda-duda" value="janda/duda"
                  @checked(old('marital_status')=='janda/duda' )>
                <label class="form-check-label" for="janda-duda">
                  Janda/Duda
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-6 form-group">
            <label>Status Pekerjaan</label>
            @error('has_job')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="form-check">
              <input class="form-check-input" type="radio" name="has.job" id="bekerja" value="1"
                @checked(old('has_job')=="1" )>
              <label class="form-check-label" for="bekerja">
                Bekerja
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="has.job" id="tidak-kerja" value="0" 
                @checked(old('has_job')=="0" ) @if (!old('emergency.is_know') ?? false) checked @endif>
              <label class="form-check-label" for="tidak-kerja">
                Tidak Bekerja
              </label>
            </div>
          </div>

          <div class="col-sm-6 form-group" id="workplace">
            <label>Tempat Bekerja</label>
            <input type="text" name="workplace" class="form-control @error('workplace') is-invalid
            @else @if(old('workplace') ?? false) is-valid @endif @enderror" value="{{ old('workplace') }}">
          </div>

          <div class="col-sm-6 form-group" id="work-address">
            <label>Alamat Tempat Bekerja</label>
            <input type="text" name="work.address" class="form-control @error('work_address') is-invalid
            @else @if(old('work_address') ?? false) is-valid @endif @enderror" value="{{ old('work_address') }}">
          </div>

          <div class=" col-sm-6 form-group">
            <label>Jumlah Tanggungan</label>
            <input type="number" name="dependent" class="form-control @error('dependent') is-invalid
            @else @if(old('dependent') ?? false) is-valid @endif @enderror" value="{{ old('dependent') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="height" class="form-control @error('height') is-invalid
            @else @if(old('height') ?? false) is-valid @endif @enderror" value="{{ old('height') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Berat Badan (kg)</label>
            <input type="number" name="weight" class="form-control @error('weight') is-invalid
            @else @if(old('weight') ?? false) is-valid @endif @enderror" value="{{ old('weight') }}">
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
            <input type="text" name="mother.name" class="form-control @error('mother_name') is-invalid
            @else @if(old('mother_name') ?? false) is-valid @endif @enderror" value="{{ old('mother_name') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama Bapak</label>
            <input type="text" name="father.name" class="form-control @error('father_name') is-invalid
            @else @if(old('father_name') ?? false) is-valid @endif @enderror" value="{{ old('father_name') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="guardian.address" class="form-control @error('guardian_address') is-invalid
            @else @if(old('guardian_address') ?? false) is-valid @endif @enderror" value="{{ old('guardian_address') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="guardian.phone" class="form-control @error('guardian_phone') is-invalid
            @else @if(old('guardian_phone') ?? false) is-valid @endif @enderror" value="{{ old('guardian_phone') }}">
          </div>
        </div>

        <div class="row mb-4 pb-2 border-bottom">
          <div class="col-12 card-title">
            <h5>Kontak Darurat</h5>
          </div>

          <div class="col-sm-6 form-group">
            <label>Nama</label>
            <input type="text" name="emergency[name]" class="form-control @error('emergency.name') is-invalid
            @else @if(old('emergency.name') ?? false) is-valid @endif @enderror" value="{{ old('emergency.name') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Hubungan</label>
            <input type="text" name="emergency[relation]" class="form-control @error('emergency.relation') is-invalid
            @else @if(old('emergency.relation') ?? false) is-valid @endif @enderror" value="{{ old('emergency.relation') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Alamat</label>
            <input type="text" name="emergency[address]" class="form-control @error('emergency.address') is-invalid
            @else @if(old('emergency.address') ?? false) is-valid @endif @enderror" value="{{ old('emergency.address') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>No. Telepon/Hp</label>
            <input type="text" name="emergency[phone]" class="form-control @error('emergency.phone') is-invalid
            @else @if(old('emergency.phone') ?? false) is-valid @endif @enderror" value="{{ old('emergency.phone') }}">
          </div>

          <div class="col-sm-6 form-group">
            <label>Tahu Penyakit Pasien</label>
            @error('emergency.is_know')
            <span class="text-danger">Invalid</span>
            @enderror
            <div class="form-check">
              <input class="form-check-input" type="radio" name="emergency[is_know]" id="ya-tahu" value="1"
                @checked(old('emergency.is_know')=="1" )>
              <label class="form-check-label" for="ya-tahu">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="emergency[is_know]" id="tidak-tahu" value="0"
                @checked(old('emergency.is_know')=="0" )>
              <label class="form-check-label" for="tidak-tahu">
                Tidak
              </label>
            </div>
          </div>
        </div>

        <!-- Tambahkan kontainer untuk inputan pertemuan -->
        <div id="meetingContainer"></div>

        <!-- Tambah bagian "Tambah Pertemuan" -->
        <div class="row mb-4">
            <div class="col-12 card-title">
                <h5>Tambah Pertemuan</h5>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-success mb-2" id="addMeeting">Tambah Pertemuan</button>
            </div>
        </div>
        
        <!-- Tambah pertanyaan-pertanyaan untuk setiap pertemuan -->
        <div id="questionContainer" class="d-none">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <label class="meeting-number"></label>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="meeting_date">Hari/Tanggal</label>
                    <input type="date" name="meeting_date" class="form-control" id="meeting_date" required>
                </div>

                <script>
                  var today = new Date();
                  var formattedDate = today.toISOString().substr(0, 10);
                  document.getElementById('meeting_date').value = formattedDate;
              </script>

                <div class="col-sm-6 form-group">
                  <label for="status_ro">Status TB RO</label>
                  <select name="status_ro" class="form-control" id="status_ro" required onchange="toggleStatusOtherInput(this, 'status_ro_other')">
                      <option value="">Pilih Status</option>
                      <option value="1">Baru Mulai Pengobatan</option>
                      <option value="2">Tahap Awal (masih disuntik)</option>
                      <option value="3">Tahap Lanjutan</option>
                      <option value="4">Lainnya</option>
                  </select>
                  <input type="text" name="status_ro_other" class="form-control d-none" id="status_ro_other" placeholder="Masukkan jawaban lainnya">
              </div>
                <div class="col-sm-6 form-group">
                    <label for="contact_method">Kontak Melalui</label>
                    <select name="contact_method" class="form-control" id="contact_method" required>
                        <option value="">Pilih Metode Kontak</option>
                        <option value="1">Telepon/SMS/dll</option>
                        <option value="2">Kunjungan RS</option>
                        <option value="3">Kunjungan PKM</option>
                        <option value="4">Kunjungan Rumah</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="contact_reason">Alasan Kontak</label>
                    <select name="contact_reason" class="form-control" id="contact_reason" required>
                        <option value="">Pilih Alasan Kontak</option>
                        <option value="1">Belum mau memulai pengobatan</option>
                        <option value="2">Mangkir</option>
                        <option value="3">Keluhan Efek Samping Obat</option>
                        <option value="4">Putus Berobat (≥ 2 bulan)</option>
                        <option value="5">Edukasi dan motivasi</option>
                    </select>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="kie_given">KIE yang diberikan</label>
                    <input type="text" name="kie_given" class="form-control" id="kie_given">
                </div>
        
                <!-- Section Penilaian Kondisi Kesehatan -->
                <div class="col-sm-12">
                    <h5>Penilaian Kondisi Kesehatan</h5>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="berat_badan">A. Berat Badan Terakhir Ditimbang (kg)</label>
                    <input type="number" name="berat_badan" class="form-control" id="berat_badan">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="kondisi_mental">B. Kondisi Mental</label>
                    <select name="kondisi_mental" class="form-control" id="kondisi_mental">
                        <option value="">Pilih Kondisi Mental</option>
                        <option value="1">Terbuka</option>
                        <option value="2">Tertutup</option>
                        <option value="3">Semangat</option>
                        <option value="4">Putus Asa</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                  <label for="efek_samping_obat">C. Efek Samping Obat yang Timbul</label>
                  <select name="efek_samping_obat" class="form-control" id="efek_samping_obat" onchange="toggleSideEffectOtherInput(this, 'efek_samping_obat_other')">
                      <option value="">Pilih Efek Samping Obat</option>
                      <option value="1">Gangguan sal.cerna</option>
                      <option value="2">Gangguan Otot&sendi</option>
                      <option value="3">Gangguan Penglihatan</option>
                      <option value="4">Gangguan Pendengaran</option>
                      <option value="5">Gangguan Perilaku</option>
                      <option value="6">Gangguan Kejiwaan</option>
                      <option value="7">Lainnya</option>
                  </select>
                  <input type="text" name="efek_samping_obat_other" class="form-control d-none" id="efek_samping_obat_other" placeholder="Masukkan jawaban lainnya">
                  </div>      
                  <div class="col-sm-6 form-group">
                    <label for="persepsi_pasien">D. Persepsi Pasien Terhadap Efek Samping Obat yang Dihadapi</label>
                    <select name="persepsi_pasien" class="form-control" id="persepsi_pasien" onchange="togglePerceptionOtherInput(this, 'persepsi_pasien_other')">
                        <option value="">Pilih Persepsi Pasien</option>
                        <option value="1">Efek Samping Obat</option>
                        <option value="2">Malpraktek</option>
                        <option value="3">Lainnya</option>
                    </select>
                    <input type="text" name="persepsi_pasien_other" class="form-control d-none" id="persepsi_pasien_other" placeholder="Masukkan jawaban lainnya">
                </div>            
                <div class="col-sm-6 form-group">
                    <label for="penyakit_penyerta">E. Penyakit Penyerta/Lain yang Timbul</label>
                    <select name="penyakit_penyerta" class="form-control" id="penyakit_penyerta">
                        <option value="">Pilih Penyakit Penyerta</option>
                        <option value="1">Tidak Ada</option>
                        <option value="2">Ada</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                  <label for="bantuan_sosial">F. Bantuan Sosial</label>
                  <select name="bantuan_sosial" class="form-control" id="bantuan_sosial" onchange="toggleSocialAssistanceOtherInput(this, 'bantuan_sosial_other')">
                      <option value="">Pilih Bantuan Sosial</option>
                      <option value="1">Nutrisi</option>
                      <option value="2">Transportasi</option>
                      <option value="3">Lainnya</option>
                  </select>
                  <input type="text" name="bantuan_sosial_other" class="form-control d-none" id="bantuan_sosial_other" placeholder="Masukkan jawaban lainnya">
                </div>        
                <div class="col-sm-6 form-group">
                    <label for="hasil_pendampingan">G. Hasil Pendampingan</label>
                    <select name="hasil_pendampingan" class="form-control" id="hasil_pendampingan">
                        <option value="">Pilih Hasil Pendampingan</option>
                        <option value="1">Pendampingan sesuai rencana</option>
                        <option value="2">Rujuk ke fasyankes</option>
                        <option value="3">Selesai Pengobatan</option>
                    </select>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <button type="button" class="btn btn-danger btn-sm float-right" onclick="removeMeeting(1)">Hapus Pertemuan</button>
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
    if($('#tidak-kerja').is(":checked")) {
      $('#workplace').addClass('d-none');
      $('#work-address').addClass('d-none');
    }
    $('#tidak-kerja').click(function() {
      if($(this).is(":checked")) {
        $('#workplace').addClass('d-none');
        $('#work-address').addClass('d-none');
      }
    })
    $('#bekerja').click(function() {
      if($(this).is(":checked")) {
        $('#workplace').removeClass('d-none');
        $('#work-address').removeClass('d-none');
      }
    })

    $('.select2').select2({
        theme: 'bootstrap4',
        // selectOnClose: true
    });

    // Dynamic option select2
    $(".tags").select2({
        theme: 'bootstrap4',
        // selectOnClose: true,
        tags: true
    });

    var select2Id = ['#satellite', '#worker'];
    select2Id.map((id) => {
      $(id).on('select2:open', () => {
        var find = $(id).select2('data');
        if (!find[0].disabled) {
          $('.select2-search__field').val(find[0].text);
        }
      })
    })

    // Auto focus search select2
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});
</script>

<script>
  $(document).ready(function() {
      // Fungsi untuk menambahkan inputan pertemuan
      $('#addMeeting').click(function() {
          var meetingCount = $('#meetingContainer').children().length + 1;
          var meetingInput = $('#questionContainer').clone().removeClass('d-none').attr('id', 'question_' + meetingCount);
          meetingInput.find('.meeting-number').text('Pertemuan ke-' + meetingCount );
          meetingInput.find('input, select').each(function() {
              $(this).attr('name', $(this).attr('name').replace('meeting_date', 'meeting[' + meetingCount + '][date]'));
          });
          meetingInput.find('button').attr('onclick', 'removeMeeting(' + meetingCount + ')');
          $('#meetingContainer').append(meetingInput);
      });
  });
  
  function toggleStatusOtherInput(selectElement, inputId) {
      var otherInput = document.getElementById(inputId);
      if (selectElement.value === '4') {
          otherInput.classList.remove('d-none');
      } else {
          otherInput.classList.add('d-none');
          otherInput.value = ''; // Clear the input value when not selected
      }
  }

  function toggleSideEffectOtherInput(selectElement, inputId) {
      var otherInput = document.getElementById(inputId);
      if (selectElement.value === '7') {
          otherInput.classList.remove('d-none');
      } else {
          otherInput.classList.add('d-none');
          otherInput.value = ''; // Clear the input value when not selected
      }
  }

  function togglePerceptionOtherInput(selectElement, inputId) {
      var otherInput = document.getElementById(inputId);
      if (selectElement.value === '3') {
          otherInput.classList.remove('d-none');
      } else {
          otherInput.classList.add('d-none');
          otherInput.value = ''; // Clear the input value when not selected
      }
  }

  function toggleSocialAssistanceOtherInput(selectElement, inputId) {
      var otherInput = document.getElementById(inputId);
      if (selectElement.value === '3') {
          otherInput.classList.remove('d-none');
      } else {
          otherInput.classList.add('d-none');
          otherInput.value = ''; // Clear the input value when not selected
      }
  }
  
  // Fungsi untuk menghapus inputan pertemuan
  window.removeMeeting = function(meetingCount) {
      $('#question_' + meetingCount).remove();
  };

  // Validasi form saat dikirim
  $('form').submit(function() {
      var meetingDates = [];
      $('input[name^="meeting["]').each(function() {
          var date = $(this).val();
          if (meetingDates.includes(date)) {
              alert('Tanggal pertemuan harus unik.');
              return false;
          }
          meetingDates.push(date);
      });
      return true;
  });
</script>
@endsection