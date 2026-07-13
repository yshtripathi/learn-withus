@php
    $categories = Helper::productCategoryList('all');
    $cartItems  = Helper::cartCount() ? Helper::getAllProductFromCart() : collect();
    $symbol     = Helper::getCurrencySymbol(session('currency'));
    $decimals   = session('currency') == 'JPY' ? 0 : 2;

    $currencyLabel = match(session('currency')) {
        'JPY' => '¥ JPY',
        'HKD' => 'HK$ HKD',
        default => '$ USD',
    };
    $isJa = session('app_locale') == 'ja';
@endphp

<style>
    /* ==========================================================================
       Header (.hd-*) — self-contained: its own classes and JS, so it doesn't
       depend on the theme's handlers.
       ========================================================================== */
    .hd {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid var(--ed-color-border-1);
        transition: box-shadow 0.3s ease, background 0.3s ease;
    }
    .hd.is-stuck {
        background: #fff;
        box-shadow: 0 8px 30px rgba(0, 29, 51, 0.08);
    }
    .hd-inner {
        display: flex;
        align-items: center;
        gap: 20px;
        min-height: 76px;
    }

    .hd-logo img {
        display: block;
        height: 65px;
        width: auto;
        transition: transform 0.3s ease;
    }
    .hd-logo:hover img { transform: scale(1.04); }

    /* ---------- Nav ---------- */
    .hd-nav {
        display: flex;
        align-items: center;
        gap: 4px;
        margin: 0 auto;
        padding: 0;
        list-style: none;
    }
    .hd-nav > li { position: relative; }
    .hd-nav > li > a {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 10px 16px;
        border-radius: 30px;
        font-size: 0.86rem;
        font-weight: var(--ed-fw-sbold);
        letter-spacing: 0.4px;
        text-transform: uppercase;
        text-decoration: none;
        color: var(--ed-color-heading-primary);
        white-space: nowrap;
        transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-nav > li > a i { font-size: 0.68rem; transition: transform 0.28s ease; }
    .hd-nav > li > a:hover,
    .hd-nav > li.is-active > a {
        color: var(--ed-color-theme-secondary);
        background: color-mix(in srgb, var(--ed-color-theme-secondary) 10%, transparent);
    }
    .hd-nav > li:hover > a i { transform: rotate(180deg); }

    /* ---------- Dropdown ---------- */
    .hd-drop {
        position: absolute;
        top: calc(100% + 12px);
        left: 0;
        z-index: 20;
        min-width: 250px;
        padding: 10px;
        margin: 0;
        list-style: none;
        background: #fff;
        border: 1px solid var(--ed-color-border-1);
        border-radius: 16px;
        box-shadow: 0 22px 46px rgba(0, 29, 51, 0.14);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-drop::before {
        content: "";
        position: absolute;
        top: -12px;
        left: 0;
        right: 0;
        height: 12px;
    }
    /* Open on hover — same behaviour as the Courses / Account nav dropdowns.
       .is-open is kept so a tap still works on touch devices, where :hover doesn't. */
    .hd-nav > li:hover > .hd-drop,
    .hd-pill-wrap:hover > .hd-drop,
    .hd-drop.is-open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    .hd-drop.hd-drop-right { left: auto; right: 0; }

    .hd-drop a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 0.88rem;
        font-weight: var(--ed-fw-medium);
        text-decoration: none;
        color: var(--ed-color-text-body);
        transition: all 0.25s ease;
    }
    .hd-drop a i { width: 16px; font-size: 0.8rem; color: var(--ed-color-theme-secondary); }
    .hd-drop a img { width: 20px; height: auto; border-radius: 3px; }
    .hd-drop a:hover {
        color: var(--ed-color-heading-primary);
        background: var(--ed-color-grey-1);
        transform: translateX(3px);
    }
    .hd-drop hr { margin: 8px 6px; border: 0; border-top: 1px solid var(--ed-color-border-1); }
    .hd-drop button {
        width: 100%;
        border: none;
        background: transparent;
        text-align: left;
        cursor: pointer;
    }

    /* ---------- Right side ---------- */
    .hd-right { display: flex; align-items: center; gap: 10px; margin-left: auto; }

    .hd-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 15px;
        border: 1px solid var(--ed-color-border-1);
        border-radius: 30px;
        font-size: 0.82rem;
        font-weight: var(--ed-fw-sbold);
        color: var(--ed-color-heading-primary);
        background: #fff;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-pill:hover {
        color: var(--ed-color-theme-secondary);
        border-color: var(--ed-color-theme-secondary);
    }
    .hd-pill img { width: 20px; height: auto; border-radius: 3px; }
    .hd-pill i.caret { font-size: 0.62rem; transition: transform 0.28s ease; }

    .hd-pill-wrap { position: relative; }

    /* Mirror the nav: tint the pill and flip the caret while its menu is open. */
    .hd-pill-wrap:hover .hd-pill {
        color: var(--ed-color-theme-secondary);
        border-color: var(--ed-color-theme-secondary);
        background: color-mix(in srgb, var(--ed-color-theme-secondary) 10%, #fff);
    }
    .hd-pill-wrap:hover .hd-pill i.caret { transform: rotate(180deg); }

    /* Cart button */
    .hd-cart {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border: 1px solid var(--ed-color-border-1);
        border-radius: 50%;
        font-size: 1rem;
        color: var(--ed-color-heading-primary);
        background: #fff;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-cart:hover {
        color: #fff;
        border-color: var(--ed-color-theme-secondary);
        background: var(--ed-color-theme-secondary);
        transform: translateY(-2px);
    }
    .hd-cart-count {
        position: absolute;
        top: -4px;
        right: -4px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        padding: 0 5px;
        border-radius: 30px;
        font-size: 0.68rem;
        font-weight: var(--ed-fw-bold);
        color: #fff;
        background: var(--ed-color-theme-primary);
    }

    .hd-burger {
        display: none;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border: 1px solid var(--ed-color-border-1);
        border-radius: 14px;
        font-size: 1rem;
        color: var(--ed-color-heading-primary);
        background: #fff;
        cursor: pointer;
    }

    /* ==========================================================================
       Side cart drawer
       ========================================================================== */
    .hd-overlay {
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: 1090;
        background: rgba(0, 29, 51, 0.5);
        backdrop-filter: blur(3px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.35s ease;
    }
    .hd-overlay.is-open { opacity: 1; visibility: visible; }

    .hd-drawer {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 1100;
        display: flex;
        flex-direction: column;
        width: 400px;
        max-width: 90vw;
        background: #fff;
        box-shadow: -20px 0 50px rgba(0, 29, 51, 0.18);
        transform: translateX(100%);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-drawer.is-open { transform: translateX(0); }

    .hd-drawer-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 22px 24px;
        border-bottom: 1px solid var(--ed-color-border-1);
    }
    .hd-drawer-head h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: var(--ed-fw-ebold);
        color: var(--ed-color-heading-primary);
    }
    .hd-drawer-close {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 50%;
        color: #6b7684;
        background: var(--ed-color-grey-1);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .hd-drawer-close:hover { color: #fff; background: #dc2626; }

    .hd-drawer-body {
        flex: 1 1 auto;
        padding: 8px 24px;
        overflow-y: auto;
    }

    /* Cart line item */
    .hd-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid var(--ed-color-border-1);
    }
    .hd-item:last-child { border-bottom: none; }
    .hd-item-thumb {
        flex: 0 0 64px;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 12px;
        background: var(--ed-color-grey-1);
    }
    .hd-item-thumb img { width: 100%; height: 100%; object-fit: cover; }
    .hd-item-info { flex: 1 1 auto; min-width: 0; }
    .hd-item-info > a {
        display: block;
        margin-bottom: 6px;
        font-size: 0.9rem;
        font-weight: var(--ed-fw-sbold);
        line-height: 1.4;
        text-decoration: none;
        color: var(--ed-color-heading-primary);
    }
    .hd-item-info > a:hover { color: var(--ed-color-theme-secondary); }
    .hd-item-meta {
        display: block;
        margin-top: 6px;
        font-size: 0.8rem;
        color: #9aa5b1;
    }
    .hd-item-meta b { font-weight: var(--ed-fw-bold); color: var(--ed-color-theme-primary); }
    .hd-item-remove {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-size: 0.75rem;
        color: #b6bfc9;
        background: transparent;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .hd-item-remove:hover { color: #fff; background: #dc2626; }

    .hd-drawer-empty {
        padding: 60px 20px;
        text-align: center;
        color: #9aa5b1;
    }
    .hd-drawer-empty i {
        display: block;
        margin-bottom: 14px;
        font-size: 2.2rem;
        color: var(--ed-color-border-1);
    }

    .hd-drawer-foot {
        padding: 20px 24px 24px;
        border-top: 1px solid var(--ed-color-border-1);
        background: var(--ed-color-grey-1);
    }
    .hd-drawer-total {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 16px;
    }
    .hd-drawer-total span {
        font-size: 0.95rem;
        font-weight: var(--ed-fw-bold);
        color: var(--ed-color-heading-primary);
    }
    .hd-drawer-total b {
        font-size: 1.45rem;
        font-weight: var(--ed-fw-ebold);
        color: var(--ed-color-theme-primary);
    }
    .hd-drawer-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .hd-drawer-actions .ct-submit { width: 100%; padding: 13px 18px; font-size: 0.88rem; }
    .hd-btn-outline {
        color: var(--ed-color-heading-primary);
        background: #fff;
        border: 1px solid var(--ed-color-border-1);
    }
    .hd-btn-outline:hover {
        color: #fff;
        background: var(--ed-color-heading-primary);
        box-shadow: none;
    }

    /* ==========================================================================
       Mobile menu
       ========================================================================== */
    .hd-mobile {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 1100;
        width: 320px;
        max-width: 86vw;
        padding: 24px;
        overflow-y: auto;
        background: #fff;
        box-shadow: 20px 0 50px rgba(0, 29, 51, 0.18);
        transform: translateX(-100%);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .hd-mobile.is-open { transform: translateX(0); }
    .hd-mobile-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
        margin-bottom: 12px;
        border-bottom: 1px solid var(--ed-color-border-1);
    }
    .hd-mobile-head img { height: 42px; width: auto; }
    .hd-mobile-nav { padding: 0; margin: 0; list-style: none; }
    .hd-mobile-nav a {
        display: block;
        padding: 13px 12px;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: var(--ed-fw-sbold);
        text-decoration: none;
        color: var(--ed-color-heading-primary);
        transition: all 0.25s ease;
    }
    .hd-mobile-nav a:hover {
        color: var(--ed-color-theme-secondary);
        background: var(--ed-color-grey-1);
    }
    .hd-mobile-nav .hd-mobile-sub { padding-left: 12px; margin: 0; list-style: none; }
    .hd-mobile-nav .hd-mobile-sub a {
        font-size: 0.86rem;
        font-weight: var(--ed-fw-medium);
        color: #6b7684;
    }
    .hd-mobile-label {
        display: block;
        margin: 16px 12px 6px;
        font-size: 0.7rem;
        font-weight: var(--ed-fw-bold);
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #9aa5b1;
    }

    @media (max-width: 1199px) {
        .hd-nav { display: none; }
        .hd-burger { display: flex; }
        .hd-right { margin-left: auto; }
    }
    @media (max-width: 575px) {
        .hd-pill span.label { display: none; }
    }

    /* ==========================================================================
       Preloader
       ========================================================================== */
    .hd-preloader {
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--ed-color-heading-primary);
        transition: opacity 0.45s ease, visibility 0.45s ease;
    }
    .hd-preloader.is-done { opacity: 0; visibility: hidden; }
    .hd-preloader-inner { text-align: center; }
    .hd-spinner {
        width: 54px;
        height: 54px;
        margin: 0 auto 20px;
        border: 3px solid rgba(255, 255, 255, 0.15);
        border-top-color: var(--ed-color-theme-secondary);
        border-radius: 50%;
        animation: hd-spin 0.9s linear infinite;
    }
    .hd-preloader-text {
        font-size: 0.82rem;
        font-weight: var(--ed-fw-bold);
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.7);
    }
    .hd-preloader-text b { color: var(--ed-color-theme-secondary); }
    @keyframes hd-spin { to { transform: rotate(360deg); } }
</style>

<!-- Preloader -->
<div id="hd-preloader" class="hd-preloader">
    <div class="hd-preloader-inner">
        <div class="hd-spinner"></div>
        <div class="hd-preloader-text"><b>Learn</b>WithUs</div>
    </div>
</div>

<!-- Header -->
<header class="hd" id="hd-header">
    <div class="container">
        <div class="hd-inner">

            <a href="{{ route('home') }}" class="hd-logo">
                <img src="{{ asset('assets/img/logo/logo-1.webp') }}" alt="LearnWithUs">
            </a>

            <ul class="hd-nav">
                <li class="{{ request()->routeIs('home') ? 'is-active' : '' }}">
                    <a href="{{ route('home') }}">{{ __('frontend.home') }}</a>
                </li>

                <li class="{{ request()->routeIs('product-lists') || request()->is('product-cat/*') ? 'is-active' : '' }}">
                    <a href="{{ route('product-lists') }}">
                        {{ __('frontend.courses') }} <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="hd-drop">
                        <li>
                            <a href="{{ route('product-lists') }}">
                                <i class="fa-solid fa-grip"></i> {{ __('frontend.browse_all_courses') }}
                            </a>
                        </li>
                        <li><hr></li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ url('product-cat/'.$category->slug) }}">
                                    <i class="fa-solid fa-chevron-right"></i> {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="{{ request()->routeIs('about-us') ? 'is-active' : '' }}">
                    <a href="{{ route('about-us') }}">{{ __('frontend.about') }}</a>
                </li>

                <li class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">
                    <a href="{{ route('contact') }}">{{ __('frontend.contact') }}</a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        {{ __('frontend.account') }} <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="hd-drop hd-drop-right">
                        @auth
                            <li><a href="{{ route('user') }}"><i class="fa-regular fa-user"></i> {{ __('frontend.my_account') }}</a></li>
                            <li><hr></li>
                            <li><a href="{{ route('user.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('frontend.logout') }}</a></li>
                        @else
                            <li><a href="{{ route('login.form') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('frontend.login') }}</a></li>
                            <li><a href="{{ route('register.form') }}"><i class="fa-solid fa-user-plus"></i> {{ __('frontend.register') }}</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>

            <div class="hd-right">

                <!-- Currency -->
                <div class="hd-pill-wrap">
                    <button type="button" class="hd-pill" data-hd-toggle="currency" aria-label="{{ __('frontend.select_currency') }}">
                        <span class="label">{{ $currencyLabel }}</span>
                        <i class="fa-solid fa-chevron-down caret"></i>
                    </button>
                    <ul class="hd-drop hd-drop-right" data-hd-menu="currency">
                        <li><a href="{{ route('change.currency', 'USD') }}">$ USD</a></li>
                        <li><a href="{{ route('change.currency', 'JPY') }}">¥ JPY</a></li>
                        <li><a href="{{ route('change.currency', 'HKD') }}">HK$ HKD</a></li>
                    </ul>
                </div>

                <!-- Language -->
                <div class="hd-pill-wrap">
                    <button type="button" class="hd-pill" data-hd-toggle="lang" aria-label="{{ __('frontend.select_language') }}">
                        <img src="{{ asset($isJa ? 'assets/img/japan.png' : 'assets/img/united-kingdom.png') }}" alt="">
                        <span class="label">{{ $isJa ? __('frontend.language_japanese') : __('frontend.language_english') }}</span>
                        <i class="fa-solid fa-chevron-down caret"></i>
                    </button>
                    <ul class="hd-drop hd-drop-right" data-hd-menu="lang">
                        <li>
                            <a href="{{ route('change.language', 'en') }}">
                                <img src="{{ asset('assets/img/united-kingdom.png') }}" alt=""> {{ __('frontend.language_english') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('change.language', 'ja') }}">
                                <img src="{{ asset('assets/img/japan.png') }}" alt=""> {{ __('frontend.language_japanese') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Cart -->
                <button type="button" class="hd-cart" id="hd-cart-open" aria-label="{{ __('frontend.open_cart') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="hd-cart-count">{{ Helper::cartCount() ? Helper::totalCartQuantity() : 0 }}</span>
                </button>

                <button type="button" class="hd-burger" id="hd-menu-open" aria-label="{{ __('frontend.open_menu') }}">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

@cookieconsentview

<!-- Side cart -->
<div class="hd-overlay" id="hd-overlay"></div>

<aside class="hd-drawer" id="hd-drawer">
    <div class="hd-drawer-head">
        <h5>{{ __('frontend.shopping_cart') }}</h5>
        <button type="button" class="hd-drawer-close" id="hd-cart-close" aria-label="{{ __('frontend.close_cart') }}">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <div class="hd-drawer-body">
        @forelse($cartItems as $cart)
            @php
                $photo = explode(',', $cart->product['photo']);
                $level = $cart->level;
            @endphp
            <div class="hd-item">
                <div class="hd-item-thumb">
                    <img src="{{ asset($photo[0]) }}" alt="{{ $cart->product['title'] }}">
                </div>

                <div class="hd-item-info">
                    <a href="{{ route('product-detail', $cart->product->slug) }}">
                        {{ $cart->product['title'] }}
                    </a>

                    @if($level)
                        <span class="cr-badge">
                            <i class="fa-solid fa-layer-group"></i>
                            {{ $level->localized('skill_level') }}
                        </span>
                    @endif

                    <span class="hd-item-meta">
                        {{ $cart->quantity }} &times;
                        <b>{{ $symbol }}{{ number_format($cart['price'], $decimals, '.', ',') }}</b>
                    </span>
                </div>

                <a href="{{ route('cart-delete', $cart->id) }}" class="hd-item-remove" title="{{ __('frontend.remove_item') }}">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
        @empty
            <div class="hd-drawer-empty">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>{{ __('frontend.empty_cart') }}</p>
            </div>
        @endforelse
    </div>

    @if(count($cartItems))
        <div class="hd-drawer-foot">
            <div class="hd-drawer-total">
                <span>{{ __('frontend.cart_total') }}:</span>
                <b>{{ $symbol }}{{ number_format(Helper::totalCartPrice(), $decimals, '.', ',') }}</b>
            </div>
            <div class="hd-drawer-actions">
                <a href="{{ route('cart') }}" class="ct-submit hd-btn-outline">{{ __('frontend.view_cart') }}</a>
                <a href="{{ route('checkout') }}" class="ct-submit">{{ __('frontend.checkout') }}</a>
            </div>
        </div>
    @endif
</aside>

<!-- Mobile menu -->
<nav class="hd-mobile" id="hd-mobile">
    <div class="hd-mobile-head">
        <img src="{{ asset('assets/img/logo/logo-1.webp') }}" alt="LearnWithUs">
        <button type="button" class="hd-drawer-close" id="hd-menu-close" aria-label="{{ __('frontend.close_menu') }}">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <ul class="hd-mobile-nav">
        <li><a href="{{ route('home') }}">{{ __('frontend.home') }}</a></li>
        <li><a href="{{ route('product-lists') }}">{{ __('frontend.courses') }}</a></li>

        <li>
            <span class="hd-mobile-label">{{ __('frontend.category_label') }}</span>
            <ul class="hd-mobile-sub">
                @foreach($categories as $category)
                    <li><a href="{{ url('product-cat/'.$category->slug) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </li>

        <li><span class="hd-mobile-label">{{ __('frontend.explore_label') }}</span></li>
        <li><a href="{{ route('about-us') }}">{{ __('frontend.about') }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __('frontend.contact') }}</a></li>

        <li><span class="hd-mobile-label">{{ __('frontend.account') }}</span></li>
        @auth
            <li><a href="{{ route('user') }}">{{ __('frontend.my_account') }}</a></li>
            <li><a href="{{ route('user.logout') }}">{{ __('frontend.logout') }}</a></li>
        @else
            <li><a href="{{ route('login.form') }}">{{ __('frontend.login') }}</a></li>
            <li><a href="{{ route('register.form') }}">{{ __('frontend.register') }}</a></li>
        @endauth
    </ul>
</nav>

<script>
    (function () {
        // ---- Preloader ------------------------------------------------------
        var preloader = document.getElementById('hd-preloader');
        function hidePreloader() { if (preloader) preloader.classList.add('is-done'); }
        window.addEventListener('load', hidePreloader);
        setTimeout(hidePreloader, 1500); // never trap the page behind a stalled asset

        document.addEventListener('DOMContentLoaded', function () {
            var header  = document.getElementById('hd-header');
            var overlay = document.getElementById('hd-overlay');
            var drawer  = document.getElementById('hd-drawer');
            var mobile  = document.getElementById('hd-mobile');

            // ---- Sticky shadow ----------------------------------------------
            function onScroll() {
                header.classList.toggle('is-stuck', window.scrollY > 10);
            }
            window.addEventListener('scroll', onScroll);
            onScroll();

            // ---- Panels (side cart + mobile menu) ----------------------------
            function open(panel) {
                panel.classList.add('is-open');
                overlay.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            }
            function closeAll() {
                drawer.classList.remove('is-open');
                mobile.classList.remove('is-open');
                overlay.classList.remove('is-open');
                document.body.style.overflow = '';
            }

            document.getElementById('hd-cart-open').addEventListener('click', function () { open(drawer); });
            document.getElementById('hd-cart-close').addEventListener('click', closeAll);
            document.getElementById('hd-menu-open').addEventListener('click', function () { open(mobile); });
            document.getElementById('hd-menu-close').addEventListener('click', closeAll);
            overlay.addEventListener('click', closeAll);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeAll();
            });

            // ---- Currency / language dropdowns -------------------------------
            var toggles = document.querySelectorAll('[data-hd-toggle]');

            function closeMenus() {
                document.querySelectorAll('[data-hd-menu]').forEach(function (m) {
                    m.classList.remove('is-open');
                });
            }

            toggles.forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    var name = btn.dataset.hdToggle;
                    var menu = document.querySelector('[data-hd-menu="' + name + '"]');
                    var wasOpen = menu.classList.contains('is-open');
                    closeMenus();
                    if (!wasOpen) menu.classList.add('is-open');
                });
            });

            document.addEventListener('click', closeMenus);
        });
    })();
</script>
