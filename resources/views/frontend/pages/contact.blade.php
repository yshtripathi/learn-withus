@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('main-content')


<x-breadcrumb
    :title="__('common.contact_us')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.contact')],
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
                    <span class="ct-info-eyebrow">{{ __('common.get_in_touch') }}</span>
                    <h3>{{ __('common.office_information') }}</h3>
                    <p>{{ __('common.note_queries') }}</p>

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-building"></i></div>
                        <div>
                            <h4>{{ __('common.company_info') }}</h4>
                            <p>{{ __('common.company_name') }}</p>
                        </div>
                    </div>

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>{{ __('common.email') }}</h4>
                            <a href="mailto:{{ $companyEmail }}">{{ $companyEmail }}</a>
                        </div>
                    </div>

                    @if($companyPhone)
                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>{{ __('common.phone') }}</h4>
                            <a href="tel:{{ $companyPhone }}">{{ $companyPhone }}</a>
                        </div>
                    </div>
                    @endif

                    <div class="ct-item">
                        <div class="ct-item-icon"><i class="fas fa-location-dot"></i></div>
                        <div>
                            <h4>{{ __('common.our_office_address') }}</h4>
                            <p>{{ __('common.company_address') }}</p>
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

                    <h2>{{ __('common.get_in_touch_today') }}</h2>
                    <p>{{ __('common.your_email_not_published') }}</p>

                    <form action="{{ route('contact.send') }}" method="POST" id="contactForm" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-field @error('name') is-invalid @enderror">
                                    <div class="ct-control has-icon">
                                        <input type="text" name="name" class="ct-input" value="{{ old('name') }}" placeholder="{{ __('common.enter_name') }}">
                                        <i class="ct-icon fa-regular fa-user"></i>
                                    </div>
                                    @error('name')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="ct-field @error('email') is-invalid @enderror">
                                    <div class="ct-control has-icon">
                                        <input type="email" name="email" class="ct-input" value="{{ old('email') }}" placeholder="{{ __('common.enter_email') }}">
                                        <i class="ct-icon fa-regular fa-envelope"></i>
                                    </div>
                                    @error('email')<span class="ct-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="ct-field @error('phone') is-invalid @enderror">
                            <div class="ct-control has-icon">
                                <input type="text" name="phone" id="phone" class="ct-input" value="{{ old('phone') }}"
                                       placeholder="{{ __('common.enter_phone') }}" inputmode="tel"
                                       oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '')">
                                <i class="ct-icon fa-solid fa-phone"></i>
                            </div>
                            @error('phone')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('subject') is-invalid @enderror">
                            <div class="ct-control has-icon">
                                <input type="text" name="subject" class="ct-input" value="{{ old('subject') }}" placeholder="{{ __('common.enter_subject') }}">
                                <i class="ct-icon fa-regular fa-tag"></i>
                            </div>
                            @error('subject')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('message') is-invalid @enderror">
                            <div class="ct-control">
                                <textarea name="message" rows="5" class="ct-input" placeholder="{{ __('common.enter_message') }}">{{ old('message') }}</textarea>
                            </div>
                            @error('message')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="ct-field @error('captcha') is-invalid @enderror">
                            <div class="ct-captcha">
                                <div class="ct-control">
                                    <input type="text" name="captcha" id="captcha" class="ct-input" autocomplete="off" placeholder="{{ __('common.fill_captcha') }}">
                                </div>
                                <div class="ct-captcha-img">
                                    @captcha
                                </div>
                            </div>
                            @error('captcha')<span class="ct-error">{{ __('common.captcha_error') }}</span>@enderror
                        </div>

                        <div class="ct-field @error('terms') is-invalid @enderror">
                            <div class="ct-check">
                                <input type="checkbox" name="terms" id="terms" value="1" {{ old('terms') ? 'checked' : '' }}>
                                <label for="terms">
                                    {{ __('common.terms_agreement') }}
                                    <a href="{{ route('pages', 'privacy-policy') }}">{{ __('common.privacy_policy') }}</a>
                                </label>
                            </div>
                            @error('terms')<span class="ct-error">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="ct-submit">
                            <span>{{ __('common.send_message') }}</span>
                            <i class="fa-regular fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $("#contactForm").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                name: "required",
                subject: "required",
                email: { required: true, email: true },
                phone: { required: true, minlength: 10 },
                message: "required",
                terms: "required",
                captcha: "required"
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
                captcha: "{{ __('common.fill_it') }}"
            },
            // Append to .ct-field (a block) so the message always lands under the
            // control rather than beside it inside the flex row.
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
