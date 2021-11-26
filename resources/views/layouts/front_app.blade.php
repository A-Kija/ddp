<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dodo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    @include('front.css')
</head>
<body>
    @yield('content')
    @include('layouts.svg')
</body>
</html>
