{{-- Search Bar --}}
<div class="row justify-content-center">
    <form action="" class="col-lg-8">
        <div class="input-group my-3">
            <input type="text" class="form-control rounded-start-pill border-none bg-light" placeholder="{{ $searchVal }}" value="{{ request('search') }}" name="search">
            <button class="btn btn-light rounded-end-pill border" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>
</div>

{{-- new story button --}}
{{-- @if( isset($user)$user->username === auth()->user()->username ) --}}
@if( isset($user) )
    @auth
        @can('view', $user)
        <a href="{{ route('posts.create') }}" class="btn btn-outline-success border-0 rounded-pill"><i class="bi bi-file-earmark-plus"></i> Write a story</a>
        @endcan
    @endauth
@endif
{{-- @endif --}}

@if( $posts->count() > 0 )
@foreach ($posts as $post)
<div class="row border-bottom pb-3 mt-3">
    <div class="d-flex">
        <div class="col-8">
            <div class="d-flex align-items-center mb-2 p-0">
                <a href="/users/{{ $post->user->username }}"><img src="/img/{{ $post->user->image }}" alt="{{ $post->user->username }}" class="img-thumbnail rounded-circle p-0" width="20"></a>
                <a href="/users/{{ $post->user->username }}" class="text-decoration-none text-dark"><p class="mb-0 ms-3">{{ $post->user->name }}</p></a>
                <p class="m-0 ms-1">in <a href="/topics/{{ $post->tags[0]->slug }}" class="text-decoration-none text-dark">{{ $post->tags[0]->name }}</a></p>
            </div>
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                <h2 class="m-0 fs-4 fw-bold limit-str">{{ Str::limit($post->title, 100) }}</h2>
                <p class="text-dark-emphasis">{{ $post->excerpt }}</p>
            </a>
            <div class="d-flex align-items-center">
                <small class="text-dark-emphasis">{{ $post->created_at->diffForHumans() }}</small>
                @if( isset($user) && auth()->check() && $user->username === auth()->user()->username )
                <div class="ms-auto d-flex gap-3">
                    <div class="ms-auto dropdown">
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
                </div>
                @endif
            </div>
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
<p class="fs-1 fw-bold text-dark-emphasis text-center my-5">No Story Found <i class="bi bi-emoji-frown"></i></p>
@endif

<div class="d-flex justify-content-center my-4">
    {{ $posts->links() }}
</div>