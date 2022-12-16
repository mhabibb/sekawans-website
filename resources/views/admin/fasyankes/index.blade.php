@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Fasyankes dan PS</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive p-0" style="max-height: 340px;">
                            <table class="table table-head-fixed">
                                <thead data-toggle="collapse" role="button" data-target="#satelitList"
                                    aria-expanded="true">
                                    <tr>
                                        <th>Fasyankes Satelit</th>
                                        <th class="col-2 text-right"><i class="fas fa-angle-down"></th>
                                    </tr>
                                </thead>
                                <tbody class="collapse show" id="satelitList">
                                    @forelse ($satellites as $satellite)
                                        <tr>
                                            <td> {{ $satellite->name }} </td>
                                            <td class="d-flex">
                                                <a href="#" class="badge badge-warning"
                                                    onclick="update(this, 'satellite', {{ $satellite->id }})">Edit</a>
                                                <form class="form"
                                                    action="{{ route('admin.fasyankes.destroy', ['table' => 'satellite', 'id' => $satellite->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" id="bt{{ $satellite->id }}"
                                                        class="badge badge-danger btn">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive p-0" style="max-height: 340px;">
                            <table class="table table-head-fixed">
                                <thead data-toggle="collapse" role="button" data-target="#workerList" aria-expanded="true">
                                    <tr>
                                        <th>Patient Supporter</th>
                                        <th class="col-2 text-right"><i class="fas fa-angle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="collapse show" id="workerList">
                                    @forelse ($workers as $ps)
                                        <tr>
                                            <td> {{ $ps->name }} </td>
                                            <td class="d-flex">
                                                <a href="#" class="badge badge-warning"
                                                    onclick="update(this, 'worker', {{ $ps->id }})">Edit</a>
                                                <form class="form"
                                                    action="{{ route('admin.fasyankes.destroy', ['table' => 'workers', 'id' => $ps->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="bt{{ $ps->id }}" type="submit" 
                                                        class="btn badge badge-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Data Kosong</td>
                                        </tr>
                                    @endforelse
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        async function update(elm, table, id) {
            elm = $(elm).parent().siblings();
            const {
                value: data
            } = await Swal.fire({
                title: `Update ${elm.html().trim()}`,
                input: 'text',
                inputValue: elm.html().trim(),
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Batalkan',
                allowOutsideClick: false,
                preConfirm: (value) => {
                    return fetch(`fasyankes/${table}/${value}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Gagal: Nama ${value} sudah digunakan`
                            )
                        })
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'Tidak boleh kosong!'
                    }
                }
            })
            if (data) {
                url = "{{ route('admin.fasyankes.update', ['table', 'id']) }}"
                url = url.replace('table', table).replace('id', id)
                type = 'put'
                success = 'Berhasil Diperbarui!'
                datas = {
                    name: data
                }
                ajax(elm)
            }
        }

        $('.form').each(function() {
            $(this).submit(function(e) {
                e.preventDefault()
                url = this.action
                type = 'delete'
                datas = ''
                success = 'Berhasil Hapus!'
                elm = $(this).parents('tr')
                id = $(url.split('/')).last()[0]
                name = $('#bt' + id).parents('tr').find('td').html()
                Swal.fire({
                    title: "Yakin untuk hapus " + name + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batalkan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        ajax(elm)
                    }
                })
                // console.log(elm);
            })
        })

        function ajax(elm) {
            $.ajax({
                    type: type,
                    url: url,
                    data: datas,
                })
                .done(function(name) {
                    // console.log(name);
                    if (name != 0) {
                        Swal.fire({
                            title: success,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        type == 'put' ? elm.html(name.trim()) : elm.remove();
                    } else Swal.fire(
                        'Terjadi Kesalahan',
                        '',
                        'error'
                    )
                })
                .fail(function() {
                    Swal.fire(
                        'Terjadi Kesalahan',
                        '',
                        'error'
                    )
                });
        }
    </script>
@endsection
