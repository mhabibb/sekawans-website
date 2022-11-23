@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Profil Admin</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-sm-6 form-group">
                        <label>Nama</label>
                        <div class="form-control">{{ $user->name }}</div>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label>Email</label>
                        <div class="form-control">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <a href="#" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editProfile">Update
                            Profil</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#editPassword">Ubah
                            Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="edit-modal">
    @include('components.edit-modal-profile')
    @include('components.edit-modal-password')
</section>

@endsection

@section('js')
<script>
</script>
@endsection