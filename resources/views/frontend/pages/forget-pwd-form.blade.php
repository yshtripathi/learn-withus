@extends('frontend.layouts.master')

@section('title', __('frontend.forgot_password_title'))

@section('main-content')

<x-breadcrumb
    :title="__('frontend.forget_password')"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.forget_password')],
    ]" />

<section class="ct-section">
    <div class="container">
        <div class="ct-card ct-auth" data-aos="fade-up" data-aos-duration="1000">

            @if(session('success') || session('status'))
                <div class="ct-alert ct-alert-success">{{ session('success') ?? session('status') }}</div>
            @endif

            <h2>{{ __('frontend.forget_password') }}</h2>
            <p>{{ __('frontend.check_your_email') }}</p>

            <form name="frmForgetPwd" id="frmForgetPwd" action="{{ route('password.email') }}" method="post" novalidate>
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

                <div class="ct-field @error('captcha') is-invalid @enderror">
                    <div class="ct-captcha">
                        <div class="ct-control">
                            <input type="text" name="captcha" id="captcha" class="ct-input"
                                   autocomplete="off" placeholder="{{ __('frontend.placeholder_captcha') }}">
                        </div>
                        <div class="ct-captcha-img">
                            @captcha
                        </div>
                    </div>
                    @error('captcha')<span class="ct-error">{{ __('frontend.error_captcha_invalid') }}</span>@enderror
                </div>

                <button type="submit" class="ct-submit ct-submit-full">
                    <span>{{ __('frontend.forget_password') }}</span>
                    <i class="fa-regular fa-paper-plane"></i>
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $("#frmForgetPwd").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                email: { required: true, email: true },
                captcha: "required"
            },
            messages: {
                email: "{{ __('frontend.error_email_required') }}",
                captcha: "{{ __('frontend.error_captcha_required') }}"
            },
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
