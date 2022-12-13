@extends('layouts.admin')

@section('admin-content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Profil Admin</h1>
    </div>
</section>

<section class="content col-md-8 col-lg-6 ">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 form-group">
                        <label>Nama</label>
                        <div class="form-control">{{ $user->name }}</div>
                    </div>
                    <div class="col-12 form-group">
                        <label>Email</label>
                        <div class="form-control">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <a href="#" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editProfile">Update
                            Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="edit-modal">
    @include('admin.user.edit')
</section>

@endsection

@section('js')
<script>
    @if($errors->any())
        $('#editProfile').modal('show');
    @endif

    $(document).ready(function() {

        if ($('#passBtn').is(":checked")) {
            $('.new-password').removeClass('d-none');
            $('.old-password label').text('Password Lama');
        }
        
        $('#passBtn').click(function() {
            if ($('#passBtn').is(":checked")) {
                $('.new-password').removeClass('d-none');
                $('.old-password label').text('Password Lama');
            } else {
                $('.new-password').addClass('d-none');
                $('.old-password label').text('Konfirmasi Password');
            }
        })
    })
</script>
@endsection