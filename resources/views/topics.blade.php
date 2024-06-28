@extends('layouts.main')

@section('container')
<h1 class="text-center my-5">Explore Topics</h1>

<div class="container">
    <div class="d-flex gap-3 my-3 justify-content-center mx-5 px-5 flex-wrap">
        @foreach ($tags as $tag)
            <a href="/topics/{{ $tag->slug }}" class="btn btn-lg btn-secondary rounded-pill">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>

@endsection