@extends('layouts.admin')

@section('content')
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
                <label for="meeting_date">Tanggal</label>
                <input type="date" name="pertemuan-meeting_date" class="form-control" id="meeting_date" required>
            </div>

            <script>
                var today = new Date();
                var formattedDate = today.toISOString().substr(0, 10);
                document.getElementById('meeting_date').value = formattedDate;
            </script>

            <div class="col-sm-6 form-group">
                <label for="status_ro">Status TB RO</label>
                <select name="pertemuan-status_ro" class="form-control" id="status_ro"
                        onchange="toggleStatusOtherInput(this, 'status_ro_other')">
                    <option value="">Pilih Status</option>
                    <option value="1">Lainnya</option>
                    <option value="Baru Mulai Pengobatan">Baru Mulai Pengobatan</option>
                    <option value="Tahap Awal (masih disuntik)">Tahap Awal (masih disuntik)</option>
                    <option value="Tahap Lanjutan">Tahap Lanjutan</option>
                </select>
                <input type="text" name="pertemuan-status_ro_other" class="form-control d-none"
                       id="status_ro_other" placeholder="Masukkan jawaban lainnya">
            </div>
            <div class="col-sm-6 form-group">
                <label for="contact_method">Kontak Melalui</label>
                <select name="pertemuan-contact_method" class="form-control" id="contact_method">
                    <option value="">Pilih Metode Kontak</option>
                    <option value="Telepon/SMS/dll">Telepon/SMS/dll</option>
                    <option value="Kunjungan RS">Kunjungan RS</option>
                    <option value="Kunjungan PKM">Kunjungan PKM</option>
                    <option value="Kunjungan Rumah">Kunjungan Rumah</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="contact_reason">Alasan Kontak</label>
                <select name="pertemuan-contact_reason" class="form-control" id="contact_reason">
                    <option value="">Pilih Alasan Kontak</option>
                    <option value="Belum mau memulai pengobatan">Belum mau memulai pengobatan</option>
                    <option value="Mangkir">Mangkir</option>
                    <option value="Keluhan Efek Samping Obat">Keluhan Efek Samping Obat</option>
                    <option value="Putus Berobat (≥ 2 bulan)">Putus Berobat (≥ 2 bulan)</option>
                    <option value="Edukasi dan motivasi">Edukasi dan motivasi</option>
                </select>
            </div>
            <div class="col-sm-12 form-group">
                <label for="kie_given">KIE yang diberikan</label>
                <input type="text" name="pertemuan-kie_given" class="form-control" id="kie_given">
            </div>

            <!-- Section Penilaian Kondisi Kesehatan -->
            <div class="col-sm-12">
                <h5>Penilaian Kondisi Kesehatan</h5>
            </div>
            <div class="col-sm-6 form-group">
                <label for="berat_badan">A. Berat Badan Terakhir Ditimbang (kg)</label>
                <input type="number" name="pertemuan-berat_badan" class="form-control" id="berat_badan">
            </div>
            <div class="col-sm-6 form-group">
                <label for="kondisi_mental">B. Kondisi Mental</label>
                <select name="pertemuan-kondisi_mental" class="form-control" id="kondisi_mental">
                    <option value="">Pilih Kondisi Mental</option>
                    <option value="Terbuka">Terbuka</option>
                    <option value="Tertutup">Tertutup</option>
                    <option value="Semangat">Semangat</option>
                    <option value="Putus Asa">Putus Asa</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="efek_samping_obat">C. Efek Samping Obat yang Timbul</label>
                <select name="pertemuan-efek_samping_obat" class="form-control" id="efek_samping_obat"
                        onchange="toggleStatusOtherInput(this, 'efek_samping_obat_other')">
                    <option value="">Pilih Efek Samping Obat</option>
                    <option value="1">Lainnya</option>
                    <option value="Gangguan sal.cerna">Gangguan sal.cerna</option>
                    <option value="Gangguan Otot&sendi">Gangguan Otot&sendi</option>
                    <option value="Gangguan Penglihatan">Gangguan Penglihatan</option>
                    <option value="Gangguan Pendengaran">Gangguan Pendengaran</option>
                    <option value="Gangguan Perilaku">Gangguan Perilaku</option>
                    <option value="Gangguan Kejiwaan">Gangguan Kejiwaan</option>
                </select>
                <input type="text" name="pertemuan-efek_samping_obat_other" class="form-control d-none"
                       id="efek_samping_obat_other" placeholder="Masukkan jawaban lainnya">
            </div>
            <div class="col-sm-6 form-group">
                <label for="persepsi_pasien">D. Persepsi Pasien Terhadap Efek Samping Obat yang
                    Dihadapi</label>
                <select name="pertemuan-persepsi_pasien" class="form-control" id="persepsi_pasien"
                        onchange="toggleStatusOtherInput(this, 'persepsi_pasien_other')">
                    <option value="">Pilih Persepsi Pasien</option>
                    <option value="1">Lainnya</option>
                    <option value="Efek Samping Obat">Efek Samping Obat</option>
                    <option value="Malpraktek">Malpraktek</option>
                </select>
                <input type="text" name="pertemuan-persepsi_pasien_other" class="form-control d-none"
                       id="persepsi_pasien_other" placeholder="Masukkan jawaban lainnya">
            </div>
            <div class="col-sm-6 form-group">
                <label for="penyakit_penyerta">E. Penyakit Penyerta/Lain yang Timbul</label>
                <select name="pertemuan-penyakit_penyerta" class="form-control" id="penyakit_penyerta">
                    <option value="">Pilih Penyakit Penyerta</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="bantuan_sosial">F. Bantuan Sosial</label>
                <select name="pertemuan-bantuan_sosial" class="form-control" id="bantuan_sosial"
                        onchange="toggleStatusOtherInput(this, 'bantuan_sosial_other')">
                    <option value="">Pilih Bantuan Sosial</option>
                    <option value="1">Lainnya</option>
                    <option value="Nutrisi">Nutrisi</option>
                    <option value="Transportasi">Transportasi</option>
                </select>
                <input type="text" name="pertemuan-bantuan_sosial_other" class="form-control d-none"
                       id="bantuan_sosial_other" placeholder="Masukkan jawaban lainnya">
            </div>
            <div class="col-sm-6 form-group">
                <label for="hasil_pendampingan">G. Hasil Pendampingan</label>
                <select name="pertemuan-hasil_pendampingan" class="form-control" id="hasil_pendampingan">
                    <option value="">Pilih Hasil Pendampingan</option>
                    <option value="Pendampingan sesuai rencana">Pendampingan sesuai rencana</option>
                    <option value="Rujuk ke fasyankes">Rujuk ke fasyankes</option>
                    <option value="Selesai Pengobatan">Selesai Pengobatan</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-danger btn-sm float-right" onclick="removeMeeting(1)">Hapus
                    Pertemuan</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addMeeting').click(function () {
                const addMeeting = $('#addMeeting');
                var meetingCount = $('#meetingContainer').children().length + 1;
                if (meetingCount >= 10) {
                    addMeeting.prop('disabled', true);
                } else {
                    addMeeting.prop('disabled', false);
                }
                var meetingInput = $('#questionContainer').clone().removeClass('d-none').attr('id',
                    'question_' + meetingCount);
                meetingInput.find('.meeting-number').text('Pertemuan ke-' + meetingCount);

                meetingInput.find('input, select').each(function () {
                    var name = $(this).attr('name').split('pertemuan-');
                    if (name.length > 1) {
                        var newName = `pertemuan[${meetingCount}][${name[1]}]`
                        $(this).attr('name', newName);
                        if ($(this).is('select')) {
                            newName = `pertemuan[${meetingCount}][${name[1]}_other]`
                            $(this).attr('onchange', 'toggleStatusOtherInput(this, "' + newName +
                                '")');
                        }
                    }
                });
                meetingInput.find('button').attr('onclick', 'removeMeeting(' + meetingCount + ')');
                $('#meetingContainer').append(meetingInput);
            });

            window.removeMeeting = function (meetingCount) {
                $('#question_' + meetingCount).remove();
                const addMeeting = $('#addMeeting');
                if (meetingCount <= 10) {
                    addMeeting.prop('disabled', false);
                } else {
                    addMeeting.prop('disabled', true);
                }
            };

            window.toggleStatusOtherInput = function (selectElement, otherInputName) {
                var otherInput = $('input[name="' + otherInputName + '"]');
                if (selectElement.value === '1') {
                    otherInput.removeClass('d-none');
                } else {
                    otherInput.addClass('d-none');
                }
            };
        });
    </script>
@endpush
