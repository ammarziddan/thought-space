@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row column-gap-3 flex-nowrap">
        <div class="col-lg-8">
            
            @include('partials.posts')
        </div>
        <div class="col-lg-4 border-start py-4 px-5">
            <p class="fw-bold">Recommended Topics</p>
            <div class="d-flex flex-wrap gap-3 mb-3">
                {{-- topics start --}}
                @foreach ($tags as $tag)
                <a href="/topics/{{ $tag->slug }}" class="btn btn btn-secondary rounded-pill">{{ $tag->name }}</a>
                @endforeach
                {{-- topics end --}}
            </div>
            <a href="/topics" class="text-decoration-none text-success">see more topics</a>

            <p class="fw-bold mt-5">Who to follow</p>
            @foreach ($users as $user)
            <div class="d-flex mb-3">
                <a href="/users/{{ $user->username }}" class="d-flex align-items-center text-decoration-none text-dark mb-2 p-0">
                    <img src="/img/{{ $user->image }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle p-0" width="30">
                    <div>
                        <p class="mb-0 ms-3 fw-bold">{{ $user->name }}</p>
                        <small class="mb-0 ms-3">{{ $user->name }}</small>
                    </div>
                </a>
                <a href="/users/{{ $user->username }}" class="btn btn-sm btn-outline-secondary rounded-pill ms-auto align-self-center">View</a>
            </div>
            @endforeach
            <a href="/users" class="text-decoration-none text-success">see more suggestions</a>
        </div>
    </div>
</div>
@endsection