<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Icon Logo --}}
    <link rel="icon" href="/img/logo.png" type="image/icon type">

    {{-- Bootstrap v5.3.3 CSS --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons v1.11.3 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>{{ $title }}</title>
</head>
<body>
    @include('partials.navbar')

    @yield('container')

    @include('partials.footer')

    {{-- Bootstrap v5.3.3 Js + Popper --}}
    <script src="/js/bootstrap.bundle.min.js"></script>

    {{-- script.js --}}
    <script src="/js/script.js"></script>
</body>
</html>