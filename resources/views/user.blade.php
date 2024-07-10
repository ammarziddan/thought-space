@extends('layouts.main')

@section('container')
<div class="container">
    
    @if (session()->has('success'))
    <div class="alert alert-success fixed-top col-lg-4 col-9 mx-auto mt-4 alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row column-gap-3 flex-nowrap">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center px-4 py-3 mt-4">
                <div><p class="fs-1 fw-bold">{{ $user->name }}</p></div>
                <div><a href="{{ url()->current() }}" class="text-decoration-none text-secondary fs-3" id="shareProfile" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy profile link"><i class="bi bi-link-45deg"></i></a></div>
            </div>

            <div class="container border-bottom px-lg-3">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                    <a class="nav-link text-dark active fw-medium" aria-current="page" href="#">Stories</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="#">About</a>
                    </li>
                </ul>
            </div>

            @include('partials.posts')
        </div>
        <div class="col-lg-4 border-start py-4 px-5">
            <img src="/img/{{ $user->image }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle mb-3" width="120">
            <p class="fs-5 fw-bolder">{{ $user->name }}</p>
            <p class="text-secondary">2.3k Followers</p>
            <p>{{ $user->short_bio }}</p>
            @auth
                @can('view', $user)
                <div class="d-flex gap-2 align-items-start">
                    <a class="btn btn-outline-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#profileInfoModal">Edit profile</a>
                    <a href="{{ route('usersetting.index', ['user' => auth()->user()->username]) }}" class="btn btn-outline-secondary btn-sm rounded-pill">Account Settings</a>
                </div>
                @else
                <div class="d-flex">
                    <a href="#" class="btn btn-success rounded-pill">Follow</a>
                </div>
                @endcan
            @else
            <div class="d-flex">
                <a href="/login" class="btn btn-success rounded-pill">Follow</a>
            </div>
            @endauth
            
        </div>

        @include('partials.profileinfo')

    </div>
</div>
@endsection