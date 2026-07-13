@extends('frontend.layouts.master')

@section('title','Order Status')

@section('main-content')

<x-breadcrumb
    :title="__('common.order_status')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.order_status')],
    ]" />

<section class="os-section">
    <div class="container">
        <div class="os-card" data-aos="fade-up" data-aos-duration="1000">

            <div class="os-icon os-icon-failed">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <h2 class="os-title">{{ __('common.payment_unsuccessful') }}</h2>
            <p class="os-sub">{{ __('common.payment_failure_message') }}</p>

            <div class="os-panel">
                <h5>{{ __('common.payment_error') }}</h5>
                <p>{{ __('common.what_you_can_do') }}</p>
                <ul class="os-list mt-2">
                    <li>{{ __('common.check_payment_details') }}</li>
                    <li>{{ __('common.contact_bank') }}</li>
                    <li>{{ __('common.try_different_payment') }}</li>
                </ul>
            </div>

            <div class="os-panel">
                <h5>{{ __('common.need_assistance') }}</h5>
                <p>
                    {{ __('common.reach_out') }}. {{ __('common.we_are_here') }}
                    <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a>
                </p>
            </div>

            <div class="os-actions">
                <a href="{{ route('cart') }}" class="ct-submit">
                    <i class="fa-solid fa-rotate-right"></i>
                    <span>{{ __('common.try_again') }}</span>
                </a>
                <a href="{{ route('contact') }}" class="ct-submit os-btn-outline">
                    <span>{{ __('common.contact_us') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
