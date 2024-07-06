@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-12">
                <h3>Edit Article</h3>
                <hr>
                <form action="{{ route('article.update', $article->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label class=" form-label" for="">Article Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title', $article->title) }}">
                        @error('title')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class=" form-label" for="">Description</label>
                        <textarea name="description" class=" form-control @error('description') is-invalid @enderror" rows="7">{{ old('description', $article->description) }}</textarea>
                        @error('description')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class=" btn btn-primary">Update Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
