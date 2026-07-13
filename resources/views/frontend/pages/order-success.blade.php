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

            <div class="os-icon os-icon-success">
                <i class="fa-solid fa-check"></i>
            </div>

            <h2 class="os-title">{{ __('common.order_successful') }}</h2>
            <p class="os-sub">{{ __('common.thank_you_order') }}</p>

            <div class="os-invoice">
                <i class="fa-regular fa-file-lines"></i>
                <span>{{ __('common.invoice_number') }}</span>
                <b>{{ $transaction_id }}</b>
            </div>

            <div class="os-panel">
                <h5><i class="fa-regular fa-envelope"></i> {{ __('common.order_confirmation') }} {{ $transaction_id }}</h5>
                <p>{{ __('common.team_contact') }}</p>
            </div>

            <div class="os-panel">
                <h5>{{ __('common.need_assistance') }}</h5>
                <p>
                    {{ __('common.reach_out_for_help') }}
                    <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a>
                </p>
            </div>

            <div class="os-actions">
                <a href="{{ route('product-lists') }}" class="ct-submit">
                    <i class="fa-solid fa-palette"></i>
                    <span>{{ __('common.continue_shopping') }}</span>
                </a>
                <a href="{{ route('home') }}" class="ct-submit os-btn-outline">
                    <span>{{ __('common.home') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
