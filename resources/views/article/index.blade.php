@extends('layouts.app')

@section('content')
    <div class="container-xl px-3">
        <div class="row">
            <div class="col-12">
                <h4>Article List</h4>
                @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                @endif
                <div class="row justify-content-between mb-3">
                    <div class="col-md-3">
                        <a href="{{ route('article.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('article.index') }}" method="get">
                            <div class=" input-group ">

                                @if (request()->keyword != null)
                                    <a href="{{ route('article.index') }}">
                                        <i class="bi bi-x-circle position-absolute z-1" style="top:9px;right:65px"></i>
                                    </a>
                                @endif
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
                            <th>Category</th>
                            <th>Owner</th>
                            <th>User_id</th>
                            <th>Actions</th>
                            <th>Created At</th>
                            <th>Updated At</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }} <br>
                                    <span class="small text-black-50">
                                        {{ Str::limit($article->description, 30, '...') }}
                                    </span>
                                </td>
                                <td>{{ $article->category_id }}</td>
                                <td>{{ $article->creator_name }}</td>
                                <td>{{ $article->user_id }}</td>

                                <td>
                                    <a class=" btn btn-sm btn-outline-dark"
                                        href="{{ route('article.show', $article->id) }}">
                                        <i class="bi bi-info"></i>
                                    </a>
                                    <a href="{{ route('article.edit', $article->id) }}"
                                        class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form class=" d-inline-block" action="{{ route('article.destroy', $article->id) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- Diff timestamps formats --}}
                                {{-- <td>{{ $article->created_at->diffforhumans() }}</td> --}}
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $article->created_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->created_at->format('d M Y') }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $article->updated_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $article->updated_at->format('d M Y') }}
                                    </p>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('article.create') }}">Create Item</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $articles->OnEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
