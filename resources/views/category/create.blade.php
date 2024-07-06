@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-12">
                <h3>Create New Category</h3>
                <hr>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="title">Category Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
