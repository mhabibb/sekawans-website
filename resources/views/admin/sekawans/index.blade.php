@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Data Profil Sekawan'S</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <a href="#" class="btn btn-warning card-title">Edit</a>
          </div>
          <div class="card-body">
            <div class="row row-cols-1">
              <div class="col border-bottom pb-3">
                <h5 class="font-weight-bold">Profil</h5>
                <p class="text-justify overflow-auto" style="max-height: 200px;">{{ $elements->find(1)->contents }}</p>
              </div>
              <div class="col border-bottom py-3">
                <h5 class="font-weight-bold">Visi Misi</h5>
                <p class="text-justify overflow-auto" style="max-height: 200px;">{{ $elements->find(2)->contents }}</p>
              </div>
              <div class="col border-bottom py-3">
                <h5 class="font-weight-bold">Struktur</h5>
                <img src="{{ $elements->find(3)->contents }}" class="img-fluid py-1"
                  style="widows: auto; max-height: 600px;">
              </div>
            </div>
            <div class="row">
              <div class="col border-bottom pt-3">
                <h5 class="font-weight-bold">Media Sosial</h5>
                <div class="row form-group">
                  <strong class="col-sm-2">Whatsapp</strong>
                  <div class="col">{{ $elements->find(5)->contents }}</div>
                </div>
                <div class="row form-group">
                  <strong class="col-sm-2">Instagram</strong>
                  <div class="col">{{ $elements->find(6)->contents }}</div>
                </div>
                <div class="row form-group">
                  <strong class="col-sm-2">Tiktok</strong>
                  <div class="col">{{ $elements->find(7)->contents }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  let expand = document.querySelectorAll("tr.expand-row");

expand.forEach((ex) => {
    let angel = ex.querySelector("td>i");
  
    ex.addEventListener('click', () => {
      angel.classList.toggle("fa-angle-up");
    })
});

</script>
@endsection