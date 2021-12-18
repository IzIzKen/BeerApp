<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->

    <!-- Styles -->

</head>
<body>
<div id="app">

    <main class="py-4 mb-5">
        @yield('content')
    </main>

    {{--@component('components.footer')
    @endcomponent--}}
</div>
</body>
</html>
