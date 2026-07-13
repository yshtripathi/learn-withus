@extends('frontend.layouts.master')

@section('title','Checkout')

@section('main-content')

<style>
    /* ---------------------------------------------------------------
       Checkout — .co-* scoped here; reuses the shared .ct-* form system
       --------------------------------------------------------------- */
    .co-section { padding: 90px 0; background: var(--ed-color-grey-1); }

    .co-step {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 26px;
        padding-bottom: 18px;
        border-bottom: 1px solid var(--ed-color-border-1);
    }
    .co-step-num {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: var(--ed-fw-ebold);
        color: #fff;
        background: linear-gradient(135deg, var(--ed-color-theme-primary) 0%, var(--ed-color-theme-secondary) 100%);
    }
    .co-step h3 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: var(--ed-fw-ebold);
        color: var(--ed-color-heading-primary);
    }

    /* Native select, styled like .ct-input */
    select.ct-input {
        appearance: none;
        -webkit-appearance: none;
        padding-right: 44px;
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%236b7684'%3E%3Cpath d='M8 11L3 6h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 14px;
        cursor: pointer;
    }

    .co-expiry { display: flex; align-items: center; gap: 10px; }
    .co-expiry .ct-control { flex: 1 1 auto; }
    .co-expiry .ct-input { text-align: center; }
    /* only the "/" separator — scoped so it can't catch an error span */
    .co-expiry > span.co-sep { font-weight: var(--ed-fw-bold); color: #9aa5b1; }

    /* Card errors are written by JS into these spans. They are direct children of
       .ct-field (never of .ct-control / .co-expiry), so they always render on their
       own line beneath the input rather than beside it. */
    .ct-field > .ct-error {
        display: block;
        width: 100%;
        clear: both;
    }
    .ct-field > .ct-error:empty { display: none; }

    .co-agree .ct-field { margin-bottom: 12px; }
    .co-agree .ct-field:last-child { margin-bottom: 0; }

    .co-pay-note {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin: 20px 0 0;
        font-size: 0.86rem;
        color: #6b7684;
    }
    .co-pay-note img { height: 22px; width: auto; }
    .co-pay-icons { margin-top: 16px; }
    .co-pay-icons img { max-width: 100%; height: auto; }

    /* Summary line item */
    .co-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid var(--ed-color-border-1);
    }
    .co-thumb {
        flex: 0 0 56px;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 10px;
        background: var(--ed-color-grey-1);
    }
    .co-thumb img { width: 100%; height: 100%; object-fit: cover; }
    .co-item-info { flex: 1 1 auto; min-width: 0; }
    .co-item-title {
        margin: 0 0 6px;
        font-size: 0.9rem;
        font-weight: var(--ed-fw-sbold);
        line-height: 1.4;
        color: var(--ed-color-heading-primary);
    }
    .co-item-qty { font-size: 0.78rem; color: #9aa5b1; }
    .co-item-amount {
        flex-shrink: 0;
        font-size: 0.95rem;
        font-weight: var(--ed-fw-bold);
        color: var(--ed-color-heading-primary);
        white-space: nowrap;
    }

    @media (max-width: 991px) {
        .co-section { padding: 60px 0; }
    }
</style>

<x-breadcrumb
    :title="__('frontend.checkout')"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.cart'), 'url' => route('cart')],
        ['label' => __('frontend.checkout')],
    ]" />

@php
    $user     = auth()->user();
    $symbol   = Helper::getCurrencySymbol(session('currency'));
    $decimals = session('currency') == 'JPY' ? 0 : 2;
    $items    = Helper::cartCount() ? Helper::getAllProductFromCart() : collect();
@endphp

<section class="co-section">
    <div class="container">
        <form name="frmCheckout" id="frmCheckout" method="POST" action="{{ route('cart.order') }}" novalidate>
            @csrf

            <div class="row gy-4">

                <!-- Left: billing, payment, agreements -->
                <div class="col-lg-7">

                    <!-- 1. Billing -->
                    <div class="ct-card mb-4" data-aos="fade-up" data-aos-duration="700">
                        <div class="co-step">
                            <span class="co-step-num">1</span>
                            <h3>{{ __('frontend.billing_details') }}</h3>
                        </div>

                        <div class="ct-field @error('email') is-invalid @enderror">
                            <label class="ct-label" for="email">{{ __('frontend.email') }} <span>*</span></label>
                            <div class="ct-control has-icon">
                                <input type="email" name="email" id="email" class="ct-input"
                                       value="{{ old('email', $user->email ?? '') }}" placeholder="{{ __('frontend.placeholder_email') }}">
                                <i class="ct-icon fa-regular fa-envelope"></i>
                            </div>
                            @error('email')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field @error('first_name') is-invalid @enderror">
                                    <label class="ct-label" for="first_name">{{ __('frontend.first_name') }} <span>*</span></label>
                                    <div class="ct-control">
                                        <input type="text" name="first_name" id="first_name" class="ct-input"
                                               value="{{ old('first_name', $user->first_name ?? '') }}">
                                    </div>
                                    @error('first_name')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ct-field @error('last_name') is-invalid @enderror">
                                    <label class="ct-label" for="last_name">{{ __('frontend.last_name') }} <span>*</span></label>
                                    <div class="ct-control">
                                        <input type="text" name="last_name" id="last_name" class="ct-input"
                                               value="{{ old('last_name', $user->last_name ?? '') }}">
                                    </div>
                                    @error('last_name')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="ct-field @error('country') is-invalid @enderror">
                            <label class="ct-label" for="billing_country">{{ __('frontend.country') }} <span>*</span></label>
                            <div class="ct-control">
                                <select name="country" id="billing_country" class="ct-input" autocomplete="country">
                                    <option value="">{{ __('frontend.select_country') }}</option>
                                    @include('frontend.layouts._countries')
                                </select>
                            </div>
                            @error('country')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('address1') is-invalid @enderror">
                            <label class="ct-label" for="address">{{ __('frontend.street_address') }} <span>*</span></label>
                            <div class="ct-control">
                                <input type="text" name="address1" id="address" class="ct-input"
                                       value="{{ old('address1', $user->address ?? '') }}">
                            </div>
                            @error('address1')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field @error('city') is-invalid @enderror">
                                    <label class="ct-label" for="city">{{ __('frontend.town_city') }} <span>*</span></label>
                                    <div class="ct-control">
                                        <input type="text" name="city" id="city" class="ct-input"
                                               value="{{ old('city', $user->city ?? '') }}">
                                    </div>
                                    @error('city')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ct-field @error('state') is-invalid @enderror">
                                    <label class="ct-label" for="state">{{ __('frontend.state') }}</label>
                                    <div class="ct-control">
                                        <input type="text" name="state" id="state" class="ct-input"
                                               value="{{ old('state', $user->state ?? '') }}">
                                    </div>
                                    @error('state')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field @error('post_code') is-invalid @enderror">
                                    <label class="ct-label" for="post_code">{{ __('frontend.zip_code') }} <span>*</span></label>
                                    <div class="ct-control">
                                        <input type="text" name="post_code" id="post_code" class="ct-input"
                                               value="{{ old('post_code', $user->post_code ?? '') }}">
                                    </div>
                                    @error('post_code')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ct-field @error('phone') is-invalid @enderror">
                                    <label class="ct-label" for="phone">{{ __('frontend.phone') }} <span>*</span></label>
                                    <div class="ct-control has-icon">
                                        <input type="text" name="phone" id="phone" class="ct-input"
                                               value="{{ old('phone', $user->phone ?? '') }}" inputmode="tel"
                                               oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '')">
                                        <i class="ct-icon fa-solid fa-phone"></i>
                                    </div>
                                    @error('phone')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="ct-field">
                            <label class="ct-label" for="form_order_notes">{{ __('frontend.order_notes') }}</label>
                            <div class="ct-control">
                                <textarea name="form_order_notes" id="form_order_notes" rows="4" class="ct-input">{{ old('form_order_notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Payment -->
                    <div class="ct-card mb-4" data-aos="fade-up" data-aos-duration="700">
                        <div class="co-step">
                            <span class="co-step-num">2</span>
                            <h3>{{ __('frontend.choose_payment_method') }}</h3>
                        </div>

                        <div class="ct-field">
                            <label class="ct-label" for="name_on_card">{{ __('frontend.card_holder_name') }} <span>*</span></label>
                            <div class="ct-control has-icon">
                                <input type="text" name="name" id="name_on_card" class="ct-input"
                                       placeholder="{{ __('frontend.card_holder_name') }}">
                                <i class="ct-icon fa-regular fa-user"></i>
                            </div>
                        </div>

                        <div class="ct-field">
                            <label class="ct-label" for="card_number">{{ __('frontend.card_number') }} <span>*</span></label>
                            <div class="ct-control has-icon">
                                <input type="text" name="card_number" id="card_number" class="ct-input cc-number"
                                       placeholder="0000 0000 0000 0000" inputmode="numeric"
                                       oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
                                <i class="ct-icon fa-regular fa-credit-card" id="card-icon"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field">
                                    <label class="ct-label" for="expiry_month">{{ __('frontend.card_expiry') }} <span>*</span></label>
                                    <div class="co-expiry">
                                        <div class="ct-control">
                                            <input type="text" name="expiry_month" id="expiry_month" class="ct-input"
                                                   placeholder="MM" maxlength="2" inputmode="numeric"
                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                        <span class="co-sep">/</span>
                                        <div class="ct-control">
                                            <input type="text" name="expiry_year" id="expiry_year" class="ct-input cc-year"
                                                   placeholder="YYYY" maxlength="4" inputmode="numeric"
                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ct-field">
                                    <label class="ct-label" for="cvv">{{ __('frontend.card_cvc') }} <span>*</span></label>
                                    <div class="ct-control has-icon">
                                        <input type="text" name="cvv" id="cvv" class="ct-input cc-cvc"
                                               placeholder="{{ __('frontend.card_cvc') }}" inputmode="numeric"
                                               oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        <i class="ct-icon fa-solid fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ct-field @error('captcha') is-invalid @enderror">
                            <div class="ct-captcha">
                                <div class="ct-control">
                                    <input type="text" name="captcha" id="captcha" class="ct-input"
                                           autocomplete="off" placeholder="{{ __('frontend.placeholder_captcha') }}">
                                </div>
                                <div class="ct-captcha-img">
                                    @captcha
                                </div>
                            </div>
                            @error('captcha')<span class="ct-error">{{ __('frontend.error_captcha_invalid') }}</span>@enderror
                        </div>

                        <p class="co-pay-note">
                            {{ __('frontend.when_you_purchase') }}
                            <img src="{{ asset('assets/images/dba.png') }}" alt="dba">
                        </p>

                        <div class="co-pay-icons">
                            <img src="{{ asset('assets/img/payment.png') }}" alt="payment methods">
                        </div>
                    </div>

                    <!-- 3. Agreements -->
                    <div class="ct-card co-agree" data-aos="fade-up" data-aos-duration="700">
                        <div class="co-step">
                            <span class="co-step-num">3</span>
                            <h3>{{ __('frontend.terms_policy') }}</h3>
                        </div>

                        @php
                            $agreements = [
                                ['name' => 'terms',    'slug' => 'terms-conditions', 'label' => __('frontend.terms_policy')],
                                ['name' => 'privacy',  'slug' => 'privacy-policy',   'label' => __('frontend.privacy_policy')],
                                ['name' => 'delivery', 'slug' => 'delivery-policy',  'label' => __('frontend.delivery_policy')],
                                ['name' => 'refund',   'slug' => 'refund-policy',    'label' => __('frontend.refund_policy')],
                            ];
                        @endphp

                        @foreach($agreements as $agreement)
                            <div class="ct-field">
                                <div class="ct-check">
                                    <input type="checkbox" name="{{ $agreement['name'] }}" id="{{ $agreement['name'] }}" value="1">
                                    <label for="{{ $agreement['name'] }}">
                                        {{ __('frontend.terms_agreement') }}
                                        <a href="{{ route('pages', $agreement['slug']) }}" target="_blank">{{ $agreement['label'] }}</a>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: order summary -->
                <div class="col-lg-5">
                    <aside class="cr-summary" data-aos="fade-left" data-aos-duration="800">
                        <h3>{{ __('frontend.your_order') }}</h3>

                        @forelse($items as $cart)
                            @php
                                $photo = explode(',', $cart->product['photo']);
                                $level = $cart->level;
                            @endphp
                            <div class="co-item">
                                <div class="co-thumb">
                                    <img src="{{ url($photo[0]) }}" alt="{{ $cart->product['title'] }}">
                                </div>
                                <div class="co-item-info">
                                    <h4 class="co-item-title">{{ $cart->product['title'] }}</h4>
                                    @if($level)
                                        <span class="cr-badge">
                                            <i class="fa-solid fa-layer-group"></i>
                                            {{ $level->localized('skill_level') }}
                                        </span>
                                    @endif
                                    <span class="co-item-qty">{{ __('frontend.quantity') }}: <b>{{ $cart->quantity }}</b></span>
                                </div>
                                <span class="co-item-amount">
                                    {{ $symbol }} {{ number_format($cart['amount'], $decimals, '.', ',') }}
                                </span>
                            </div>
                        @empty
                            <p class="cr-row">{{ __('frontend.no_cart_available') }}</p>
                        @endforelse

                        <div class="cr-total">
                            <span>{{ __('frontend.total') }}:</span>
                            <b>{{ $symbol }} {{ number_format(Helper::totalCartPrice(), $decimals, '.', ',') }}</b>
                        </div>

                        <button type="submit" class="ct-submit">
                            <i class="fa-solid fa-lock"></i>
                            <span>{{ __('frontend.place_order') }}</span>
                        </button>

                        <a href="{{ route('cart') }}" class="cr-continue">{{ __('frontend.cart') }}</a>
                    </aside>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery.payment.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function () {

        var CARD_TYPES = [
            { pattern: /^3[47]/,                                pattern_lengths: [15], icon: 'fa-cc-amex' },
            { pattern: /^4/,                                    pattern_lengths: [16], icon: 'fa-cc-visa' },
            { pattern: /^5[1-5]/,                               pattern_lengths: [16], icon: 'fa-cc-mastercard' },
            { pattern: /^(5018|5020|5038|6304|6759|676[1-3])/,  pattern_lengths: [12,13,14,15,16,17,18,19], icon: 'fa-cc-mastercard' },
            { pattern: /^(6011|65)/,                            pattern_lengths: [16], icon: 'fa-cc-discover' },
            { pattern: /^35(2[89]|[3-8][0-9])/,                 pattern_lengths: [16], icon: 'fa-cc-jcb' },
            { pattern: /^3(0[0-5]|6)/,                          pattern_lengths: [14], icon: 'fa-cc-diners-club' }
        ];

        function digits(value) {
            return (value || '').replace(/\D/g, '');
        }

        function cardType(number) {
            for (var i = 0; i < CARD_TYPES.length; i++) {
                if (number.match(CARD_TYPES[i].pattern)) return CARD_TYPES[i];
            }
            return null;
        }

        function luhnValid(number) {
            var sum = 0;
            var reversed = number.split('').reverse();
            for (var n = 0; n < reversed.length; n++) {
                var digit = +reversed[n];
                if (n % 2) {
                    digit *= 2;
                    if (digit > 9) digit -= 9;
                }
                sum += digit;
            }
            return reversed.length > 0 && sum % 10 === 0;
        }

        // Card checks are registered as jQuery Validate rules so their messages go
        // through the same errorPlacement as every other field (i.e. below the input).
        // Previously they lived in a separate function that only ran on submit, which
        // never fired while the billing fields were still invalid.
        $.validator.addMethod('cardnumber', function (value, element) {
            if (this.optional(element)) return true;
            var number = digits(value);
            var type = cardType(number);
            return !!type && luhnValid(number) && type.pattern_lengths.indexOf(number.length) >= 0;
        }, "{{ __('frontend.error_card_number_invalid') }}");

        $.validator.addMethod('cardname', function (value, element) {
            return this.optional(element) || /^[a-z ,.'-]+$/i.test(value);
        }, "{{ __('frontend.error_card_name_invalid') }}");

        $.validator.addMethod('expmonth', function (value, element) {
            return this.optional(element) || /^(0[1-9]|1[0-2])$/.test(value);
        }, "{{ __('frontend.error_card_month_invalid') }}");

        $.validator.addMethod('expyear', function (value, element) {
            return this.optional(element) || /^\d{4}$/.test(value);
        }, "{{ __('frontend.error_card_year_invalid') }}");

        // Reads the month field too, so "12 / 2020" is caught as expired.
        $.validator.addMethod('notexpired', function (value, element) {
            if (this.optional(element)) return true;
            var year = parseInt(value, 10);
            var month = parseInt($('#expiry_month').val(), 10);
            if (isNaN(year) || isNaN(month)) return true; // other rules report this

            var now = new Date();
            if (year < now.getFullYear()) return false;
            if (year === now.getFullYear() && month < now.getMonth() + 1) return false;
            return true;
        }, "{{ __('frontend.error_card_expired') }}");

        $.validator.addMethod('cvcformat', function (value, element) {
            return this.optional(element) || /^[0-9]{3,4}$/.test(digits(value));
        }, "{{ __('frontend.error_card_cvc_invalid') }}");

        // Card input masks + live card-brand icon.
        $('.cc-number').payment('formatCardNumber');
        $('.cc-cvc').payment('formatCardCVC');

        $('#card_number').on('input', function () {
            var type = cardType(digits($(this).val()));
            $('#card-icon').attr('class', type ? 'ct-icon fa-brands ' + type.icon : 'ct-icon fa-regular fa-credit-card');
        });

        $("#frmCheckout").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                first_name: "required",
                last_name: "required",
                email: { required: true, email: true },
                phone: { required: true, minlength: 10 },
                address1: "required",
                post_code: "required",
                city: "required",
                state: "required",
                country: "required",

                name:         { required: true, cardname: true },
                card_number:  { required: true, cardnumber: true },
                expiry_month: { required: true, expmonth: true },
                expiry_year:  { required: true, expyear: true, notexpired: true },
                cvv:          { required: true, cvcformat: true },

                terms: "required",
                privacy: "required",
                delivery: "required",
                refund: "required",
                captcha: "required"
            },
            messages: {
                first_name: "{{ __('frontend.error_name_required') }}",
                last_name: "{{ __('frontend.error_name_required') }}",
                email: "{{ __('frontend.error_email_required') }}",
                phone: {
                    required: "{{ __('frontend.error_phone_required') }}",
                    minlength: "{{ __('frontend.error_phone_min') }}"
                },
                address1: "{{ __('frontend.error_address_required') }}",
                post_code: "{{ __('frontend.error_post_code_required') }}",
                city: "{{ __('frontend.error_city_required') }}",
                state: "{{ __('frontend.error_state_required') }}",
                country: "{{ __('frontend.error_country_required') }}",

                name:         { required: "{{ __('frontend.error_card_name_invalid') }}" },
                card_number:  { required: "{{ __('frontend.error_card_number_invalid') }}" },
                expiry_month: { required: "{{ __('frontend.error_card_month_invalid') }}" },
                expiry_year:  { required: "{{ __('frontend.error_card_year_invalid') }}" },
                cvv:          { required: "{{ __('frontend.error_card_cvc_invalid') }}" },

                terms: "{{ __('frontend.error_accept_terms') }}",
                privacy: "{{ __('frontend.error_accept_privacy') }}",
                delivery: "{{ __('frontend.error_accept_delivery') }}",
                refund: "{{ __('frontend.error_accept_refund') }}",
                captcha: "{{ __('frontend.error_captcha_required') }}"
            },
            // .ct-field is a block, so the message lands under the control — including
            // for the month/year pair and the checkbox rows, which are flex.
            errorPlacement: function (error, element) {
                error.appendTo(element.closest('.ct-field'));
            },
            highlight: function (element) {
                $(element).closest('.ct-field').addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).closest('.ct-field').removeClass('is-invalid');
            }
        });
    });
</script>
@endpush

