<form action="" method="POST">
  @csrf
  @method('PUT')
  <div class="modal fade" id="editSatelite{{ $satelite->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $satelite->name) }}">
          </div>
          <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" onclick="reset()"
                  data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-primary">Perbarui</button>
          </div>
      </div>
    </div>
  </div>
</form>
