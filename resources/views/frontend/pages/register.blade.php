@extends('frontend.layouts.master')

@section('title','Create an Account')

@section('main-content')

<main>
<section class="page-header">
        <div class="bg-item">
            <div class="bg-img" data-background="{{ asset('assets/img/bg-img/page-header.webp') }}"></div>
            <div class="overlay"></div>           
        </div>
        <div class="container">
            <div class="page-header-content">
                <h1 class="title">{{ __('common.create_an_account') }}</h1>
                <h4 class="sub-title"><a class="home" href="{{route('home')}}">{{ __('common.home') }} </a><span
                        class="icon">/</span><a class="inner-page" href="">{{ __('common.create_an_account') }}</a></h4>
            </div>
        </div>
    </section>
    <section class="course-frm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 offset-0 col-lg-6 offset-lg-3">
                    <div class="blog-contact-form contact-form authenticate-form text-center auth-frm">
                        <form name="frmRegister" id="frmRegister" action="{{route('register.submit')}}" method="post">
                            @csrf
                            <h3 class="mb-5">{{ __('common.create_an_account') }}</h3>
                            <div class="mb-2">
                                <label class="fw-bold text-dark mb-2">{{ __('common.name') }}*</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name')
                                <span class="text-danger" id="name-error">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="fw-bold text-dark mb-2">{{ __('common.email') }}*</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                <span class="text-danger" id="email-error">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="fw-bold text-dark mb-2">{{ __('common.password') }}*</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                <span class="text-danger" id="password-error">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group w-100 row mt-4">
                            <div class="col-md-8">         
                            <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" required>
                                @error('captcha')
                            <span class="text-danger" id="captcha-error">{{ __('common.captcha_error') }}</span>
                                @enderror 
                            </div> 
                            <div class="col-md-4">                                   
                            @captcha 
                            </div> 
                            </div>
                            <div class="flex conditins-wraops">
                                <input class="form-check-input" name="terms" type="checkbox" value="" id="agre-condtn"
                                    required>
                                <label for="agre-condtn"> {{ __('common.terms_agree') }} <a
                                        href="{{ route('pages', 'terms-conditions') }}">{{ __('common.terms_policy') }}</a> </label>
                            </div>
                            <button
                                class="ed-primary-btn justify-content-center mt-4 mb-4 w-100">{{ __('common.register') }}</button>
                        </form>
                        <p class="mb-0 font-size-sm text-center">
                            {{ __('common.already_account') }} <a class="text-underline"
                                href="{{ route('login.form') }}">{{ __('common.sign_in') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $("#frmRegister").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                terms: "required",
                captcha:"required"
            },
            messages: {
                name: "{{ __('common.name_required') }}",
                password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_min') }}"
                },
                email: "{{ __('common.email_required') }}",
                terms: "{{ __('common.terms_required') }}", // Add this for terms error message
                captcha:"{{__('common.fill_it')}}",
            },
        });
    });
</script>
@endpush
@push('styles')
<style>
    .shop.login .form .btn {
        margin-right: 0;
    }

    .btn-facebook {
        background: #39579A;
    }

    .btn-facebook:hover {
        background: #073088 !important;
    }

    .btn-github {
        background: #444444;
        color: white;
    }

    .btn-github:hover {
        background: black !important;
    }

    .btn-google {
        background: #ea4335;
        color: white;
    }

    .btn-google:hover {
        background: rgb(243, 26, 26) !important;
    }
</style>
@endpush