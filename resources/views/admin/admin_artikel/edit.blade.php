@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="/admin/artikel">Artikel</a></li>
          <li class="breadcrumb-item active">Edit Artikel</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="">
      <div class="form-group mb-3 col-md-6">
        <label for="title" class="form-label">Judul artikel</label>
        <input type="text" class="form-control" id="title" placeholder="Tulis judul..."
          value="This card has supporting text below as a natural lead-in to additional content.">
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="category" class="form-label">Kategori</label>
        <select class="form-control" disabled>
          <option>Artikel</option>
        </select>
      </div>
      <div class="form-group mb-3 col-md-6">
        <label for="articleImg">Gambar</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="articleImg" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="articleImg">Choose file</label>
        </div>
      </div>
      <div class="form-group mb-3 col-12">
        <label for="content">Isi konten</label>
        <textarea class="form-control" name="content" id="content"
          style="height: 240px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, iusto distinctio dicta magnam sit incidunt ipsam iste rem esse tempora aspernatur, quam quo quisquam id! Laboriosam veritatis rerum nobis facilis dolores necessitatibus harum sed inventore numquam asperiores, veniam labore adipisci iure illo suscipit sequi doloribus magnam natus! Aspernatur, est quisquam corporis incidunt quasi inventore sunt! 
          Sequi vel ex iusto, fugit deserunt neque sit necessitatibus magnam nisi a fugiat magni perspiciatis nobis? Tempora incidunt dicta vero, voluptas reiciendis autem mollitia totam libero commodi minus expedita consequuntur neque atque eos recusandae placeat rem, ex delectus vel repellendus, fuga velit voluptate debitis! Ipsum voluptate sunt dicta quos mollitia facilis, animi atque dolores itaque debitis a. Assumenda eum eligendi consectetur cum facilis aperiam quae id vel, voluptates illo est voluptatum. Voluptas, inventore eveniet quisquam quaerat, id eius maiores fugiat deserunt dolore blanditiis itaque iste? Odio, deleniti. 
          Repellat, molestias error, autem ipsa libero earum deserunt facere repellendus adipisci consequatur delectus quis eligendi suscipit optio ullam voluptatum amet quae. Deleniti, molestias recusandae. Quas asperiores libero quae perspiciatis facere ut tempore iste maiores porro possimus debitis, perferendis rem laudantium voluptates nisi eius ab? Modi quae rem soluta, repellendus architecto accusamus. Nihil, numquam itaque nam earum et porro. </textarea>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-secondary">Batalkan</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->
@endsection