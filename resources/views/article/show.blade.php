@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Article Detail</h4>
                <a href="{{ route('article.index') }}" class="btn btn-sm btn-primary my-3">Back</a>

                <table class=" table">
                    <tr>
                        <td>Title</td>
                        <td>{{ $article->title }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $article->description }}</td>
                    </tr>

                    <tr>
                        <td>Created At</td>
                        <td>{{ $article->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $article->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
