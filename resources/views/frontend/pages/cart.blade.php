@extends('frontend.layouts.master')
@section('title','Cart')
@section('main-content')

<x-breadcrumb
    :title="__('common.cart')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.cart')],
    ]" />

@php
    $symbol   = Helper::getCurrencySymbol(session('currency'));
    $isJpy    = session('currency') == 'JPY';
    $decimals = $isJpy ? 0 : 2;
    $items    = Helper::cartCount() ? Helper::getAllProductFromCart() : collect();
@endphp

<section class="cr-section">
    <div class="container">

        @if(count($items))
            <div class="row gy-4">

                <!-- Line items -->
                <div class="col-lg-8">
                    <div class="cr-head">
                        <h2>{{ __('common.cart') }}</h2>
                        <span>{{ count($items) }} {{ count($items) === 1 ? __('common.item') : __('common.items') }}</span>
                    </div>

                    @foreach($items as $cart)
                        @php
                            $photo = explode(',', $cart->product['photo']);
                            $level = $cart->level;
                        @endphp

                        <div class="cr-item" data-aos="fade-up" data-aos-duration="600">
                            <a href="{{ route('product-detail', $cart->product->slug) }}" class="cr-thumb">
                                <img src="{{ url($photo[0]) }}" alt="{{ $cart->product['title'] }}">
                            </a>

                            <div class="cr-info">
                                <h4 class="cr-title">
                                    <a href="{{ route('product-detail', $cart->product->slug) }}">
                                        {{ $cart->product['title'] }}
                                    </a>
                                </h4>

                                @if($level)
                                    <span class="cr-badge">
                                        <i class="fa-solid fa-layer-group"></i>
                                        {{ $level->localized('skill_level') }}
                                    </span>
                                @else
                                    {{-- Added before levels were recorded, or added without picking one. --}}
                                    <span class="cr-badge cr-badge-none">{{ __('common.no_level_selected') }}</span>
                                @endif

                                <p class="cr-unit">
                                    {{ $symbol }} {{ number_format($cart['price'], $decimals, '.', ',') }}
                                    &times; <b>{{ $cart->quantity }}</b>
                                </p>
                            </div>

                            <div class="cr-right">
                                <span class="cr-amount">
                                    {{ $symbol }} {{ number_format($cart['amount'], $decimals, '.', ',') }}
                                </span>
                                <a href="{{ route('cart-delete', $cart->id) }}" class="cr-remove" title="{{ __('common.remove') }}">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Summary -->
                <div class="col-lg-4">
                    <aside class="cr-summary" data-aos="fade-left" data-aos-duration="800">
                        <h3>{{ __('common.order_summary') }}</h3>

                        @foreach($items as $cart)
                            <div class="cr-row">
                                <span>{{ Str::limit($cart->product['title'], 24) }}</span>
                                <span>{{ $symbol }} {{ number_format($cart['amount'], $decimals, '.', ',') }}</span>
                            </div>
                        @endforeach

                        <div class="cr-total">
                            <span>{{ __('common.total') }}</span>
                            <b>{{ $symbol }} {{ number_format(Helper::totalCartPrice(), $decimals, '.', ',') }}</b>
                        </div>

                        <a href="{{ route('checkout') }}" class="ct-submit">
                            <span>{{ __('common.checkout') }}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <a href="{{ route('product-lists') }}" class="cr-continue">
                            {{ __('common.continue_shopping') }}
                        </a>
                    </aside>
                </div>
            </div>
        @else
            <div class="cr-empty" data-aos="fade-up" data-aos-duration="800">
                <i class="fa-solid fa-cart-shopping"></i>
                <h4>{{ __('common.no_cart_available') }}</h4>
                <p>{{ __('common.try_another_category') }}</p>
                <a href="{{ route('product-lists') }}" class="ct-submit">
                    <i class="fa-solid fa-palette"></i>
                    <span>{{ __('common.continue_shopping') }}</span>
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
