@extends('frontend.layouts.master')
@section('title','Cart')
@section('main-content')

<main>
    <!-- Page Header -->
    <x-breadcrumb
        :title="__('common.cart')"
        :items="[
            ['label' => __('common.home'), 'url' => route('home')],
            ['label' => __('common.cart')],
        ]" />

    <!-- Cart Section -->
    <section class="cart-section pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">                       
                    <div class="table-content cart-table">
                        <form action="#" method="post" class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="cart-product-name text-center">{{ __('common.item') }}</th>
                                        <th class="product-price">{{ __('common.price') }}</th>
                                        <th class="product-quantity">{{ __('common.quantity') }}</th>
                                        <th class="product-subtotal">{{ __('common.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Helper::cartCount())
                                        @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                            @php $photo = explode(',', $cart->product['photo']); @endphp
                                            <tr>
                                                <td class="product-remove">
                                                    <a href="{{ route('cart-delete', $cart->id) }}">
                                                        <i class="fa-sharp fa-regular fa-xmark"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail d-flex align-items-center">
                                                    <a href="{{ route('product-detail', $cart->product->slug) }}">
                                                        <img src="{{ url($photo[0]) }}" alt="{{ $cart->product['title'] }}">
                                                    </a>
                                                    <div class="product-thumbnail ms-3">
                                                        <h4 class="title">{{ $cart->product['title'] }}</h4>
                                                    </div>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">{{ Helper::getCurrencySymbol(session('currency')) }}
                                                        @if(session('currency') == 'JPY')
                                                            {{ number_format($cart['price'], 0) }}
                                                        @else
                                                            {{ number_format($cart['price'], 2, '.', ',') }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity__group">
                                                        <input type="text" name="quant[{{$key}}]" value="{{ $cart->quantity }}" class="input-text qty text" disabled>
                                                        <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">{{ Helper::getCurrencySymbol(session('currency')) }}
                                                        @if(session('currency') == 'JPY')
                                                            {{ number_format($cart['amount'], 0) }}
                                                        @else
                                                            {{ number_format($cart['amount'], 2, '.', ',') }}
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                {{ __('common.no_cart_available') }} 
                                                <a href="{{ route('product-lists') }}" style="color:blue;">{{ __('common.continue_shopping') }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </form>
                    </div>  
                </div>                        
                
                <div class="col-lg-4">
                    <div class="checkout-wrapper">
                        <div class="checkout-top checkout-item item-1">
                            <h4 class="title">{{ __('common.order_summary') }}</h4>
                        </div>
                        {{-- <div class="checkout-top checkout-item">
                            <h4 class="title">{{ __('common.subtotal') }}</h4>
                            <span class="price">{{ Helper::getCurrencySymbol(session('currency')) }}
                                {{number_format(Helper::totalCartPrice(), Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
                            </span>
                        </div> --}}                  
                        <div class="checkout-total checkout-item">
                            <h4 class="title">{{ __('common.total') }}</h4>
                            <span>{{ Helper::getCurrencySymbol(session('currency')) }}
                                @if(session('currency') == 'JPY')
                                    {{ number_format(Helper::totalCartPrice(), 0) }}
                                @else
                                    {{ number_format(Helper::totalCartPrice(), 2, '.', ',') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="checkout-proceed mt-4">
                        <a href="{{ route('checkout') }}" class="ed-primary-btn checkout-btn">
                            {{ __('common.checkout') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>             
</main>

@endsection

@push('styles')
<!-- Add your custom CSS if any -->
@endpush

@push('scripts')
<!-- Add your custom JS if any -->
@endpush
