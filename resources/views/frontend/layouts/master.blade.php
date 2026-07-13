<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
    @include('frontend.layouts.header')
	@include('frontend.layouts.notification')
	<main>
	@yield('main-content')
	</main>
	@include('frontend.layouts.footer')
</body>
</html> 
@stack('scripts')


    
