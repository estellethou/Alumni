@extends('layouts.navbar')

@section('content')

<body>
    <div>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.user.create') }}" class="btn btn-dark">Create User</a>
                <!-- <form class="md-form d-flex" action="{{ route('admin.users.search') }}" method="POST">
                    @csrf
                    <input class="form-control mr-2" type="text" placeholder="Search" aria-label="Search" id="search-users" name="search-users">
                    <button type="submit" class="btn btn-primary">
                        {{ 'Search' }}
                    </button>
                </form> -->
        </div>
        <table class="table table-sm table-light table-striped table-hover shadow rounded" id="dynamic-table">
            <thead class="table-borderless">
                <tr>
                    <th scope="col" style="width:70px;">View</th>
                    <th scope="col" style="width:65px;">Edit</th>
                    <th scope="col" style="width:80px;">Delete</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.user.show', [ $user->id ]) }}" class="btn btn-success py-0">
                            View
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', [ $user->id ]) }}" class="btn btn-primary py-0">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.user.destroy', [ $user->id ]) }}" method="post">
                            <input class="btn btn-danger py-0" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>

</script>

@endsection