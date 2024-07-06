@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-12">
                <h3>Create New Article</h3>
                <hr>
                <form action="{{ route('article.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class=" form-label" for="">Article Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class=" form-select @error('category') is-invalid @enderror" name="category">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach

                        </select>
                        @error('category')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class=" form-label" for="">Description</label>
                        <textarea name="description" class=" form-control @error('description') is-invalid @enderror" rows="7">{{ old('description') }}</textarea>
                        @error('description')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class=" btn btn-primary">Save Article</button>
                        <a href="{{ route('article.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
