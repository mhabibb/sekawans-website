<form action="{{ route('admin.users.update', Auth()->user() ) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama (Tidak dapat diubah)</label>
                        <input class="form-control" disabled value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid
                        @else @if(old('email') ?? false) is-valid @endif @enderror"
                            value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" name="passBtn" class="custom-control-input" id="passBtn"
                            @checked(old('passBtn'))>
                        <label class="custom-control-label" for="passBtn">Ubah Password?</label>
                    </div>
                    <div class="form-group old-password">
                        <label>Konfirmasi Password</label>
                        <div class="input-group">
                            <input type="password" name="current_password" id="current_password"
                                class="form-control @error('current_password') is-invalid @enderror">
                            <a role="button" toggle="#current_password" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="form-group new-password d-none">
                        <label>Password Baru (minimal 8 karakter)</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            <a role="button" toggle="#password" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="form-group new-password d-none">
                        <label>Ulangi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                            <a role="button" toggle="#password_confirmation" class="show-hide input-group-text"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" onclick="reset()"
                        data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>