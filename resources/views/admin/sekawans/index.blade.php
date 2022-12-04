@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Data Profil Sekawan'S</h1>
    @error('contents')
    <p class="text-danger">Gagal Update</p>
    @enderror
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
                    <p class="overflow-auto" style="max-height: 360px;">{{ $sekawans->find(1)->contents }}
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
                    <p class="overflow-auto" style="max-height: 360px;">{{ $sekawans->find(2)->contents }}
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
                    <img src="{{ asset('storage/'. $sekawans->find(3)->contents) }}" class="img-fluid p-2"
                      style="width: auto; max-height: 720px;">
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
                  @foreach ($sekawans as $social)
                    @if ($social->id > 3)
                    <tr>
                      <td>
                        <strong class="d-block">{{ ucfirst($social->element) }}</strong>
                        <div>{{ $social->contents }}</div>
                      </td>
                      <td>
                        <a href="#" class="badge badge-warning" data-toggle="modal"
                          data-target="#sekawanEdit{{ $social->id }}">Edit</a>
                      </td>
                    </tr>
                    @endif
                  @endforeach
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

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection