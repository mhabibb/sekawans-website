@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Data Fasyankes dan PS</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2">
      <div class="col">
        <div class="card">
          <div class="card-body table-responsive p-0" style="max-height: 340px;">
            <table class="table table-head-fixed">
              <thead data-toggle="collapse" role="button" data-target="#satelitList" aria-expanded="true">
                <tr>
                  <th>Fasyankes Satelit</th>
                  <th class="col-2"><i class="fas fa-angle-down"></th>
                </tr>
              </thead>
              <tbody class="collapse show" id="satelitList">
                @forelse ($satelites as $satelite)
                <tr>
                  <td> {{ $satelite->name }} </td>
                  <td>
                    {{-- <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editSatelite{{ $satelite->id }}">Edit</a> --}}
                    <form action="{{ route('admin.fasyankes.destroy', ['table'=> 'satelite', 'id' => $satelite->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                    </form>
                  </td>
                  {{-- @include('admin.fasyankes.edit-satelit') --}}
                </tr>
                @empty
                <tr>
                  <td>Data Kosong</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body table-responsive p-0" style="max-height: 340px;">
            <table class="table table-head-fixed">
              <thead data-toggle="collapse" role="button" data-target="#workerList" aria-expanded="true">
                <tr>
                  <th>Patient Supporter</th>
                  <th class="col-2"><i class="fas fa-angle-down"></i></th>
                </tr>
              </thead>
              <tbody class="collapse show" id="workerList">
                @forelse ($workers as $ps)
                <tr>
                  @if ($ps->is_active == 1)
                  <td> {{ $ps->name }} </td>
                  @else
                  <td class="text-muted"> {{ $ps->name }} </td>
                  @endif
                  <td>
                    {{-- <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editPS{{ $ps->id }}">Edit</a> --}}
                    <form action="{{ route('admin.fasyankes.destroy', ['table'=> 'workers', 'id' => $ps->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn badge badge-danger">Hapus</button>
                    </form>
                  </td>
                  {{-- @include('admin.fasyankes.edit-ps') --}}
                </tr>
                @empty
                <tr>
                  <td>Data Kosong</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection