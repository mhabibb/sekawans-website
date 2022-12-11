@extends('layouts.admin')

@section('admin-content')
<section class="container py-5 col-lg-10">
  <div class="article-header d-flex flex-column align-items-center mb-2">
    <a href="{{ route($indexRoute) }}" class="btn text-muted mb-3">
      <i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <div class="d-flex mb-3">
      <a href="{{route($editRoute , $article)}}" class="btn btn-warning btn-sm mx-2">
        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
      <button class="btn btn-danger btn-sm mx-2" onclick="deleteArticle({{ $article->id }})">
        <i class="fa-solid fa-trash-can"></i> Hapus</button>
      {{-- <form action="{{route('admin.articles.destroy', $article)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mx-2">
          <i class="fa-solid fa-trash-can"></i> Hapus</button>
      </form> --}}
    </div>
    <div class="article-title">
      <h3 class="fw-bold text-center"> {{ $article->title }} </h3>
    </div>
  </div>
  <div class="d-flex justify-content-center mb-3 text-muted">
    <div class="mr-5">
      <i class="fa-solid fa-user"></i>
      <span class="ml-1">{{ $article->user->name ?? 'Deleted User' }}</span>
    </div>
    <div>
      <i class="fa-solid fa-calendar-days"></i>
      <span class="ml-1">{{ date('d M Y', strtotime($article->updated_at)) }}</span>
    </div>
  </div>
  <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
    <figure class="figure">
      @if ($article->img)
      <img src="{{ asset('storage/'.$article->img) }}" class="figure-img img-fluid rounded" style="max-height: 600px"
        alt="...">
      @endif
      {{-- <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption> --}}
    </figure>
    <div class="body">
      {!! $article->contents !!}
    </div>
  </article>
</section>
@endsection

@section('js')
    <script>
      function deleteArticle(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        path = window.location.pathname.split('/')[2];
        url = "{{route('admin.articles.destroy', 'id')}}";
        url = url.replace('articles', path).replace('id', id);
        index = "{{ route('admin.articles.index') }}";
        index = index.replace('articles', path);
        Swal.fire({
          title: 'Yakin Untuk Menghapus?',
          text: "Data akan dibuang ke sampah",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batalkan',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: url,
                data: id,
            })
            .done(function(status) {
                Swal.fire({
                    title: 'Terhapus',
                    text: 'Data telah dibuang ke sampah',
                    icon: 'success',
                    showConfirmButton: false
                });
                setTimeout(function() {
                    window.location.href = index;
                }, 1500);
            })
            .fail(function() {
                Swal.fire(
                    'Terjadi Kesalahan',
                    '',
                    'error'
                )
            });
          }
        })
      }
    </script>
@endsection