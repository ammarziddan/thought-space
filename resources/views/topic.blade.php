@extends('layouts.main')

@section('container')
<div class="row column-gap-3 flex-nowrap overflow-hidden">
    <div class="col-lg-4 border-end py-4 px-5">
        <div class="row justify-content-center">
            <a href="/topics" class="btn btn-lg btn-outline-secondary mb-3 d-flex gap-5"><i class="bi bi-arrow-left"></i> <span>Explore more topics</span></a>
            <h1 class="fw-bold">Posts in "{{ $tag->name }}"</h1>
        </div>
    </div>
    <div class="col-lg-8 p-0">     

        @include('partials.posts')
        
    </div>
</div>
@endsection