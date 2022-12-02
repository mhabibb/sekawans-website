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
                        <label>Password Baru</label>
                        <input type="password" name="new_password" id="new_password"
                            class="form-control">
                    </div>
                    <input type="hidden" name="first_login" value="{{ $first }}">
                    <div class="form-group new-password">
                        <label>Ulangi Password Baru</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>