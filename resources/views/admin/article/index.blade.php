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
            <a href="{{ route($createRoute) }}" class="btn btn-primary">Buat {{ $title }} Baru</a>
            <button class="mx-1 btn btn-info" id="trashBtn">Lihat Sampah</button>
            <button class="mx-1 btn btn-info d-none" id="dataBtn">Tutup</button>
          </div>

          <div class="card-body">
            <div id="data-table">
              <table id="articlesData" class="table table-bordered table-striped mx-auto">
                <thead>
                  <tr>
                    <th>Judul {{ $title }}</th>
                    <th>Waktu Update</th>
                    <th>Author</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($articles as $article)
                  <tr>
                    <td>{{$article->title}}</td>
                    <td>{{ date('d M Y, H:i', strtotime($article->updated_at)) }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>
                      <a href="{{ route($showRoute, $article) }}" class="badge badge-success mr-2">Lihat</a>
                      <a href="{{route($editRoute , $article)}}" class="badge badge-warning mr-2">
                        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                      <form action="{{route('admin.articles.destroy', $article)}}" method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="badge badge-danger border-0"
                          onclick="return confirm('Yakin untuk menghapus {{ $article->title }} ?')">
                          <i class="fa-solid fa-trash-can"></i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <table id="trashData" class="table table-striped mx-auto d-none"></table>
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
      "responsive": true, 
      "lengthChange": true,
      order: [[1, 'desc']],
    });
  });
</script>

<script>
  $("#trashBtn").click(function() {
    $('#data-table').addClass('d-none');
    $('#dataBtn').removeClass('d-none');
    $('#trashBtn').addClass('d-none');
    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
      if (ajax.status == 200) {
        const responses = JSON.parse(ajax.responseText);
        $('#trashData').removeClass('d-none');
        showData(responses);
      } else {
        alert("Maaf, telah terjadi kesalahan.");
      }
    };
    ajax.open('GET', '{{ route('admin.articles.trash') }}');
    ajax.send();
  })

  $('#dataBtn').click(function() {
      $('#trashBtn').removeClass('d-none');
      $('#trashData').addClass('d-none');
      $('#data-table').removeClass('d-none');
      $(this).addClass('d-none');
    })

    function showData(responses) {
      let text = `<thead><tr><th colspan="3"> Data Terhapus </th></tr></thead><tbody>`
      for (let x in responses) {
        text += `<tr>
          <td>` + responses[x].title + `</td>
          <td>` + responses[x].user.name + `</td>
          <td class="d-flex"><button class="badge badge-success border-0">
            <i class="fa-solid fa-rotate-left"></i>Restore</button>
          </td></tr>`;
      }
      text += "</tbody>";
      $('#trashData').html(text);
    }
</script>

@endsection