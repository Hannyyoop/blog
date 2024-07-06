@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-12">
                <h3>Edit Category</h3>
                <hr>
                <form action="{{ route('category.update', $category->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label class=" form-label" for="">Category Title</label>
                        <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title', $category->title) }}">
                        @error('title')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class=" btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
