@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.comments') }}" class="btn btn-dark mb-3">Back to comments</a>
    <table class="table table-light table-striped table-hover shadow rounded mt-5">
        <tbody class="table-borderless">
            <tr>
                <th>Comment</th>
                <td>{{ $comment->comment }}</td>
            </tr>
            <tr>
                <th>User</th>
                <td>{{ $comment->user->firstname . " " . $comment->user->lastname }}</td>
            </tr>
            <tr>
                <th>Post</th>
                <td>{{ $comment->posts_id . " - " . $comment->post->title }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $comment->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $comment->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection