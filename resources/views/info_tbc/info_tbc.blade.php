@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <section id="hero">
        <div class="container col-xxl-8 py-5 border-bottom">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col col-lg-6 mx-auto">
                    <img src="https://picsum.photos/600/400" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        width="600" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Informasi TBC</h1>
                    <p class="lead">Apa itu TBC? Bagaimana cara penularannya?
                        Apa saja yang harus kita lakukan agar tidak terkena TBC?
                        Yuk simak informasi berikut ini!</p>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 ">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col col-lg-4 mx-auto">
                    <img src="https://picsum.photos/600/400" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        width="300" height="200" loading="lazy">
                </div>
                <div class="col-lg-8">
                    <h3 class=" fw-bold mb-3">Sejarah Tubercolosis (TBC)</h3>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Eu, sed luctus viverra nibh suspendisse est. Nisl diam eu aliquet gravida et felis aenean.</p>
                    <a href="{{ route('single_infotbc') }}" class="btn btn-secondary btn-lg px-4 ">Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col col-lg-4 mx-auto">
                    <img src="https://picsum.photos/600/400" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        width="300" height="200" loading="lazy">
                </div>
                <div class="col-lg-8">
                    <h3 class=" fw-bold mb-3">Pengobatan Tubercolosis (TBC)</h3>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap</p>
                    <a href="{{ route('struktur') }}" class="btn btn-secondary btn-lg px-4 ">Selengkapnya</a>
                </div>
            </div>
        </div>

    </section>
@endsection
