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
                            @can('superAdmin')
                                <div class="mx-1 btn btn-info toggler" id="trashBtn">Lihat Sampah</div>
                            @endcan
                            <button class="mx-1 btn btn-info d-none" id="dataBtn">Tutup</button>
                        </div>

                        <div class="card-body">
                            <div id="data-table">
                                <table id="articlesData" class="table table-bordered table-striped mx-auto">
                                    <thead>
                                        <tr>
                                            <th>Judul {{ $title }}</th>
                                            <th id="time">Waktu Update</th>
                                            <th>Author</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $article->title }}</td>
                                                <td>{{ date('d M Y, H:i', strtotime($article->updated_at)) }}</td>
                                                <td>{{ $article->user->name }}</td>
                                                <td>
                                                    <a href="{{ route($showRoute, $article) }}"
                                                        class="badge badge-success mr-2">Lihat</a>
                                                    <a href="{{ route($editRoute, $article) }}"
                                                        class="badge badge-warning mr-2">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    <form action="{{ route('admin.articles.destroy', $article) }}"
                                                        method="POST" class="d-inline-block">
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
                            {{-- <table id="trashData" class="table table-striped mx-auto d-none"></table> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $(function() {
            table = $("#articlesData");
            table.DataTable({
                "responsive": true,
                "lengthChange": true,
                order: [
                    [1, 'desc']
                ],

            });
        });

        @can('superAdmin')
            $('.toggler').click(function() {
                table.DataTable().destroy();
                time = $('#time')
                if (time.html() == 'Waktu Update') {
                    time.html('Waktu Hapus')
                    url = "{{ route('admin.trashed.index') }}";
                    date = 'deleted_at';

                    table.DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        order: [
                            [1, 'desc']
                        ],
                        ajax: {
                            'url': url,
                            'type': "GET",
                            'dataSrc': 'articles'
                        },
                        columns: [{
                                data: "title"
                            },
                            {
                                data: date,
                                render: function(data) {
                                    return data.toString('dd-MM-yyyy')
                                }
                            },
                            {
                                data: "user.name"
                            },
                            {
                                targets: 0,
                                data: "id",
                                render: function(data) {
                                    return `<button id="bt` + data +
                                        `" class="badge badge-success" border-0 onclick="action('restore',` +
                                        data + `)">
                                <i class="fa-solid fa-rotate-left""></i>Restore
                                </button>`;
                                }
                            }
                        ]
                    })
                } else {
                    time.html('Waktu Update')
                    url = "{{ route('admin.articles.index') }}";
                    date = 'updated_at';

                    table.DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        order: [
                            [1, 'desc']
                        ],
                        ajax: {
                            'url': url,
                            'type': "GET",
                            'dataSrc': 'articles'
                        },
                        columns: [{
                                data: "title"
                            },
                            {
                                data: date,
                                render: function(data) {
                                    return data.toString('dd-MM-yyyy')
                                }
                            },
                            {
                                data: "user.name"
                            },
                            {
                                targets: 0,
                                data: "id",
                                render: function(data) {
                                    return `<a href="" onclick="action('show',` + data + `)" class="badge badge-success mr-2">
                                           <i class="fa-solid fa-eye"></i> Lihat</a>
                                           <a href="" onclick="action('edit'` + data + `)" class="badge badge-warning mr-2">
                                           <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                           <a href="" class="badge badge-danger border-0" onclick="action("delete",` + data + `)">
                                           <i class="fa-solid fa-trash-can"></i> Hapus</a>`
                                }
                            }
                        ]
                    })
                }
            })

            function action(action, id) {
                console.log(action);
                switch (action) {
                    case 'show':
                        break;
                        case 'edit':
                            break;
                    case 'restore':
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        url = "{{ route('admin.articles.restore', 'id') }}";
                        url = url.replace('id', id);

                        $.ajax({
                                type: "PUT",
                                url: url,
                                // dataType: 'json',
                                data: id,
                            })
                            .done(function(status) {
                                alert('Sukses');
                                table.DataTable().ajax.reload();
                            })
                            .fail(function() {
                                alert("error");
                            });
                        break;
                        case 'delete':
                            break;
                    default:
                        break;
                }
            }
        @endcan
    </script>
@endsection
