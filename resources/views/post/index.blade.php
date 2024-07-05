@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <h1 class="fw-bold my-3 lh-1">{{ $post->title }}</h1>
        <div class="row py-3">
            <a href="/users/{{ $post->user->username }}" class="col-lg-6 text-decoration-none text-dark d-flex align-items-center gap-3">
                <img src="/img/{{ $post->user->image }}" alt="{{ $post->user->username }}" class="img-thumbnail rounded-circle p-0" width="40">
                <div>
                    <p class="m-0 fw-bold">{{ $post->user->name }}</p>
                    <small class="text-secondary" class="m-0">{{ $post->created_at->format('M d, Y') }}</small>
                </div>
            </a>
            <div class="col-lg-6 d-flex flex-wrap column-gap-3 row-gap-1 border-start">
                @foreach ($post->tags as $tag)
                <a href="/topics/{{ $tag->slug }}" class="badge rounded-pill text-bg-secondary text-decoration-none align-self-center">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="border-top border-bottom px-3 py-2 d-flex align-items-center justify-content-between">
            <a href="#" class="text-decoration-none text-secondary"><i class="bi bi-chat-text"></i> Comments</a>
            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-decoration-none text-secondary"><i class="bi bi-hand-thumbs-up"></i></a>
                <a href="#" class="text-decoration-none text-secondary"><i class="bi bi-send"></i></a>
                @if( auth()->check() && $post->user->username === auth()->user()->username )
                <div class="dropdown">
                    <a href="" class="border-0 bg-transparent fs-4 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/posts/{{ $post->slug }}/edit">Edit story</a>
                        </li>
                        <li>
                            <form action="/posts/{{ $post->slug }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="text-danger dropdown-item" type="submit" onclick="return confirm('Are you sure want to delete this story?')">Delete story</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center py-5">
    <div class="col-lg-6">
        <img src="/img/{{ $post->thumbnail }}" alt="..." style="width: 100%">
        <p class="text-secondary text-center mt-3">{{ $post->img_desc }}</p>
    </div>
</div>

<div class="row justify-content-center mb-3">
    <div class="col-lg-6 fs-5 lh-lg">
        {!! $post->body !!}
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6 border-top pt-4">
        <p class="fs-5 fw-bold">Comments</p>
        <div class="border-bottom py-3">
            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-decoration-none text-dark d-flex align-items-center gap-3">
                    <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                    <p class="m-0 fw-bold">Author Name</p>
                </a>
                    <small class="text-secondary" class="text-secondary ms-auto">3h ago</small>
            </div>
            <div class="px-5 my-2">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, rem. Eum, ex! Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="d-flex justify-content-between px-5">
                <a href="#" class="text-decoration-none text-secondary"><i class="bi bi-reply"></i> Reply</a>
                <a href="#" class="text-decoration-none text-secondary"><i class="bi bi-hand-thumbs-up"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6 border-top py-4 px-0">
        <p class="fs-5 fw-bold mx-3">More from Author Name</p>
        
        <div class="d-flex justify-content-between flex-wrap">
            {{-- start more from --}}
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            {{-- end more from --}}
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6 border-top py-4 px-0">
        <p class="fs-5 fw-bold mx-3">You might like</p>
        
        <div class="d-flex justify-content-between flex-wrap">
            {{-- start more from --}}
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            <div class="post-card d-flex-column justify-content-between align-items-between">
                <div style="height: 180px">
                    <img src="/img/story-images/default.jpg" alt="..." class="object-fit-cover post-card-img">
                </div>
                <div class="mt-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-0">
                        <img src="/img/logo.png" alt="..." class="img-thumbnail rounded-circle p-0" width="25">
                        <p class="mb-0 ms-1 fs-6">Author Name</p>
                    </a>
                    <a href="#" class="h-auto d-inline-block text-decoration-none text-dark">
                        <p class="fs-5 fw-bolder m-0">Title Here</p>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, ea.</p>
                        <small class="text-secondary"><i class="bi bi-chat-fill"></i> 3</small>
                        <small class="text-secondary" class="ms-3"><i class="bi bi-hand-thumbs-up-fill"></i> 7</small>
                    </a>
                </div>
            </div>
            {{-- end more from --}}
        </div>
    </div>
</div>

@endsection