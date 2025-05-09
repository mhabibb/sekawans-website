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

        .btn-tambah {
            background-color: #007bff;
            border-color: #007bff;
            padding: 5px 10px;
            font-size: 14px;
        }

        .btn-tambah:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-hapus {
            padding: 5px 10px;
            font-size: 14px;
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
                                        <th style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($screenings as $screening)
                                    <tr>
                                        <td><a href="{{ route('admin.screening.show', ['id' => $screening->id]) }}">{{ $screening->full_name }}</a></td>
                                        <td>{{ $screening->contact }}</td>
                                        <td>{{ $screening->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $screening->age }}</td>
                                        <td>{{ $screening->district }}</td>
                                        <td>{{ \Carbon\Carbon::parse($screening->screening_date)->format('d/m/Y') }}</td>
                                        <td>{{ $screening->is_positive ? 'Positif' : 'Negatif' }}</td>
                                        <td>
                                            <a href="{{ route('admin.patients.create') }}" class="btn btn-primary btn-tambah">Tambah</a>
                                            <button class="btn btn-danger btn-hapus btn-delete" data-id="{{ $screening->id }}">Delete</button>
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
    </section>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" integrity="sha512-Mm2O9+6eV3tgL4RL1rKFmldmuH9IV9RfMeXjjhGRvXfItNdtqQd+6s0BCYmMFqWQf50ZD7n/T2Fddpnp5YK/WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
        var table = $('#screeningsData').DataTable({
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
                    title: "Data Skrining - Sekawan'S TB Jember",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "pdf",
                    title: "Data Skrining - Sekawan'S TB Jember",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "print",
                    title: "Data Skrining - Sekawan'S TB Jember",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
            ],
        }).buttons().container().appendTo('#screeningsData_wrapper .col-md-6:eq(0)');

        // Event listener untuk tombol delete
        $('#screeningsData').on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/screening') }}/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Data telah dihapus.',
                                'success'
                            ).then(() => {
                                window.location.reload(); 
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Gagal menghapus data. Silakan coba lagi.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
    </script>
@endsection
