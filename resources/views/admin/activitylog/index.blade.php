@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
  <div class="container-fluid">
    <h1>Log Aktivitas</h1>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                @forelse ($logs as $log)
                <tr>
                  <td>{{ $log->description }}</td>
                  <td>judul</td>
                  <td>{{ date('j F Y, H:i:s', strtotime($log->updated_at)) }}</td>
                  <td>
                    <button class="btn badge badge-success border-0">Restore</button>
                  </td>
                </tr>
                @empty
                <tr>
                  <td>Log Kosong</td>
                </tr>
                @endforelse
              </table>
            </div>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection