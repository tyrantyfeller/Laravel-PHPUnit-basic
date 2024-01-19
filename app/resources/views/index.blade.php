<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('Common/head')
</head>
<body>
    @yield('content')
</body>
</html>
