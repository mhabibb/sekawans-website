@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Buat Artikel Baru</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3 col-md-6">
        <label for="title" class="form-label">Judul artikel</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Tulis judul...">
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="category" class="form-label">Kategori</label>
        <select name="category_id" class="form-control" disabled>
          <option value="{{ $category }}">Artikel</option>
        </select>
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
        <textarea class="form-control" name="contents" id="contents" style="height: 240px"></textarea>
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