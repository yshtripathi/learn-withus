@extends('frontend.layouts.master')

@section('title','About Us')

@section('main-content')

    <!-- Breadcrumb -->
    <section class="section-breadcrumb margin-b-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row bb-breadcrumb-inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="bb-breadcrumb-title">About Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <ul class="bb-breadcrumb-list">
                                <li class="bb-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li><i class="ri-arrow-right-double-fill"></i></li>
                                <li class="bb-breadcrumb-item active">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="section-about-redesigned">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 mb-40 mb-lg-0">
                    <div class="about-showcase-container" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                        <div class="about-glow-effect"></div>
                        <img src="{{ asset('assets/img/about-uimg.webp') }}" alt="About Simply All Beauty" class="about-showcase-img">
                        <div class="about-floating-badge">
                            <div class="badge-icon-wrap">
                                <i class="fas fa-star star-gold"></i>
                            </div>
                            <div class="badge-content">
                                <span class="badge-text-top">4.9 Rating</span>
                                <span class="badge-text-sub">10k+ Trust Reviews</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bb-about-contact about-contact-wrap">
                        <span class="about-eyebrow" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Our Essence</span>
                        <div class="section-title about-section-detail" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                            <div class="section-detail">
                                <h2 class="about-redesigned-title">About <span>Simply All Beauty</span></h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h4 class="about-redesigned-subtitle">Renew Your Body, Refresh Your Soul.</h4>
                            <p class="about-redesigned-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, rem! Et
                                obcaecati rem nulla, aut assumenda unde minima earum distinctio porro excepturi
                                veritatis officiis dolorem quod. sapiente amet rerum beatae dignissimos aperiam
                                id quae quia velit. Ab optio doloribus hic quas sit corporis numquam.</p>
                            <p class="about-redesigned-text">Discover a sanctuary where cutting-edge skin science merges seamlessly with ancient botanical wisdom. Our curated courses and guidance empower you to nurture your natural radiance and embrace wellness as a ritual, not a chore.</p>
                        </div>
                        
                        <div class="row about-stats-row" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                            <div class="col-md-4 col-sm-6 mb-24">
                                <div class="modern-stat-card">
                                    <div class="stat-icon-wrapper stat-icon-partners">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                    <h5 class="stat-number counter">200 +</h5>
                                    <p class="stat-label">Wellness Partners</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-24">
                                <div class="modern-stat-card">
                                    <div class="stat-icon-wrapper stat-icon-treatments">
                                        <i class="fa-solid fa-spa"></i>
                                    </div>
                                    <h5 class="stat-number counter">654k +</h5>
                                    <p class="stat-label">Treatments Given</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 mb-24">
                                <div class="modern-stat-card">
                                    <div class="stat-icon-wrapper stat-icon-souls">
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                    <h5 class="stat-number counter">587k +</h5>
                                    <p class="stat-label">Happy Souls Served</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12">
                    <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">Our <span>Philosophy</span></h2>
                            <p><strong>"Glow Inside Out"</strong> isn’t just a tagline—it’s our promise.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('assets/img/services/science-treatment.png') }}" alt="services-1">
                        </div>
                        <div class="services-contact">
                            <h4>Science-Backed Treatments</h4>
                            <p>From collagen-boosting facials to deep-tissue therapies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('assets/img/services/serum.png') }}" alt="services-2">
                        </div>
                        <div class="services-contact">
                            <h4>Nature’s Bounty</h4>
                            <p>Blueberry-infused serums, herbal compresses, and organic ingredients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('assets/img/services/rituals.png') }}" alt="services-3">
                        </div>
                        <div class="services-contact">
                            <h4>Sacred Rituals</h4>
                            <p>Tailored to honor the deep connection between your mind-body.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Vendors -->
     <section class="section-vendors padding-t-50 padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12">
                    <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">Why <span>Choose Us</span></h2>
                            <p>Discover Our Trusted Partners: Excellence & Reliability in Every choice</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-vendors-img">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="vendors_tab_one">
                                <a href="javascript:void(0)" class="bb-vendor-init">
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <img src="{{ asset('assets/img/hero/2.jpg') }}" alt="vendors-img-1">
                                <div class="vendors-local-shape">
                                    <div class="inner-shape"></div>
                                    <img src="{{ asset('assets/img/hero/1.jpg') }}" alt="vendor">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vendors_tab_two">
                                <a href="javascript:void(0)" class="bb-vendor-init">
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <img src="{{ asset('assets/img/hero/3.jpg') }}" alt="vendors-img-2">
                                <div class="vendors-local-shape">
                                    <div class="inner-shape"></div>
                                    <img src="{{ asset('assets/img/hero/2.jpg') }}" alt="vendor">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vendors_tab_three">
                                <a href="javascript:void(0)" class="bb-vendor-init">
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <img src="{{ asset('assets/img/hero/1.jpg') }}" alt="vendors-img-3">
                                <div class="vendors-local-shape">
                                    <div class="inner-shape"></div>
                                    <img src="{{ asset('assets/img/hero/3.jpg') }}" alt="vendor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12 mb-24">
                    <ul class="bb-vendors-tab-nav nav">
                        <li class="nav-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <a class="nav-link active" data-bs-toggle="tab" href="#vendors_tab_one">
                                <div class="bb-vendors-box">
                                    <div class="inner-heading">
                                        <h5>Expert Care</h5>
                                    </div>
                                    <p>Our licensed therapists are trained in global wellness traditions, from Ayurveda to Swiss cryotherapy.</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <a class="nav-link" data-bs-toggle="tab" href="#vendors_tab_two">
                                <div class="bb-vendors-box">
                                    <div class="inner-heading">
                                        <h5>Luxury with Intention </h5>
                                    </div>
                                    <p>No rushed appointments. Just immersive experiences in our moody, candlelit oasis.</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <a class="nav-link" data-bs-toggle="tab" href="#vendors_tab_three">
                                <div class="bb-vendors-box">
                                    <div class="inner-heading">
                                        <h5>Ethical Beauty</h5>
                                    </div>
                                    <p>Clean, cruelty-free products and sustainable practices (because self-care shouldn’t cost the earth).</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection
