@extends('frontend.layouts.master')
@section('title', __('frontend.sign_in_title'))
@section('main-content')

<x-breadcrumb
    :title="__('frontend.sign_in')"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.sign_in')],
    ]" />

<section class="ct-section">
    <div class="container">
        <div class="ct-card ct-auth" data-aos="fade-up" data-aos-duration="1000">

            @if(session('error'))
                <div class="ct-alert ct-alert-error">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="ct-alert ct-alert-success">{{ session('success') }}</div>
            @endif

            <h2>{{ __('frontend.sign_into_account') }}</h2>

            <form name="frmLogin" id="frmLogin" action="{{ route('login.submit') }}" method="post" novalidate>
                @csrf

                <div class="ct-field @error('email') is-invalid @enderror">
                    <label class="ct-label" for="email">{{ __('frontend.email') }} <span>*</span></label>
                    <div class="ct-control has-icon">
                        <input type="email" name="email" id="email" class="ct-input"
                               value="{{ old('email') }}" placeholder="{{ __('frontend.placeholder_email') }}">
                        <i class="ct-icon fa-regular fa-envelope"></i>
                    </div>
                    @error('email')<span class="ct-error">{{ $message }}</span>@enderror
                </div>

                <div class="ct-field @error('password') is-invalid @enderror">
                    <label class="ct-label" for="password">{{ __('frontend.password_label') }} <span>*</span></label>
                    <div class="ct-control has-icon">
                        <input type="password" name="password" id="password" class="ct-input"
                               placeholder="{{ __('frontend.placeholder_password') }}">
                        <i class="ct-icon fa-solid fa-lock"></i>
                    </div>
                    @error('password')<span class="ct-error">{{ $message }}</span>@enderror
                </div>

                <a class="ct-forgot" href="{{ route('forgetpwd.form') }}">{{ __('frontend.forget_password') }}</a>

                <button type="submit" class="ct-submit ct-submit-full">
                    <span>{{ __('frontend.login_btn') }}</span>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </form>

            <p class="ct-alt">
                {{ __('frontend.dont_have_account') }}
                <a href="{{ route('register.form') }}">{{ __('frontend.sign_up') }}</a>
            </p>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#frmLogin").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                email: { required: true, email: true },
                password: { required: true, minlength: 5 }
            },
            messages: {
                email: "{{ __('frontend.error_email_required') }}",
                password: {
                    required: "{{ __('frontend.error_password_required') }}",
                    minlength: "{{ __('frontend.error_password_min') }}"
                }
            },
            // .ct-field is a block, so the message lands under the control.
            errorPlacement: function (error, element) {
                error.appendTo(element.closest('.ct-field'));
            },
            highlight: function (element) {
                $(element).closest('.ct-field').addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).closest('.ct-field').removeClass('is-invalid');
            }
        });
    });
</script>
@endpush
