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
          <div class="card-body">
            <table class="table table-hover">
              <tbody>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <th>
                    Profil
                  </th>
                  <td class="col-1">
                    <a href="#" class="badge badge-warning" data-toggle="modal"
                      data-target="#sekawanEdit{{ $sekawans->find(1)->id }}">Edit</a>
                  </td>
                </tr>
                <tr class="expandable-body">
                  <td colspan="2">
                    <p class="text-justify overflow-auto" style="max-height: 360px;">{{ $sekawans->find(1)->contents }}
                    </p>
                  </td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <th>
                    Visi Misi
                  </th>
                  <td class="col-1">
                    <a href="#" class="badge badge-warning" data-toggle="modal"
                      data-target="#sekawanEdit{{ $sekawans->find(2)->id }}">Edit</a>
                  </td>
                </tr>
                <tr class="expandable-body">
                  <td colspan="2">
                    <p class="text-justify overflow-auto" style="max-height: 360px;">{{ $sekawans->find(2)->contents }}
                    </p>
                  </td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <th>
                    Struktur
                  </th>
                  <td class="col-1">
                    <a href="#" class="badge badge-warning" data-toggle="modal"
                      data-target="#sekawanEdit{{ $sekawans->find(3)->id }}">Edit</a>
                  </td>
                </tr>
                <tr class="expandable-body">
                  <td colspan="2">
                    <img src="{{ $sekawans->find(3)->contents }}" class="img-fluid p-2"
                      style="width: auto; max-height: 600px;">
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="table-responsive border-top">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th>Media Sosial</th>
                    <td class="col-1">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong class="d-block">Whatsapp</strong>
                      {{ $sekawans->find(4)->contents }}
                    </td>
                    <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#sekawanEdit{{ $sekawans->find(4)->id }}">Edit</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong class="d-block">Instagram</strong>
                      {{ $sekawans->find(5)->contents }}
                    </td>
                    <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#sekawanEdit{{ $sekawans->find(5)->id }}">Edit</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong class="d-block">Tiktok</strong>
                      {{ $sekawans->find(6)->contents }}
                    </td>
                    <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#sekawanEdit{{ $sekawans->find(6)->id }}">Edit</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <strong class="d-block">Youtube</strong>
                      {{ $sekawans->find(7)->contents }}
                    </td>
                    <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#sekawanEdit{{ $sekawans->find(7)->id }}">Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
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
  function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.src = "";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection