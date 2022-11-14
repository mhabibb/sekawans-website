@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Edit {{ $title }}</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-3 col-md-6">
        <label for="title" class="form-label">Judul {{ $title }}</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Tulis judul..."
          value="{{$article->title}}">
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="articleImg">Gambar</label>
        <div class="custom-file">
          <input type="file" name="img" class="custom-file-input" id="articleImg"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="articleImg">Choose file</label>
        </div>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="content">Isi konten</label>
        <textarea id="summernote">{{ $article->contents }}</textarea>
      </div>
      <div class="col-12">
        <button type="reset" onclick="history.back()" class="btn btn-secondary">Batalkan</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
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
@endsection