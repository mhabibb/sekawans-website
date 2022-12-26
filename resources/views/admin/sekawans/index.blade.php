@extends('layouts.admin')

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Profil Sekawan'S</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    @foreach ($sekawans as $sekawan)
                                        @if ($sekawan->id > 3)
                                            <tr>
                                                <td class="border-0">
                                                    <strong>{{ ucfirst($sekawan->element) }} 
                                                        <a role="button" class="badge badge-warning" style="font-weight: normal;" onclick="updateElement({{ $sekawan->id }}, '{{ $sekawan->element }}')">Edit</a>
                                                    </strong>
                                                    <div id="target{{ $sekawan->id }}" class="text-break">
                                                        {{ $sekawan->contents }}</div>
                                                </td>
                                            </tr>
                                        @elseif ($sekawan->id == 3)
                                            <tr data-widget="expandable-table" aria-expanded="false" class="border-bottom">
                                                <th>
                                                    <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                                                </th>
                                            </tr>
                                            <tr class="expandable-body border-bottom">
                                                <td>
                                                    <a role="button" class="mx-3 mt-3 btn btn-warning"
                                                        onclick="updateElement({{ $sekawan->id }},'{{ $sekawan->element }}')">Ganti Gambar</a>
                                                    <img id="target{{ $sekawan->id }}"
                                                        src="{{ asset('storage/' . $sekawan->contents) }}"
                                                        class="img-fluid p-3 d-block"
                                                        style="width: auto; max-height: 720px;">
                                                </td>
                                            </tr>
                                        @else
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <th>
                                                    <i class="fas fa-angle-down"></i> {{ ucfirst($sekawan->element) }}
                                                </th>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <a role="button" class="m-3 btn btn-warning" onclick="updateElement({{ $sekawan->id }},'{{ $sekawan->element }}')">Edit Data</a>
                                                    <div id="target{{ $sekawan->id }}" class="overflow-auto" style="max-height: 360px;">
                                                        {{ $sekawan->contents }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
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
        function updateElement(ids, elements) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ route('admin.sekawans.update', 'id') }}";
            id = ids;
            element = elements;
            url = url.replace('id', id);
            target = $('#target' + id);
            value = $(target).html().trim();
            console.log(value);
            if (id > 3) {
                type = 'text'
                attr = ''
            } else if (id == 3) {
                type = "file"
                attr = {
                    'accept': 'image/*'
                }
            } else {
                type = 'textarea'
                attr = {
                    'style': 'height: 360px; resize: none'
                }
            };
            swal()
        };

        async function swal() {
            const {
                value: data
            } = await Swal.fire({
                title: `Update ${element}`,
                input: type,
                inputValue: value,
                inputAttributes: attr,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Batalkan',
                allowOutsideClick: false,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Tidak boleh kosong!'
                    }
                }
            })
            if (data) {
                if (id == 3) {
                    const reader = new FileReader()
                    reader.onload = (e) => {
                        Swal.fire({
                                title: 'Konfirmasi kembali gambar',
                                imageUrl: e.target.result,
                                showCancelButton: true,
                                cancelButtonText: 'Kembali',
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    form = new FormData();
                                    form.append("content", data);
                                    ajax()
                                } else swal();
                            })
                    }
                    reader.readAsDataURL(data)
                } else {
                    form = new FormData();
                    form.append("contents", data);
                    ajax()
                }
            }
        }

        function ajax() {
            $.ajax({
                    type: 'post',
                    url: url,
                    data: form,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false
                })
                .done(function(sekawans) {
                    id == 3 ? target.attr('src', "{{ asset('storage') }}/" + sekawans.contents) : target.html(sekawans
                        .contents);
                    Swal.fire({
                        title: 'Update Berhasil!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
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
