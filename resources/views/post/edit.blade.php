@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 py-5 form-container">
            <form action="/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3 py-3">
                    <textarea class="form-control form-control-lg fs-3 fw-bold input-title @error('title') is-invalid @enderror" id="title" placeholder="Enter title here" rows="1" name="title" required>{{ old('title', $post->title) }}</textarea>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- Image/Thumbnail --}}
                <div class="mb-3">
                    <label for="image-preview" class="ms-1 mb-2">Thumbnail</label>
                    <img class="mb-2 p-1 img-fluid img-preview d-block" src="/img/{{ $post->thumbnail }}">
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="image-preview" name="thumbnail" onchange="return imagePreview()">
                    @error('thumbnail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="img_desc" class="ms-1 mb-2">Image description & source (optional)</label>
                    <input type="text" class="form-control @error('img_desc') is-invalid @enderror" id="img_desc" name="img_desc" value="{{ old('img_desc', $post->img_desc) }}">
                    @error('img_desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Choices.js --}}
                <div class="mb-3">
                    <label for="topics" class="ms-1 mb-2">Choose topics</label>
                    @error('tags')
                    <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                    <select id="topics" name="tags[]" multiple>
                        @foreach ($tags as $tag)
                        @if (old('tags', $post->tags->pluck('id')->toArray()) !== null && in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())))
                            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @else
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <label class="ms-1 mb-2">Body</label>
                {{-- TRIX EDITOR --}}
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="mb-3">
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <a href="/users/{{ auth()->user()->username }}" class="btn btn-secondary rounded-pill">Cancel</a>
                <button class="btn btn-success rounded-pill float-end" type="submit">Update story</button>
            </form>
        </div>
    </div>
</div>


@endsection