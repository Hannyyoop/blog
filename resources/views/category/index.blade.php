@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Category List</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row justify-content-between mb-3">
                    <div class="col-md-3">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('category.index') }}" method="get">
                            <div class=" input-group ">
                                <input type="text" class=" form-control" name="keyword"
                                    @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>

                                <button class=" btn btn-sm btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Actions</th>
                            <th>Created At</th>
                            <th>Updated At</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->user_id }}</td>
                                <td>

                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form class=" d-inline-block" action="{{ route('category.destroy', $category->id) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- Diff timestamps formats --}}
                                {{-- <td>{{ $category->created_at->diffforhumans() }}</td> --}}
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $category->created_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->created_at->format('d M Y') }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $category->updated_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $category->updated_at->format('d M Y') }}
                                    </p>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('category.create') }}">Create
                                        Category</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $datas->OnEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
