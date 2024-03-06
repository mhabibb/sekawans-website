@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Dokumen 1 -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title" style="font-size: 24px; color: #333;">Dokumen 1</h2>
            <p class="card-text" style="font-size: 16px; color: #666;">Keterangan mengenai dokumen 1. Dokumen ini misalnya berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0" style="font-size: 16px;">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Dokumen 2 -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title" style="font-size: 24px; color: #333;">Dokumen 2</h2>
            <p class="card-text" style="font-size: 16px; color: #666;">Keterangan mengenai dokumen 2. Dokumen ini misalnya berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0" style="font-size: 16px;">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Dokumen 3 -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title" style="font-size: 24px; color: #333;">Dokumen 3</h2>
            <p class="card-text" style="font-size: 16px; color: #666;">Keterangan mengenai dokumen 1. Dokumen ini misalnya berisi informasi penting mengenai topik tertentu.</p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="btn btn-danger me-md-2 mb-2 mb-md-0" style="font-size: 16px;">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 15px; 
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
