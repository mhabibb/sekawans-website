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
            <table class="table">
              <tbody>
                @foreach ($sekawans as $sekawan)

                  @if ($sekawan->id > 3)
                  <tr>
                    <td class="border-0">
                      <strong class="d-block">{{ ucfirst($sekawan->element) }}</strong>
                      <div>{{ $sekawan->contents }}</div>
                    </td>
                    <td class="border-0">
                      <a role="button" class="badge badge-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
                      {{-- <a role="button" class="badge badge-warning" onclick="showModal({{ $sekawan->id }})">Edit</a> --}}
                    </td>
                  </tr>
                  @elseif ($sekawan->id == 3)
                  <tr data-widget="expandable-table" aria-expanded="false" class="border-bottom">
                    <th>
                      <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                    </th>
                    <td class="col-1">
                      <a role="button" class="badge badge-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
                      {{-- <a role="button" class="badge badge-warning" onclick="showModal({{ $sekawan->id }})">Edit</a> --}}
                    </td>
                  </tr>
                  <tr class="expandable-body border-bottom">
                    <td colspan="2">
                      <img src="{{ asset('storage/'. $sekawan->contents) }}" class="img-fluid p-2"
                        style="width: auto; max-height: 720px;">
                    </td>
                  </tr>
                  @else
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <th>
                      <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                    </th>
                    <td class="col-1">
                      <a role="button" class="badge badge-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
                      {{-- <a role="button" class="badge badge-warning" onclick="showModal({{ $sekawan->id }})">Edit</a> --}}
                    </td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="2">
                      <p class="overflow-auto" style="max-height: 360px;">{{ $sekawan->contents }}
                      </p>
                    </td>
                  </tr>
                  @endif
                
                  <form action="{{ route('admin.sekawans.update', $sekawan ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal fade" id="sekawanEdit{{ $sekawan->id }}" data-backdrop="static" data-keyboard="false"
                        tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if ($sekawan->id > 3 )
                                    <input type="text" class="form-control @error('contents') is-invalid @enderror" name="contents"
                                        value="{{ $sekawan->contents }}">
                                    @elseif ($sekawan->id == 3)
                                    <img src="{{ asset('storage/'.$sekawan->contents) }}" alt="..."
                                        class="img-preview img-fluid d-block mb-2">
                                    <input type="file" class="form-control-file" name="content" id="image" onchange="previewImg()">
                                    @else
                                    <textarea type="text" class="form-control @error('contents') is-invalid @enderror" name="contents"
                                        rows="10" style="resize: none;">{{ $sekawan->contents }}</textarea>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" onclick="reset()"
                                        data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
{{-- 
<section class="edit-modal">
  @include('admin.sekawans.edit')
</section> --}}
@endsection

@section('js')
<script>
  @if ($errors->any())
    Swal.fire(
      'Terjadi kesalahan',
      'Mohon dicek kembali',
      'error'
    )
  @endif

  function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  };
</script>
@endsection