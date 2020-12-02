@extends('layouts.navbar')

@section('content')

<body>
    <div>
        <a href="{{ route('admin.user.create') }}" class="btn btn-dark mb-3">Create User</a>
        <table class="table table-light table-striped table-hover shadow rounded">
            <thead class="table-borderless">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
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