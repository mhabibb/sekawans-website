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
                      <strong>{{ ucfirst($sekawan->element) }}</strong>
                      <div class="text-break">{{ $sekawan->contents }}</div>
                    </td>
                    <td class="border-0">
                      <a role="button" class="badge badge-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
                      {{-- <a role="button" class="badge badge-info" onclick="editElement({{ $sekawan }})">Edit</a> --}}
                    </td>
                  </tr>
                  @elseif ($sekawan->id == 3)
                  <tr data-widget="expandable-table" aria-expanded="false" class="border-bottom">
                    <th colspan="2">
                      <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                    </th>
                  </tr>
                  <tr class="expandable-body border-bottom">
                    <td colspan="2">
                      <img src="{{ asset('storage/'. $sekawan->contents) }}" class="img-fluid p-2 d-block"
                        style="width: auto; max-height: 720px;">
                      <a role="button" class="m-2 btn btn-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
                    </td>
                  </tr>
                  @else
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <th colspan="2">
                      <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                    </th>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="2">
                      <div class="overflow-auto" style="max-height: 360px;">{{ $sekawan->contents }}
                      </div>
                      <a role="button" class="m-2 btn btn-warning" data-toggle="modal" data-target="#sekawanEdit{{ $sekawan->id }}">Edit</a>
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
                                    <input type="file" class="form-control-file" accept="image/*" name="content" id="image" onchange="previewImg()">
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
  function editElement(sekawan) {
    id = sekawan.id;
    url = "{{ route('admin.sekawans.edit', 'id') }}";
    url = url.replace('id', id);
    $.ajax({
      type: "GET",
      url: url,
      success: function(data) {
        datas = JSON.parse(data);
        data = datas[id-1];
        console.log(data);
        $('.form-control').val(data.contents);
        $('#sekawanEdit').modal('show');
      }
    })

  }

  function updateElement(sekawan) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    url = "{{ route('admin.sekawans.update', 'id') }}";
    url = url.replace('id', sekawan.id);
    value = sekawan.contents;
    html = "";
    if (sekawan.id > 3) {
      input = "text"
      attr = ""
      imageUrl = ""
      html = `<input type="text" class="form-control @error('contents') is-invalid @enderror" name="contents" value="${sekawan.contents}">`
    } else if (sekawan.id == 3) {
      input = "file"
      attr = {'accept': 'image/*'}
      imageUrl = "{{ asset('storage/url') }}"
      imageUrl = imageUrl.replace('url', value)
      html = `<img src="" alt="..." class="img-preview img-fluid d-block mb-2">
              <input type="file" class="form-control-file" name="content" id="image" onchange="${previewImg()}">`
    } else {
      input  = "textarea"
      attr = {'style': 'resize: none; height: 360px;'};
      imageUrl = ""
      html = `<textarea class="form-control @error('contents') is-invalid @enderror" name="contents" rows="10" style="resize: none;">${sekawan.contents}</textarea>`
    }

    Swal.fire({
      input: input,
      inputValue: value,
      inputAttributes: attr,
      // imageUrl: imageUrl,
      // html: html,
      showCancelButton: true,
      confirmButtonText: 'Update',
      cancelButtonText: 'Batalkan',
      allowOutsideClick: false
    }).then((result) => {
      if(result.isConfirmed) {
        const reader = new FileReader()
        reader.onload = (e) => {
          Swal.fire({
            title: 'Your uploaded picture',
            imageUrl: e.target.result,
            imageAlt: 'The uploaded picture'
          })
        }
        reader.readAsDataURL(imageUrl)
        // $.ajax({
        //   type: "PUT",
        //   url: url,
        //   data: { "contents": value }
        // })
        // .done(function(status) {
        //     Swal.fire({
        //       title: "Update Berhasil",
        //       icon: 'success',
        //       showConfirmButton: false,
        //       timer: 2000
        //     })
        // })
        // .fail(function() {
        //     Swal.fire(
        //         'Terjadi Kesalahan',
        //         '',
        //         'error'
        //     )
        // });
      }
    })
  }

  @if ($errors->any())
    Swal.fire(
      'Terjadi Kesalahan!',
      'Update data gagal. Mohon cek kembali.',
      'error'
    )
  @endif

  function previewImg() {
    const file = document.querySelector('#image').files[0];
    const preview = document.querySelector('.img-preview');
    const oFReader = new FileReader();
    if (file) {
      oFReader.readAsDataURL(file);
    }

    oFReader.onload = function(oFREvent) {
      preview.src = oFREvent.target.result;
    };
  }
</script>
@endsection