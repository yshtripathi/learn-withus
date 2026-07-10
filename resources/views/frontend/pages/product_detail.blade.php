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
                        <div class="premium-detail-info" data-aos="fade-left" data-aos-duration="1000">
                            <span class="premium-detail-eyebrow">Discover Excellence</span>
                            <h1 class="premium-detail-title">{{$product_detail->title}}</h1>

                            <div class="premium-detail-price-box">
                                <span class="premium-detail-price-label">Price:</span>
                                <h3 class="premium-detail-price">
                                    {{ $product_detail->getCurrencySymbol() }} {{ Helper::getProductPriceByCurrency(session('currency'), $product_detail) }}
                                </h3>
                            </div>

                            <div class="premium-detail-desc-box">
                                <h5 class="premium-detail-section-title">Course Description</h5>
                                <p class="premium-detail-desc">{{$product_detail->description}}</p>
                            </div>

                            <div class="premium-detail-actions">
                                <form action="{{route('single-add-to-cart')}}" method="POST" class="premium-detail-cart-form">
                                    @csrf
                                    <input type="hidden" name="quant[1]" class="qty-input" data-min="1" data-max="1000" value="1" id="quantity">
                                    <input type="hidden" name="slug" value="{{$product_detail->slug}}">
                                    
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
	
@endpush
@push('scripts')
    <script>
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