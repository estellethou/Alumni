@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.users') }}" class="btn btn-dark mb-3">Back to users</a>
    <h3 style="color:black">Basic information</h3>
    <table class="table table-light table-striped table-hover shadow rounded mt-2">
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
    <h3 style="color:black">Profile information</h3> <a href="{{ route('admin.user.profile.edit' , [ $user->id ]) }}"
        class="btn btn-primary mb-3">
        Edit Profile</a>
    <table class="table table-light table-striped table-hover shadow rounded">
        <tbody class="table-borderless">
            <tr>
                <th>Phone</th>
                <td>{{ $user->profile->phone ?? '' }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $user->profile->description ?? '' }}</td>
            </tr>
            <tr>
                <th>LinkedIn</th>
                <td>
                    <a href='{{ $user->profile->url_linkedin ?? "" }}' target="_blank">{{ $user->profile->url_linkedin ?? '' }}</a>
                </td>
            </tr>
            <tr>
                <th>GitHub</th>
                <td><a href='{{ $user->profile->url_github ?? "" }}' target="_blank">{{ $user->profile->url_github ?? '' }}</a></td>
            </tr>
            <tr>
                <th>Website</th>
                <td><a href='{{ $user->profile->url_website ?? "" }}' target="_blank">{{ $user->profile->url_website ?? '' }}</a>
                </td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td>
                    <img class="avatar" src="{{ $user->profile->temporaryUrl ?? '' }}" alt="Profile">
                    {{ $user->profile->image ?? '' }}
                </td>
            </tr>
            <tr>
                <th>Resume</th>
                <td>{{ $user->profile->resume ?? '' }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection