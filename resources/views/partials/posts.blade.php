{{-- Search Bar --}}
<div class="row justify-content-center">
    <form action="" class="col-lg-8">
        <div class="input-group my-3">
            <input type="text" class="form-control rounded-start-pill border-none bg-light" placeholder="{{ $searchVal }}" value="{{ request('search') }}" name="search">
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
                <p class="m-0 ms-1">in <a href="/topics/{{ $post->tags[0]->slug }}" class="text-decoration-none text-dark">{{ $post->tags[0]->name }}</a></p>
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