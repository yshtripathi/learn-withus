    @yield('meta')
    <meta charset="utf-8">
    <meta name="robots" content="index, follow" />
    <title>@yield('title','Learn Withus | Online Courses in Health, Wellness & Lifestyle')</title>
   <meta name="description" content="@yield('meta_description', 'Learn Withus offers expert-led online courses in health, wellness, fitness, nutrition, and lifestyle improvement. Learn at your own pace and transform your life.')">
   <meta name="keywords" content="@yield('meta_keywords', 'health courses, wellness courses, lifestyle learning, online health training, fitness courses, nutrition courses, stress management, self-care education')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title','Learn Withus | Online Health, Wellness & Lifestyle Courses')">
    <meta property="og:description" content="@yield('meta_description', 'Discover health, wellness, and lifestyle courses designed to help you live better. Learn fitness, nutrition, stress relief, and personal wellness online with Learn Withus.')">
    <meta property="og:image" content="{{ asset('assets/img/images/about-img-1.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Learn Withus">
    <meta property="og:locale" content="en_US">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
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
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6MCBG8R507"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6MCBG8R507');
</script>
