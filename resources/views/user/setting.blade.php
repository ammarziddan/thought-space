@extends('layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success fixed-top col-lg-4 col-9 mx-auto mt-4 alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-8 mx-3">
        <h1 class="border-bottom pt-5 pb-3 px-3 mb-3">Settings</h1>
        
        <!-- Profile trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link gap-3" data-bs-toggle="modal" data-bs-target="#profileInfoModal">
                <p class="m-0">Profile Information <small class="d-block text-secondary">Edit your photo, name, and short bio</small></p>
                <div class="d-flex gap-3 align-items-center">
                    <p class="m-0">{{ $user->name }}</p>
                    <img src="/img/{{ $user->image }}" alt="profile" height="40" class="rounded-circle border">
                </div>
            </a>
        </div>
        <!-- email trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link gap-3" data-bs-toggle="modal" data-bs-target="#emailModal">
                <p class="m-0">Email address</p>
                <p class="m-0">{{ $user->email }}</p>
            </a>
        </div>
        <!-- username trigger modal -->
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link gap-3" data-bs-toggle="modal" data-bs-target="#usernameModal">
                <p class="m-0">Username</p>
                <p class="m-0">{{ $user->username }}</p>
            </a>
        </div>
        {{-- password trigger modal --}}
        <div class="position-relative mx-3 p-3 border-bottom">
            <a role="button" class="d-flex align-items-center justify-content-between text-decoration-none text-dark stretched-link gap-3" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                <p class="m-0">Change password</p>
                <p class="m-0"><i class="bi bi-arrow-up-right"></i></p>
            </a>
        </div>
        {{-- delete account trigger modal --}}
        <div class="mx-3 p-3 mb-5">
            <a role="button" class="text-decoration-none col-lg-6" data-bs-toggle="modal" data-bs-target="#deleteAccModal">
                <p class="m-0 text-danger d-inline">Delete account <br></p>
                <small class="text-secondary">Permanently delete your account and all of it's content</small>
            </a>
        </div>
        

        <!-- profile info modal -->
        @include('partials.profileinfo')

        {{-- Email address modal --}}
        <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Email Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('usersetting.update', ['user' => auth()->user()->username]) }}" method="post">
                    @csrf
                    @method('patch')
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
                        <button type="submit" class="btn btn-success rounded-pill">Save changes</button>
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
                <form action="{{ route('usersetting.update', ['user' => auth()->user()->username]) }}" method="post">
                    @csrf
                    @method('patch')
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
                        <button type="submit" class="btn btn-success rounded-pill">Save changes</button>
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
                {{-- VERIFY CURRENT PASSWORD --}}
                <form action="" method="post">
                <div class="modal-body">
                    <label for="current_password" class="ms-1 mb-2">Current password</label>
                    <input type="text" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                    @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success rounded-pill" data-bs-target="#newPassword" data-bs-toggle="modal">Verify</button>
                </div>
                </form>
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

        <div class="modal fade" id="deleteAccModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <p>
                                We're sorry to see you go. Are you sure you want to delete your account? Your account and all your content will be permanently lost.
                            </p>
                            <p>
                                Please type <strong>'delete'</strong> in the input below to confirm.
                            </p>
                            <input type="text" class="form-control @error('...') is-invalid @enderror" id="..." name="...">
                            @error('...')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger rounded-pill">Delete account</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection