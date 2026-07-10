@extends('frontend.layouts.master')
@section('title')
    @if(isset($category) && $category && is_object($category) && property_exists($category, 'title'))
        {{ $category->title }}
    @else
        Shop
    @endif
@endsection
@section('main-content')

<main>
        <section class="page-header">
            <div class="bg-item">
                <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header.webp') }}"></div>
                <div class="overlay"></div>                
            </div>
            <div class="container">
                <div class="page-header-content">
                    @if(isset($category) && $category && is_object($category) && property_exists($category, 'title'))
                        <h1 class="title">{{ $category->title }}</h1>
                        <h4 class="sub-title"><a class="home" href="{{ route('home') }}">{{ __('common.home') }}</a><span class="icon">/</span><a href="{{ route('product-lists') }}">{{ __('common.shop') }}</a><span class="icon">/</span><a class="inner-page">{{ $category->title }}</a></h4>
                    @else
                        <h1 class="title">{{ __('common.shop') }}</h1>
                        <h4 class="sub-title"><a class="home" href="{{ route('home') }}">{{ __('common.home') }}</a><span class="icon">/</span><a class="inner-page"> {{ __('common.shop') }}</a></h4>
                    @endif
                </div>
            </div>
        </section>
        <!-- ./ page-header -->

        <section class="shop-section pt-120 pb-120">
            <div class="container">
               <div class="row">
              <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                 <div class="premium-sidebar-widget sticky-widget">
                            <h3 class="premium-widget-title">{{ __('common.category') }}</h3>
                            <ul class="premium-category-list">
                                @php
                                    $categories = Helper::productCategoryList("all");
                                @endphp
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ url('product-cat/'.$category->slug) }}">
                                            <span class="category-name">
                                                <i class="fa-solid fa-chevron-right category-icon"></i>
                                                {{ $category->title }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
              <div class="col-lg-9 col-12">
                <div class="row gy-4">
                    @if(count($products))
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="premium-course-card">
                            @php 
                                $photo=explode(',',$product->photo);
                            @endphp
                            <div class="premium-card-thumb">
                                <span class="premium-card-tag">Course</span>
                                <img src="{{ asset($photo[0]) }}" alt="{{ $product->title }}" class="premium-card-img">
                                <div class="premium-card-overlay">
                                    <a href="{{ route('product-detail', $product->slug) }}" class="premium-btn-view">
                                        <i class="fa-regular fa-eye"></i> View Details
                                    </a>
                                </div>
                            </div>
                            <div class="premium-card-content">
                                <h4 class="premium-card-title">
                                    <a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                </h4>
                                <div class="premium-card-footer">
                                    <span class="premium-card-price">{{ $product->getCurrencySymbol() }} {{ Helper::getProductPriceByCurrency(session('currency'), $product) }}</span>
                                    <form action="{{ route('single-add-to-cart') }}" method="POST" class="premium-cart-form">
                                        @csrf
                                        <input type="hidden" name="quant[1]" class="qty-input" data-min="1" data-max="1000" value="1" id="quantity">
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <button type="submit" class="premium-cart-btn" title="Add to Cart">
                                            <i class="fa-light fa-cart-shopping"></i> Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                    @endif





                   </div>


                    </div>                       
                </div>               
            </div>
        </section>
    </main>

@endsection
@push ('styles')

@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						}); 
                    }
                }
            })
        });
	</script> --}}
	<script>
        $(document).ready(function(){
            
            $(document).ready(function() {
  $('#sel1').change(function() {
    var catlink = $(this).val();
    if (catlink) {
      window.location.href = catlink;
    }
  });
});
            
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>

@endpush