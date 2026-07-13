@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{ asset($product_detail->photo) }}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title',$product_detail->title)

@section('main-content')

	<main>
    <section class="page-header">
            <div class="bg-item">
                <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header.webp') }}"></div>
                <div class="overlay"></div>               
            </div>
            <div class="container">
                <div class="page-header-content">
                    <h1 class="title">{{ $product_detail->title }}</h1>
                    <h4 class="sub-title"><a class="home" href="{{ route('home') }}">{{ __('common.home') }} </a><span class="icon">/</span><a class="inner-page" href="{{ route('product-lists') }}">{{ __('common.shop') }}</a><span class="icon">/</span><a class="inner-page">{{ $product_detail->title }}</a></h4>
                </div>
            </div>
        </section>
        <!-- ./ page-header -->

        <section class="shop-section single pt-120 pb-120">
            <div class="container">
                <div class="row gy-5 justify-content-center">
                    <div class="col-lg-6 col-md-12">                                   
                         <div class="premium-detail-gallery" data-aos="fade-right" data-aos-duration="1000">
                             @php 
                                 $photo=explode(',', $product_detail->photo);
                             @endphp
                             <div class="premium-detail-img-wrap">
                                 <img src="{{ asset('storage/photos/products/' . basename($photo[0])) }}" class="premium-detail-img" alt="{{ $product_detail->title }}">
                                 <span class="premium-detail-badge">Wellness Course</span>
                             </div>
                         </div>
                    </div> 
                    <div class="col-lg-6 col-md-12">
                        @php
                            $levels = $product_detail->levels;
                            $currency = session('currency', 'USD');
                            $symbol = $product_detail->getCurrencySymbol();
                        @endphp
                        <div class="premium-detail-info" data-aos="fade-left" data-aos-duration="1000">
                            <span class="premium-detail-eyebrow">Discover Excellence</span>
                            <h1 class="premium-detail-title">{{$product_detail->title}}</h1>

                            <div class="premium-detail-price-box">
                                <span class="premium-detail-price-label">{{ __('common.price') }}:</span>
                                <h3 class="premium-detail-price" id="level-price">
                                    {{ $symbol }}
                                    @if($levels->count())
                                        {{ Helper::getProductPriceByCurrency($currency, $levels->first()) }}
                                    @else
                                        {{ Helper::getProductPriceByCurrency($currency, $product_detail) }}
                                    @endif
                                </h3>
                            </div>

                            @if($levels->count())
                            <div class="premium-level-box">
                                <h5 class="premium-detail-section-title">Choose Your Skill Level</h5>
                                <div class="premium-level-tabs" role="tablist">
                                    @foreach($levels as $i => $level)
                                        <button type="button"
                                                class="premium-level-tab {{ $i === 0 ? 'active' : '' }}"
                                                data-level-id="{{ $level->id }}"
                                                data-price="{{ $symbol }} {{ Helper::getProductPriceByCurrency($currency, $level) }}">
                                            {{ $level->localized('skill_level') }}
                                        </button>
                                    @endforeach
                                </div>

                                @foreach($levels as $i => $level)
                                    <div class="premium-level-panel {{ $i === 0 ? 'active' : '' }}" data-level-panel="{{ $level->id }}">
                                        @if($level->localized('purpose'))
                                            <h6 class="premium-level-heading">Purpose</h6>
                                            <p class="premium-level-text">{{ $level->localized('purpose') }}</p>
                                        @endif
                                        @if($level->localized('learn_info'))
                                            <h6 class="premium-level-heading">What You Will Learn</h6>
                                            <p class="premium-level-text">{{ $level->localized('learn_info') }}</p>
                                        @endif
                                        @if($level->localized('outcome'))
                                            <h6 class="premium-level-heading">Outcome</h6>
                                            <p class="premium-level-text">{{ $level->localized('outcome') }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="premium-detail-desc-box">
                                <h5 class="premium-detail-section-title">Course Description</h5>
                                <p class="premium-detail-desc">{{$product_detail->description}}</p>
                            </div>

                            <div class="premium-detail-actions">
                                <form action="{{route('single-add-to-cart')}}" method="POST" class="premium-detail-cart-form">
                                    @csrf
                                    <input type="hidden" name="quant[1]" class="qty-input" data-min="1" data-max="1000" value="1" id="quantity">
                                    <input type="hidden" name="slug" value="{{$product_detail->slug}}">
                                    @if($levels->count())
                                        <input type="hidden" name="product_level_id" id="product-level-id" value="{{ $levels->first()->id }}">
                                    @endif

                                    <button type="submit" class="premium-detail-buy-btn">
                                        <i class="fa-light fa-cart-shopping"></i> Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

@endsection
@push('styles')
	<style>
		.premium-level-box {
			margin: 28px 0;
		}
		.premium-level-tabs {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			margin-bottom: 20px;
		}
		.premium-level-tab {
			flex: 1 1 auto;
			min-width: 110px;
			padding: 10px 16px;
			border: 1px solid #ddd;
			border-radius: 30px;
			background: #fff;
			color: #333;
			font-weight: 600;
			font-size: 14px;
			cursor: pointer;
			transition: all .2s ease;
		}
		.premium-level-tab:hover {
			border-color: #999;
		}
		.premium-level-tab.active {
			background: #1a1a1a;
			border-color: #1a1a1a;
			color: #fff;
		}
		.premium-level-panel {
			display: none;
		}
		.premium-level-panel.active {
			display: block;
		}
		.premium-level-heading {
			font-size: 15px;
			font-weight: 700;
			margin-bottom: 6px;
		}
		.premium-level-text {
			margin-bottom: 16px;
			line-height: 1.7;
		}
	</style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".premium-level-tab");
            const panels = document.querySelectorAll(".premium-level-panel");
            const priceEl = document.getElementById("level-price");
            const levelInput = document.getElementById("product-level-id");

            tabs.forEach(tab => {
                tab.addEventListener("click", function () {
                    const levelId = this.dataset.levelId;

                    tabs.forEach(t => t.classList.remove("active"));
                    this.classList.add("active");

                    panels.forEach(p => {
                        p.classList.toggle("active", p.dataset.levelPanel === levelId);
                    });

                    priceEl.textContent = this.dataset.price;
                    levelInput.value = levelId;
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll(".star-rating span");
            const ratingInput = document.getElementById("rating-value");

            stars.forEach(s => s.classList.remove("selected"));

            stars.forEach(star => {
                star.addEventListener("click", function () {
                    let value = this.getAttribute("data-value");
                    ratingInput.value = value;

                    stars.forEach(s => s.classList.remove("selected"));

                    for (let i = 0; i < value; i++) {
                        stars[i].classList.add("selected");
                    }
                });
            });
        });
    </script>
@endpush