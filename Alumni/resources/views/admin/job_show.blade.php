@extends('layouts.navbar')


@section('content')
<div class="container">
    <a href="{{ route('admin.jobs') }}" class="btn btn-dark mb-3">Back to job offers</a>
    <table class="table table-light table-striped table-hover shadow rounded mt-5">
        <tbody class="table-borderless">
            <tr>
                <th>Title</th>
                <td>{{ $job->title }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ $job->content }}</td>
            </tr>
            <tr>
                <th>Profile</th>
                <td>{{ $job->profile }}</td>
            </tr>
            <tr>
                <th>Qualification</th>
                <td>{{ $job->qualification }}</td>
            </tr>
            <tr>
                <th>Years of experience</th>
                <td>{{ $job->years_experience }}</td>
            </tr>
            <tr>
                <th>Street address </th>
                <td>{{ $job->street_address }}</td>
            </tr>
            <tr>
                <th>Postal code</th>
                <td>{{ $job->postal_code }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $job->city }}</td>
            </tr>
            <tr>
                <th>Contract</th>
                <td>{{ $job->contract }}</td>
            </tr>
            <tr>
                <th>Contract duration</th>
                <td>{{ $job->contract_duration }}</td>
            </tr>
            <tr>
                <th>Company name</th>
                <td>{{ $job->company_name }}</td>
            </tr>
            <tr>
                <th>Sector</th>
                <td>{{ $job->sector }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $job->created_at }}</td>
            </tr>
            <tr>
                <th>Updated at</th>
                <td>{{ $job->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection