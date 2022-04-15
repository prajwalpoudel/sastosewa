<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sasto Deal</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-100">
    <div class="container">
        @include('design.layouts.navigation')
        <main class="">
            @yield('content')
        </main>
        <div class="footer">
            @include('design.layouts.footer')
        </div>
    </div>
    <script src="https://kit.fontawesome.com/3379ab9efd.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
