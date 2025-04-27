{{-- resources\views\web\screening-result.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <h2 class="fw-bold mb-4 text-center text-primary">Hasil Screening</h2>

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 text-center">{{ $screening['full_name'] }}</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($screening['is_positive'] == true)
                            <div class="text-center mb-4">
                                <div class="alert alert-danger py-3 mb-4">
                                    <h3 class="fw-bold mb-0">Anda diduga positif TBC</h3>
                                </div>

                                <div class="bg-light p-4 rounded-4 mb-4">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">"Tenang saja, TB dapat diobati dengan melakukan pengobatan,</p>
                                        <p>Segera pastikan status Anda dengan melakukan tes ke dokter"</p>
                                    </blockquote>
                                    <div class="mt-4 p-3 bg-white rounded-3 shadow-sm">
                                        <p class="mb-0">
                                            <i class="bi bi-whatsapp text-success me-2"></i> Ingin informasi lebih lanjut
                                            tentang TBC?
                                            <br>
                                            Temukan edukasi lengkap melalui
                                            <a href="https://wa.me/+6285141059171" target="_blank"
                                                class="btn btn-sm btn-success ms-2">
                                                <i class="bi bi-whatsapp me-1"></i> WhatsApp Bot
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-5">
                                <div class="card-header bg-primary text-white py-3">
                                    <h5 class="mb-0"><i class="bi bi-quote me-2"></i>Pengalaman Mantan Penyintas
                                        Tuberkulosis</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div id="penyintasCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row align-items-center p-4">
                                                    <div class="col-md-4 text-center mb-3 mb-md-0">
                                                        <img src="/img/penyintas/Bapak Zaini.png" alt="Achmad Zaini"
                                                            class="img-fluid rounded-circle mb-2 border-3 border-primary shadow"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                        <h5 class="mb-0">Achmad Zaini</h5>
                                                        <p class="text-muted small">Sembuh dari TBC Resust</p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="testimonial-bubble">
                                                            <p class="testimonial-text">
                                                                "Pasien TBC bisa disembuhkan dengan teratur minum obat.
                                                                Pengobatan TBC RO tidak ringan/sangat berat artinya pasien
                                                                harus semangat untuk sembuh meskipun banyak sekali Efek
                                                                samping obat yg muncul, pasien harus selalu memakai masker,
                                                                konsumsi makanan bergizi, berjemur di pagi hari, serta
                                                                selalu menjaga PHBS"
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="row align-items-center p-4">
                                                    <div class="col-md-4 text-center mb-3 mb-md-0">
                                                        <img src="/img/penyintas/Bapak Faisol.png" alt="Faisol Mansur"
                                                            class="img-fluid rounded-circle mb-2 border-3 border-primary shadow"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                        <h5 class="mb-0">Faisol Mansur</h5>
                                                        <p class="text-muted small">Sembuh dari TBC Resisten Obat</p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="testimonial-bubble">
                                                            <p class="testimonial-text">
                                                                "Segera datang ke layanan kesehatan untuk melakukan
                                                                pemeriksaan awal. Jangan sia-siakan kesempatan selama obat
                                                                tersedia di layanan kesehatan dan gratis tidak dipungut
                                                                biaya, karena semakin ditunda untuk menjalani pengobatan
                                                                akan semakin menambah kasus penularan di sekitar, terutama
                                                                kontak erat (kontak satu rumah). Dulu saya terkena TBC RO di
                                                                tahun 2014 sembuh di tahun 2016, sungguh perjuangan yang
                                                                amat sangat berat, tapi saya punya motivasi sendiri bahwa
                                                                saya pasti bisa sembuh."
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="row align-items-center p-4">
                                                    <div class="col-md-4 text-center mb-3 mb-md-0">
                                                        <img src="/img/penyintas/Bu Rahayu.png" alt="Rahayu Wilujeng"
                                                            class="img-fluid rounded-circle mb-2 border-3 border-primary shadow"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                        <h5 class="mb-0">Rahayu Wilujeng</h5>
                                                        <p class="text-muted small">Sembuh dari TBC Resisten Obat</p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="testimonial-bubble">
                                                            <p class="testimonial-text">
                                                                "Pesan saya untuk teman-teman untuk tidak menyerah dalam
                                                                menjalani pengobatan. Apapun efek samping yang dialami,
                                                                tetap semangat dan harus rutin minum obat karena itu kunci
                                                                kesembuhan."
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="row align-items-center p-4">
                                                    <div class="col-md-4 text-center mb-3 mb-md-0">
                                                        <img src="/img/penyintas/Bu Vivi.png"
                                                            alt="Yulia Vivi Kusuma Wardhani"
                                                            class="img-fluid rounded-circle mb-2  border-3 border-primary shadow"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                        <h5 class="mb-0">Yulia Vivi Kusuma W.</h5>
                                                        <p class="text-muted small">Sembuh dari TBC Resisten Obat</p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="testimonial-bubble">
                                                            <p class="testimonial-text">
                                                                "Jaga pola hidup bersih dan sehat. Periksa kesehatan secara
                                                                rutin. Bila batuk, gunakan masker. Untuk yang terduga harus
                                                                selalu semangat untuk menjalani pengobatan, bersyukur atas
                                                                sakit yang Allah beri, selalu optimis pasti bisa sembuh
                                                                dengan selalu minum obat secara teratur. Menggunakan masker
                                                                untuk melindungi keluarga dan orang sekitar."
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#penyintasCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#penyintasCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>

                                        <div class="carousel-indicators position-relative mt-2 mb-0">
                                            <button type="button" data-bs-target="#penyintasCarousel"
                                                data-bs-slide-to="0" class="active bg-primary" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#penyintasCarousel"
                                                data-bs-slide-to="1" class="bg-primary" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#penyintasCarousel"
                                                data-bs-slide-to="2" class="bg-primary" aria-label="Slide 3"></button>
                                            <button type="button" data-bs-target="#penyintasCarousel"
                                                data-bs-slide-to="3" class="bg-primary" aria-label="Slide 4"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $selectedFaskes = session('selectedFaskes');
                            @endphp

                            <input type="hidden" name="selectedFaskes" value="{{ $selectedFaskes }}">

                            <div class="text-center mb-5">
                                <a href="{{ route('download.surat.rekomendasi') }}" class="btn btn-primary btn-lg">
                                    <i class="bi bi-download me-2"></i>Download Surat Rekomendasi
                                </a>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-primary text-white py-3">
                                    <h5 class="mb-0"><i class="bi bi-hospital me-2"></i>Fasilitas Kesehatan Terdekat
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <p class="lead mb-4">Berikut adalah beberapa fasilitas kesehatan yang tersedia di
                                        kecamatan Anda:</p>

                                    <div class="form-floating mb-4">
                                        <select id="faskes-select" class="form-select"
                                            aria-label="Pilih Fasilitas Kesehatan">
                                            <option value="">Pilih Fasilitas Kesehatan</option>
                                            @foreach ($faskes as $name => $url)
                                                <option value="{{ $name }}" data-url-map="{{ $url }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="faskes-select">Fasilitas Kesehatan</label>
                                    </div>

                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                        <div id="map-container" class="position-relative">
                                            <div id="map-loading"
                                                class="position-absolute top-0 start-0 w-100 h-100 bg-white bg-opacity-75 d-flex justify-content-center align-items-center"
                                                style="z-index: 999; display: none;">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <div id="map" class="w-100" style="height: 400px;">
                                                <div
                                                    class="d-flex justify-content-center align-items-center h-100 bg-light">
                                                    <p class="text-muted">Silakan pilih fasilitas kesehatan untuk melihat
                                                        peta</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert alert-info mt-4">
                                        <p class="mb-0"><i class="bi bi-info-circle me-2"></i>Anda bisa menunjukkan
                                            hasil skrining awal ini ke fasilitas kesehatan terdekat diatas. Terima kasih!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-primary text-white py-3">
                                    <h5 class="mb-0"><i class="bi bi-file-text me-2"></i>Formulir TBC</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="rangkasurat">
                                        <div class="kop-surat mb-4 p-3 bg-light rounded-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-3 text-center mb-3 mb-md-0">
                                                    <img src="/img/logo.png" class="img-fluid" alt="Logo"
                                                        style="max-width: 120px;">
                                                </div>
                                                <div class="col-md-9 text-center text-md-start">
                                                    <h3><strong class="unique-font">SEKAWAN'S</strong> <strong
                                                            class="unique-font text-danger">TB</strong> <strong
                                                            class="unique-font">JEMBER</strong></h3>
                                                    <h5><strong>SK.MENTERI HUKUM DAN HAK ASASI MANUSIA RI</strong></h5>
                                                    <h5><strong>NOMOR: AHU-0016828.AH.01.07.TAHUN 2017</strong></h5>
                                                    <p class="mb-0">Alamat: Jl.Udang Windu No.17, Mangli-Jember</p>
                                                    <p class="mb-0">No.HP : 085732480822 Email : sekawansjember@gmail.com
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="border-2 border-dark opacity-75 mb-4">

                                        <div class="row mb-4">
                                            <div class="col-12 text-end">
                                                <p>Jember,
                                                    {{ \Carbon\Carbon::parse($screening['screening_date'])->isoFormat('LL') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <p><strong>Perihal:</strong> Rekomendasi Pemeriksaan Lanjutan Suspek TBC</p>
                                            <p><strong>Kepada:</strong> Yth. Penanggung Jawab Tuberkulosis <span
                                                    id="selected-faskes-info" class="fw-bold"></span></p>
                                        </div>

                                        <div class="mb-4">
                                            <p>Mohon pemeriksaan dan penanganan lebih lanjut pada suspek:</p>

                                            <div class="card bg-light p-3 mb-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-2"><strong>Nama:</strong>
                                                            {{ $screening['full_name'] }}</p>
                                                        <p class="mb-2"><strong>NIK:</strong> {{ $screening['nik'] }}</p>
                                                        <p class="mb-2"><strong>Umur:</strong> {{ $screening['age'] }}
                                                            Tahun</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-2"><strong>Alamat Lengkap:</strong>
                                                            {{ $screening['address'] }}</p>
                                                        <p class="mb-2"><strong>Alamat Domisi KTP:</strong>
                                                            {{ $screening['domicile_address'] }}</p>
                                                        <p class="mb-2"><strong>Jenis Kelamin:</strong>
                                                            {{ $screening['gender'] === 'male' ? 'Laki-laki' : ($screening['gender'] === 'female' ? 'Perempuan' : 'Tidak Diketahui') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <p><strong>Diagnosis:</strong> Suspek TBC dengan hasil skrining kesehatan yakni:
                                            </p>
                                        </div>

                                        <div class="mb-4">
                                            <div class="card mb-3">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">Skoring Batuk</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th style="width: 80%;">Pertanyaan</th>
                                                                <th style="width: 20%;">Jawaban</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Apakah anda mengalami batuk selama 2 minggu atau lebih?
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['cough_two_weeks'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['cough_two_weeks'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card mb-3">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">Skoring Gejala Lain</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th style="width: 80%;">Pertanyaan</th>
                                                                <th style="width: 20%;">Jawaban</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Apakah anda pernah mengalami sesak nafas dalam 2 bulan
                                                                    terakhir?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['shortness_breath'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['shortness_breath'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda pernah berkeringat saat malam hari tanpa
                                                                    berkegiatan?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['night_sweats'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['night_sweats'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda pernah mengalami demam meriang selama lebih
                                                                    dari 1 bulan?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['fever_one_month'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['fever_one_month'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-0">Skoring Faktor Risiko</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th style="width: 80%;">Pertanyaan</th>
                                                                <th style="width: 20%;">Jawaban</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Apakah anda ibu hamil?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['pregnant'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['pregnant'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda adalah lansia lebih dari 60 tahun?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['elderly'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['elderly'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda menderita diabetes melitus?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['diabetes'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['diabetes'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda merokok?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['smoking'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['smoking'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Apakah anda pernah berobat TBC dan tidak tuntas?</td>
                                                                <td>
                                                                    <span
                                                                        class="badge {{ $screening['incomplete_tb_treatment'] ? 'bg-danger' : 'bg-success' }}">
                                                                        {{ $screening['incomplete_tb_treatment'] ? 'Ya' : 'Tidak' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <span class="display-1 text-success">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                </div>
                                <h3 class="fw-bold mb-4">Anda diduga negatif TBC</h3>

                                <div class="card bg-light p-4 rounded-4 mb-4 mx-auto" style="max-width: 500px;">
                                    <a href="{{ route('infotbc') }}" class="btn btn-outline-primary btn-lg mb-4">
                                        <i class="bi bi-info-circle me-2"></i>Informasi Tentang TBC
                                    </a>

                                    <p class="mb-0">
                                        <i class="bi bi-whatsapp text-success me-2"></i> Ingin informasi lebih lanjut
                                        tentang TBC?
                                        <br>
                                        Temukan edukasi lengkap melalui
                                        <a href="https://wa.me/+6285141059171" target="_blank"
                                            class="btn btn-sm btn-success mt-2">
                                            <i class="bi bi-whatsapp me-1"></i> WhatsApp Bot
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <h2 class="fw-bold mb-4 text-center text-primary">Artikel Terkini</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4">
            @forelse ($articles as $article)
                <div class="col" style="max-width: 400px;">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $article->img) }}" class="card-img-top thumbnail"
                            alt="{{ $article->title }}" loading="lazy">
                        <div class="card-body">
                            <div class="mb-2 d-flex gap-3">
                                <div class="col-4 font-sm text-truncate">
                                    <i class="fa-solid fa-user"></i>
                                    {{ $article->user->name ?? 'Deleted User' }}
                                </div>
                                <div class="px-2 font-sm">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ date('d M Y', strtotime($article->updated_at)) }}
                                </div>
                            </div>
                            <div class="module line-clamp">
                                <h5>{{ $article->title }}</h5>
                            </div>
                            <a href="{{ route('artikel.show', $article) }}" class="link-primary text-underline">Baca
                                selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Tidak ada artikel tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4 mb-5">
            <a href="{{ route('artikel') }}" class="btn btn-outline-primary">Lihat Semua Artikel</a>
        </div>
    </section>
@endsection

@section('custom_css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Niconne&display=swap');
        @import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css');

        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f8fa;
        }

        .unique-font {
            font-family: 'Srisakdi', cursive;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .btn {
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            transform: translateY(-2px);
        }

        .form-select,
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-floating label {
            padding: 0.75rem 1rem;
        }

        .alert {
            border-radius: 8px;
        }

        .testimonial-bubble {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            position: relative;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
        }

        .testimonial-bubble:before {
            content: "" ";
     font-size: 60px;
            color: var(--primary-color);
            opacity: 0.2;
            position: absolute;
            top: -15px;
            left: 10px;
            font-family: serif;
        }

        .testimonial-text {
            position: relative;
            z-index: 1;
            margin-bottom: 0;
            font-style: italic;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(13, 110, 253, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .badge {
            font-weight: 500;
            padding: 0.5em 0.75em;
            border-radius: 6px;
        }

        .table th,
        .table td {
            padding: 0.75rem 1rem;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-accent-bg: rgba(13, 110, 253, 0.05);
        }

        .kop-surat img {
            max-width: 100%;
            height: auto;
        }

        @media only screen and (max-width: 768px) {
            .btn {
                padding: 0.4rem 1.2rem;
            }

            .card-body {
                padding: 1.25rem;
            }
        }

        @media only screen and (max-width: 576px) {
            h2 {
                font-size: 1.75rem;
            }

            .btn-lg {
                padding: 0.5rem 1.5rem;
                font-size: 1rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            var faskesSelect = document.getElementById('faskes-select');
            var mapLoading = document.getElementById('map-loading');

            faskesSelect.addEventListener('change', function() {
                var selectedFaskes = faskesSelect.value;

                document.getElementById('selected-faskes-info').textContent = selectedFaskes;

                if (selectedFaskes) {
                    mapLoading.style.display = 'flex';

                    var selectedFaskesUrl = @json($faskes)[selectedFaskes];

                    if (selectedFaskesUrl) {
                        var mapContainer = document.getElementById('map');
                        mapContainer.innerHTML = '<iframe src="' + selectedFaskesUrl +
                            '" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';

                        var iframe = mapContainer.querySelector('iframe');
                        iframe.onload = function() {
                            mapLoading.style.display = 'none';
                        };
                    } else {
                        console.error('URL peta untuk fasilitas kesehatan tidak ditemukan.');
                        mapLoading.style.display = 'none';
                    }
                }
            });

            var penyintasCarousel = new bootstrap.Carousel(document.getElementById('penyintasCarousel'), {
                interval: 5000,
                wrap: true,
                touch: true
            });

            var successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.add('fade');
                    setTimeout(function() {
                        successAlert.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
@endsection
