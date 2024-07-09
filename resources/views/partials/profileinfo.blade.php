<div class="modal fade" id="profileInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Information</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('usersetting.update', ['user' => auth()->user()->username]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-body">
                <div class="mb-3 d-flex gap-3 align-items-center">
                    <img src="/img/{{ $user->image }}" alt="profile image" width="100" class="img-thumbnail img-preview border rounded-circle">
                    <div>
                        <div>
                            <label role="button" for="image-preview" class="text-decoration-none text-success">Update</label>
                            <a href="#" class="text-decoration-none text-danger ms-1">Remove</a>
                        </div>
                        <input type="file" id="image-preview" class="d-none" onchange="handleImageUpload(event)" name="image" accept=".jpg,.jpeg,.png,.bmp,.webp">
                        <small class="text-secondary m-0">Acceptable Image Formats: JPG, JPEG, PNG, BMP, WEBP <br>Maximum File Size: 1024 kilobytes (1 MB)</small>
                        @error('image')
                        <small class="d-block text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="ms-1 mb-2">Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="short_bio" class="ms-1 mb-2">Short bio</label>
                    <textarea class="form-control @error('short_bio') is-invalid @enderror" name="short_bio" id="short_bio" style="overflow:hidden" rows="3">{{ old('short_bio', $user->short_bio) }}</textarea>
                    @error('short_bio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelProfileInfo" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success rounded-pill">Save changes</button>
            </div>
        </form>
    </div>
    </div>
</div>