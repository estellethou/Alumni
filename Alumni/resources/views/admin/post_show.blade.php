@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.posts') }}" class="btn btn-dark mb-3">Back to posts</a>
    <table class="table table-light table-striped table-hover shadow rounded mt-5">
        <tbody class="table-borderless">
            <tr>
                <th>Title</th>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $post->description }}</td>
            </tr>
            <tr>
                <th>User</th>
                <td>{{ $post->user->firstname . " " . $post->user->lastname }}</td>
            </tr>
            <tr>
                <th>Number of Comments</th>
                <td>{{ $post->comments->count() }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $post->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection