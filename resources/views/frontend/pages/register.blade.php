@extends('frontend.layouts.master')

@section('title','Create an Account')

@section('main-content')

<x-breadcrumb
    :title="__('common.create_an_account')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.create_an_account')],
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

            <h2>{{ __('common.create_an_account') }}</h2>
            <p>{{ __('common.your_email_not_published') }}</p>

            <form name="frmRegister" id="frmRegister" action="{{ route('register.submit') }}" method="post" novalidate>
                @csrf

                <div class="ct-field @error('name') is-invalid @enderror">
                    <label class="ct-label" for="name">{{ __('common.name') }} <span>*</span></label>
                    <div class="ct-control has-icon">
                        <input type="text" name="name" id="name" class="ct-input"
                               value="{{ old('name') }}" placeholder="{{ __('common.enter_name') }}">
                        <i class="ct-icon fa-regular fa-user"></i>
                    </div>
                    @error('name')<span class="ct-error">{{ $message }}</span>@enderror
                </div>

                <div class="ct-field @error('email') is-invalid @enderror">
                    <label class="ct-label" for="email">{{ __('common.email') }} <span>*</span></label>
                    <div class="ct-control has-icon">
                        <input type="email" name="email" id="email" class="ct-input"
                               value="{{ old('email') }}" placeholder="{{ __('common.enter_email') }}">
                        <i class="ct-icon fa-regular fa-envelope"></i>
                    </div>
                    @error('email')<span class="ct-error">{{ $message }}</span>@enderror
                </div>

                <div class="ct-field @error('password') is-invalid @enderror">
                    <label class="ct-label" for="password">{{ __('common.password') }} <span>*</span></label>
                    <div class="ct-control has-icon">
                        <input type="password" name="password" id="password" class="ct-input"
                               placeholder="{{ __('common.password') }}">
                        <i class="ct-icon fa-solid fa-lock"></i>
                    </div>
                    @error('password')<span class="ct-error">{{ $message }}</span>@enderror
                </div>

                <div class="ct-field @error('captcha') is-invalid @enderror">
                    <div class="ct-captcha">
                        <div class="ct-control">
                            <input type="text" name="captcha" id="captcha" class="ct-input"
                                   autocomplete="off" placeholder="{{ __('common.fill_captcha') }}">
                        </div>
                        <div class="ct-captcha-img">
                            @captcha
                        </div>
                    </div>
                    @error('captcha')<span class="ct-error">{{ __('common.captcha_error') }}</span>@enderror
                </div>

                <div class="ct-field">
                    <div class="ct-check">
                        <input type="checkbox" name="terms" id="agre-condtn" value="1" {{ old('terms') ? 'checked' : '' }}>
                        <label for="agre-condtn">
                            {{ __('common.terms_agree') }}
                            <a href="{{ route('pages', 'terms-conditions') }}">{{ __('common.terms_policy') }}</a>
                        </label>
                    </div>
                </div>

                <button type="submit" class="ct-submit ct-submit-full">
                    <span>{{ __('common.register') }}</span>
                    <i class="fa-solid fa-user-plus"></i>
                </button>
            </form>

            <p class="ct-alt">
                {{ __('common.already_account') }}
                <a href="{{ route('login.form') }}">{{ __('common.sign_in') }}</a>
            </p>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $("#frmRegister").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                name: { required: true, minlength: 2 },
                email: { required: true, email: true },
                password: { required: true, minlength: 6 },
                terms: "required",
                captcha: "required"
            },
            messages: {
                name: "{{ __('common.name_required') }}",
                email: "{{ __('common.email_required') }}",
                password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_min') }}"
                },
                terms: "{{ __('common.terms_required') }}",
                captcha: "{{ __('common.fill_it') }}"
            },
            // .ct-field is a block, so the message lands under the control
            // (and under the checkbox row, not beside it).
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
