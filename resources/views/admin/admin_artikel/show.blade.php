@extends('layouts.admin')

@section('admin-content')
<section class="container p-3">
  <div class="article-header d-flex flex-column align-items-center gap-3 mb-2">
    <button class="link-secondary btn" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
    <h3 class="fw-bold text-center">This card has supporting text below as a natural lead-in to additional content.</h3>
  </div>
  <div class="d-flex justify-content-center mb-3 text-muted">
    <div class="mr-5">
      <i class="fa-solid fa-user"></i>
      <span class="ml-1">Author</span>
    </div>
    <div>
      <i class="fa-solid fa-calendar-days"></i>
      <span class="ml-1">02-11-2022</span>
    </div>
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
@endsection