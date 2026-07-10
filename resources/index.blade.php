@extends('frontend.layouts.master')
@section('title','ASIA MARKET LIMITED')
@section('description','At ASIA MARKET LIMITED, we believe that mastering financial markets starts with passion.')
@section('main-content')
<main>
      <!-- HERO
    ================================================== -->
    <section class="">
        <div class="flickity-button-outset-long flickity-page-dots-white flickity-page-dots-43" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "center", "wrapAround": true, "imagesLoaded": true, "autoPlay": true}'>
            <div class="w-100 py-10 py-lg-12 overlay overlay-custom-gray bg-cover" style="background-image: url(./images/cover-16.webp)">
                <div class="container my-lg-3">
                    <div class="row align-items-center py-md-12 mx-0 text-center">
                        <div class="col-lg-8 mx-auto">
                            <!-- Heading -->
                            <h1 class="display-5 fw-bold text-white mb-2 text-capitalize font-lora" data-aos="fade-left" data-aos-duration="150">
                                Relationships Are Essential for Student Success!
                            </h1>

                            <!-- Text -->
                            <p class="text-white font-montserrat text-capitalize mb-5 px-xl-12" data-aos="fade-up" data-aos-duration="200">
                                Technology is brining a massive wave of evolution on learning things on different ways.
                            </p>

                            <!-- Buttons -->
                            <a href="{{ url('/product-lists') }}" class="btn btn-slide slide-white btn-wide text-white-alone font-size-sm shadow font-montserrat fw-bold" data-aos-duration="200" data-aos="fade-up">Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 py-10 py-lg-12 overlay overlay-custom-gray bg-cover" style="background-image: url(./images/cover-14.webp)">
                <div class="container my-lg-3">
                    <div class="row align-items-center py-md-12 mx-0 text-center">
                        <div class="col-lg-8 mx-auto">
                            <!-- Heading -->
                            <h1 class="display-5 fw-bold text-white mb-2 text-capitalize font-lora" data-aos="fade-left" data-aos-duration="150">
                                Relationships Are Essential for Student Success!
                            </h1>

                            <!-- Text -->
                            <p class="text-white font-montserrat text-capitalize mb-5 px-xl-12" data-aos="fade-up" data-aos-duration="200">
                                Technology is brining a massive wave of evolution on learning things on different ways.
                            </p>

                            <!-- Buttons -->
                            <a href="{{ url('/product-lists') }}" class="btn btn-slide slide-white btn-wide text-white-alone font-size-sm shadow font-montserrat fw-bold" data-aos-duration="200" data-aos="fade-up">Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 py-10 py-lg-12 overlay overlay-custom-gray bg-cover" style="background-image: url(./images/cover-4.webp)">
                <div class="container my-lg-3">
                    <div class="row align-items-center py-md-12 mx-0 text-center">
                        <div class="col-lg-8 mx-auto">
                            <!-- Heading -->
                            <h1 class="display-5 fw-bold text-white mb-2 text-capitalize font-lora" data-aos="fade-left" data-aos-duration="150">
                                Relationships Are Essential for Student Success!
                            </h1>

                            <!-- Text -->
                            <p class="text-white font-montserrat text-capitalize mb-5 px-xl-12" data-aos="fade-up" data-aos-duration="200">
                                Technology is brining a massive wave of evolution on learning things on different ways.
                            </p>

                            <!-- Buttons -->
                            <a href="{{ url('/product-lists') }}" class="btn btn-slide slide-white btn-wide text-white-alone font-size-sm shadow font-montserrat fw-bold" data-aos-duration="200" data-aos="fade-up">Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 py-10 py-lg-12 overlay overlay-custom-gray bg-cover" style="background-image: url('./images/cover-1.webp')">
                <div class="container my-lg-3">
                    <div class="row align-items-center py-md-12 mx-0 text-center">
                        <div class="col-lg-8 mx-auto">
                            <!-- Heading -->
                            <h1 class="display-5 fw-bold text-white mb-2 text-capitalize font-lora" data-aos="fade-left" data-aos-duration="150">
                                Relationships Are Essential for Student Success!
                            </h1>

                            <!-- Text -->
                            <p class="text-white font-montserrat text-capitalize mb-5 px-xl-12" data-aos="fade-up" data-aos-duration="200">
                                Technology is brining a massive wave of evolution on learning things on different ways.
                            </p>

                            <!-- Buttons -->
                            <a href="{{ url('/product-lists') }}" class="btn btn-slide slide-white btn-wide text-white-alone font-size-sm shadow font-montserrat fw-bold" data-aos-duration="200" data-aos="fade-up">Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <!-- FEATURED PRODUCT
    ================================================== -->
    <section class="py-8 bg-white-ice" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5 mb-md-8 text-capitalize">               
                <h1 class="font-lora fw-bold mb-1"> {{ __('common.trending_course_text') }} </h1>   
                <p class="font-size-lg text-teal">Discover your perfect program in our courses.</p>            
            </div>

            <div class="mx-n4 page-dots-custom-1" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true,"autoPlay": true}'>  
            @php
            $products = Helper::getRandomProduct(10);
            @endphp
            @foreach($products as $product)
            <div class="col-12 col-md-6 col-xl-4 pb-4 pb-md-7" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-2 sk-fade font-montserrat font-size-sm">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <div class="badge-float sk-fade-top top-0 right-0 mt-4 me-4">
                            <form action="{{ route('single-add-to-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quant[1]" class="qty-input" data-min="1" data-max="1000" value="1" id="quantity">
                                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                                    <button type="submit" class="btn btn-xs btn-dark text-white rounded-circle lift opacity-dot-7 me-1 p-2 d-inline-flex justify-content-center align-items-center w-36 h-36"><i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                                                  
                            </div>
                            @php 
                                        $photo=explode(',',$product->photo);
                                    @endphp
                            <a href="{{route('product-detail', $product->slug)}}" class="card-img sk-thumbnail d-block">
                                <img class="rounded shadow-light-lg" src="{{ asset($photo[0]) }}" alt="...">
                            </a>
                            <span class="badge sk-fade-bottom badge-lg badge-orange badge-pill badge-float bottom-0 left-0 mb-4 ms-4">
                                <span class="text-white text-uppercase fw-bold font-size-xs">BEST SELLER</span>
                            </span>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                           <!-- Heading -->
                            <div class="position-relative">
                                <a href="{{route('product-detail', $product->slug)}}" class="d-block stretched-link"><h6 class="line-clamp-2 h-md-48 fw-semi-bold me-md-6 me-lg-10 me-xl-4 mb-2">{{$product->title}}</h6></a>

                                <div class="d-lg-flex align-items-end flex-wrap mb-3">
                                @php
                                            $rate = ceil($product->getReview->avg('rate'))
                                        @endphp
                                    <!-- <span class="icon-star"> -->
                                    <span class="course-icon"> 
                                            @for($i=1; $i<=5; $i++)
                                                @if($rate>=$i)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor                                   
                                </div>

                                <div class="row mx-n2 align-items-end">                  
                                            @php
                                                $after_discount=($product->price-($product->price*$product->discount)/100);
                                            @endphp
                                    <div class="col-auto px-2 text-right">                                      
                                        <ins class="h4 mb-0 d-block mb-lg-n1 fw-semi-bold">{{ $product->getCurrencySymbol() }} {{ Helper::getProductPriceByCurrency(session('currency'), $product) }}</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                @endforeach


                
            </div>
            
        </div>
    </section>
    <!-- END Trending Courses -->
     <!-- start Best Seller Courses -->
     <section class="py-8 pt-xl-1 bg-white-ice">
        <div class="container">
            <div class="text-center mb-5 mb-md-8 text-capitalize">              
                <h1 class="fw-bold mb-1">Best Seller Courses </h1>   
                <p class="font-size-lg text-teal">Discover your perfect program in our courses.</p>             
            </div>

            <div class="mx-n4 page-dots-custom-1" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true,"autoPlay": true}'>
            @php
                        $featured = Helper::getRandomProduct(20);
                        @endphp
                        
          @foreach($featured->random(6) as $product_detail)
            <div class="col-12 col-md-6 col-xl-4 pb-4 pb-md-7" style="padding-right:15px;padding-left:15px;">
                    <!-- Card -->
                    <div class="card border shadow p-2 sk-fade font-montserrat font-size-sm">
                        <!-- Image -->
                        <div class="card-zoom position-relative">
                            <div class="badge-float sk-fade-top top-0 right-0 mt-4 me-4">
                            <form action="{{ route('single-add-to-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quant[1]" class="qty-input" data-min="1" data-max="1000" value="1" id="quantity">
                                    <input type="hidden" name="slug" value="{{ $product_detail->slug }}">
                                    <button type="submit" class="btn btn-xs btn-dark text-white rounded-circle lift opacity-dot-7 me-1 p-2 d-inline-flex justify-content-center align-items-center w-36 h-36"><i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                  
                                                                 
                            </div>
                            @php 
                                        $photo=explode(',',$product_detail->photo);
                                    @endphp
                            <a href="{{route('product-detail',$product_detail->slug)}}" class="card-img sk-thumbnail d-block">
                                <img class="rounded shadow-light-lg" src="{{ asset($photo[0]) }}" alt="...">
                            </a>
                            <span class="badge sk-fade-bottom badge-lg badge-orange badge-pill badge-float bottom-0 left-0 mb-4 ms-4">
                                <span class="text-white text-uppercase fw-bold font-size-xs">BEST SELLER</span>
                            </span>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                           <!-- Heading -->
                            <div class="position-relative">
                                <a href="{{route('product-detail',$product_detail->slug)}}" class="d-block stretched-link"><h6 class="line-clamp-2 h-md-48 fw-semi-bold me-md-6 me-lg-10 me-xl-4 mb-2">{{$product_detail->title}}</h6></a>

                                <div class="d-lg-flex align-items-end flex-wrap mb-3">
                                @php
                                            $rate = ceil($product->getReview->avg('rate'))
                                        @endphp
                                    <!-- <span class="icon-star"> -->
                                    <span class="course-icon"> 
                                            @for($i=1; $i<=5; $i++)
                                                @if($rate>=$i)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor                                  
                                </div>

                                <div class="row mx-n2 align-items-end">                  

                                    <div class="col-auto px-2 text-right">                                      
                                        <ins class="h4 mb-0 d-block mb-lg-n1 fw-semi-bold">{{ $product_detail->getCurrencySymbol() }} {{number_format($product_detail->price,2)}}</ins>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>
        </div>
    </section>
      <!-- end Best Seller Courses -->
      <section class="py-8 bg-white">
        <div class="container">
            <div class="row align-items-end mb-md-7 mb-4" data-aos="fade-up">
                <div class="col-md mb-4 mb-md-0 text-center">
                    <h1 class="mb-1">Trending Categories</h1>
                    <p class="font-size-lg mb-0 text-capitalize">Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                </div>            
            </div>
            
            <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4"  >
            @php
                    $category_lists =Helper::productCategoryList('all');
                    @endphp
                    @foreach($category_lists as $category)
                <div class="col mb-md-6 mb-4 px-2 px-md-4" data-aos="fade-up" data-aos-delay="50">
                    <!-- Card -->
                    <a href="<?=url('product-cat'.'/'.$category->slug)?>" class="card icon-category border shadow-dark p-md-5 p-3 text-center lift">
                        <!-- Image -->
                        <div class="position-relative text-light">
                            <div class="position-absolute bottom-0 right-0 left-0 icon-h-p">
                                <!-- <i class="fas fa-bezier-curve"></i> -->
                                <img class="img-fluid" src="{{ $category->photo }}" alt="product categorie">
                            </div>
                            <!-- Icon BG -->
                            <svg width="116" height="82" viewBox="0 0 116 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9238 65.8391C11.9238 65.8391 20.4749 72.4177 35.0465 70.036C49.6182 67.6542 75.9897 78.4406 75.9897 78.4406C75.9897 78.4406 90.002 85.8843 104.047 79.2427C118.093 72.6012 115.872 58.8253 115.872 58.8253C115.743 56.8104 115.606 46.9466 97.5579 22.0066C91.0438 13.0024 84.1597 6.97958 75.9458 3.74641C58.8245 -2.99096 37.7881 -0.447684 22.9067 9.81852C15.5647 14.8832 7.65514 22.0695 3.0465 31.5007C-7.27017 52.6135 11.9238 65.8391 11.9238 65.8391Z" fill="currentColor"></path>
                            </svg>

                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-0 pb-0 pt-6">
                            <h5 class="mb-0 line-clamp-1">{{ $category->title }}</h5>                          
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- INSTRUCTORS
    ================================================== -->
    <section class="py-8 bg-white">
        <div class="container">
            <div class="text-center mb-md-8 mb-5 text-capitalize">
                <h1 class="font-lora fw-bold mb-1">Top Rating Instructors</h1>
                <p class="font-size-lg">Discover your perfect program in our courses.</p>
            </div>

            <div class="mx-n3 mx-md-n4" data-flickity='{"pageDots": false,"cellAlign": "left", "wrapAround": true, "imagesLoaded": true, "autoPlay": true }'>
            @foreach($instructors as $instructor)   
            <div class="col-6 col-md-4 col-lg-3 text-center py-5 text-md-left px-3 px-md-4">
                    <div class="card border shadow p-2 lift">
                        <!-- Image -->
                        <div class="card-zoom position-relative" style="max-width: 250px;">                   

                            <img class="rounded shadow-light-lg img-fluid" src="{{ asset('assets/images/team/' . $instructor->instructor_pic) }}" alt="...">
                        </div>

                        <!-- Footer -->
                        <div class="card-footer px-3 pt-4 pb-1">
                            <h6 class="mb-0 font-montserrat fw-semi-bold">{{$instructor->instructor_name}}</h6>
                            <span class="font-size-d-sm">{{$instructor->instructor_designation}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
   </main>
@endsection
