@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Info TBC</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active">Info TBC</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="/admin/info-tbc/create" class="card-title">Tambah Informasi Baru</a>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 360px;">
            <table class="table table-head-fixed text-nowrap table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Judul</th>
                  <th>Tanggal Upload</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>183</td>
                  <td>Sejarah Tubercolosis (TBC)</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="/admin/info-tbc/1" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>134</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>494</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>832</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>982</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, consequatur?</td>
                  <td>11-7-2014</td>
                  <td>
                    <a href="#" class="badge badge-success">Lihat</a>
                    <form action="" class="d-inline-block">
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection