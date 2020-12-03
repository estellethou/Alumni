@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.users') }}" class="btn btn-dark mb-3">Back to users</a>
    <table class="table table-light table-striped table-hover shadow rounded mt-5">
        <tbody class="table-borderless">
            <tr>
                <th>First Name</th>
                <td>{{ $user->firstname }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $user->lastname }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>User ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Admin</th>
                <td>{{ $user->is_admin }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Email verified at</th>
                <td>{{ $user->email_verified_at }}</td>
            </tr>
            <tr>
                <th>Hashed password</th>
                <td>{{ $user->password }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $user->created_at }}</td>
            </tr>
            <tr>
                <th>Updated at</th>
                <td>{{ $user->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection