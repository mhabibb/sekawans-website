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
                            <table id="screeningsData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>Kontak</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Kecamatan</th>
                                        <th>Tanggal Skrining</th>
                                        <th>Hasil Skrining</th>
                                        <th>Aksi</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-ygVu3x9mI5DWc9OZ3bduTcCZYonkw1KjyWs0B9l3Wlb8JNXlWCKC1gW7HPEfAyyD0zr3DNXfI+xCi13FU9VjxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" integrity="sha512-Mm2O9+6eV3tgL4RL1rKFmldmuH9IV9RfMeXjjhGRvXfItNdtqQd+6s0BCYmMFqWQf50ZD7n/T2Fddpnp5YK/WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            table = $('#screeningsData')
            bodi = $('#bodi');

            // Fungsi untuk mengambil data dari server
            function fetchData(regency) {
                $.ajax({
                    url: "#".replace('id', regency),
                    type: "GET",
                    data: regency,
                })
                .done(function(result) {
                    bodi.html('');
                    $(result).each(function(key, screening) {
                        bodi.append(`
                            <tr>
                                <td>${screening.full_name}</td>
                                <td>${screening.contact}</td>
                                <td>${screening.gender}</td>
                                <td>${screening.age}</td>
                                <td>${screening.district}</td>
                                <td>${moment(screening.screening_date).format('DD/MM/YYYY')}</td>
                                <td>${screening.is_positive ? 'Positif' : 'Negatif'}</td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>`)
                    })

                    // Inisialisasi datatable
                    initializeDataTable();
                })
                .fail(function() {
                    console.log("error");
                });
            }

            // Fungsi untuk inisialisasi datatable
            function initializeDataTable() {
                table.DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "columnDefs": [{
                        "targets": [5],
                        "type": "date"
                    }],
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: "excel",
                            title: "Data Skrining - Sekawan'S TB Jember"
                        },
                        {
                            extend: "pdf",
                            title: "Data Skrining - Sekawan'S TB Jember"
                        },
                        {
                            extend: "print",
                            title: "Data Skrining - Sekawan'S TB Jember"
                        }
                    ],
                }).buttons().container().appendTo('#screeningsData_wrapper .col-md-6:eq(0)');
            }

            // Panggil fungsi fetchData saat halaman dimuat atau ketika dropdown berubah
            fetchData($('#regency').val());
            $('#regency').change(function() {
                fetchData($(this).val());
            });
        });
    </script>
@endsection
