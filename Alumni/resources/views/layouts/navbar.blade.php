<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <a class="navbar-brand text-white" href="{{ url('/admin') }}">
                Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            @guest
            @else
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true">{{ auth()->user()->firstname }}</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            @endguest
        </nav>
        <div class="row flex-fill flex-column flex-sm-row bg-secondary mr-0" style="height:1200px;">
            <!-- sidebar content -->
            @guest
            @else
            <div id="sidebar" class="col-sm-3 col-md-2 sidebar bg-dark pr-0 shadow h-100">
                @include('layouts/sidebar')
            </div>
            @endguest
            <div id="content" class="col-md-10 h-100 w-100 pt-4 px-4">
                @include('flash-message')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script> -->
    <script>
    $(document).ready(function() {
        $('li.active').removeClass('active');
        $('li > a[href="http://coding-academy-alumni.herokuapp.com' + location.pathname + '"]').addClass(
            'active');
    });
    $(document).ready(function() {
        $('#dynamic-table').DataTable({
            "pageLength": 25
        });
    });
    </script>

</body>

</html>