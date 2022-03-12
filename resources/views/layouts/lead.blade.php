<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="All through Laravel Course Project Website">
    @yield('keywords')
    <meta name="author" content="Mirolic Miralo">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mirablog') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    @yield('other_styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('inc.navbar')

        <div class="d-flex justify-content-center"> @include('inc.messages') </div>
        @yield('content')
    </div>

    @include('inc.footer')
    @yield('other_scripts')
</body>

</html>
