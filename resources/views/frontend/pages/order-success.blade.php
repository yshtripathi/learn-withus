@extends('frontend.layouts.master')

@section('title', __('frontend.order_status_title'))

@section('main-content')

<x-breadcrumb
    :title="__('frontend.order_status')"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.order_status')],
    ]" />

<section class="os-section">
    <div class="container">
        <div class="os-card" data-aos="fade-up" data-aos-duration="1000">

            <div class="os-icon os-icon-success">
                <i class="fa-solid fa-check"></i>
            </div>

            <h2 class="os-title">{{ __('frontend.order_successful') }}</h2>
            <p class="os-sub">{{ __('frontend.thank_you_order') }}</p>

            <div class="os-invoice">
                <i class="fa-regular fa-file-lines"></i>
                <span>{{ __('frontend.invoice_number') }}</span>
                <b>{{ $transaction_id }}</b>
            </div>

            <div class="os-panel">
                <h5><i class="fa-regular fa-envelope"></i> {{ __('frontend.order_confirmation') }} {{ $transaction_id }}</h5>
                <p>{{ __('frontend.team_contact') }}</p>
            </div>

            <div class="os-panel">
                <h5>{{ __('frontend.need_assistance') }}</h5>
                <p>
                    {{ __('frontend.reach_out_for_help') }}
                    <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a>
                </p>
            </div>

            <div class="os-actions">
                <a href="{{ route('product-lists') }}" class="ct-submit">
                    <i class="fa-solid fa-palette"></i>
                    <span>{{ __('frontend.continue_shopping') }}</span>
                </a>
                <a href="{{ route('home') }}" class="ct-submit os-btn-outline">
                    <span>{{ __('frontend.home') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
