@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Data Profil Sekawan'S</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-warning" id="editBtn" onclick="editSekawan()">Edit</button>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <th>
                                            Profil
                                        </th>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td>
                                            <textarea name="profil" class="form-control" rows="15" style="resize: none;"
                                                disabled>{{ old('profil', $sekawans->find(1)->contents)
                    }}</textarea>
                                        </td>

                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <th>
                                            Visi Misi
                                        </th>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td>
                                            <textarea name="visimisi" class="form-control" rows="15"
                                                style="resize: none;" disabled>{{ old('visimisi', $sekawans->find(2)->contents)
                  }}</textarea>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <th>
                                            Struktur
                                        </th>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td>
                                            <img src="{{ asset('storage/'.$sekawans->find(3)->contents) }}" alt="..."
                                                class="img-preview img-fluid d-block mb-2"
                                                style="width: auto; max-height: 600px;">
                                            <input type="file" class="form-control-file" name="content" id="image"
                                                onchange="previewImg()" disabled>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-borderless border-top">
                                <tbody>
                                    <tr>
                                        <th>Media Sosial</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="d-block">Whatsapp</label>
                                            <input name="whatsapp" type="text" class="form-control"
                                                value="{{ old('whatsapp', $sekawans->find(4)->contents) }}" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="d-block">Instagram</label>
                                            <input name="instagram" type="text" class="form-control"
                                                value="{{ old('instagram', $sekawans->find(5)->contents) }}" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="d-block">Tiktok</label>
                                            <input name="tiktok" type="text" class="form-control"
                                                value="{{ old('tiktok', $sekawans->find(6)->contents) }}" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="d-block">Youtube</label>
                                            <input name="youtube" type="text" class="form-control"
                                                value="{{ old('youtube', $sekawans->find(7)->contents) }}" disabled>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="formBtn" class="d-none">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" id="cancel" onclick="cancelEdit()"
                                    class="btn btn-secondary">Batalkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>

<section class="edit-modal">
    @include('admin.sekawans.edit')
</section>
@endsection

@section('js')
<script>
    function editSekawan() {
        $('#editBtn').addClass('d-none');
        $('tr[data-widget]').attr('data-widget', '');
        $('tr.expandable-body').removeClass('d-none');

        const textarea = $('tr.expandable-body td textarea');
        $(textarea).removeClass('d-none');
        $(textarea).css('display', 'block');
        $(textarea).removeAttr('disabled');

        const imgInput = $('tr.expandable-body td input');
        $(imgInput).removeClass('d-none');
        $(imgInput).css('display', 'block');
        $(imgInput).removeAttr('disabled');

        $('tr td input').removeAttr('disabled');
        $('#formBtn').removeClass('d-none')
    }

    function cancelEdit() {
        $('#editBtn').removeClass('d-none');
        $('tr[data-widget]').attr('data-widget', 'expandable-table');

        const textarea = $('tr.expandable-body td textarea');
        $(textarea).attr('disabled', 'disabled');

        const imgInput = $('tr.expandable-body td input');
        $(imgInput).addClass('d-none');
        $(imgInput).attr('disabled', 'disabled');

        $('tr td input').attr('disabled', 'disabled');
        $('#formBtn').addClass('d-none')
    }
</script>


<script>
    function previewImg() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection