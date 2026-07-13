@extends('frontend.layouts.master')

@section('title','Order Detail')

@section('main-content')

<x-breadcrumb
    :title="__('common.order_detail')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.order_detail')],
    ]" />

@php
    $symbol   = Helper::getCurrencySymbol($order->currency);
    $decimals = $order->currency == 'JPY' ? 0 : 2;
    $total    = number_format($order->total_amount, $decimals);

    $status = strtolower($order->status);
    $statusClass = match($status) {
        'delivered' => 'or-status-delivered',
        'process'   => 'or-status-process',
        'cancel'    => 'or-status-cancel',
        default     => 'or-status-new',
    };

    $paymentStatus = strtolower($order->payment_status);
    $paymentClass = in_array($paymentStatus, ['paid', 'completed', 'success'])
        ? 'or-status-delivered'
        : 'or-status-process';
@endphp

<section class="or-section">
    <div class="container">

        <div class="or-actions">
            <a href="{{ route('user') }}" class="ct-submit os-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                <span>{{ __('common.back') }}</span>
            </a>
            <a href="{{ route('order.pdf', $order->id) }}" class="ct-submit">
                <i class="fa-solid fa-download"></i>
                <span>{{ __('common.generate_pdf') }}</span>
            </a>
        </div>

        <div class="row gy-4">

            <!-- Items -->
            <div class="col-lg-7">
                <div class="or-panel" data-aos="fade-up" data-aos-duration="700">
                    <h3>{{ __('common.your_order') }}</h3>

                    @forelse($order->cart_info as $cart)
                        @php
                            $product = $cart->product;
                            $photo   = $product ? explode(',', $product->photo) : [];
                            $level   = $cart->level;

                            $lineAmount = $order->currency == 'JPY'
                                ? $cart->amount_jp
                                : ($order->currency == 'HKD' ? $cart->amount_hk : $cart->amount);
                        @endphp

                        <div class="or-item">
                            @if($product)
                                <div class="co-thumb">
                                    <img src="{{ url($photo[0]) }}" alt="{{ $product->title }}">
                                </div>
                            @endif

                            <div class="or-item-info">
                                <h4>{{ $product->title ?? __('common.product') }}</h4>

                                @if($level)
                                    <span class="cr-badge">
                                        <i class="fa-solid fa-layer-group"></i>
                                        {{ $level->localized('skill_level') }}
                                    </span>
                                @endif

                                <span class="or-item-qty">
                                    {{ __('common.quantity') }}: <b>{{ $cart->quantity }}</b>
                                </span>
                            </div>

                            <span class="or-item-amount">
                                {{ $symbol }}{{ number_format($lineAmount, $decimals) }}
                            </span>
                        </div>
                    @empty
                        <p class="or-item-qty">{{ __('common.no_cart_available') }}</p>
                    @endforelse
                </div>
            </div>

            <!-- Order information -->
            <div class="col-lg-5">
                <div class="or-panel" data-aos="fade-left" data-aos-duration="700">
                    <h3>{{ __('common.order_information') }}</h3>

                    <dl class="or-grid">
                        <div>
                            <dt>{{ __('common.order_number') }}</dt>
                            <dd>{{ $order->order_number }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.order_date') }}</dt>
                            <dd>{{ $order->created_at ? $order->created_at->format('d M, Y') : '—' }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.name') }}</dt>
                            <dd>{{ $order->first_name }} {{ $order->last_name }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.email') }}</dt>
                            <dd>{{ $order->email }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.quantity') }}</dt>
                            <dd>{{ $order->quantity }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.status') }}</dt>
                            <dd><span class="or-status {{ $statusClass }}">{{ ucwords($order->status) }}</span></dd>
                        </div>
                        <div>
                            <dt>{{ __('common.payment_method') }}</dt>
                            <dd>{{ $order->payment_method ?: __('common.credit_card_debit_card') }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.payment_status') }}</dt>
                            <dd><span class="or-status {{ $paymentClass }}">{{ ucwords($order->payment_status) }}</span></dd>
                        </div>
                        <div>
                            <dt>{{ __('common.transaction_id') }}</dt>
                            <dd>{{ $order->trans_id ?: '—' }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('common.total_amount') }}</dt>
                            <dd class="or-amount">{{ $symbol }}{{ $total }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
