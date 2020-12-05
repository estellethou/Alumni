<!-- <nav class="nav flex-sm-column">
    <a class="nav-link text-white active" id="users-tab" data-toggle="tab" href="{{ route('admin.users') }}" role="tab"
        aria-controls="users">Users</a>
    <a class="nav-link text-white" id="jobs-tab" data-toggle="tab" href="{{ route('admin.jobs') }}" role="tab"
        aria-controls="jobs">Jobs</a>
    <a class="nav-link text-white" id="posts-tab" data-toggle="tab" href="{{ route('admin.posts') }}" role="tab"
        aria-controls="posts">Posts</a>
    <a class="nav-link text-white" id="comments-tab" data-toggle="tab" href="{{ route('admin.comments') }}" role="tab"
        aria-controls="comments">Comments</a>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-sm-column">
            <li class="nav-item active">
                <a class="nav-link text-white pl-3" href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white pl-3" href="{{ route('admin.jobs') }}">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white pl-3" href="{{ route('admin.posts') }}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white pl-3" href="{{ route('admin.comments') }}">Comments</a>
            </li>
        </ul>
    </div>
</nav>