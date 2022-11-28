@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>{{ $title }}</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route($createRoute) }}" class="btn btn-primary card-title">Buat {{ $title }} Baru</a>
          </div>

          <div class="card-body">
            <table id="articlesData" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Judul {{ $title }}</th>
                  <th>Waktu Upload</th>
                  <th>Author</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($articles as $article)
                <tr>
                  <td><a href="{{ route($showRoute, $article) }}">{{$article->title}}</a></td>
                  <td>{{ date('d M Y, H:i', strtotime($article->updated_at)) }}</td>
                  <td>{{ $article->user->name }}</td>
                  <td>
                    <a href="{{route($editRoute , $article)}}" class="badge badge-warning mr-2">
                      <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="{{route('admin.articles.destroy', $article)}}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="badge badge-danger border-0"
                        onclick="return confirm('Yakin untuk menghapus {{ $article->title }} ?')">
                        <i class="fa-solid fa-trash-can"></i> Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>

  </div>
</section>
@endsection

@section('js')

<script>
  $(function () {
    $("#articlesData").DataTable({
      "responsive": false, 
      "lengthChange": true,
      order: [[1, 'desc']],
    });
  });
</script>

@endsection