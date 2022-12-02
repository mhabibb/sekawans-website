<!-- Modal -->
@foreach ($sekawans as $sekawan)
<form action="{{ route('admin.sekawans.update', $sekawan ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="sekawanEdit{{ $sekawan->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($sekawan->id == 3)
                    <img src="{{ asset('storage/'.$sekawan->contents) }}" alt="..."
                        class="img-preview img-fluid d-block mb-2">
                    <input type="file" class="form-control-file" name="content" id="image" onchange="previewImg()">
                    @elseif ($sekawan->id > 3 )
                    <input type="text" class="form-control @error('contents') is-invalid @enderror" name="contents"
                        value="{{ $sekawan->contents }}">
                    @else
                    <textarea type="text" class="form-control @error('contents') is-invalid @enderror" name="contents"
                        rows="10" style="resize: none;">{{ $sekawan->contents }}</textarea>
                    @endif
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
@endforeach