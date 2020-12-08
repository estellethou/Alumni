@extends('layouts.navbar')


@section('content')
<div class="d-flex justify-content-center">
    <div class="card bg-light mb-3 mr-3" style="max-width: 18rem;">
        <div class="card-header">Users</div>
            <div class="card-body">
                <h5 class="card-title">Current Users</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3 mr-3" style="max-width: 18rem;">
        <div class="card-header">Jobs</div>
        <div class="card-body">
            <h5 class="card-title">Current Job Offers</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card bg-light mb-3 mr-3" style="max-width: 18rem;">
        <div class="card-header">Posts</div>
            <div class="card-body">
                <h5 class="card-title">Number of Posts</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3 mr-3" style="max-width: 18rem;">
        <div class="card-header">Comments</div>
        <div class="card-body">
            <h5 class="card-title">Number of Comments</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>

@endsection