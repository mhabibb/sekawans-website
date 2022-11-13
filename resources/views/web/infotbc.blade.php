@extends('layouts.app')

@section('content')
<section>
    <div class="bg-primary text-light py-5">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col col-lg-6 mx-auto">
                    <img src="https://picsum.photos/600/400" class="d-block mx-auto img-fluid" alt="..." width="600"
                        height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">Informasi TBC</h1>
                    <p class="lead">Apa itu TBC? Bagaimana cara penularannya?
                        Apa saja yang harus kita lakukan agar tidak terkena TBC?
                        Yuk simak informasi berikut ini!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @foreach ($infos as $info)
        <div class="row flex-lg-row align-items-center g-5 py-5 border-bottom">
            <div class="col col-md-6 col-lg-4 mx-auto">
                <img src="{{$info->img}}" class="d-block mx-lg-auto img-fluid" alt="..." width="300" height="200"
                    loading="lazy">
            </div>
            <div class="col-md-6 col-lg-8">
                <h3 class=" fw-bold mb-3">{{$info->title}}</h3>
                {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Eu, sed luctus viverra nibh suspendisse est. Nisl diam eu aliquet gravida et felis aenean.</p> --}}
                <a href="{{ route('single_infotbc', $info) }}" class="btn btn-secondary px-4">Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection