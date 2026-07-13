@extends('frontend.layouts.master')
@section('title', __('frontend.contact_title'))
@section('main-content')


<x-breadcrumb
    :title="__('frontend.contact_us')"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.contact')],
    ]" />
<!-- ./ page-header -->

@php
    $companyEmail = env('APP_EMAIL');
    $companyPhone = env('APP_PHONE');
@endphp

<section class="ct-section">
    <div class="container">
        <div class="row gy-4">

            <!-- Company details -->
            <div class="col-lg-5 col-md-12">
                <div class="ct-info" data-aos="fade-right" data-aos-duration="1000">
                    <span class="ct-info-eyebrow">{{ __('frontend.get_in_touch') }}</span>
                    <h3>{{ __('frontend.office_information') }}</h3>
                    <p>{{ __('frontend.note_queries') }}</p>

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-building"></i></div>
                        <div>
                            <h4>{{ __('frontend.company_info_label') }}</h4>
                            <p>{{ __('frontend.platform_name') }}</p>
                        </div>
                    </div>

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>{{ __('frontend.email') }}</h4>
                            <a href="mailto:{{ $companyEmail }}">{{ $companyEmail }}</a>
                        </div>
                    </div>

                    @if($companyPhone)
                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>{{ __('frontend.phone_label') }}</h4>
                            <a href="tel:{{ $companyPhone }}">{{ $companyPhone }}</a>
                        </div>
                    </div>
                    @endif

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-location-dot"></i></div>
                        <div>
                            <h4>{{ __('frontend.our_office_address') }}</h4>
                            <p>{{ env('APP_ADDRESS') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="col-lg-7">
                <div class="ct-card" data-aos="fade-left" data-aos-duration="1000">

                    @if(session('success'))
                        <div class="ct-alert ct-alert-success">{{ session('success') }}</div>
                    @endif

                    <h2>{{ __('frontend.get_in_touch_today') }}</h2>
                    <p>{{ __('frontend.email_not_published') }}</p>

                    <form action="{{ route('contact.send') }}" method="POST" id="contactForm" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field @error('name') is-invalid @enderror">
                                    <div class="ct-control has-icon">
                                        <input type="text" name="name" class="ct-input" value="{{ old('name') }}" placeholder="{{ __('frontend.placeholder_name') }}">
                                        <i class="ct-icon fa-regular fa-user"></i>
                                    </div>
                                    @error('name')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="ct-field @error('email') is-invalid @enderror">
                                    <div class="ct-control has-icon">
                                        <input type="email" name="email" class="ct-input" value="{{ old('email') }}" placeholder="{{ __('frontend.placeholder_email') }}">
                                        <i class="ct-icon fa-regular fa-envelope"></i>
                                    </div>
                                    @error('email')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="ct-field @error('phone') is-invalid @enderror">
                            <div class="ct-control has-icon">
                                <input type="text" name="phone" id="phone" class="ct-input" value="{{ old('phone') }}"
                                       placeholder="{{ __('frontend.placeholder_phone') }}" inputmode="tel"
                                       oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '')">
                                <i class="ct-icon fa-solid fa-phone"></i>
                            </div>
                            @error('phone')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('subject') is-invalid @enderror">
                            <div class="ct-control has-icon">
                                <input type="text" name="subject" class="ct-input" value="{{ old('subject') }}" placeholder="{{ __('frontend.placeholder_subject') }}">
                                <i class="ct-icon fa-regular fa-tag"></i>
                            </div>
                            @error('subject')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('message') is-invalid @enderror">
                            <div class="ct-control">
                                <textarea name="message" rows="5" class="ct-input" placeholder="{{ __('frontend.placeholder_message') }}">{{ old('message') }}</textarea>
                            </div>
                            @error('message')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('captcha') is-invalid @enderror">
                            <div class="ct-captcha">
                                <div class="ct-control">
                                    <input type="text" name="captcha" id="captcha" class="ct-input" autocomplete="off" placeholder="{{ __('frontend.placeholder_captcha') }}">
                                </div>
                                <div class="ct-captcha-img">
                                    @captcha
                                </div>
                            </div>
                            @error('captcha')<span class="ct-error">{{ __('frontend.error_captcha_invalid') }}</span>@enderror
                        </div>

                        <div class="ct-field @error('terms') is-invalid @enderror">
                            <div class="ct-check">
                                <input type="checkbox" name="terms" id="terms" value="1" {{ old('terms') ? 'checked' : '' }}>
                                <label for="terms">
                                    {{ __('frontend.terms_agreement') }}
                                    <a href="{{ route('pages', 'privacy-policy') }}">{{ __('frontend.privacy_policy') }}</a>
                                </label>
                            </div>
                            @error('terms')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="ct-submit">
                            <span>{{ __('frontend.btn_send_message') }}</span>
                            <i class="fa-regular fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection


