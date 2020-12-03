@extends('layouts.navbar')

@section('content')

<body>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.job.create') }}" class="btn btn-dark">Add Job Offer</a>
        <div class="md-form">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search">
        </div>
    </div>
    <div class="table-responsive-xl">
        <table class="table table-sm table-light table-striped table-hover shadow rounded">
            <thead class="table-borderless">
                <tr>
                    <th scope="col" style="width:70px;">View</th>
                    <th scope="col" style="width:65px;">Edit</th>
                    <th scope="col" style="width:80px;">Delete</th>
                    <th scope="col">Title</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Contract</th>
                    <th scope="col">City</th>
                    <th scope="col">Company</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>
                        <a href="#" class="btn btn-success py-0">
                            View
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.job.edit', [ $job->id ]) }}" class="btn btn-primary py-0">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.job.destroy', [ $job->id ]) }}" method="post">
                            <input class="btn btn-danger py-0" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->profile }}</td>
                    <td>{{ $job->contract }}</td>
                    <td>{{ $job->city }}</td>
                    <td>{{ $job->company_name }}</td>
                    <td>{{ $job->sector }}</td>
                    <td>{{ $job->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</body>

@endsection