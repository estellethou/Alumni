@extends('layouts.navbar')


@section('content')
<div class="d-flex justify-content-center">
    <div class="card bg-light mb-3 mr-3" style="width: 16rem;">
        <a href="admin/users"><div class="card-header text-dark">Users</div></a>
            <div class="card-body">
                <h5 class="card-title">Current Users</h5>
                <p class="card-text">{{ $count->users }}</p>
            </div>
        </div>
    <div class="card text-white bg-dark mb-3 mr-3" style="width: 16rem;">
        <a href="admin/jobs"><div class="card-header text-white">Jobs</div></a>
        <div class="card-body">
            <h5 class="card-title">Current Job Offers</h5>
            <p class="card-text">{{ $count->jobs }}</p>
        </div>
    </div>
    <div class="card bg-light mb-3 mr-3" style="width: 16rem;">
        <a href="admin/posts"><div class="card-header text-dark">Posts</div></a>
            <div class="card-body">
                <h5 class="card-title">Number of Posts</h5>
                <p class="card-text">{{ $count->posts }}</p>
            </div>
        </div>
    <div class="card text-white bg-dark mb-3 mr-3" style="width: 16rem;">
        <a href="admin/comments"><div class="card-header text-white">Comments</div></a>
        <div class="card-body">
            <h5 class="card-title">Number of Comments</h5>
            <p class="card-text">{{ $count->comments }}</p>
        </div>
    </div>
</div>

@endsection