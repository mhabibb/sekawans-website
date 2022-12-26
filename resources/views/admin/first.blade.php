<form action="{{ route('admin.users.update', Auth()->user() ) }}" id="form" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="first-login" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profil</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group new-password">
                        <label>Password Baru (minimal 8 karakter)</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control">
                            <a role="button" toggle="#password" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <input type="hidden" name="first_login" value="{{ $first }}">
                    <div class="form-group new-password">
                        <label>Ulangi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <a role="button" toggle="#password_confirmation" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>