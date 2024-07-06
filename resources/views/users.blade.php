@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>User List</h4>

                <div class="row justify-content-between mb-3">
                    <div class="col-md-3">
                        <a href="{{ route('article.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('article.index') }}" method="get">
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
                            <th> User Information</th>
                            <th>Actions</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }} <br>
                                    <span class="small text-black-50">
                                        {{ $user->email }}
                                    </span>
                                </td>

                                <td>
                                    {{-- <a class=" btn btn-sm btn-outline-dark"
                                        href="{{ route('user.show', $user->id) }}">
                                        <i class="bi bi-info"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form class=" d-inline-block" action="{{ route('user.destroy', $user->id) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class=" btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                                {{-- Diff timestamps formats --}}
                                {{-- <td>{{ $user->created_at->diffforhumans() }}</td> --}}
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $user->created_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $user->created_at->format('d M Y') }}
                                    </p>
                                </td>
                                <td>
                                    <p class="small mb-0">
                                        <i class="bi bi-clock"></i>
                                        {{ $user->updated_at->format('H:i a') }}
                                    </p>
                                    <p class="small">
                                        <i class="bi bi-calendar"></i>
                                        {{ $user->updated_at->format('d M Y') }}
                                    </p>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('article.create') }}">Create Item</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
