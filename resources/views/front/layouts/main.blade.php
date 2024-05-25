<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Mon Dec 05 2022 22:25:32 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="638e6fa2a986f4d12d6ff0f7" data-wf-site="638e6fa2a986f4769c6ff0ef">

<head>

    {!! htmlScriptTagJsApi(['lang' => 'es']) !!}
    @php
        $seo = App\Models\SEO::first();
    @endphp

    <meta charset="utf-8">
    <title>{{ $seo->page_title ?? 'Derch' }}</title>
    <meta content="Home explore" property="og:title">
    <meta content="Home explore" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="{{ $seo->page_title ?? 'Derch' }}" name="generator">
    <meta name="description" content="{{ $seo->page_description ?? 'Derch' }}">
    <meta name="theme-color" content="{{ $seo->page_theme_color_hex ?? '#ffffff' }}">
    <meta name="keywords" content="{{ $seo->page_keywords ?? '' }}">
    <link rel="canonical" href="{{ $seo->page_canonical_url ?? '' }}">

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#4ab2cf">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">

    @stack('seo')

    <!--Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <link rel="stylesheet" href="{{ asset('front/css/font-face-aspekta.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/derch.css') }}">


    @stack('styles')
</head>

<body>

    @include('front.layouts.header')


    @include('front.layouts.partials._messages')
    @include('front.layouts.partials._modal_messages')
    <article class="content">
        @yield('content')
    </article>

    <a href="https://wa.me/524777955167?text=Hola!%20Necesito%20más%20información%20de%20sus%20servicios"
        class="whatsapp-btn" target="black" data-bs-toggle="tooltip" data-bs-title="Chatea con nosotros!">
        <ion-icon name="logo-whatsapp"></ion-icon>
    </a>


    @include('front.layouts.footer')

    @include('front.layouts.partials._cookies_notice')

    <!-- BASE JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- ANIMATIONS JS -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.0.45/dist/lenis.min.js"></script>


    @stack('scripts')


    <script src="{{ asset('front/js/derch.js') }}"></script>

</body>

</html>
