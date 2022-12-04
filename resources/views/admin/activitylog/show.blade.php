@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Log Data</h1>
  </div>
</section>

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if ($log_name == "article")
          Artikel
        @elseif ($log_name == "about")
          Tentang
        @else
          Pasien
        @endif
      </div>
    </div>
  </div>
</section>
@endsection