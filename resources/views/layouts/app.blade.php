<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="apple-touch-57.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-114.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-72.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="apple-touch-144.png"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro%7CAnton" rel="stylesheet">

    <!-- Vendor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/introLoader.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/featherlight.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tooltipster.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/selectric.custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <!-- Page Specific Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/remodal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/remodal-default-theme.custom.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('js/vendor/modernizr.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YQ10ZFXGBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YQ10ZFXGBF');
    </script>
</head>
<body id="app" class="home">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<main class="py-4 mb-5">
    @yield('content')
</main>


@component('layouts.footer')
@endcomponent

<!-- Off-Page Content -->

<!-- Mobile Navigation (Left Panel) -->
@component('layouts.mobile_navigation')
@endcomponent

<!-- Preloader -->
{{--<div class="introLoading"></div>--}}

<!-- Back to Top -->
<div>
    <a class="back-to-top fa fa-chevron-up" href="javacript:void(0);"></a>
</div>


<!-- Core -->
<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-ui.min.js') }}"></script>

<!-- Vendor -->
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('http://maps.google.com/maps/api/js?key=AIzaSyBwOM-0o426zcLxUoCtWo2MSzISsAn6S1M') }}"></script>
<script src="{{ asset('js/vendor/gmaps.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/vendor/SmoothScroll.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.hoverIntent.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.simpler-sidebar.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.introLoader.pack.min.js') }}"></script>
<script src="{{ asset('js/vendor/featherlight.min.js') }}"></script>
<script src="{{ asset('js/vendor/featherlight.gallery.min.js') }}"></script>
<script src="{{ asset('js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.tooltipster.min.js') }}"></script>
<script src="{{ asset('js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/vendor/packery-mode.pkgd.min.js') }}"></script>
<script src="{{ asset('js/vendor/parsley.min.js') }}"></script>

<!-- Vendor (Page Specific) -->
<script src="{{ asset('js/vendor/remodal.min.js') }}"></script>
<script src="{{ asset('js/vendor/aos.js') }}"></script>

<!-- Theme -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
