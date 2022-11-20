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
        <label for="title" class="form-label">Judul {{ $title }}</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Tulis judul...">
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="articleImg">Gambar</label>
        <img class="img-preview img-fluid d-block mb-2">
        <input type="file" class="form-control-file" name="articleImg" id="articleImg" onchange="previewImg()">
      </div>
      <div class="form-group mb-3 col-12">
        <label for="contents">Isi konten</label>
        <textarea name="contents" id="summernote"></textarea>
      </div>
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
  $('#summernote').summernote({
    tabsize: 2,
    height: 300
  });
</script>

<script>
  function previewImg() {
    const image = document.querySelector('#articleImg');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection