@extends('frontend.layouts.master')

@section('main-content')

    <style>
        .error {
            color: #FF0000;
        }
    </style>

	@php
		$settings = DB::table('settings')->get();
	@endphp

    <main>
    <div class="page-banner banner-bg-one">
        <div class="container"> 
            <div class="banner-text" data-aos="slide-up"> 
                <h1>   Get in touch today! </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{ __('common.contact') }} </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   <div class="contact-info pt-10 pb-5"> 
    <div class="container">
        <div class="row row-cols-md-2 mb-8 mb-lg-11">
            <div class="col-md-5"  data-aos="slide-up" >
                <h1 class="mb-6"> {{ __('common.get_in_touch') }}</h1>
                  <div class="border shadow bg-white p-5">  
                    <div class="media d-flex">
                        <div class="me-5">
                            <!-- Icon -->
                            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.3651 20H2.50025L9.0205 18.581C9.1475 18.5599 9.26518 18.5011 9.3583 18.4121L20.4055 7.36492C21.2125 6.55966 21.6627 5.46438 21.6555 4.32443C21.657 3.17561 21.2082 2.07199 20.4055 1.25011C19.6003 0.44311 18.505 -0.00714406 17.365 0.000162955C16.2177 -0.00998926 15.1173 0.45462 14.3245 1.28393L3.311 12.3311C3.21388 12.4093 3.14307 12.5154 3.10828 12.6351L1.68943 19.1554C1.6507 19.3895 1.72596 19.628 1.89215 19.7973C2.01689 19.9246 2.18689 19.9974 2.3651 20ZM17.365 1.35151C18.9882 1.35138 20.3042 2.66722 20.3043 4.29048C20.3043 4.30179 20.3043 4.31311 20.3041 4.32443C20.3152 5.09774 20.0101 5.84209 19.4596 6.3852L15.3042 2.19602C15.8516 1.652 16.5931 1.34808 17.365 1.35151ZM14.3582 3.1758L18.5136 7.33116L8.88528 16.9257L4.72992 12.804L14.3582 3.1758ZM4.1894 14.1555L7.53394 17.5L3.24343 18.446L4.1894 14.1555Z" fill="currentColor"></path>
                                <path d="M23.8175 23.6486H1.18251C0.809333 23.6486 0.506836 23.9511 0.506836 24.3243C0.506836 24.6975 0.809333 25 1.18251 25H23.8175C24.1907 25 24.4932 24.6975 24.4932 24.3243C24.4932 23.9511 24.1907 23.6486 23.8175 23.6486Z" fill="currentColor"></path>
                            </svg>

                        </div>
                        <div class="media-body flex-shrink-1">
                            <h5 class="mb-4">{{ __('common.company_info') }}</h5>
                            <p>  {{ __('common.company_name') }} </p>
                            
                        </div>                        
                </div>                             
                        <div class="media d-flex 2">
                            <div class="me-5">
                                <!-- Icon -->
                                <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1563 6.10857C9.51012 6.10857 8.98438 5.57813 8.98438 4.9262C8.98438 4.27428 9.51012 3.74384 10.1563 3.74384C10.8024 3.74384 11.3282 4.27428 11.3282 4.9262C11.3282 5.57813 10.8025 6.10857 10.1563 6.10857Z" fill="currentColor"></path>
                                    <path d="M24.9751 21.6358L23.0707 8.82697C22.9047 7.70855 21.9705 6.89675 20.8494 6.89675H13.5955C14.2338 5.67842 14.2226 4.24519 13.5551 3.02396C12.8802 1.78912 11.6562 1.02758 10.2809 0.986735C10.1985 0.984321 10.114 0.984321 10.0311 0.986735C8.65603 1.02753 7.43212 1.78912 6.7572 3.02396C6.08995 4.2447 6.07852 5.67729 6.71687 6.89675H4.15064C3.02947 6.89675 2.09526 7.70855 1.92924 8.82677L0.0248985 21.6358C-0.0721255 22.2889 0.117186 22.9504 0.544297 23.4508C0.971456 23.9511 1.59178 24.2381 2.24629 24.2381H22.7537C23.4082 24.2381 24.0285 23.9511 24.4556 23.4508C24.8828 22.9505 25.0721 22.289 24.9751 21.6358ZM8.12554 3.7853C8.53683 3.03287 9.24813 2.58722 10.0769 2.56263C10.103 2.56185 10.1296 2.5615 10.1562 2.5615C10.1828 2.5615 10.2094 2.5619 10.2353 2.56263C11.0643 2.58722 11.7756 3.03287 12.1869 3.7853C12.6165 4.57128 12.6046 5.49924 12.1551 6.26788L10.1562 9.66325L8.15792 6.26887C7.70786 5.50003 7.69575 4.57158 8.12554 3.7853ZM23.2717 22.4221C23.1954 22.5116 23.0265 22.6617 22.7537 22.6617H8.59924C8.63571 22.2922 8.8052 21.737 9.44608 21.3821C9.82437 21.1727 9.96275 20.6936 9.75518 20.3119C9.5476 19.9302 9.07259 19.7906 8.69436 20.0001C7.86694 20.4581 7.32147 21.1774 7.11692 22.0798C7.06912 22.2906 7.04602 22.4883 7.0367 22.6617H2.24629C1.97353 22.6617 1.80463 22.5116 1.72826 22.4221C1.65189 22.3326 1.52977 22.1418 1.5702 21.8697L3.47455 9.06059C3.52508 8.72031 3.80942 8.47334 4.15069 8.47334H7.63832L9.15428 11.0485C9.36659 11.4102 9.74111 11.6262 10.1562 11.6262C10.5713 11.6262 10.9458 11.4102 11.1575 11.0495L12.6741 8.47334H20.8494C21.1906 8.47334 21.475 8.72031 21.5255 9.06073L23.4299 21.8697C23.4702 22.1418 23.3481 22.3326 23.2717 22.4221Z" fill="currentColor"></path>
                                    <path d="M13.5285 10.8785C13.1191 10.7407 12.6767 10.9641 12.5403 11.3771C12.4038 11.79 12.6251 12.2364 13.0344 12.3741C13.0424 12.3768 13.843 12.6656 14.1029 13.4521C14.2119 13.7824 14.5168 13.9913 14.8439 13.9913C14.9258 13.9913 15.0092 13.9782 15.0911 13.9506C15.5005 13.8129 15.7217 13.3665 15.5852 12.9535C15.0769 11.415 13.5915 10.8997 13.5285 10.8785Z" fill="currentColor"></path>
                                    <path d="M14.1905 15.8431C13.7836 15.6982 13.3373 15.9136 13.1938 16.3241C12.7528 17.5846 11.2415 18.126 11.2097 18.1371C10.8021 18.2758 10.5821 18.7212 10.7183 19.1333C10.8274 19.4636 11.1323 19.6725 11.4594 19.6725C11.5413 19.6725 11.6246 19.6594 11.7066 19.6318C11.7985 19.6009 13.9667 18.8514 14.6673 16.8488C14.8109 16.4383 14.5974 15.988 14.1905 15.8431Z" fill="currentColor"></path>
                                </svg>

                            </div>
                            <div class="media-body flex-shrink-1">
                                <h5 class="mb-4">Find Us</h5>
                                <address class="">
                                    {{ __('common.company_address') }}
                                </address>
                            </div>
                        </div>
                    
                        <div class="media d-flex">
                            <div class="me-5">
                                <!-- Icon -->
                                <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.3651 20H2.50025L9.0205 18.581C9.1475 18.5599 9.26518 18.5011 9.3583 18.4121L20.4055 7.36492C21.2125 6.55966 21.6627 5.46438 21.6555 4.32443C21.657 3.17561 21.2082 2.07199 20.4055 1.25011C19.6003 0.44311 18.505 -0.00714406 17.365 0.000162955C16.2177 -0.00998926 15.1173 0.45462 14.3245 1.28393L3.311 12.3311C3.21388 12.4093 3.14307 12.5154 3.10828 12.6351L1.68943 19.1554C1.6507 19.3895 1.72596 19.628 1.89215 19.7973C2.01689 19.9246 2.18689 19.9974 2.3651 20ZM17.365 1.35151C18.9882 1.35138 20.3042 2.66722 20.3043 4.29048C20.3043 4.30179 20.3043 4.31311 20.3041 4.32443C20.3152 5.09774 20.0101 5.84209 19.4596 6.3852L15.3042 2.19602C15.8516 1.652 16.5931 1.34808 17.365 1.35151ZM14.3582 3.1758L18.5136 7.33116L8.88528 16.9257L4.72992 12.804L14.3582 3.1758ZM4.1894 14.1555L7.53394 17.5L3.24343 18.446L4.1894 14.1555Z" fill="currentColor"></path>
                                    <path d="M23.8175 23.6486H1.18251C0.809333 23.6486 0.506836 23.9511 0.506836 24.3243C0.506836 24.6975 0.809333 25 1.18251 25H23.8175C24.1907 25 24.4932 24.6975 24.4932 24.3243C24.4932 23.9511 24.1907 23.6486 23.8175 23.6486Z" fill="currentColor"></path>
                                </svg>

                            </div>
                            <div class="media-body flex-shrink-1">
                                <h5 class="mb-4">Write to Us</h5>
                                <a href="mailto: {{ __('common.company_email') }}" class="text-gray-800"> {{ __('common.company_email') }}</a>
                                <!-- <a href="mailto:courses@skola.com" class="text-gray-800">courses@skola.com</a> -->
                            </div>                        
                    </div> 

                </div> 
            </div>

            <div class="col-md-7" data-aos="slide-up" >
                <h1 class="mb-6">{{ __('common.have_question') }}</h1>
                <form action="{{ route ('contact.send') }}" method="POST" id="contactForm" class="row shadow bg-white p-5">
                @csrf
                <form class="row shadow bg-white p-5">
                    <div class="form-group mb-6 col-xl-6">
                        <label for="exampleInputTitle1">{{ __('common.name') }}</label>
                        
                        <input type="text" class="form-control placeholder-1" placeholder="{{ __('common.enter_name') }}" name="name">
                    </div>

                    <div class="form-group mb-6 col-xl-6">
                        <label for="exampleInputTitle2">{{ __('common.email') }}</label>
                        
                        <input type="email" class="form-control placeholder-1" placeholder="{{ __('common.enter_email') }}" name="email">
                    </div>

                    <div class="form-group mb-6 col-xl-6">
                        <label for="exampleInputTitle1">{{ __('common.phone') }}</label>
                        <input type="text" class="form-control placeholder-1" placeholder="{{ __('common.enter_phone') }}" name="phone">
                    </div>

                    <div class="form-group mb-6 col-xl-6">
                        <label for="exampleInputTitle2">{{ __('common.subject') }}</label>
                        <input type="text" class="form-control placeholder-1" placeholder="{{ __('common.enter_subject') }}" name="subject">
                    </div>

                    <div class="form-group mb-6 col-12">
                        <label for="exampleFormControlTextarea1">{{ __('common.message') }}</label>
                        <textarea name="message" class="form-control placeholder-1" rows="6" placeholder="{{ __('common.enter_message') }}"></textarea>
                        
                    </div>

                    <div class="col-12">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mw-md-300p"><span class="eduact-btn__curve"></span>{{ __('common.send_message') }}<i class="icon-arrow"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    </div>
   </main>
	
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
    .error {
		color: #FF0000;
	}
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $("#contactForm").validate({
            rules: {
                name: "required",
                subject: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                message: "required"
            },
            messages: {
                name: "{{ __('common.name_required') }}",
                subject: "{{ __('common.subject_required') }}",
                email: "{{ __('common.email_required') }}",
                phone: {
                    required: "{{ __('common.phone_required') }}",
                    minlength: "{{ __('common.phone_min') }}"
                },
                message: "{{ __('common.message_required') }}"
            }
        });
    });
</script>

@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush