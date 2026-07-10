@extends('frontend.layouts.master')

@section('title','Order Status')

@section('main-content')
<section class="page-header">
            <div class="bg-item">
                <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header-bg.png') }}"></div>
                <div class="overlay"></div>
                <div class="shapes">
                    <div class="shape shape-1"><img src="{{ asset('assets/img/shapes/page-header-shape-1.png') }}" alt="shape"></div>
                    <div class="shape shape-2"><img src="{{ asset('assets/img/shapes/page-header-shape-2.png') }}" alt="shape"></div>
                    <div class="shape shape-3"><img src="{{ asset('assets/img/shapes/page-header-shape-3.png') }}" alt="shape"></div>
                </div>
            </div>
            <div class="container">
                <div class="page-header-content">
                    <h1 class="title"> {{ __('common.order_status') }} </h1>
                    <h4 class="sub-title"><a class="home" href="{{ route('home') }}">{{ __('common.home') }} </a>
                    <span class="icon">/</span><a class="javascript:void(0)" >{{ __('common.order_status') }}</a></h4>
                </div>
            </div>
        </section>
        <section class="appointment-section pt-5 pb-5">
    <div class="container">
        <div class="appointment-wrap">
            <div class="shape">
                <img src="{{ asset('assets/img/new-update-2/shapes/appoint-shape.png') }}" alt="shape">
            </div>
            <div class="appointment-top">
                <div class="section-heading mb-3">
                    <h2 class="order-failed">{{ __('common.payment_unsuccessful') }}</h2>
                                <h3>{{ __('common.payment_error') }}</h3>
                                <p>{{ __('common.payment_failure_message') }}</p>
                                <h5>{{ __('common.what_you_can_do') }}</h5>
                                <ul style="list-style:none;" class="text-white">
                                <li>{{ __('common.check_payment_details') }}</li>
                                <li>{{ __('common.contact_bank') }}</li>
                                <li>{{ __('common.try_different_payment') }}</li>
                                </ul>
                                <h5>{{ __('common.need_assistance') }}</h5>
                                <p>{{ __('common.reach_out') }}. {{ __('common.we_are_here') }} <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection