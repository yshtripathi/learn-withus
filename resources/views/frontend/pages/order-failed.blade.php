@extends('frontend.layouts.master')

@section('title','Order Status')

@section('main-content')
<x-breadcrumb
            :title="__('common.order_status')"
            :items="[
                ['label' => __('common.home'), 'url' => route('home')],
                ['label' => __('common.order_status')],
            ]" />
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