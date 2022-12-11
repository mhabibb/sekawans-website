@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Buat {{ $title }} Baru</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3 col-md-6">
        <label for="title" class="form-label">Judul {{ $title }} (maksimal 128 karakter)</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid
        @else @if(old('title') ?? false) is-valid @endif @enderror" id="title" placeholder="Tulis judul..."
          value="{{ old('title') }}">
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="img">Gambar</label>
        <img class="img-preview img-fluid d-block mb-2">
        <input type="file" class="form-control-file" name="img" id="img" onchange="previewImg()">
        @error('img')
        <span class="text-danger">Invalid</span>
        @enderror
      </div>
      <div class="form-group mb-3 col-12">
        <label for="contents">Isi konten</label>
        @error('contents')
        <span class="text-danger">Invalid</span>
        @enderror
        <textarea name="contents" id="summernote">{{ old('contents') }}</textarea>
      </div>
      <input type="hidden" name="category_id" value="{{ $category }}" />
      <div class="col-12">
        <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script>
  $('#summernote').summernote(
    {
      toolbar: [
        // [groupName, [list of button]]
        ['fontname', ['fontname']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['undo', 'redo', 'fullscreen', 'help']],
      ],
      tabsize: 2,
      height: 300,
    }
  );
</script>

<script>
  function previewImg() {
    const image = document.querySelector('#img');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection