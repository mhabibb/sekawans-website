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
                            <a href="{{ route('documents.create') }}" class="mb-2 mr-2 btn btn-primary">Buat Dokumen
                                Baru</a>
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="documentsData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Judul Dokumen</th>
                                            <th class="text-nowrap">Kategori</th>
                                            <th class="text-nowrap">Deskripsi</th>
                                            <th class="text-nowrap">Waktu Update</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->judul }}</td>
                                                <td>{{ $document->kategori }}</td>
                                                <td>{{ $document->deskripsi }}</td>
                                                <td>{{ $document->updated_at->format('d M Y, H:i:s') }}</td>
                                                <td>
                                                    <a href="{{ route('documents.show', $document->id) }}"
                                                        class="btn btn-primary">Lihat</a>
                                                    <a href="{{ route('documents.edit', $document->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('documents.destroy', $document->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Hapus</button>
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

        </div>
    </section>
@endsection
