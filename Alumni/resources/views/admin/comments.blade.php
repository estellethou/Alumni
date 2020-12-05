@extends('layouts.navbar')

@section('content')

<body>
    <div>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.comment.create') }}" class="btn btn-dark">Add Comment</a>
            <div class="md-form">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search">
            </div>
        </div>
        <table class="table table-sm table-light table-striped table-hover shadow rounded">
            <thead class="table-borderless">
                <tr>
                    <th scope="col" style="width:70px;">View</th>
                    <th scope="col" style="width:65px;">Edit</th>
                    <th scope="col" style="width:80px;">Delete</th>
                    <th scope="col">Comment</th>
                    <th scope="col">User</th>
                    <th scope="col">Post</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>
                        <a href="{{ route('admin.comment.show', [ $comment->id ]) }}" class="btn btn-success py-0">
                            View
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.comment.edit', [ $comment->id ]) }}" class="btn btn-primary py-0">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.comment.destroy', [ $comment->id ]) }}" method="post">
                            <input class="btn btn-danger py-0" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->user->firstname . " " . $comment->user->lastname }}</td>
                    <td>{{ $comment->post->id . " - " . $comment->post->title }}</td>
                    <td>{{ $comment->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-none">
            {{ $comments->links() }}
        </div>
    </div>
</body>

@endsection