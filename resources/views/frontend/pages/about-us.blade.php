@extends('frontend.layouts.master')

@section('title', __('frontend.about_us_title'))
@section('meta_description', __('frontend.about_us_meta_description'))

@section('main-content')

<style>
    /* ---------------------------------------------------------------
       About page — scoped under .au-* so nothing leaks into the theme
       --------------------------------------------------------------- */
    .au-eyebrow {
        display: inline-block;
        margin-bottom: 14px;
        font-size: 0.8rem;
        font-weight: var(--ed-fw-bold);
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--ed-color-theme-secondary);
    }

    .au-title {
        font-size: 2.5rem;
        font-weight: var(--ed-fw-ebold);
        line-height: 1.2;
        color: var(--ed-color-heading-primary);
        margin-bottom: 20px;
    }
    .au-title span {
        background: linear-gradient(120deg, var(--ed-color-theme-secondary) 0%, var(--ed-color-theme-primary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .au-lead {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--ed-color-text-body);
        margin-bottom: 18px;
    }

    .au-section { padding: 100px 0; }
    .au-center { text-align: center; }
    .au-section-intro { max-width: 640px; margin: 0 auto 56px; }

    /* Images keep their natural aspect ratio — no fixed height, no cropping. */
    .au-img {
        display: block;
        width: 100%;
        height: auto;
        border-radius: 28px;
        box-shadow: 0 24px 50px rgba(0, 29, 51, 0.14);
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .au-figure { position: relative; margin: 0; }
    .au-figure:hover .au-img { transform: translateY(-8px) scale(1.01); }

    /* ---------- 1. Story ---------- */
    .au-story {
        background: radial-gradient(circle at 12% 18%, #ffffff 0%, var(--ed-color-grey-1) 92%);
    }

    .au-check { list-style: none; padding: 0; margin: 26px 0 0; }
    .au-check li {
        position: relative;
        padding-left: 34px;
        margin-bottom: 14px;
        color: var(--ed-color-text-body);
        line-height: 1.7;
    }
    .au-check li::before {
        content: "\f00c";
        font-family: "Font Awesome 5 Free", "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        font-size: 0.62rem;
        border-radius: 50%;
        color: #fff;
        background: var(--ed-color-theme-secondary);
    }

    /* ---------- 2. Levels ---------- */
    .au-levels { background: var(--ed-color-grey-1); }
    .au-step {
        height: 100%;
        padding: 30px 24px;
        border-radius: 22px;
        background: #fff;
        border: 1px solid var(--ed-color-border-1);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .au-step:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 44px rgba(0, 29, 51, 0.1);
        border-color: transparent;
    }
    .au-step-num {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        margin-bottom: 18px;
        border-radius: 14px;
        font-weight: var(--ed-fw-ebold);
        color: #fff;
        background: linear-gradient(135deg, var(--ed-color-theme-primary) 0%, var(--ed-color-theme-secondary) 100%);
    }
    .au-step h5 {
        font-size: 1.05rem;
        font-weight: var(--ed-fw-bold);
        color: var(--ed-color-heading-primary);
        margin-bottom: 8px;
    }
    .au-step p { font-size: 0.92rem; color: #6b7684; line-height: 1.7; margin: 0; }

    /* ---------- 3. CTA ---------- */
    .au-cta {
        padding: 90px 0;
        text-align: center;
        background: linear-gradient(120deg, var(--ed-color-heading-primary) 0%, var(--ed-color-theme-primary) 100%);
    }
    .au-cta .au-title { color: #fff; }
    /* The page-wide gradient ends in brand blue, which vanishes on this blue band. */
    .au-cta .au-title span {
        background: linear-gradient(120deg, var(--ed-color-theme-secondary) 0%, #ffd79a 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .au-cta p {
        max-width: 620px;
        margin: 0 auto 30px;
        color: rgba(255, 255, 255, 0.82);
        font-size: 1.05rem;
    }

    .au-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 15px 32px;
        border-radius: 30px;
        font-weight: var(--ed-fw-sbold);
        text-decoration: none;
        color: #fff;
        background: var(--ed-color-theme-secondary);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .au-btn:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(239, 142, 1, 0.4);
    }
    .au-btn-ghost {
        margin-left: 10px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
    .au-btn-ghost:hover {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: none;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 991px) {
        .au-section { padding: 70px 0; }
        .au-title { font-size: 2rem; }
        .au-figure { margin-bottom: 40px; }
    }
    @media (max-width: 575px) {
        .au-section { padding: 55px 0; }
        .au-title { font-size: 1.7rem; }
        .au-btn-ghost { margin-left: 0; margin-top: 12px; }
    }
</style>

<x-breadcrumb
    title="{{ __('frontend.about_us') }}"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.about_us')],
    ]" />

<!-- 1. Story -->
<section class="au-section au-story">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <figure class="au-figure" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/i3.webp') }}" alt="Manga-style character illustration" class="au-img">
                </figure>
            </div>

            <div class="col-lg-6">
                <div data-aos="fade-left" data-aos-duration="1000">
                    <span class="au-eyebrow">{{ __('frontend.our_story') }}</span>
                    <h2 class="au-title">{!! __('frontend.our_story_title') !!}</h2>

                    <p class="au-lead">{!! __('frontend.our_story_p1') !!}</p>
                    <p class="au-lead">{{ __('frontend.our_story_p2') }}</p>

                    <ul class="au-check">
                        <li>{{ __('frontend.our_story_bullet_1') }}</li>
                        <li>{{ __('frontend.our_story_bullet_2') }}</li>
                        <li>{{ __('frontend.our_story_bullet_3') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Levels -->
<section class="au-section au-levels">
    <div class="container">
        <div class="au-section-intro au-center" data-aos="fade-up" data-aos-duration="1000">
            <span class="au-eyebrow">{{ __('frontend.how_it_works') }}</span>
            <h2 class="au-title">{!! __('frontend.levels_title') !!}</h2>
            <p class="au-lead">{{ __('frontend.levels_subtitle') }}</p>
        </div>

        <div class="row gy-4">
            @php
                $steps = [
                    ['n' => '01', 'title' => __('frontend.level_1_title'), 'text' => __('frontend.level_1_desc')],
                    ['n' => '02', 'title' => __('frontend.level_2_title'), 'text' => __('frontend.level_2_desc')],
                    ['n' => '03', 'title' => __('frontend.level_3_title'), 'text' => __('frontend.level_3_desc')],
                    ['n' => '04', 'title' => __('frontend.level_4_title'), 'text' => __('frontend.level_4_desc')],
                ];
            @endphp

            @foreach($steps as $i => $step)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ 100 + ($i * 100) }}">
                    <div class="au-step">
                        <div class="au-step-num">{{ $step['n'] }}</div>
                        <h5>{{ $step['title'] }}</h5>
                        <p>{{ $step['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 3. CTA -->
<section class="au-cta">
    <div class="container">
        <div data-aos="fade-up" data-aos-duration="1000">
            <span class="au-eyebrow">{{ __('frontend.cta_eyebrow') }}</span>
            <h2 class="au-title">{!! __('frontend.cta_title') !!}</h2>
            <p>{{ __('frontend.cta_desc') }}</p>
            <a href="{{ route('product-lists') }}" class="au-btn">
                <i class="fas fa-palette"></i> {{ __('frontend.browse_courses') }}
            </a>
            <a href="{{ route('contact') }}" class="au-btn au-btn-ghost">
                {{ __('frontend.talk_to_mentor') }}
            </a>
        </div>
    </div>
</section>

@endsection
