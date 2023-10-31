<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('roles.update', $roles->id) }}" method="POST" id="formAction">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Role</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $roles->name }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        @foreach ($roles->permissions as $item)
                        <li>{{ $item->name }}</li>
                        <input type="checkbox" name="" id="">
                            {{-- <input type="checkbox" name="permissions" class="form-control" id="permissions"> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
</div>
