@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Dokumen 1 -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">SAYA IZIN GA MASUK NTAR</h2>
            <p class="card-text">Ini adalah keterangan mengenai dokumen 1. Dokumen ini berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Dokumen 2 -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">ANIESSS CURANG</h2>
            <p class="card-text">Ini adalah keterangan mengenai dokumen 2. Dokumen ini berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Dokumen 3 -->
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Judul Dokumen 3</h2>
            <p class="card-text">Ini adalah keterangan mengenai dokumen 3. Dokumen ini berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 15px; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        padding: 20px; 
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        line-height: 1.5;
    }

    .btn-danger {
        background-color: #dc3545; 
        border-color: #dc3545; 
    }

    .btn-danger:hover {
        background-color: #c82333; 
        border-color: #bd2130; 
    }
</style>
