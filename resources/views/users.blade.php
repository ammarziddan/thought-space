@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1 class="text-center fw-bold border-bottom pt-5 pb-3">Authors to Follow</h1>
        @foreach ($users as $user)
        <div class="d-flex justify-content-between px-4 border-bottom py-3">
            <div class="d-flex align-items-center">
                <a href="/users/{{ $user->username }}">
                    <img src="/img/{{ $user->image }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle p-0" width="50">
                </a>
                <a href="/users/{{ $user->username }}" class="text-decoration-none text-dark d-inline-block">
                    <p class="mb-0 ms-3 fw-bold">{{ $user->name }}</p>
                    <p class="mb-0 ms-3 text-secondary">{{ $user->short_bio }}</p>
                </a>
            </div>
            <a href="/users/{{ $user->username }}" class="btn btn-secondary rounded-pill align-self-center">View</a>
        </div>
        @endforeach
    </div>
</div>

@endsection