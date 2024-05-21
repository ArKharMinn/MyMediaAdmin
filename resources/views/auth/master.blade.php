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

<body class="animsition" style="background-color : #F6F8FA; height:100vh">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container p-5 mt-5">
                <div class="login-wrap mt-5">
                    <div class="login-content pt-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
