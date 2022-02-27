<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="All through Laravel Course Project Website">
    <meta name="keywords" content="Laravel,Website">
    <meta name="author" content="Mirolic Miralo">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mirablog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        @yield('content')
    </div>

    @include('inc.footer')
</body>
</html>
