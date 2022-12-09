@extends('layouts.admin')

@section('css')
    <style>
        div.dataTables_paginate ul.pagination {
            display: flex;
            flex-wrap: wrap;
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
                                <a href="{{ route('admin.patients.create') }}"
                                    class="btn btn-primary card-title float-left">Input</a>
                            </div>
                            <div>
                                <select class="form-control" name="regency" id="regency">
                                    <option value="0" selected>Seluruh Kabupaten</option>
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->id }}">{{ str($regency->name)->title() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="patientsData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Registrasi</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kecamatan</th>
                                        <th>Mulai Berobat</th>
                                        <th>PS</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="bodi">
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
            table = $('#patientsData')
            bodi = $('#bodi')
            update(0)

            $('#regency').change(function() {
                table.DataTable().destroy();
                update($('#regency').val());
            })

            function update(regency) {
                url = "{{ route('admin.patients.regency', 'id') }}"
                url = url.replace('id', regency)

                $.ajax({
                        url: url,
                        type: "GET",
                        data: regency,
                    })
                    .done(function(result) {
                        bodi.html('');
                        $(result).each(function(key, patient) {
                            bodi.append(`
                                    <tr>
                                        <td>` + patient.no_regis + `</td>
                                        <td><a href="patients/` + patient.id + `">` + patient.patient.name + `</a></td>
                                        <td>` + patient.patient.district.name + `</td>
                                        <td>` + moment(patient.patient.start_treatment).format('D MMMM YYYY') + `</td>
                                        <td>` + patient.worker.name + `</td>
                                        <td>` + patient.patient_status.status + `</td>
                                    </tr>`)
                        })

                        table.DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "columnDefs": [{
                                "targets": 3,
                                "type": "date"
                            }],
                            "buttons": ["csv", "excel", "pdf", "print"],
                            order: [
                                [3, 'desc']
                            ],
                        }).buttons().container().appendTo('#patientsData_wrapper .col-md-6:eq(0)');
                    })
                    .fail(function() {
                        console.log("error");
                    });
            }
        });
    </script>
@endsection
