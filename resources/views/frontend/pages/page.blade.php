@extends('frontend.layouts.master')

@section('title', $page_data->page_title)
@section('main-content')
<main>
    <section class="page-header">
            <div class="bg-item">
                <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header.webp') }}"></div>
                <div class="overlay"></div>
                <div class="shapes">
                    <div class="shape shape-1"><img src="{{ asset('assets/img/shapes/page-header-shape-1.png') }}" alt="shape"></div>
                    <div class="shape shape-2"><img src="{{ asset('assets/img/shapes/page-header-shape-2.png') }}" alt="shape"></div>
                    <div class="shape shape-3"><img src="{{ asset('assets/img/shapes/page-header-shape-3.png') }}" alt="shape"></div>
                </div>
            </div>
            <div class="container">
                <div class="page-header-content">
                    <h1 class="title">{{ $page_data->page_title }}</h1>
                    <h4 class="sub-title"><a class="home" href="{{route('home')}}">{{ __('common.home') }} </a><span class="icon">/</span><a class="javascript:void(0)" href="">{{ $page_data->page_title }}</a></h4>
                </div>
            </div>
        </section>
      
        <!-- End Breadcrumb Area  -->
        {!! $page_data->page_desc !!}
</main>
@endsection