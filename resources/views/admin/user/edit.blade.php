<form action="{{ route('admin.users.update', Auth()->user() ) }}" method="POST" enctype="multipart/form-data">
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
                            value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="passBtn">
                        <label class="custom-control-label" for="passBtn">Ubah Password?</label>
                    </div>
                    <div class="form-group old-password">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="form-group new-password">
                        <label>Password Baru</label>
                        <input type="password" name="newPassword"
                            class="form-control @error('newPassword') is-invalid @enderror">
                    </div>
                    <div class="form-group new-password">
                        <label>Ulangi Password Baru</label>
                        <input type="password" name="confirmPassword"
                            class="form-control @error('confirmPassword') is-invalid @enderror">
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