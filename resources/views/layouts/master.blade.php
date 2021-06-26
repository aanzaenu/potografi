<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Creative Multipurpose HTML template.">
    <meta name="keywords" content="portfolio, clean, minimal, blog, template, portfolio website">
    <meta name="author" content="aanzaenu">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i%7cWork+Sans:400,500,700%7cPT+Serif:400i,500i,700i" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}" media="all">
    
    <!-- Stroke 7 -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css') }}"  media="all">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/flickity/dist/flickity.min.css') }}"  media="all">

    <!-- Photoswipe -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/photoswipe/dist/photoswipe.css') }}"  media="all">
    <link rel="stylesheet" href="{{ asset('assets/vendor/photoswipe/dist/default-skin/default-skin.css') }}"  media="all">

    <!-- JustifiedGallery -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/justifiedGallery/dist/css/justifiedGallery.min.css') }}" media="all">

    <!-- Skylith -->
    <link rel="stylesheet" href="{{ asset('assets/css/skylith-red.min.css') }}" media="all">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" media="all">
    @yield('style')
</head>
<body>
    <div id="app">
        @include('layouts.header')
        @include('layouts.nav')
        @yield('content')
        @include('layouts.footer')
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>

    <!-- Popper -->
    <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- FontAwesome -->
    <script defer src="{{ asset('assets/vendor/fontawesome-free/js/all.js') }}"></script>
    <script defer src="{{ asset('assets/vendor/fontawesome-free/js/v4-shims.js') }}"></script>

    <!-- Object Fit Polyfill -->
    <script src="{{ asset('assets/vendor/object-fit-images/dist/ofi.min.js') }}"></script>

    <!-- ImagesLoaded -->
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

    <!-- GSAP -->
    <script src="{{ asset('assets/vendor/gsap/dist/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/dist/ScrollToPlugin.min.js') }}"></script>

    <!-- Sticky Kit -->
    <script src="{{ asset('assets/vendor/sticky-kit/dist/sticky-kit.min.js') }}"></script>

    <!-- Jarallax -->
    <script src="{{ asset('assets/vendor/jarallax/dist/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jarallax/dist/jarallax-video.min.js') }}"></script>

    <!-- Flickity -->
    <script src="{{ asset('assets/vendor/flickity/dist/flickity.pkgd.min.js') }}"></script>

    <!-- Isotope -->
    <script src="{{ asset('assets/vendor/isotope-layout/dist/isotope.pkgd.min.js') }}"></script>

    <!-- Photoswipe -->
    <script src="{{ asset('assets/vendor/photoswipe/dist/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js') }}"></script>

    <!-- JustifiedGallery -->
    <script src="{{ asset('assets/vendor/justifiedGallery/dist/js/jquery.justifiedGallery.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <!-- Hammer.js -->
    <script src="{{ asset('assets/vendor/hammerjs/hammer.min.js') }}"></script>

    <!-- Keymaster -->
    <script src="{{ asset('assets/vendor/keymaster/keymaster.js') }}"></script>


    <!-- Skylith -->
    <script src="{{ asset('assets/js/skylith.min.js') }}"></script>
    <script src="{{ asset('assets/js/skylith-init.js') }}"></script>
    @yield('script')
</body>
</html>
