@extends('layouts.navbar')

@section('content')

<body>
    <div>
        <table class="table table-light table-striped table-hover shadow rounded">
            <thead class="table-borderless">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Profile</th>
                    <th scope="col">City</th>
                    <th scope="col">Company</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->profile }}</td>
                    <td>{{ $job->city }}</td>
                    <td>{{ $job->company_name }}</td>
                    <td>
                        <button class="btn btn-primary py-0">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger py-0">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

@endsection