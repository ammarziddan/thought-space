@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row column-gap-3 flex-nowrap">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center px-4 py-3 mt-4 border-bottom">
                <div><p class="fs-1 fw-bold">{{ $user->name }}</p></div>
                <div><a href="{{ url()->current(); }}" class="text-decoration-none text-secondary fs-3" id="shareProfile" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy profile link"><i class="bi bi-link-45deg"></i></a></div>
            </div>
            @include('partials.posts')
{{-- 
            @foreach ($posts as $post)
            <div class="row border-bottom pb-3 mt-3">
                <div class="d-flex">
                    <div class="col-8">
                        <div class="d-flex align-items-center mb-2 p-0">
                            <a href="#"><img src="/img/{{ $post->user->image }}" alt="..." class="img-thumbnail rounded-circle p-0" width="25"></a>
                            <a href="#" class="text-decoration-none text-dark"><p class="mb-0 ms-3">{{ $post->user->name }}</p></a>
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

            <div class="d-flex justify-content-center my-4">
                {{ $posts->links() }}
            </div> --}}
        </div>
        <div class="col-lg-4 border-start py-4 px-5">
            <img src="/img/{{ $user->image }}" alt="..." class="img-thumbnail rounded-circle mb-3" width="120">
            <p class="fs-5 fw-bolder">{{ $user->name }}</p>
            <p class="text-secondary">2.3k Followers</p>
            <p>{{ $user->short_bio }}</p>
            <div class="d-flex">
                <a href="#" class="btn btn-success rounded-pill">Follow</a>
            </div>
        </div>
    </div>
</div>
@endsection