@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Informasi Baru</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="/admin/artikel">Info TBC</a></li>
          <li class="breadcrumb-item active">Tambah Info</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <form class="col col-md-6">
      <div class="form-group mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" placeholder="Tulis judul...">
      </div>
      <div class="form-group mb-3">
        <label for="category" class="form-label">Kategori</label>
        <select class="form-control" disabled>
          <option>Info TBC</option>
        </select>
      </div>
      <div class="form-group mb-3">
        <label for="articleImg">Gambar</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="articleImg" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="articleImg">Choose file</label>
        </div>
      </div>
      <div class="mb-3">
        <label for="content">Isi konten</label>
        <textarea class="form-control" name="content" id="content" style="height: 240px"></textarea>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection