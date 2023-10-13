<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
</head>

<body>

    <div class="container">

        <div class="row my-5">
            <div class="col-md-4 offset-md-4">
                @include('shared.alerts')
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
