@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Tulis Pesan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form id="composeMessageForm">
                                <div class="form-group">
                                    <label for="messageText">Isi Pesan</label>
                                    <textarea class="form-control" id="messageText" name="messageText" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imageUpload">Unggah Gambar (Maksimal 20)</label>
                                    <input type="file" class="form-control-file" id="imageUpload" name="images[]" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="videoUpload">Unggah Video</label>
                                    <input type="file" class="form-control-file" id="videoUpload" name="videos[]" accept="video/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#composeMessageForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: "{{ route('admin.messages.store') }}", 
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Pesan Terkirim!',
                            text: 'Pesan telah berhasil dikirim.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#messageText').val(''); 
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                });
            });
        });
    </script>
@endsection
