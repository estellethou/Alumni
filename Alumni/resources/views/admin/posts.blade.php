@extends('layouts.navbar')

@section('content')

<body>
    <div>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.post.create') }}" class="btn btn-dark">Add Post</a>
            <!-- <div class="md-form">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search">
            </div> -->
        </div>
        <table class="table table-sm table-light table-striped table-hover shadow rounded">
            <thead class="table-borderless">
                <tr>
                    <th scope="col" style="width:70px;">View</th>
                    <th scope="col" style="width:65px;">Edit</th>
                    <th scope="col" style="width:80px;">Delete</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">User</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('admin.post.show', [ $post->id ]) }}" class="btn btn-success py-0">
                            View
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.post.edit', [ $post->id ]) }}" class="btn btn-primary py-0">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.post.destroy', [ $post->id ]) }}" method="post">
                            <input class="btn btn-danger py-0" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->firstname . " " . $post->user->lastname }}</td>
                    <td>{{ $post->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-none">
            {{ $posts->links() }}
        </div>
    </div>
</body>

@endsection