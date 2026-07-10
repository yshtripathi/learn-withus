<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
	@include('frontend.layouts.notification')
    @include('frontend.layouts.header')
	<main>
	@yield('main-content')
	</main>
	@include('frontend.layouts.footer')
</body>
</html> 
@stack('scripts')


    
