@extends('layouts.app')

@section('content')
    <section class="container py-5 d-flex flex-column gap-4 align-items-center">
        <h1 class="fw-bold text-primary">Kegiatan Sekawan'S TB Jember</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="card border h-100">
                    <img src="https://picsum.photos/400/400" class="card-img-top thumbnail" alt="card-image">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>Pelaksanaan Forum Group Discussion (FGD) di Rumah Sakit Paru</h5>
                        </div>
                        <a href="/single_kegiatan" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border h-100">
                    <img src="https://picsum.photos/600/400" class="card-img-top thumbnail" alt="card-image">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>This card has supporting text below as a natural lead-in to additional content.</h5>
                        </div>
                        <a href="#" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/300/400" class="card-img-top thumbnail" alt="...">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>This is a wider card with supporting text below as a natural lead-in to additional content.
                                This card has
                                even longer content than the first to show that equal height action.</h5>
                        </div>
                        <a href="#" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/400/600" class="card-img-top thumbnail" alt="...">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>This card has supporting text below as a natural lead-in to additional content.</h5>
                        </div>
                        <a href="#" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/400/600" class="card-img-top thumbnail" alt="...">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>This is a wider card with supporting text below as a natural lead-in to additional content.
                                This card has
                                even longer content than the first to show that equal height action.</h5>
                        </div>
                        <a href="#" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/400/600" class="card-img-top thumbnail" alt="...">
                    <div class="card-body">
                        <div class="mb-1 d-flex gap-3">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <small class="px-1">Author</small>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <small class="px-1">02-11-2022</small>
                            </div>
                        </div>
                        <div class="module line-clamp">
                            <h5>This card has supporting text below as a natural lead-in to additional content.</h5>
                        </div>
                        <a href="#" class="link-primary text-underline">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
@endsection
