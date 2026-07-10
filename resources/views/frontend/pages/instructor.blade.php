@extends('frontend.layouts.master')

@section('title','Instructors')

@section('main-content')

<main>
   <section class="page-header">
            <div class="bg-item">
                <div class="bg-img" data-background="assets/img/bg-img/page-header.webp"></div>
                <div class="overlay"></div>                
            </div>
            <div class="container">
                <div class="page-header-content">
                    <h1 class="title">{{ __('common.instructors') }}</h1>
                    <h4 class="sub-title"><a class="home" href="{{route('home')}}"> {{ __('common.home') }} </a><span class="icon">/</span><a class="inner-page" href="javascript:void(0)"> {{ __('common.instructors') }}</a></h4>
                </div>
            </div>
        </section>
        <!-- ./ page-header -->
         <section class="appointment-section pt-5 pb-5">
    <div class="container">
        <div class="appointment-wrap">
            <div class="shape">
                <img src="assets/img/new-update-2/shapes/appoint-shape.png" alt="shape">
            </div>
            <div class="section-heading mb-3">
                    <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fade-in-bottom;">
                        <span class="heading-icon"><i class="fa-sharp fa-solid fa-bolt"></i></span>
                        {{ __('common.our_instructors_heading') }}
                    </h4>
                    <h2 class="section-title wow fade-in-bottom" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fade-in-bottom;">
                        {{ __('common.guiding_you_every_step') }}
                    </h2>
                </div>    
            <div class="appointment-top">
                
                    <p class="mb-0 mt-30">
                        {{ __('common.instructors_intro_1') }}
                    </p>
                    <p class="mt-3">
                        {{ __('common.instructors_intro_2') }}
                    </p>
                

                <h5 class="mt-4">{{ __('common.teaching_style_trust') }}</h5>
                <ul class="appointment-list">
                    <li>{{ __('common.clear_practical') }}</li>
                    <li>{{ __('common.project_based_learning') }}</li>
                    <li>{{ __('common.supportive_encouraging') }}</li>
                    <li>{{ __('common.updated_relevant') }}</li>
                </ul>

                <p class="mt-3">
                    {{ __('common.instructors_goal') }}
                </p>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
