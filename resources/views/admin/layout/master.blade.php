<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Media App</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- Bootstrap  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- font awesome  --}}
    <script src="https://kit.fontawesome.com/17730cb0db.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-items">
                    <a href="/dashboard/profile" class="nav-link fw-bold mx-3" data-widget="pushmenu"><i
                            class="fa-solid fa-user mx-2"></i>{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4 " id="menu">
            <a href="#" class="brand-link nav-link">
                <h4 class="brand-text font-weight-light text-center my-2 ">My Media App</h4>
            </a>
            <div class="sidebar">
                <nav class="mt-2 ">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item tab-0">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="fa-solid fa-chart-line"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-1">
                            <a href="{{ route('dashboard#profile') }}" class="nav-link">
                                <i class="fas fa-user-circle"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-2">
                            <a href="{{ route('admin#list') }}" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>
                                    Admin List
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-6">
                            <a href="{{ route('user#list') }}" class="nav-link">
                                <i class="fa-solid fa-users"></i>
                                <p>
                                    User List
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-3">
                            <a href="{{ route('category#list') }}" class="nav-link">
                                <i class="fa-solid fa-icons"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-4">
                            <a href="{{ route('post#list') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    Post
                                </p>
                            </a>
                        </li>

                        <li class="nav-item tab-5">
                            <a href="{{ route('trend#list') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>
                                    Trend Post
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link ">
                                <button type="submit" class="btn btn-danger col-12">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    {{-- Bootstrap js  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('adminlte.min.js') }}"></script>  --}}
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script>  --}}
    {{-- jquery cdn  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>
<script>
    $(document).ready(function() {
        $path = window.location.pathname;
        if ($path == '/admin/list') {
            $('.tab-2').addClass('bg-success rounded')
        } else if ($path == '/category/list' || $path.match('category')) {
            $('.tab-3').addClass('bg-success rounded')
        } else if ($path == '/post/list' || $path.match('post')) {
            $('.tab-4').addClass('bg-success rounded')
        } else if ($path == '/trend/list' || $path.match('trend')) {
            $('.tab-5').addClass('bg-success rounded')
        } else if ($path == '/user/list') {
            $('.tab-6').addClass('bg-success rounded')
        } else if ($path == '/dashboard') {
            $('.tab-0').addClass('bg-success rounded')
        } else if ($path == '/dashboard/profile' || $path.match('/dashboard/password')) {
            $('.tab-1').addClass('bg-success rounded')
        }
    })
</script>
@yield('scriptSource')

</html>
