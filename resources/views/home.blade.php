@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row column-gap-3 flex-nowrap">
        <div class="col-lg-8">
            {{-- Search Bar --}}
            <div class="row justify-content-center">
                <form action="/posts" class="col-lg-8">
                    <div class="input-group my-5">
                        <input type="text" class="form-control rounded-start-pill border-none bg-light" placeholder="What's on your mind?" value="{{ request('search') }}" name="search">
                        <button class="btn btn-light rounded-end-pill border" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            @if( $posts->count() > 0 )
            @foreach ($posts as $post)
            <div class="row border-bottom pb-3 mt-3">
                <div class="d-flex">
                    <div class="col-8">
                        <div class="d-flex align-items-center mb-2 p-0">
                            <a href="/users/{{ $post->user->username }}"><img src="/img/{{ $post->user->image }}" alt="{{ $post->user->username }}" class="img-thumbnail rounded-circle p-0" width="25"></a>
                            <a href="/users/{{ $post->user->username }}" class="text-decoration-none text-dark"><p class="mb-0 ms-3">{{ $post->user->name }}</p></a>
                            <p class="m-0 ms-1">in <a href="#" class="text-decoration-none text-dark">Programming</a></p>
                        </div>
                        <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                            <h2 class="m-0 mb-3 fs-4 fw-bold lh-1">{{ $post->title }}</h2>
                            <p>{{ $post->excerpt }}</p>
                        </a>
                        <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <a href="/posts/{{ $post->slug }}">
                            <img src="/img/{{ $post->thumbnail }}" alt="{{ $post->slug }}" style="height: 100px">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <p class="fs-1 fw-bold text-secondary text-center my-5">No Post Found <i class="bi bi-emoji-frown"></i></p>
            @endif

            <div class="d-flex justify-content-center my-4">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-lg-4 border-start py-4 px-5">
            <p class="fw-bold">Recommended Topics</p>
            <div class="d-flex flex-wrap gap-3 mb-3">
                {{-- topics start --}}
                <a href="#" class="btn btn-sm btn-secondary rounded-pill">Programming</a>
                {{-- topics end --}}
            </div>
            <a href="#" class="text-decoration-none text-success">see more topics</a>

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