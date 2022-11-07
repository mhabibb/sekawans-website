@extends('layouts.app')

@section('content')
    <section class="container py-5"> {{-- profil organisasi --}}
      <div class="article-header  mb-3">
        <h3 class="fw-bold text-center">Profil Sekawan'S TB Jember</h3>
      </div>
      <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
        <figure class="figure">
          <img src="https://picsum.photos/854/480" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
          <figcaption class="figure-caption text-center">Sumber : A caption for the above image.</figcaption>
        </figure>
        <div class="body">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, iusto distinctio dicta magnam sit incidunt ipsam iste rem esse tempora aspernatur, quam quo quisquam id! Laboriosam veritatis rerum nobis facilis dolores necessitatibus harum sed inventore numquam asperiores, veniam labore adipisci iure illo suscipit sequi doloribus magnam natus! Aspernatur, est quisquam corporis incidunt quasi inventore sunt! </p>
          <p>Sequi vel ex iusto, fugit deserunt neque sit necessitatibus magnam nisi a fugiat magni perspiciatis nobis? Tempora incidunt dicta vero, voluptas reiciendis autem mollitia totam libero commodi minus expedita consequuntur neque atque eos recusandae placeat rem, ex delectus vel repellendus, fuga velit voluptate debitis! Ipsum voluptate sunt dicta quos mollitia facilis, animi atque dolores itaque debitis a. Assumenda eum eligendi consectetur cum facilis aperiam quae id vel, voluptates illo est voluptatum. Voluptas, inventore eveniet quisquam quaerat, id eius maiores fugiat deserunt dolore blanditiis itaque iste? Odio, deleniti. </p>
          <p>Repellat, molestias error, autem ipsa libero earum deserunt facere repellendus adipisci consequatur delectus quis eligendi suscipit optio ullam voluptatum amet quae. Deleniti, molestias recusandae. Quas asperiores libero quae perspiciatis facere ut tempore iste maiores porro possimus debitis, perferendis rem laudantium voluptates nisi eius ab? Modi quae rem soluta, repellendus architecto accusamus. Nihil, numquam itaque nam earum et porro.</p>
        </div>
      </article>
    </section>

    <section class="container py-5"> {{-- visi misi --}}
      <div class="article-header mb-3">
        <h3 class="fw-bold text-center">Visi Misi</h3>
      </div>
      <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
        <div class="body">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, iusto distinctio dicta magnam sit incidunt ipsam iste rem esse tempora aspernatur, quam quo quisquam id! Laboriosam veritatis rerum nobis facilis dolores necessitatibus harum sed inventore numquam asperiores, veniam labore adipisci iure illo suscipit sequi doloribus magnam natus! Aspernatur, est quisquam corporis incidunt quasi inventore sunt! </p>
          <p>Sequi vel ex iusto, fugit deserunt neque sit necessitatibus magnam nisi a fugiat magni perspiciatis nobis? Tempora incidunt dicta vero, voluptas reiciendis autem mollitia totam libero commodi minus expedita consequuntur neque atque eos recusandae placeat rem, ex delectus vel repellendus, fuga velit voluptate debitis! Ipsum voluptate sunt dicta quos mollitia facilis, animi atque dolores itaque debitis a. Assumenda eum eligendi consectetur cum facilis aperiam quae id vel, voluptates illo est voluptatum. Voluptas, inventore eveniet quisquam quaerat, id eius maiores fugiat deserunt dolore blanditiis itaque iste? Odio, deleniti. </p>
          <p>Repellat, molestias error, autem ipsa libero earum deserunt facere repellendus adipisci consequatur delectus quis eligendi suscipit optio ullam voluptatum amet quae. Deleniti, molestias recusandae. Quas asperiores libero quae perspiciatis facere ut tempore iste maiores porro possimus debitis, perferendis rem laudantium voluptates nisi eius ab? Modi quae rem soluta, repellendus architecto accusamus. Nihil, numquam itaque nam earum et porro.</p>
        </div>
      </article>
    </section>

    <section class="container py-5"> {{-- profil organisasi --}}
      <div class="article-header  mb-3">
        <h3 class="fw-bold text-center">Struktur Organisasi</h3>
      </div>
      <article class="d-flex flex-column align-items-center justify-content-center border-top pt-4">
        <figure class="figure">
          <img src="https://picsum.photos/854/480" class="figure-img img-fluid rounded" style="max-height: 600px" alt="...">
          
        </figure>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a href="{{route('struktur')}}" class="btn btn-secondary btn-lg px-4 ">Selengkapnya</a>
        </div>
      </article>
    </section>
@endsection