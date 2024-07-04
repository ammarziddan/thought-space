@extends('layouts.login')

@section('container')
<div class="login-page">
    <div class="login-container">
        <div class="login-header">
            {{-- <a href="/">
                <img src="/img/logo.png" alt="logo" width="60" class="img-thumbnail rounded-circle mb-3">
            </a> --}}
            <h2>Register</h2>
        </div>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-4 position-relative">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" autofocus required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4 position-relative">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4 position-relative">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4 position-relative">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark rounded-pill mt-2 login-button">Register</button>
        </form>
        <div class="login-footer">
            <p>Already have an account? <a href="/login">Login</a></p>
        </div>
    </div>
</div>
@endsection