<header class="header header-3 header-6 header-7 sticky-active">
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
                        <div class="header-right-wrap">
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
                        </div>
                    </div>
                    <!-- /.primary-header-inner -->
                </div>
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
                                            {{number_format($cart['amount'], Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
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
                           <div class="cart-footer border-top mt-3 pt-3 pb-3 d-flex mb-3">
                               <h5 class="me-auto text-dark fw-bold">{{ __('common.total') }} : </h5>
                              <span>{{ Helper::getCurrencySymbol(session('currency')) }} 
                                {{number_format($total_amount, Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
                              </span>
                           </div> 
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
                <ul class="side-menu-list">
                    <li><i class="fa-light fa-location-dot"></i>Address : <span>Amsterdam, 109-74</span></li>
                    <li><i class="fa-light fa-phone"></i>Phone : <a href="tel:+01569896654">+01 569 896 654</a></li>
                    <li><i class="fa-light fa-envelope"></i>Email : <a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
        </div>
        <!-- /.mobile-side-menu -->
        <div class="mobile-side-menu-overlay"></div>

        <div id="preloader">
            <div class="spinner-logo"><img src="{{ asset('assets/img/favicon.png') }}" alt="logo"></div>
            <div class="spinner"></div>
        </div>
        <!-- ./ preloader -->
         

