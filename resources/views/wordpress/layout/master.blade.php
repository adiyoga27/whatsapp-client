<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="twitter:title" content="{{ $meta['title'] }}">
    <meta name="twitter:description" content="{{ $meta['des'] }}">
    <meta name="twitter:image" content="{{ $meta['image'] }}">
    <meta name="og:title" content="{{ $meta['title'] }}">
    <meta name="og:image" content="{{ $meta['image'] }}">
    <meta name="og:description" content="{{ $meta['des'] }}">
    <meta name="apple-mobile-web-app-title" content="{{ $meta['title'] }}">
    <title>{{ $meta['title'] }}</title>
    <link rel="icon" href="{{ asset('assets/images/logo-header.png') }}">
    <link rel="stylesheet" href="{{ asset('/wordpress/css/swiper-bundle.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @vite('resources/sass/wordpress.scss')
</head>

<body class="">
    @yield('content')
    <script src="{{ asset('/wordpress/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('/wordpress/js/swiper-bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"
        integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/wordpress/js/helper.js') }}"></script>
    <script src="{{ asset('/wordpress/js/moment-with-locales.min.js') }}"></script>
    @yield('script')
</body>

</html>
