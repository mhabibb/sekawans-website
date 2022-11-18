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

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table">
                <tbody>

                  <tr data-widget="expandable-table" class="expand-row" aria-expanded="false">
                    <th>Profil</th>
                    <td class="col-1">
                      <a href="#" class="badge badge-warning mr-2">
                        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="col-1"><i class="right fas fa-angle-down"></i></td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="3">
                      <p>{{ $elements->find(1)->contents }}</p>
                    </td>
                  </tr>

                  <tr data-widget="expandable-table" class="expand-row" aria-expanded="false">
                    <th>Visi Misi</th>
                    <td class="col-2">
                      <a href="#" class="badge badge-warning mr-2">
                        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="col-1"><i class="right fas fa-angle-down"></i></td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="3">
                      <p>{{ $elements->find(2)->contents }}</p>
                    </td>
                  </tr>

                  <tr data-widget="expandable-table" class="expand-row" aria-expanded="false">
                    <th>Struktur</th>
                    <td class="col-2">
                      <a href="#" class="badge badge-warning mr-2">
                        <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="col-1"><i class="right fas fa-angle-down"></i></td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="3">
                      <img src="{{ $elements->find(3)->contents }}" alt="" class="img-fluid py-3 px-md-5">
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