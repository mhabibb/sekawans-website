@extends('layouts.admin')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Edit Data Pertemuan</h1>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid pb-5">
    <form action="{{ route('admin.meetings.update', $detail) }}" method="POST" enctype="multipart/form-data"
      class="card">
      @method('PUT')
      @csrf
      <div class="card-body">
        <!-- Tambahkan field yang sesuai dengan data pertemuan -->
        <!-- Contoh: -->
        <div class="form-group">
          <label>Tanggal Pertemuan</label>
          <input type="date" name="meeting_date" class="form-control"
            value="{{ old('meeting_date', $detail->meeting_date) }}">
        </div>
        <div class="form-group">
          <label>Status TB RO</label>
          <input type="text" name="status_ro" class="form-control"
            value="{{ old('status_ro', $detail->status_ro) }}">
        </div>
        <!-- End Contoh -->

        <div class="col-12">
          <a href="{{ route('admin.meetings.show', $detail) }}" type="reset" class="btn btn-secondary">Batalkan</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div><!-- /.container -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select2').select2({
        theme: 'bootstrap4',
        selectOnClose: true
    });

    // Dynamic option select2
    $(".tags").select2({
        theme: 'bootstrap4',
        selectOnClose: true,
        tags: true
    });

    var select2Id = ['#satellite', '#worker'];
    select2Id.map((id) => {
      $(id).on('select2:open', () => {
        var find = $(id).select2('data');
        if (!find[0].disabled) {
          $('.select2-search__field').val(find[0].text);
        }
      })
    })

    // Auto focus search select2
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});
</script>
@endsection
