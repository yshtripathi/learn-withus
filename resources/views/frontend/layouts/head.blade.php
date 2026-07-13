    @yield('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    
    <!-- Primary Meta Tags -->
    <title>@yield('title', __('frontend.default_page_title'))</title>
    <meta name="description" content="@yield('meta_description', __('frontend.default_page_description'))">
    <meta name="keywords" content="@yield('meta_keywords', __('frontend.default_page_keywords'))">

    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', __('frontend.default_og_title'))">
    <meta property="og:description" content="@yield('og_description', __('frontend.default_og_description'))">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/images/about-img-1.jpg'))">
    <meta property="og:site_name" content="{{ __('frontend.platform_name') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('twitter_title', __('frontend.default_twitter_title'))">
    <meta name="twitter:description" content="@yield('twitter_description', __('frontend.default_twitter_description'))">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/images/about-img-1.jpg'))">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/keyframe-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    
    @cookieconsentscripts
