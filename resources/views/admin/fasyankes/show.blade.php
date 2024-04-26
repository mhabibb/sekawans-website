@extends('layouts.app')

@section('content')
<section class="content">
        <div class="container-fluid pb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 pb-2 border-bottom">
                        <div class="col-12 card-title">
                            <h5>Detail Facility</h5>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Nama Fasyankes</label>
                            <div class="form-control">{{ $facility->name }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Kecamatan</label>
                            <div class="form-control">{{ $facility->district->name }}</div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>URL Map</label>
                            <div class="form-control">{{ $facility->url_map }}</div>
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.fasyankes.edit', $facility->id) }}" class="btn btn-warning">Edit
                                Data</a>
                            <form action="{{ route('admin.fasyankes.destroy', $facility->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection


