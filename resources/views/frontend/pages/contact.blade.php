@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('main-content')

<style>
    /* Contact page style overrides */
    .error {
        color: #ef4444 !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        margin-top: 5px !important;
        display: block !important;
    }

    .alert {
        border-radius: 12px !important;
        padding: 15px 20px !important;
        font-size: 14px !important;
        margin-bottom: 25px !important;
        border: none !important;
    }
    .alert-danger {
        background-color: #fef2f2 !important;
        color: #ef4444 !important;
    }
    .alert-success {
        background-color: #f0fdf4 !important;
        color: #22c55e !important;
    }

    /* Left Block styling */
    .contact-content {
        background: linear-gradient(135deg, #0f172a 0%, #020617 100%) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 24px !important;
        padding: 48px !important;
        color: rgba(255, 255, 255, 0.7) !important;
        box-shadow: 0 20px 50px rgba(2, 6, 23, 0.4) !important;
    }
    .contact-content .contact-top .title {
        color: #ffffff !important;
        font-size: 26px !important;
        font-weight: 700 !important;
        margin-bottom: 12px !important;
    }
    .contact-content .contact-top p {
        color: rgba(255, 255, 255, 0.6) !important;
        font-size: 15px !important;
        line-height: 1.6 !important;
        margin-bottom: 35px !important;
    }
    .contact-content .contact-list .list-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 20px !important;
        margin-bottom: 30px !important;
        padding-bottom: 25px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
        transition: all 0.3s ease !important;
    }
    .contact-content .contact-list .list-item:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    .contact-content .contact-list .list-item .icon {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 48px !important;
        height: 48px !important;
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 12px !important;
        color: var(--ed-color-theme-secondary, #EF8E01) !important;
        font-size: 18px !important;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        flex-shrink: 0 !important;
    }
    .contact-content .contact-list .list-item:hover .icon {
        background: var(--ed-color-theme-primary, #0038BD) !important;
        border-color: var(--ed-color-theme-primary, #0038BD) !important;
        color: #ffffff !important;
        transform: translateY(-4px) scale(1.05) !important;
        box-shadow: 0 8px 20px rgba(0, 56, 189, 0.3) !important;
    }
    .contact-content .contact-list .list-item .content .title {
        color: #ffffff !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        margin-bottom: 6px !important;
    }
    .contact-content .contact-list .list-item .content p,
    .contact-content .contact-list .list-item .content span a {
        color: rgba(255, 255, 255, 0.8) !important;
        font-size: 15px !important;
        line-height: 1.5 !important;
        text-decoration: none !important;
        transition: color 0.25s ease !important;
    }
    .contact-content .contact-list .list-item .content span a:hover {
        color: var(--ed-color-theme-secondary, #EF8E01) !important;
    }

    /* Right Block (Contact Form Card) styling */
    .blog-contact-form.contact-form {
        background: #ffffff !important;
        box-shadow: 0 20px 45px rgba(0, 56, 189, 0.06) !important;
        border: 1px solid rgba(0, 56, 189, 0.05) !important;
        border-radius: 24px !important;
        padding: 50px !important;
    }
    .blog-contact-form .title {
        color: var(--ed-color-heading-primary, #001d33) !important;
        font-size: 32px !important;
        font-weight: 700 !important;
    }
    .blog-contact-form p {
        color: #64748B !important;
        font-size: 15px !important;
    }

    /* Inputs fields styling */
    .blog-contact-form .request-form .form-item {
        position: relative !important;
        display: flex !important;
        flex-wrap: wrap !important;
        align-items: center !important;
        width: 100% !important;
        margin-bottom: 20px !important;
    }
    .blog-contact-form .request-form .form-item .icon {
        position: absolute !important;
        left: 20px !important;
        right: auto !important;
        top: 25px !important;
        transform: translateY(-50%) !important;
        color: #94A3B8 !important;
        font-size: 16px !important;
        transition: color 0.3s ease !important;
        pointer-events: none !important;
    }
    .blog-contact-form .request-form .form-item.message-item .icon {
        top: 25px !important;
        transform: none !important;
    }
    .blog-contact-form .request-form .form-item .form-control {
        padding-left: 20px !important;
        padding-right: 20px !important;
        border-radius: 12px !important;
        border: 1px solid #E2E8F0 !important;
        background-color: #F8FAFC !important;
        height: auto !important;
        font-size: 15px !important;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        margin-bottom: 0 !important;
        box-shadow: none !important;
    }
    .blog-contact-form .request-form .form-item.has-icon .form-control {
        padding-left: 50px !important;
    }
    .blog-contact-form .request-form .form-item .form-control:focus {
        border-color: var(--ed-color-theme-primary, #0038BD) !important;
        background-color: #ffffff !important;
        box-shadow: 0 8px 20px rgba(0, 56, 189, 0.05) !important;
    }
    .blog-contact-form .request-form .form-item .form-control:focus + .icon {
        color: var(--ed-color-theme-primary, #0038BD) !important;
    }

    #contactForm label.error {
        position: static !important;
        display: block !important;
        width: 100% !important;
        color: #ef4444 !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        margin-top: 5px !important;
        text-align: left !important;
    }

    /* Inline Captcha Grid layout */
    .ap-captcha-wrap {
        display: flex !important;
        align-items: center !important;
        gap: 15px !important;
        width: 100% !important;
        margin-bottom: 20px !important;
    }
    .ap-captcha-input-col {
        flex-grow: 1 !important;
    }
    .ap-captcha-img-col {
        flex-shrink: 0 !important;
        display: flex !important;
        align-items: center !important;
        height: 50px !important;
    }
    .ap-captcha-img-col img {
        border-radius: 10px !important;
        height: 100% !important;
        width: auto !important;
    }

    /* Checkbox list item styling */
    .ap-checkbox-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 10px !important;
        margin-bottom: 25px !important;
    }
    .ap-checkbox-item input[type="checkbox"] {
        margin-top: 4px !important;
        border-radius: 4px !important;
        border: 1px solid #CBD5E1 !important;
        width: 18px !important;
        height: 18px !important;
        cursor: pointer !important;
    }
    .ap-checkbox-item label {
        font-size: 14px !important;
        color: #64748B !important;
        cursor: pointer !important;
        line-height: 1.5 !important;
    }
    .ap-checkbox-item label a {
        font-weight: 600 !important;
        text-decoration: underline !important;
        color: var(--ed-color-theme-secondary, #EF8E01) !important;
        transition: color 0.25s ease !important;
    }
    .ap-checkbox-item label a:hover {
        color: var(--ed-color-theme-primary, #0038BD) !important;
    }

    /* Primary Submit Button styling */
    .blog-contact-form .submit-btn .ed-primary-btn {
        background: linear-gradient(90deg, var(--ed-color-theme-primary, #0038BD) 0%, #0054ff 100%) !important;
        border: none !important;
        color: #ffffff !important;
        padding: 14px 35px !important;
        font-weight: 600 !important;
        font-size: 15px !important;
        border-radius: 10px !important;
        cursor: pointer !important;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        box-shadow: 0 4px 15px rgba(0, 56, 189, 0.25) !important;
    }
    .blog-contact-form .submit-btn .ed-primary-btn:hover {
        background: linear-gradient(90deg, #0054ff 0%, var(--ed-color-theme-primary, #0038BD) 100%) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 25px rgba(0, 56, 189, 0.4) !important;
    }

    @media only screen and (max-width: 767px) {
        .blog-contact-form.contact-form {
            padding: 30px 20px !important;
        }
        .contact-content {
            padding: 30px 20px !important;
        }
    }
</style>

@php
$settings = DB::table('settings')->get();
@endphp

<main>
    <section class="page-header">
        <div class="bg-item">
            <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header.webp') }}"></div>
            <div class="overlay"></div>
           
        </div>
        <div class="container">
            <div class="page-header-content">
                <h1 class="title">{{ __('common.contact_us') }}</h1>
                <h4 class="sub-title"><a class="home" href="{{route('home')}}">{{ __('common.home') }} </a><span
                        class="icon">/</span><a class="inner-page" href=""> {{ __('common.contact') }}</a></h4>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->
    <section class="contact-section pt-120 pb-120">
        <div class="container">
            <div class="row gy-lg-0 gy-5">
                <!-- Office Information Column -->
                <div class="col-lg-5 col-md-12">
                    <div class="contact-content">
                        <div class="contact-top">
                            <h3 class="title">{{ __('common.office_information') }}</h3>
                            <!-- <p>{{ __('common.recap_communities') }}</p> -->
                        </div>
                        <div class="contact-list">
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">{{ __('common.company_info') }}</h4>
                                    <span><a href="javascript:void(0)">{{ __('common.company_name') }}</a></span>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">{{ __('common.email') }}</h4>
                                    <span><a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a></span>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">{{ __('common.our_office_address') }}</h4>
                                    <p>{{ __('common.company_address_full') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Column -->
                <div class="col-lg-7">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="blog-contact-form contact-form">
                        <h2 class="title mb-0">{{ __('common.get_in_touch_today') }}</h2>
                        <p class="mb-30 mt-10">{{ __('common.note_queries') }}</p>
                        <div class="request-form">
                            <form action="{{ route ('contact.send') }}" method="POST" id="contactForm" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-item has-icon">
                                            <input type="text" class="form-control" placeholder="{{ __('common.enter_name') }}" name="name">
                                            <div class="icon"><i class="fa-regular fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item has-icon">
                                            <input type="email" class="form-control" placeholder="{{ __('common.enter_email') }}" name="email">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item has-icon">
                                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" pattern="[0-9+\-\(\)\s]+" inputmode="tel" oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '')">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-phone"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item">
                                            <input type="text" class="form-control" placeholder="{{ __('common.enter_subject') }}" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item message-item has-icon">
                                            <textarea name="message" class="form-control address" cols="30" rows="5" placeholder="{{ __('common.enter_message') }}"></textarea>
                                            <div class="icon"><i class="fa-light fa-messages"></i></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-4">
                                    <div class="col-md-12">
                                        <div class="ap-captcha-wrap">
                                            <div class="form-item ap-captcha-input-col">
                                                <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" required style="margin-bottom: 0 !important;">
                                            </div>
                                            <div class="ap-captcha-img-col">
                                                @captcha
                                            </div>
                                        </div>
                                        @error('captcha')
                                        <span class="text-danger d-block mt-1" id="captcha-error">{{ __('common.captcha_error') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item ap-checkbox-item">
                                            <input type="checkbox" name="terms" class="form-check-input me-2" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                {{ __('common.terms_agreement') }}
                                                <a href="/privacy-policy" contenteditable="false" style="cursor: pointer;">
                                                    {{ __('common.privacy_policy') }}
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="submit-btn">
                                    <button type="submit" name="submit" id="submit" class="ed-primary-btn">
                                        <span>{{ __('common.send_message') }}</span>
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                            <div id="form-messages" class="alert mt-20"></div>
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
                message: "required",
                terms: "required",
                captcha:"required"
            },
            messages: {
                name: "{{ __('common.name_required') }}",
                subject: "{{ __('common.subject_required') }}",
                email: "{{ __('common.email_required') }}",
                phone: {
                    required: "{{ __('common.phone_required') }}",
                    minlength: "{{ __('common.phone_min') }}"
                },
                message: "{{ __('common.message_required') }}",
                terms: "{{ __('common.agree_privacy_policy') }}",
                captcha:"{{__('common.fill_it')}}",
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest('.form-item'));
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