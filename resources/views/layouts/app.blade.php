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
    <link rel="stylesheet" type="text/css" href="https://classic.yarnpkg.com/en/package/destyle.css">

    <!-- Modernizr -->
    <script src="{{ asset('js/vendor/modernizr.js') }}"></script>

    <style>
        /*! destyle.css v3.0.2 | MIT License | https://github.com/nicolas-cusan/destyle.css */

        /* Reset box-model and set borders */
        /* ============================================ */

        *,
        ::before,
        ::after {
            box-sizing: border-box;
            border-style: solid;
            border-width: 0;
        }

        /* Document */
        /* ============================================ */

        /**
         * 1. Correct the line height in all browsers.
         * 2. Prevent adjustments of font size after orientation changes in iOS.
         * 3. Remove gray overlay on links for iOS.
         */

        html {
            line-height: 1.15; /* 1 */
            -webkit-text-size-adjust: 100%; /* 2 */
            -webkit-tap-highlight-color: transparent; /* 3*/
        }

        /* Sections */
        /* ============================================ */

        /**
         * Remove the margin in all browsers.
         */

        body {
            margin: 0;
        }

        /**
         * Render the `main` element consistently in IE.
         */

        main {
            display: block;
        }

        /* Vertical rhythm */
        /* ============================================ */

        p,
        table,
        blockquote,
        address,
        pre,
        iframe,
        form,
        figure,
        dl {
            margin: 0;
        }

        /* Headings */
        /* ============================================ */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
            margin: 0;
        }

        /* Lists (enumeration) */
        /* ============================================ */

        ul,
        ol {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Lists (definition) */
        /* ============================================ */

        dt {
            font-weight: bold;
        }

        dd {
            margin-left: 0;
        }

        /* Grouping content */
        /* ============================================ */

        /**
         * 1. Add the correct box sizing in Firefox.
         * 2. Show the overflow in Edge and IE.
         */

        hr {
            box-sizing: content-box; /* 1 */
            height: 0; /* 1 */
            overflow: visible; /* 2 */
            border-top-width: 1px;
            margin: 0;
            clear: both;
            color: inherit;
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        pre {
            font-family: monospace, monospace; /* 1 */
            font-size: inherit; /* 2 */
        }

        address {
            font-style: inherit;
        }

        /* Text-level semantics */
        /* ============================================ */

        /**
         * Remove the gray background on active links in IE 10.
         */

        a {
            background-color: transparent;
            text-decoration: none;
            color: inherit;
        }

        /**
         * 1. Remove the bottom border in Chrome 57-
         * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
         */

        abbr[title] {
            text-decoration: underline dotted; /* 2 */
        }

        /**
         * Add the correct font weight in Chrome, Edge, and Safari.
         */

        b,
        strong {
            font-weight: bolder;
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        code,
        kbd,
        samp {
            font-family: monospace, monospace; /* 1 */
            font-size: inherit; /* 2 */
        }

        /**
         * Add the correct font size in all browsers.
         */

        small {
            font-size: 80%;
        }

        /**
         * Prevent `sub` and `sup` elements from affecting the line height in
         * all browsers.
         */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /* Replaced content */
        /* ============================================ */

        /**
         * Prevent vertical alignment issues.
         */

        svg,
        img,
        embed,
        object,
        iframe {
            vertical-align: bottom;
        }

        /* Forms */
        /* ============================================ */

        /**
         * Reset form fields to make them styleable.
         * 1. Make form elements stylable across systems iOS especially.
         * 2. Inherit text-transform from parent.
         */

        button,
        input,
        optgroup,
        select,
        textarea {
            -webkit-appearance: none; /* 1 */
            appearance: none;
            vertical-align: middle;
            color: inherit;
            font: inherit;
            background: transparent;
            padding: 0;
            margin: 0;
            border-radius: 0;
            text-align: inherit;
            text-transform: inherit; /* 2 */
        }

        /**
         * Reset radio and checkbox appearance to preserve their look in iOS.
         */

        [type="checkbox"] {
            -webkit-appearance: checkbox;
            appearance: checkbox;
        }

        [type="radio"] {
            -webkit-appearance: radio;
            appearance: radio;
        }

        /**
         * Correct cursors for clickable elements.
         */

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            cursor: pointer;
        }

        button:disabled,
        [type="button"]:disabled,
        [type="reset"]:disabled,
        [type="submit"]:disabled {
            cursor: default;
        }

        /**
         * Improve outlines for Firefox and unify style with input elements & buttons.
         */

        :-moz-focusring {
            outline: auto;
        }

        select:disabled {
            opacity: inherit;
        }

        /**
         * Remove padding
         */

        option {
            padding: 0;
        }

        /**
         * Reset to invisible
         */

        fieldset {
            margin: 0;
            padding: 0;
            min-width: 0;
        }

        legend {
            padding: 0;
        }

        /**
         * Add the correct vertical alignment in Chrome, Firefox, and Opera.
         */

        progress {
            vertical-align: baseline;
        }

        /**
         * Remove the default vertical scrollbar in IE 10+.
         */

        textarea {
            overflow: auto;
        }

        /**
         * Correct the cursor style of increment and decrement buttons in Chrome.
         */

        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
         * 1. Correct the outline style in Safari.
         */

        [type="search"] {
            outline-offset: -2px; /* 1 */
        }

        /**
         * Remove the inner padding in Chrome and Safari on macOS.
         */

        [type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
         * 1. Correct the inability to style clickable types in iOS and Safari.
         * 2. Fix font inheritance.
         */

        ::-webkit-file-upload-button {
            -webkit-appearance: button; /* 1 */
            font: inherit; /* 2 */
        }

        /**
         * Clickable labels
         */

        label[for] {
            cursor: pointer;
        }

        /* Interactive */
        /* ============================================ */

        /*
         * Add the correct display in Edge, IE 10+, and Firefox.
         */

        details {
            display: block;
        }

        /*
         * Add the correct display in all browsers.
         */

        summary {
            display: list-item;
        }

        /*
         * Remove outline for editable content.
         */

        [contenteditable]:focus {
            outline: auto;
        }

        /* Tables */
        /* ============================================ */

        /**
        1. Correct table border color inheritance in all Chrome and Safari.
        */

        table {
            border-color: inherit; /* 1 */
            border-collapse: collapse;
        }

        caption {
            text-align: left;
        }

        td,
        th {
            vertical-align: top;
            padding: 0;
        }

        th {
            text-align: left;
            font-weight: bold;
        }
    </style>
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
