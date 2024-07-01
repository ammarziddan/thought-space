@extends('layouts.main')

@section('container')
<div class="row column-gap-3 flex-nowrap overflow-hidden">
    <div class="col-lg-4 border-end py-4 px-5">
        <a href="/topics" class="btn btn-secondary rounded-pill mb-3"><i class="bi bi-arrow-left"></i> Explore more topics</a>
        <h1 class="fw-bold">Posts in "{{ $tag->name }}"</h1>
    </div>
    <div class="col-lg-8 p-0">     

        @include('partials.posts')
        
    </div>
</div>
@endsection