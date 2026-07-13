@extends('frontend.layouts.master')
@section('title', __('common.sign_in_title'))
@section('main-content')

<main>
<x-breadcrumb
        :title="__('common.sign_in_title')"
        :items="[
            ['label' => __('common.home'), 'url' => route('home')],
            ['label' => __('common.sign_in_title')],
        ]" />
    <section class="course-frm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 offset-0 col-lg-6 offset-lg-3">
                    <div class="blog-contact-form contact-form authenticate-form text-center auth-frm">
                        <form name="frmLogin" id="frmLogin" action="{{route('login.submit')}}" method="post">
                            @csrf
                            <h3 class="mb-5">{{ __('common.sign_into_account') }}</h3>
                            <div class="mb-2">
                                <label class="fw-bold text-dark mb-2">{{ __('common.email') }}*</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{old('email')}}" required>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="fw-bold text-dark mb-2">{{ __('common.password') }}*</label>
                                <input type="password" name="password" id="password" class="form-control password-large"
                                    value="{{old('password')}}" required>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="ms-auto">
                                <a class="text-gray-800"
                                    href="{{route('forgetpwd.form')}}">{{ __('common.forget_password') }}</a>
                            </div>
                            <button class="ed-primary-btn justify-content-center mt-4 mb-5 w-100 "
                                type="submit">{{ __('common.login') }}</button>
                        </form>
                        <p class="mb-0 font-size-sm text-center">
                            {{ __('common.dont_have_account') }} <a class="text-underline"
                                href="{{ route('register.form') }}">{{ __('common.sign_up') }}</a>
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
        $("#frmLogin").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_confirmation_min') }}"
                },
                email: "{{ __('common.email_required') }}"
            }
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