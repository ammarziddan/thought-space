@extends('layouts.login')

@section('container')

<div class="login-page">
    <div class="login-container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="login-header">
            {{-- <a href="/">
                <img src="/img/logo.png" alt="logo" width="60" class="img-thumbnail rounded-circle mb-3">
            </a> --}}
            <h2>Login</h2>
        </div>

        <form action="/login" method="POST">
            @csrf
            <div class="mb-4 position-relative">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" autofocus required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback position-absolute ms-3" style="top: 90%">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4 position-relative">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-dark rounded-pill mt-2 login-button">Login</button>
        </form>
        <div class="login-footer">
            <p>Don't have an account? <a href="/register">Register</a></p>
        </div>
    </div>
</div>

@endsection