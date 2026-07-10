<style>
/* ==========================================================================
   Antigravity Premium Header Styles Overrides
   ========================================================================== */

/* Glassmorphism navigation bar */
header.header {
    background: rgba(255, 255, 255, 0.82) !important;
    backdrop-filter: blur(16px) !important;
    -webkit-backdrop-filter: blur(16px) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.4) !important;
    position: sticky !important;
    top: 0 !important;
    z-index: 1000 !important;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.02) !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

header.header.sticky-active {
    box-shadow: 0 10px 30px color-mix(in srgb, var(--ed-color-theme-primary) 6%, transparent) !important;
    background: var(--ed-color-common-white) !important;
}

/* Adjust primary-header layout for a modern, slim look */
.primary-header {
    padding: 0 !important;
    background: transparent !important;
}

.primary-header-inner {
    padding: 8px 0 !important;
    background: transparent !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

/* Clean up the logo block to fit the modern style */
.header .primary-header-inner .header-logo {
    display: flex !important;
    align-items: center !important;
    background-color: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
    width: auto !important;
    border-radius: 0 !important;
    z-index: 10 !important;
    box-shadow: none !important;
}

.md-logo {
    max-height: 54px !important;
    height: 54px !important;
    width: auto !important;
    object-fit: contain !important;
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
}

.header-logo a {
    display: flex !important;
    align-items: center !important;
}

.header-logo:hover .md-logo {
    transform: scale(1.05) rotate(-1deg) !important;
}

/* Navigation Menu Redesign */
.header-menu-wrap {
    margin-left: auto !important;
    display: flex !important;
    align-items: center !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu {
    display: flex !important;
    align-items: center !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li {
    margin: 0 16px !important;
    position: relative !important;
    display: inline-block !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li a {
    font-family: var(--ed-ff-heading, sans-serif) !important;
    color: #1e293b !important; /* Dark Slate Blue */
    font-size: 14px !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.8px !important;
    padding: 22px 0 !important;
    display: block !important;
    transition: color 0.25s ease !important;
    text-decoration: none !important;
    position: relative !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li a i {
    font-size: 11px !important;
    margin-left: 4px !important;
    transition: transform 0.2s ease !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li:hover > a i {
    transform: translateY(2px) !important;
}

/* Hover and Active Underline Effect */
.header .primary-header-inner .header-menu-wrap .sub-menu li a::after {
    content: "" !important;
    position: absolute !important;
    bottom: 12px !important;
    left: 50% !important;
    width: 0 !important;
    height: 3px !important;
    background: var(--ed-color-theme-secondary) !important;
    border-radius: 2px !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    transform: translateX(-50%) !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li:hover > a,
.header .primary-header-inner .header-menu-wrap .sub-menu li.active > a {
    color: var(--ed-color-theme-secondary) !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li:hover > a::after,
.header .primary-header-inner .header-menu-wrap .sub-menu li.active > a::after {
    width: 100% !important;
}

/* Dropdown Menu Card Styling */
.header .primary-header-inner .header-menu-wrap .sub-menu li ul {
    position: absolute !important;
    top: 100% !important;
    left: 50% !important;
    transform: translateX(-50%) translateY(15px) scale(0.95) !important;
    background: #ffffff !important;
    min-width: 220px !important;
    border-radius: 12px !important;
    border: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 8%, transparent) !important;
    box-shadow: 0 15px 35px color-mix(in srgb, var(--ed-color-theme-primary) 12%, transparent) !important;
    padding: 10px !important;
    opacity: 0 !important;
    visibility: hidden !important;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    z-index: 1000 !important;
    display: block !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li:hover > ul {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateX(-50%) translateY(0) scale(1) !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li li {
    margin: 0 0 4px 0 !important;
    display: block !important;
    border-bottom: none !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li li:last-child {
    margin-bottom: 0 !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li li a {
    padding: 10px 16px !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    text-transform: none !important;
    letter-spacing: 0 !important;
    color: #475569 !important;
    border-radius: 8px !important;
    text-align: left !important;
    transition: all 0.2s ease !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li li a::after {
    display: none !important;
}

.header .primary-header-inner .header-menu-wrap .sub-menu li li:hover > a {
    background: var(--ed-color-theme-secondary) !important;
    color: var(--ed-color-common-white) !important;
    padding-left: 20px !important;
}

/* Right side wrapper and buttons */
.header-right-wrap {
    margin-left: 20px !important;
    display: flex !important;
    align-items: center !important;
}

.header-right {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
}

/* Dropdown switchers (Currency & Language) */
.header-right .dropdown {
    position: relative !important;
}

.header-right .dropdown .dropdown-toggle {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 12%, transparent) !important;
    color: var(--ed-color-theme-secondary) !important;
    font-family: var(--ed-ff-heading, sans-serif) !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    height: 38px !important;
    padding: 0 16px !important;
    border-radius: 20px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.25s ease !important;
    box-shadow: none !important;
    cursor: pointer !important;
}

.header-right .dropdown .dropdown-toggle::after {
    margin-left: 6px !important;
    transition: transform 0.2s ease !important;
}

.header-right .dropdown:hover .dropdown-toggle,
.header-right .dropdown-toggle[aria-expanded="true"] {
    background: var(--ed-color-theme-secondary) !important;
    border-color: var(--ed-color-theme-secondary) !important;
    color: #ffffff !important;
}

.header-right .dropdown:hover .dropdown-toggle::after {
    transform: rotate(180deg) !important;
}

.header-right .dropdown .dropdown-toggle img {
    width: 18px !important;
    height: 12px !important;
    margin-right: 6px !important;
    border-radius: 2px !important;
    object-fit: cover !important;
}

/* Translucent Dropdown Menu list */
.header-right .dropdown-menu {
    border-radius: 12px !important;
    border: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 8%, transparent) !important;
    box-shadow: 0 12px 30px color-mix(in srgb, var(--ed-color-theme-primary) 10%, transparent) !important;
    padding: 8px !important;
    min-width: 140px !important;
    margin-top: 8px !important;
    background: #ffffff !important;
    transform: translateY(10px) !important;
    opacity: 0 !important;
    display: block !important;
    visibility: hidden !important;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.2) !important;
}

.header-right .dropdown:hover .dropdown-menu,
.header-right .dropdown.show .dropdown-menu {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) !important;
}

.header-right .dropdown-item {
    padding: 8px 12px !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    color: #475569 !important;
    border-radius: 8px !important;
    display: flex !important;
    align-items: center !important;
    transition: all 0.2s ease !important;
}

.header-right .dropdown-item img {
    width: 18px !important;
    height: 12px !important;
    margin-right: 8px !important;
    border-radius: 2px !important;
    object-fit: cover !important;
}

.header-right .dropdown-item:hover {
    background-color: color-mix(in srgb, var(--ed-color-theme-primary) 6%, transparent) !important;
    color: var(--ed-color-theme-secondary) !important;
}

/* Shopping Cart Badge & Icon redesign */
.header-right-icon.shop-btn {
    width: 38px !important;
    height: 38px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 12%, transparent) !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.25s ease !important;
    cursor: pointer !important;
    position: relative !important;
    padding: 0 !important;
    margin: 0 !important;
}

.header-right-icon.shop-btn a {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 100% !important;
    height: 100% !important;
    color: var(--ed-color-theme-secondary) !important;
    text-decoration: none !important;
}

.header-right-icon.shop-btn i {
    font-size: 16px !important;
    margin: 0 !important;
    transition: transform 0.2s ease !important;
}

.header-right-icon.shop-btn:hover {
    background: var(--ed-color-theme-secondary) !important;
    border-color: var(--ed-color-theme-secondary) !important;
}

.header-right-icon.shop-btn:hover a {
    color: #ffffff !important;
}

.header-right-icon.shop-btn:hover i {
    transform: scale(1.1) rotate(-5deg) !important;
    color: var(--ed-color-common-white) !important;
}

.header-right-icon.shop-btn .number {
    position: absolute !important;
    top: -6px !important;
    right: -6px !important;
    background: var(--ed-color-theme-secondary) !important; /* Rose Red */
    color: #ffffff !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    height: 18px !important;
    min-width: 18px !important;
    padding: 0 4px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border: 2px solid #ffffff !important;
    box-shadow: 0 2px 5px rgba(244, 63, 94, 0.3) !important;
    animation: pulseBadge 2s infinite !important;
}

@keyframes pulseBadge {
    0% {
        box-shadow: 0 0 0 0 rgba(244, 63, 94, 0.4);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(244, 63, 94, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(244, 63, 94, 0);
    }
}

/* Mobile Sidebar Menu Toggle Button */
.mobile-side-menu-toggle {
    width: 38px !important;
    height: 38px !important;
    border-radius: 50% !important;
    background: color-mix(in srgb, var(--ed-color-theme-primary) 5%, transparent) !important;
    border: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 12%, transparent) !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: var(--ed-color-theme-secondary) !important;
    transition: all 0.25s ease !important;
    cursor: pointer !important;
    text-decoration: none !important;
}

.mobile-side-menu-toggle i {
    font-size: 16px !important;
}

.mobile-side-menu-toggle:hover {
    background: var(--ed-color-theme-secondary) !important;
    color: #ffffff !important;
    border-color: var(--ed-color-theme-secondary) !important;
}

/* Off-canvas Cart overlay styling */
.cartcanvas__info {
    border-radius: 20px 0 0 20px !important;
    box-shadow: -10px 0 40px rgba(0, 0, 0, 0.08) !important;
    border-left: 1px solid color-mix(in srgb, var(--ed-color-theme-primary) 8%, transparent) !important;
}

.cartcanvas__content {
    padding: 30px !important;
}

.cartcanvas__content h5 {
    color: #1e293b !important;
    font-weight: 700 !important;
    font-size: 18px !important;
}

.cartcanvas__close {
    background: color-mix(in srgb, var(--ed-color-theme-primary) 5%, transparent) !important;
    width: 32px !important;
    height: 32px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: var(--ed-color-theme-secondary) !important;
    transition: all 0.2s ease !important;
}

.cartcanvas__close:hover {
    background: var(--ed-color-theme-secondary) !important;
    color: #ffffff !important;
}

.cart-list li {
    padding: 16px 0 !important;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
    align-items: center !important;
}

.cart-img {
    border-radius: 8px !important;
    object-fit: cover !important;
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
    width: 60px !important;
    height: 60px !important;
}

.cart-info a {
    color: #1e293b !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    text-decoration: none !important;
    transition: color 0.2s ease !important;
}

.cart-info a:hover {
    color: var(--ed-color-theme-secondary) !important;
}

.cart-info p {
    color: var(--ed-color-theme-secondary) !important;
    font-weight: 700 !important;
    margin: 4px 0 0 0 !important;
}

.remove-item {
    position: absolute !important;
    right: 0 !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    color: #cbd5e1 !important;
    transition: color 0.2s ease !important;
}

.remove-item:hover {
    color: #ef4444 !important;
}

.cart-btn .ed-primary-btn {
    border-radius: 12px !important;
    height: 44px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

/* Fix sticky state rules on scroll */
.primary-header.fixed {
    background: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0px 10px 25px color-mix(in srgb, var(--ed-color-theme-primary) 8%, transparent) !important;
}

.primary-header.fixed .primary-header-inner {
    background: transparent !important;
    padding: 8px 0 !important;
}

.primary-header.fixed .shop-btn a {
    color: var(--ed-color-theme-secondary) !important;
}

.primary-header.fixed .mobile-side-menu-toggle {
    color: var(--ed-color-theme-secondary) !important;
    border-color: color-mix(in srgb, var(--ed-color-theme-primary) 12%, transparent) !important;
}

/* Responsive adjustments */
@media only screen and (max-width: 992px) {
    header.header {
        position: relative !important;
        background: #ffffff !important;
    }
    
    .primary-header-inner {
        padding: 12px 15px !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }

    .header .primary-header-inner .header-logo {
        display: flex !important;
        background-color: transparent !important;
        padding: 0 !important;
        margin: 0 !important;
        width: auto !important;
        border-radius: 0 !important;
    }
    
    .md-logo {
        max-height: 40px !important;
        height: 40px !important;
        filter: none !important;
    }
    
    .header-right-wrap {
        margin-left: 10px !important;
    }
    
    .header-right {
        gap: 8px !important;
    }
    
    .header-right .dropdown .dropdown-toggle {
        padding: 0 10px !important;
        font-size: 12px !important;
        height: 32px !important;
    }
    
    .header-right-icon.shop-btn,
    .mobile-side-menu-toggle {
        width: 32px !important;
        height: 32px !important;
    }
    
    .header-right-icon.shop-btn i,
    .mobile-side-menu-toggle i {
        font-size: 14px !important;
    }
}
</style>

 <header class="header header-3 header-6 header-7 header-14 sticky-active">
            <div class="primary-header">
                <div class="container header-container">
                    <div class="primary-header-inner">
                        <div class="header-logo">                            
                            <a href="{{route('home')}}">
                                <img class="md-logo" src="{{ asset('assets/img/logo/logo-1.png') }}" alt="Logo">                                
                            </a>
                        </div>
                        <div class="header-menu-wrap">
                            <div class="mobile-menu-items">
                                <ul class="sub-menu">
                                     <li><a href="{{ route('home') }}">{{ __('common.home') }}</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/product-lists') }}">{{ __('common.courses') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @php
                                        $categories = Helper::productCategoryList("all");
                                        @endphp
                                        @foreach($categories as $category)
                                            <li><a href="<?=url('product-cat'.'/'.$category->slug)?>">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>   
                                      <li><a href="{{ route('instructor') }}">{{ __('common.our_instructors') }}</a></li>
                                        <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">{{ __('common.account') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @auth
                                            <li><a href="{{ route('user') }}">{{ __('common.account') }}</a></li>
                                            <li><a href="{{ route('user.logout') }}">{{ __('common.logout') }}</a></li>
                                            @else
                                            <li><a href="{{ route('login.form') }}">{{ __('common.login') }}</a></li>
                                            <li><a href="{{ route('register.form') }}">{{ __('common.register') }}</a></li>
                                            @endauth
                                        </ul>
                                    </li>                          
                                   
                                

                                     <!--<li><a href="{{ route('contact') }}">{{ __('common.contact') }}</a></li>-->
                                </ul>
                            </div>                           
                        <!-- /.header-menu-wrap -->
                       
                    </div>
                    <!-- /.primary-header-inner -->
                      <div class="header-right-wrap ms-5">
                            <div class="header-right">
                                <div class="dropdown">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    if(session('currency') == 'HKD') {
                                        print "HK$";
                                    }
                                    elseif(session('currency') == 'JPY') {
                                        print "¥ <span class='d-none d-sm-inline'>JPY</span>";
                                    }
                                   else {                                        
                                        print "$ <span class='d-none d-sm-inline'>USD</span>";
                                    }
                                @endphp
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.currency', 'JPY') }}" class="dropdown-item">¥ JPY</a></li>
    <li><a href="{{ route('change.currency', 'USD') }}" class="dropdown-item">$ USD</a></li>
    <li><a href="{{ route('change.currency', 'HKD') }}" class="dropdown-item">HK$ HKD</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   
   @php
    if(session('app_locale') == 'ja') {
        echo '<span><img src="' . asset('assets/img/japan.png') . '" ><span class="d-none d-sm-inline"> Japanese</span></span>';
    } else {
        echo '<span><img src="' . asset('assets/img/united-kingdom.png') . '" ><span class="d-none d-sm-inline"> English</span></span>';
    }
@endphp 
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.language', 'en') }}" class="dropdown-item"><img src="{{ asset('assets/img/united-kingdom.png') }}" > English</a>
    </li>
    <li><a href="{{ route('change.language', 'ja') }}" class="dropdown-item"> <img src="{{ asset('assets/img/japan.png') }}" > Japanese</a>
    </li>
  </ul>
</div>  <div class="header-right-icon shop-btn">
                                    
                                    <a href="javascript:void(0)"> <i class="icon fa-brands fa-opencart"></i>  </a>
                                    @if(Helper::getAllProductFromCart())
                                    <span class="number">{{ Helper::totalCartQuantity() }}</span>
                                    @else
                                    <span class="number">0</span>
                                    @endif
                                </div>                                
                                

                              
                                <div class="header-right-item d-lg-none d-md-block">
                                    <a href="javascript:void(0)" class="mobile-side-menu-toggle"
                                        ><i class="fa-sharp fa-solid fa-bars"></i
                                    ></a>
                                </div>
                            </div>
                            <!-- /.header-right -->
                        </div>
                </div>
            </div>
        </header>
        <!-- /.Main Header -->
<!--<header class="header header-3 header-6 header-7 sticky-active">
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-inner">
                        <div class="top-bar-left d-none d-xl-block d-log-block">
                            <ul class="top-bar-list">
                               <li><i class="fa-regular fa-location-dot"></i><span>UNIT 308, 3/F., CHEVALIER HOUSE, 45-51 CHATHAM RD, SOUTH, TSIM SHA TSUI, HONG KONG</span></li>
                             </ul>
                        </div>
                        <div class="top-bar-right">
                            <div class="dropdown me-3">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    if(session('currency') == 'HKD') {
                                        print "HK$";
                                    }
                                    elseif(session('currency') == 'JPY') {
                                        print "짜 Japanese Yen";
                                    }
                                   else {                                        
                                        print "$ US Dollar";
                                    }
                                @endphp
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.currency', 'JPY') }}" class="dropdown-item">¥ Japanese</a></li>
    <li><a href="{{ route('change.currency', 'USD') }}" class="dropdown-item">$ US Dollar</a></li>
    <li><a href="{{ route('change.currency', 'HKD') }}" class="dropdown-item">HK$</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   
   @php
    if(session('app_locale') == 'ja') {
        echo '<span><img src="' . asset('assets/img/japan.png') . '" > Japanese</span>';
    } else {
        echo '<span><img src="' . asset('assets/img/united-kingdom.png') . '" > English</span>';
    }
@endphp 
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.language', 'en') }}" class="dropdown-item"><img src="{{ asset('assets/img/united-kingdom.png') }}" > English</a>
    </li>
    <li><a href="{{ route('change.language', 'ja') }}" class="dropdown-item"> <img src="{{ asset('assets/img/japan.png') }}" > Japanese</a>
    </li>
  </ul>
</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="primary-header">
                <div class="container">
                    <div class="primary-header-inner">
                        <div class="header-logo d-lg-block">
                            <a href="{{route('home')}}">
                                <img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="Logo">
                            </a>
                        </div>
                        <div class="header-menu-wrap">
                            <div class="mobile-menu-items">
                                <ul class="sub-menu">
                                      <li><a href="{{route('home')}}">{{ __('common.home') }}</a></li>
                                        <li><a href="{{ route('pages', 'about-us') }}">{{ __('common.about') }}</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/product-lists') }}">{{ __('common.courses') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @php
                                        $categories = Helper::productCategoryList("all");
                                        @endphp
                                        @foreach($categories as $category)
                                            <li><a href="<?=url('product-cat'.'/'.$category->slug)?>">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>   
                                      <li><a href="{{ route('instructor') }}">{{ __('common.our_instructors') }}</a></li>
                                        <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">{{ __('common.account') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @auth
                                            <li><a href="{{ route('user') }}">{{ __('common.account') }}</a></li>
                                            <li><a href="{{ route('user.logout') }}">{{ __('common.logout') }}</a></li>
                                            @else
                                            <li><a href="{{ route('login.form') }}">{{ __('common.login') }}</a></li>
                                            <li><a href="{{ route('register.form') }}">{{ __('common.register') }}</a></li>
                                            @endauth
                                        </ul>
                                    </li>                                                                      
                                    <li><a href="{{ route('contact') }}">{{ __('common.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.header-menu-wrap -->
                      <!--  <div class="header-right-wrap">
                            <div class="header-right">
                              
                                <div class="header-right-icon shop-btn">
                                    
                                    <a href="javascript:void(0)"><i class="fa-regular fa-cart-shopping"></i></a>
                                    @if(Helper::getAllProductFromCart())
                                    <span class="number">{{ Helper::totalCartQuantity() }}</span>
                                    @else
                                    <span class="number">0</span>
                                    @endif
                                </div>                                
                               
                                <div class="header-right-item d-lg-none d-md-block">
                                    <a href="javascript:void(0)" class="mobile-side-menu-toggle"
                                        ><i class="fa-sharp fa-solid fa-bars"></i
                                    ></a>
                                </div>
                            </div>
                            <!-- /.header-right -->
                        <!--</div>
                    </div>
                    <!-- /.primary-header-inner -->
                <!--</div>
            </div>
        </header>
        @cookieconsentview
        <!-- /.Main Header -->
	  <!-- Offcanvas Area Start -->
        <div class="cartfix-area">
            <div class="cartcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="cartcanvas__content">
                        <div class="mb-2 d-flex justify-content-between align-items-center border-bottom pb-3">
                          <h5 class="me-auto mb-0"> {{ __('common.shopping_cart') }}</h5>
                            <div class="cartcanvas__close">                                
                                <i class="fas fa-times"></i>                             
                            </div>
                             </div> 
                          <!-- end header title section -->
                            <ul class="cart-list">
                                @if(Helper::cartCount())
                                    @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                  <li class="d-flex position-relative align-items-center"> 
                                   <a href="{{ route('cart-delete',$cart->id) }}" class="remove-item">   <i class="fas fa-times"></i> </a>
                                   @php
                                    $photo=explode(',', $cart->product['photo']);
                                    @endphp
                                     <img src="{{ asset($photo[0]) }}" class="cart-img me-4" alt="">
                                      <div class="cart-info">
                                           <a href="{{ route('product-detail',$cart->product->slug) }}">{{ $cart->product['title'] }}</a>
                                           <p> {{ Helper::getCurrencySymbol(session('currency')) }}
                                            @if(session('currency') == 'JPY')
                                                {{ number_format($cart['amount'], 0) }}
                                            @else
                                                {{ number_format($cart['amount'], 2, '.', ',') }}
                                            @endif
                                           </p>
                                        </div>      
                                </li>
                                @endforeach
                                    @else
                                        <li><p class="welcome-one__text">{{ __('common.no_cart_available') }}</p></li>
                                    @endif
                                                                 
                             </ul>
                             @php
                                $total_amount = Helper::totalCartPrice();
                                @endphp
                           {{-- <div class="cart-footer border-top mt-3 pt-3 pb-3 d-flex mb-3">
                               <h5 class="me-auto text-dark fw-bold">{{ __('common.total') }} : </h5>
                              <span>{{ Helper::getCurrencySymbol(session('currency')) }}
                                {{number_format($total_amount, Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
                              </span>
                           </div> --}} 
                           <div class="cart-btn d-flex justify-content-center">
                                @if(Helper::cartCount())    
                                 <a href="{{ route('cart') }}" class="ed-primary-btn me-3">{{ __('common.view_cart') }}</a>
                                 <a href="{{ route('checkout') }}" class="ed-primary-btn">{{ __('common.checkout') }}</a>
                                 @endif
                               </div>  
                         
                    </div>
                </div>
            </div>
        </div>
             <!-- Offcanvas Area Start -->
			 <div class="offcanvas__overlay"></div>
       
        <div class="mobile-side-menu">
            <div class="side-menu-content">
                <div class="side-menu-head">
                    <a href="index.html"><img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="logo"></a>
                    <button class="mobile-side-menu-close"><i class="fa-regular fa-xmark"></i></button>
                </div>
                            <!-- /.header-right -->
                        </div>
                </div>
            </div>
        </header>
        <!-- /.Main Header -->
<!--<header class="header header-3 header-6 header-7 sticky-active">
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-inner">
                        <div class="top-bar-left d-none d-xl-block d-log-block">
                            <ul class="top-bar-list">
                               <li><i class="fa-regular fa-location-dot"></i><span>UNIT 308, 3/F., CHEVALIER HOUSE, 45-51 CHATHAM RD, SOUTH, TSIM SHA TSUI, HONG KONG</span></li>
                             </ul>
                        </div>
                        <div class="top-bar-right">
                            <div class="dropdown me-3">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    if(session('currency') == 'HKD') {
                                        print "HK$";
                                    }
                                    elseif(session('currency') == 'JPY') {
                                        print "짜 Japanese Yen";
                                    }
                                   else {                                        
                                        print "$ US Dollar";
                                    }
                                @endphp
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.currency', 'JPY') }}" class="dropdown-item">¥ Japanese</a></li>
    <li><a href="{{ route('change.currency', 'USD') }}" class="dropdown-item">$ US Dollar</a></li>
    <li><a href="{{ route('change.currency', 'HKD') }}" class="dropdown-item">HK$</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="ed-primary-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   
   @php
    if(session('app_locale') == 'ja') {
        echo '<span><img src="' . asset('assets/img/japan.png') . '" > Japanese</span>';
    } else {
        echo '<span><img src="' . asset('assets/img/united-kingdom.png') . '" > English</span>';
    }
@endphp 
  </button>
  <ul class="dropdown-menu animated-dropdown">
    <li><a href="{{ route('change.language', 'en') }}" class="dropdown-item"><img src="{{ asset('assets/img/united-kingdom.png') }}" > English</a>
    </li>
    <li><a href="{{ route('change.language', 'ja') }}" class="dropdown-item"> <img src="{{ asset('assets/img/japan.png') }}" > Japanese</a>
    </li>
  </ul>
</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="primary-header">
                <div class="container">
                    <div class="primary-header-inner">
                        <div class="header-logo d-lg-block">
                            <a href="{{route('home')}}">
                                <img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="Logo">
                            </a>
                        </div>
                        <div class="header-menu-wrap">
                            <div class="mobile-menu-items">
                                <ul class="sub-menu">
                                      <li><a href="{{route('home')}}">{{ __('common.home') }}</a></li>
                                        <li><a href="{{ route('pages', 'about-us') }}">{{ __('common.about') }}</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/product-lists') }}">{{ __('common.courses') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @php
                                        $categories = Helper::productCategoryList("all");
                                        @endphp
                                        @foreach($categories as $category)
                                            <li><a href="<?=url('product-cat'.'/'.$category->slug)?>">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>   
                                      <li><a href="{{ route('instructor') }}">{{ __('common.our_instructors') }}</a></li>
                                        <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">{{ __('common.account') }} <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            @auth
                                            <li><a href="{{ route('user') }}">{{ __('common.account') }}</a></li>
                                            <li><a href="{{ route('user.logout') }}">{{ __('common.logout') }}</a></li>
                                            @else
                                            <li><a href="{{ route('login.form') }}">{{ __('common.login') }}</a></li>
                                            <li><a href="{{ route('register.form') }}">{{ __('common.register') }}</a></li>
                                            @endauth
                                        </ul>
                                    </li>                                                                      
                                    <li><a href="{{ route('contact') }}">{{ __('common.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.header-menu-wrap -->
                      <!--  <div class="header-right-wrap">
                            <div class="header-right">
                              
                                <div class="header-right-icon shop-btn">
                                    
                                    <a href="javascript:void(0)"><i class="fa-regular fa-cart-shopping"></i></a>
                                    @if(Helper::getAllProductFromCart())
                                    <span class="number">{{ Helper::totalCartQuantity() }}</span>
                                    @else
                                    <span class="number">0</span>
                                    @endif
                                </div>                                
                               
                                <div class="header-right-item d-lg-none d-md-block">
                                    <a href="javascript:void(0)" class="mobile-side-menu-toggle"
                                        ><i class="fa-sharp fa-solid fa-bars"></i
                                    ></a>
                                </div>
                            </div>
                            <!-- /.header-right -->
                        <!--</div>
                    </div>
                    <!-- /.primary-header-inner -->
                <!--</div>
            </div>
        </header>
        @cookieconsentview
        <!-- /.Main Header -->
	  <!-- Offcanvas Area Start -->
        <div class="cartfix-area">
            <div class="cartcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="cartcanvas__content">
                        <div class="mb-2 d-flex justify-content-between align-items-center border-bottom pb-3">
                          <h5 class="me-auto mb-0"> {{ __('common.shopping_cart') }}</h5>
                            <div class="cartcanvas__close">                                
                                <i class="fas fa-times"></i>                             
                            </div>
                             </div> 
                          <!-- end header title section -->
                            <ul class="cart-list">
                                @if(Helper::cartCount())
                                    @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                  <li class="d-flex position-relative align-items-center"> 
                                   <a href="{{ route('cart-delete',$cart->id) }}" class="remove-item">   <i class="fas fa-times"></i> </a>
                                   @php
                                    $photo=explode(',', $cart->product['photo']);
                                    @endphp
                                     <img src="{{ asset($photo[0]) }}" class="cart-img me-4" alt="">
                                      <div class="cart-info">
                                           <a href="{{ route('product-detail',$cart->product->slug) }}">{{ $cart->product['title'] }}</a>
                                           <p> {{ Helper::getCurrencySymbol(session('currency')) }}
                                            @if(session('currency') == 'JPY')
                                                {{ number_format($cart['amount'], 0) }}
                                            @else
                                                {{ number_format($cart['amount'], 2, '.', ',') }}
                                            @endif
                                           </p>
                                        </div>      
                                </li>
                                @endforeach
                                    @else
                                        <li><p class="welcome-one__text">{{ __('common.no_cart_available') }}</p></li>
                                    @endif
                                                                 
                             </ul>
                             @php
                                $total_amount = Helper::totalCartPrice();
                                @endphp
                           {{-- <div class="cart-footer border-top mt-3 pt-3 pb-3 d-flex mb-3">
                               <h5 class="me-auto text-dark fw-bold">{{ __('common.total') }} : </h5>
                              <span>{{ Helper::getCurrencySymbol(session('currency')) }}
                                {{number_format($total_amount, Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
                              </span>
                           </div> --}} 
                           <div class="cart-btn d-flex justify-content-center">
                                @if(Helper::cartCount())    
                                 <a href="{{ route('cart') }}" class="ed-primary-btn me-3">{{ __('common.view_cart') }}</a>
                                 <a href="{{ route('checkout') }}" class="ed-primary-btn">{{ __('common.checkout') }}</a>
                                 @endif
                               </div>  
                         
                    </div>
                </div>
            </div>
        </div>
             <!-- Offcanvas Area Start -->
			 <div class="offcanvas__overlay"></div>
       
        <div class="mobile-side-menu">
            <div class="side-menu-content">
                <div class="side-menu-head">
                    <a href="index.html"><img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="logo"></a>
                    <button class="mobile-side-menu-close"><i class="fa-regular fa-xmark"></i></button>
                </div>
                <div class="side-menu-wrap"></div>
                <!--<ul class="side-menu-list">
                    <li><i class="fa-light fa-location-dot"></i>Address : <span>Amsterdam, 109-74</span></li>
                    <li><i class="fa-light fa-phone"></i>Phone : <a href="tel:+01569896654">+01 569 896 654</a></li>
                    <li><i class="fa-light fa-envelope"></i>Email : <a href="mailto:info@example.com">info@example.com</a></li>
                 </ul>-->
            </div>
        </div>
        <!-- /.mobile-side-menu -->
        <div class="mobile-side-menu-overlay"></div>

        <style>
        /* Premium preloader styles */
        .ap-preloader {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: radial-gradient(circle at center, #0e1320 0%, #05070a 100%) !important;
            z-index: 999999 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: opacity 0.5s ease, visibility 0.5s ease !important;
        }

        .ap-preloader-inner {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 30px !important;
        }

        /* Spinner Rings */
        .ap-loader-rings {
            position: relative !important;
            width: 100px !important;
            height: 100px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .ap-loader-rings .ring {
            position: absolute !important;
            border: 3px solid transparent !important;
            border-radius: 50% !important;
            animation: ap-spin-forward 2s linear infinite !important;
        }

        .ap-loader-rings .ring-outer {
            width: 100px !important;
            height: 100px !important;
            border-top-color: var(--ed-color-theme-primary, #0038BD) !important;
            border-bottom-color: var(--ed-color-theme-primary, #0038BD) !important;
            animation-duration: 2.5s !important;
        }

        .ap-loader-rings .ring-middle {
            width: 76px !important;
            height: 76px !important;
            border-left-color: var(--ed-color-theme-secondary, #EF8E01) !important;
            border-right-color: var(--ed-color-theme-secondary, #EF8E01) !important;
            animation: ap-spin-reverse 1.8s linear infinite !important;
        }

        .ap-loader-rings .ring-inner {
            width: 52px !important;
            height: 52px !important;
            border-top-color: #00d2ff !important;
            border-bottom-color: #00d2ff !important;
            animation-duration: 1.2s !important;
        }

        .ap-loader-rings .ring-core {
            width: 24px !important;
            height: 24px !important;
            background: linear-gradient(135deg, var(--ed-color-theme-primary, #0038BD) 0%, var(--ed-color-theme-secondary, #EF8E01) 100%) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 20px rgba(0, 56, 189, 0.6) !important;
            animation: ap-pulse 1.5s ease-in-out infinite !important;
        }

        /* Preloader text animation */
        .ap-preloader-text {
            color: #ffffff !important;
            font-family: var(--ed-ff-heading, sans-serif) !important;
            font-size: 20px !important;
            font-weight: 700 !important;
            letter-spacing: 2px !important;
            text-transform: uppercase !important;
            display: flex !important;
            align-items: center !important;
            gap: 4px !important;
            opacity: 0.85 !important;
            animation: ap-text-pulse 2s ease-in-out infinite !important;
        }

        .ap-preloader-text .char-glow {
            color: var(--ed-color-theme-secondary, #EF8E01) !important;
            text-shadow: 0 0 10px rgba(239, 142, 1, 0.6) !important;
        }

        /* Close/skip button style */
        .ap-preloader .preloader-close {
            position: absolute !important;
            top: 30px !important;
            right: 30px !important;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            width: 42px !important;
            height: 42px !important;
            border-radius: 12px !important;
            cursor: pointer !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s ease !important;
            z-index: 1000000 !important;
        }

        .ap-preloader .preloader-close:hover {
            background: var(--ed-color-theme-secondary, #EF8E01) !important;
            border-color: var(--ed-color-theme-secondary, #EF8E01) !important;
            color: #ffffff !important;
            transform: rotate(90deg) !important;
        }

        /* Animations */
        @keyframes ap-spin-forward {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes ap-spin-reverse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        @keyframes ap-pulse {
            0%, 100% { transform: scale(0.9); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; box-shadow: 0 0 30px rgba(0, 56, 189, 0.8); }
        }

        @keyframes ap-text-pulse {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        </style>

        <div id="preloader" class="ap-preloader">
            <div class="ap-preloader-inner">
                <div class="ap-loader-rings">
                    <div class="ring ring-outer"></div>
                    <div class="ring ring-middle"></div>
                    <div class="ring ring-inner"></div>
                    <div class="ring-core"></div>
                </div>
                <div class="ap-preloader-text">
                    <span class="char-glow">L</span>earn Withus
                </div>
            </div>
            <button class="preloader-close" aria-label="Skip Loading">
                <i class="fa-regular fa-xmark"></i>
            </button>
        </div>
        <!-- ./ preloader -->

        <script>
            // Self-contained preloader dismisser
            (function() {
                var preloader = document.getElementById('preloader');
                if (preloader) {
                    function dismissPreloader() {
                        if (preloader.style.opacity !== '0') {
                            preloader.style.transition = 'opacity 0.4s ease, visibility 0.4s ease';
                            preloader.style.opacity = '0';
                            preloader.style.visibility = 'hidden';
                            setTimeout(function() {
                                preloader.style.display = 'none';
                            }, 400);
                        }
                    }

                    // Dismiss on DOMContentLoaded
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', dismissPreloader);
                    } else {
                        dismissPreloader();
                    }

                    // Safety fallback: dismiss after 1.2 seconds no matter what
                    setTimeout(dismissPreloader, 1200);

                    // Skip button direct binding
                    var closeBtn = preloader.querySelector('.preloader-close');
                    if (closeBtn) {
                        closeBtn.addEventListener('click', dismissPreloader);
                    }
                }
            })();
        </script>
