@extends('frontend.layouts.master')

@section('main-content')
    <style>
        .header-14
        {
            background:none;
        }
        </style>
    <main>
       <section class="hero-section-5 overflow-hidden">
            <div class="bg-item">
                <div class="hero-shape shape-1"><img src="assets/img/shapes/hero-shape-9.png" alt="shape"></div>
                <div class="hero-shape shape-2"><img src="assets/img/shapes/hero-shape-10.png" alt="shape"></div>
                <div class="hero-shape shape-3"><img src="assets/img/shapes/hero-img-shape-1.png" alt="shape"></div>
                <div class="hero-shape shape-4"><img src="assets/img/shapes/hero-img-shape-2.png" alt="shape"></div>
            </div>
            <div class="hero-men-wrap">
                <div class="hero-men men-1"><img src="assets/img/images/hero-men-1.png" alt="hero"></div>
                <div class="hero-men men-2"><img src="assets/img/images/hero-men-2.png" alt="hero"></div>
            </div>
            <div class="container">
                <div class="hero-content hero-content-5 text-center">
                    <h1 class="title">@lang('common.start_learning_from') <br>@lang('common.the_world') <span>@lang('common.best_institutions')</span></h1>
                    <p>
                        <br></p>
                    <div class="hero-form">
                        <div class="hero-btn-wrap">
                            <a href="{{ url('/product-lists') }}"
                                class="ed-primary-btn">@lang('common.hero_get_started')</a>
                        </div>
                    </div>
                    <h3 class="bottom-title">@lang('common.explore') <span>40+</span> @lang('common.courses_within_subject')</h3>
                </div>
            </div>
        </section>

            <!-- ./ slider-section -->
        <!-- ./ hero-section -->

            <section class="faq-section pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading mb-30">
                            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                        class="fa-sharp fa-solid fa-bolt"></i></span>@lang('common.about_company')</h4>
                            <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">
                                @lang('common.about_high_impact_learning') <br> <span></span> </h2>
                        </div>
                           <div class="faq-content ">
                            <div class="faq-accordion">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item wow fade-in-bottom" data-wow-delay="400ms">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" 
                                                aria-controls="collapseOne"><span>01.</span> @lang('common.about_our_mission') </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                  <p>@lang('common.about_mission_text')</p>
                                    <ul class="about-list">
                                        <li>@lang('common.about_mission_1')</li>
                                        <li>@lang('common.about_mission_2')</li>
                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" 
                                                aria-expanded="false" aria-controls="collapseTwo"><span>02.</span> @lang('common.about_our_vision')</button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                     <p>@lang('common.about_vision_text')</p>
                                    <ul class="about-list">
                                        <li>@lang('common.about_mission_1')</li>
                                        <li>@lang('common.about_mission_2')</li>
                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fade-in-bottom" data-wow-delay="200ms">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                 data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                 <span>03.</span>@lang('common.about_our_goal') </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                   <p>@lang('common.about_goal_text')</p>
                                    <ul class="about-list">
                                        <li>@lang('common.about_mission_1')</li>
                                        <li>@lang('common.about_mission_2')</li>
                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                     
                             </div>

                        </div>
                        <div class="col-lg-6">
                             <div class="content-img-wrap wow fade-in-left" data-wow-delay="400ms" >
                                <div class="content-img-1"><img src="{{ asset('storage/photos/products/8.webp') }}" alt="img"></div>
                                <div class="content-img-2"><img src="{{ asset('storage/photos/products/12.webp') }}" alt="img"></div>
                                <div class="content-img-3"><img src="{{ asset('storage/photos/products/15.webp') }}" alt="img"></div>
                                <div class="border-shape"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        <section class="feature-section-5 pt-0 pb-120">
                <div class="container">
                    <div class="section-heading text-center">
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms" ><span class="heading-icon"><i class="fa-sharp fa-solid fa-bolt"></i></span>@lang('common.top_course_category')</h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">@lang('common.explore_free_courses')</h2>
                    </div>
                    <div class="row gy-lg-0 gy-4 justify-content-center">
                    @php
    $category_lists = Helper::productCategoryList('all');
    $i = 1; // Start counter for icons
                    @endphp

                    @foreach($category_lists as $category)
                        <div class="col-lg-4 col-md-6">




            <div class="feature-card feature-card-2 text-center wow fade-in-bottom mb-3"
                 data-wow-delay="300ms">        
                <div class="icon">
                    <a href="{{ url('product-cat/' . $category->slug) }}">
                        <img src="{{ asset('assets/img/icon/icon' . $i . '.png') }}" alt="icon{{ $i }}">
                    </a>
                </div>
                <div class="content">
                    <h3 class="title">
                        <a href="{{ url('product-cat/' . $category->slug) }}">{{ $category->title }}</a>
                    </h3>
                    <a href="{{ url('product-cat/' . $category->slug) }}" class="ed-primary-btn">
                        @lang('common.explore_more') <i class="fa-sharp fa-regular fa-arrow-right"></i>
                    </a>
                </div>
            </div>




            </div>
                        @php $i++; @endphp
                    @endforeach

                    </div>
                </div>
        </section>

        <!-- ./ category-section -->


        <section class="feature-course pt-120 pb-120">
            <div class="container">
                <div class="feature-course-top heading-space">
                    <div class="section-heading mb-0">
                        <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms"><span class="heading-icon"><i
                                    class="fa-sharp fa-solid fa-bolt"></i></span>@lang('common.top_class_courses')</h4>
                        <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms">
                            @lang('common.explore_our_courses')</h2>
                    </div>
                </div>
                <div class="course-tab-content tab-content" id="myTabContent-2">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row gy-4 justify-content-center">

                           @php
    $products = Helper::getRandomProduct(22);
    $products = $products->skip(10)->take(12);
                        @endphp

                        @foreach($products as $product)
        <div class="col-lg-4 col-md-6">
            <div class="product-witem">
                @php
        $photo = explode(',', $product->photo);
                @endphp

                <div class="team-thumb">
                    <img src="{{ asset($photo[0]) }}" alt="course">
                </div>

                <div class="team-content text-center">
                    <h3 class="title">
                        <a href="{{ route('product-detail', $product->slug) }}">
                            {{ $product->title }}
                        </a>
                    </h3>
                </div>

                <div class="product-prceitem">
                    <p>
                        {{ $product->getCurrencySymbol() }}
                        {{ Helper::getProductPriceByCurrency(session('currency'), $product) }}
                    </p>
                </div>

                <div class="overlay-content">
                    <div class="prd-box">
                        <div class="prd-content">
                            <a href="{{ route('product-detail', $product->slug) }}">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end overlay content -->
            </div>
            </div>
                @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ./ course-section -->

            <!-- ./ service-section -->


    </main>
@endsection