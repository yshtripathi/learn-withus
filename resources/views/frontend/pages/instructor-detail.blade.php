@extends('frontend.layouts.master')

@section('title','Instructor Details')

@section('main-content')

<main>
<div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
            <div class="page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
            <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
            <div class="container text-center">
                <h2 class="page-header__title">{{ __('common.instructor_details') }}</h2><!-- /.page-title -->
                <ul class="page-header__breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">{{ __('common.home') }}</a></li>
                    <li><span>{{ $instructor_data->instructor_name }}</span></li>
                </ul><!-- /.page-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->
        <!-- team-details-start -->
        <section class="team-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 wow fadeInUp animated" data-wow-delay="300ms">
                        <div class="team-details__image">
                            <img src="../assets/images/team/{{ $instructor_data->instructor_pic }}" alt="Legend Sensei">
                            <div class="team-details__image__bg-shape"><img src="{{ asset('assets/images/shapes/team-details-shape-bg.png') }}" alt="Legend Sensei"></div>
                            <div class="team-details__image__shape-bottom"><img src="{{ asset('assets/images/shapes/team-details-shape-1.png') }}" alt="Legend Sensei"></div>
                            <div class="team-details__image__svg-shape">
                                <svg class="team-details__image__svg-shape__one" viewBox="0 0 69 80" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M68.9456 39.7448L0.113281 0V79.4895L68.9456 39.7448Z" />
                                </svg>
                                <svg class="team-details__image__svg-shape__two" viewBox="0 0 135 157" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 78.2921L135 156.287V0.286804L0 78.2921Z" />
                                </svg>
                            </div>
                        </div><!-- /.team-image -->
                    </div>
                    <div class="col-lg-7 wow fadeInUp animated" data-wow-delay="400ms">
                        <div class="team-details__content">
                            <h3 class="team-details__title">{{ $instructor_data->instructor_name }}</h3><!-- /.team-name -->
                            <span class="team-details__designation">{{ $instructor_data->instructor_designation }}</span><!-- /.team-designation -->
                            <p>{!! $instructor_data->instructor_desc !!}</p>
                            <a href="{{ route('contact') }}" class="eduact-btn eduact-btn-second"><span class="eduact-btn__curve"></span>Get In Touch<i class="icon-arrow"></i></a>
                        </div><!-- /.team-details-content -->
                    </div>
                </div>
            </div>
        </section>
   </main>


@endsection
