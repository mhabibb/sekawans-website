@extends('layouts.admin')

@section('css')
    <style>
        div.dataTables_paginate ul.pagination {
            display: flex;
            flex-wrap: wrap;
        }

        .dataTables_wrapper .dt-buttons {
            float: left;
        }
    </style>
@endsection

@section('admin-content')
    <section class="content-header">
        <div class="container-fluid">
            <h1>{{ $title }}</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="d-inline-block mr-2">
                                <a href="{{ route('admin.meetings.create') }}"
                                    class="btn btn-primary card-title float-left">Tambah Pertemuan</a>
                            </div>
                            <div>
                                <select class="custom-select" name="regency" id="regency">
                                    <option value="0" selected>Seluruh Kabupaten</option>
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="meetingsData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tanggal</th>
                                        <th>Status TB RO</th>
                                        <th>Kontak Melalui</th>
                                        <th>Alasan Kontak</th>
                                        <th>KIE yang Diberikan</th>
                                        <th>Berat Badan Terakhir</th>
                                        <th>Kondisi Mental</th>
                                        <th>Efek Samping Obat</th>
                                        <th>Persepsi Pasien</th>
                                        <th>Penyakit Penyerta</th>
                                        <th>Bantuan Sosial</th>
                                        <th>Hasil Pendampingan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.1/sorting/datetime-moment.js"></script>

    <script>
        $.fn.dataTable.moment('DD/MM/YY');
        $(document).ready(function() {
            table = $('#meetingsData')
            body = $('#body')
            update(0)

            $('#regency').change(function() {
                table.DataTable().destroy();
                update($('#regency').val());
            })

            function update(regency) {
                url = "{{ route('admin.meetings.regency', 'id') }}"
                url = url.replace('id', regency)

                $.ajax({
                        url: url,
                        type: "GET",
                        data: regency,
                    })
                    .done(function(result) {
                        body.html('');
                        $(result).each(function(key, meeting) {
                            body.append(`
                                <tr>
                                    <td></td>
                                    <td>${meeting.meeting_date}</td>
                                    <td>${meeting.status_ro}</td>
                                    <td>${meeting.contact_method}</td>
                                    <td>${meeting.contact_reason}</td>
                                    <td>${meeting.kie_given}</td>
                                    <td>${meeting.berat_badan}</td>
                                    <td>${meeting.kondisi_mental}</td>
                                    <td>${meeting.efek_samping_obat}</td>
                                    <td>${meeting.persepsi_pasien}</td>
                                    <td>${meeting.penyakit_penyerta}</td>
                                    <td>${meeting.bantuan_sosial}</td>
                                    <td>${meeting.hasil_pendampingan}</td>
                                    <td><a href="{{ route('admin.meetings.edit', ['meeting' => 'id']) }}" class="btn btn-primary">Edit</a></td>
                                </tr>`)
                        })

                        table.DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "columnDefs": [{
                                    "targets": 0,
                                    searchable: false,
                                    orderable: false
                                }
                            ],
                            dom: 'Bfrtip',
                            buttons: [{
                                    extend: "excel",
                                    title: "Data Pertemuan - Sekawan'S TB Jember"
                                },
                                {
                                    extend: "pdf",
                                    title: "Data Pertemuan - Sekawan'S TB Jember"
                                },
                                {
                                    extend: "print",
                                    title: "Data Pertemuan - Sekawan'S TB Jember"
                                }
                            ],
                        }).buttons().container().appendTo('#meetingsData_wrapper .col-md-6:eq(0)');

                        table.DataTable().on('order.dt search.dt', function() {
                            let i = 1;
                            table.DataTable().cells(null, 0, {
                                search: 'applied',
                                order: 'applied'
                            }).every(function(cell) {
                                this.data(i++);
                            });
                        }).draw();
                    })
                    .fail(function() {
                        console.log("error");
                    });
            }
        });
    </script>
@endsection
