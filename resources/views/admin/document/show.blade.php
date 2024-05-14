@extends('layouts.admin')

@section('admin-content')
<section class="container py-5 col-lg-10">
  <div class="article-header d-flex flex-column align-items-center mb-2">
    <a href="{{ route('admin.documents.index') }}" class="btn text-muted mb-3">
      <i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <div class="d-flex mb-3">
      <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-warning btn-sm mx-2">
        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
      <button class="btn btn-danger btn-sm mx-2" onclick="deleteDocument({{ $document->id }})">
        <i class="fa-solid fa-trash-can"></i> Hapus</button>
    </div>
    <div class="article-title">
      <h3 class="fw-bold text-center"> {{ $document->judul }} </h3>
    </div>
  </div>
  <div class="d-flex justify-content-center mb-3 text-muted">
    <div class="mr-5">
      <i class="fa-solid fa-user"></i>
      <span class="ml-1">{{ $document->user->name ?? 'Sekawan TB Jember' }}</span>
    </div>
    <div>
      <i class="fa-solid fa-calendar-days"></i>
      <span class="ml-1">{{ date('d M Y', strtotime($document->updated_at)) }}</span>
    </div>
  </div>
  <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
    <div class="body">
      
      {{-- Kategori Dokumen --}}
      {{-- <p><strong>Kategori:</strong> {{ $document->kategori }}</p> --}}
      
      <p><strong>Deskripsi:</strong> {{ $document->deskripsi }}</p>
      <p><strong>File:</strong> <a href="{{ asset('storage/'.$document->file_path) }}" target="_blank">Lihat/Dowload</a></p>
    </div>
  </article>
</section>
@endsection

@section('js')
<script>
  function deleteDocument(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            url: "{{ route('admin.documents.destroy', $document->id) }}",
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
                window.location.href = "{{ route('admin.documents.index') }}";
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
