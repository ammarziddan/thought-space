@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-8 mx-3">
        <h1 class="border-bottom pt-5 pb-3 px-3 mb-3">Settings</h1>
        
        <!-- Profile trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link" data-bs-toggle="modal" data-bs-target="#profileInfoModal">
                <p class="m-0">Profile Information <small class="d-block text-secondary">Edit your photo, name, and short bio</small></p>
                <div class="d-flex gap-3 align-items-center">
                    <p class="m-0">{{ $user->name }}</p>
                    <img src="/img/{{ $user->image }}" alt="profile" height="40" class="rounded-circle border">
                </div>
            </a>
        </div>
        <!-- email trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link" data-bs-toggle="modal" data-bs-target="#emailModal">
                <p class="m-0">Email address</p>
                <p class="m-0">{{ $user->email }}</p>
            </a>
        </div>
        <!-- username trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link" data-bs-toggle="modal" data-bs-target="#usernameModal">
                <p class="m-0">Username</p>
                <p class="m-0">{{ $user->username }}</p>
            </a>
        </div>
        {{-- password trigger modal --}}
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                <p class="m-0">Change password</p>
                <p class="m-0"><i class="bi bi-arrow-up-right"></i></p>
            </a>
        </div>
        {{-- delete account trigger modal --}}
        <div class="mx-3 p-3 mb-5">
            <a role="button" class="text-decoration-none col-lg-6" data-bs-toggle="modal" data-bs-target="#profileInfoModal">
                <p class="m-0 text-danger d-inline">Delete account <br></p>
                <small class="text-secondary">Permanently delete your account and all of it's content</small>
            </a>
        </div>
        

        <!-- profile info modal -->
        <div class="modal fade" id="profileInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('usersetting.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 d-flex gap-3 align-items-center">
                            <img src="/img/{{ $user->image }}" alt="profile image" width="100" class="img-thumbnail border rounded-circle">
                            <div>
                                <div>
                                    <a href="#" class="text-decoration-none text-success">Update</a>
                                    <a href="#" class="text-decoration-none text-danger ms-1">Remove</a>
                                </div>
                                <small class="text-secondary m-0">Acceptable Image Formats: JPG, JPEG, PNG, BMP, WEBP <br>Maximum File Size: 1024 kilobytes (1 MB)</small>
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
                            <textarea class="form-control @error('short_bio') is-invalid @enderror" name="short_bio" id="short_bio" rows="3">{{ old('short_bio', $user->short_bio) }}</textarea>
                            @error('short_bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success rounded-pill">Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        {{-- Email address modal --}}
        <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Email Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('usersetting.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="ms-1 mb-2">Email address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success rounded-pill">Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        {{-- Username Modal --}}
        <div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Username</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('usersetting.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="ms-1 mb-2">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success rounded-pill">Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        {{-- Change password modal --}}
        <div class="modal fade" id="changePasswordModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Change Password</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    {{-- VERIFY CURRENT PASSWORD --}}
                    <form action="" method="post">
                        <label for="current_password" class="ms-1 mb-2">Current password</label>
                        <input type="text" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </form>

                </div>
                <div class="modal-footer">
                  <button class="btn btn-success rounded-pill" data-bs-target="#newPassword" data-bs-toggle="modal">Verify</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="newPassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">New password</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                {{-- NEW PASSWORD --}}
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="current_password" class="ms-1 mb-2">New password</label>
                        <input type="text" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="password" class="ms-1 mb-2">Confirm password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success rounded-pill" type="submit">Submit</button>
                    </div>
                </form>

              </div>
            </div>
          </div>
    </div>
</div>
@endsection