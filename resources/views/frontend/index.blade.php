@extends('frontend.layouts.master')

@section('main-content')

<style>
    /* The transparent header rule the old homepage relied on. */
    .header-14 { background: none; }
</style>

@php
    $currency = session('currency', 'USD');
@endphp

<!-- 1. Hero -->
<section class="hm-hero" style="background-image: url('{{ asset('assets/images/i1.jpg') }}');">
    <div class="container">
        <div class="hm-hero-inner" data-aos="fade-right" data-aos-duration="1000">
            <span class="hm-eyebrow">@lang('frontend.about_company')</span>

            <h1>
                @lang('frontend.start_learning_from')
                <span>@lang('frontend.best_institutions')</span>
            </h1>

            <p>@lang('frontend.about_mission_text')</p>

            <div class="hm-hero-actions">
                <a href="{{ route('product-lists') }}" class="ct-submit">
                    <i class="fa-solid fa-palette"></i>
                    <span>@lang('frontend.hero_get_started')</span>
                </a>
                <a href="{{ route('about-us') }}" class="ct-submit hm-btn-ghost">
                    <span>@lang('frontend.about')</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Why choose us -->
<section class="hm-why">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <div class="hm-collage" data-aos="fade-right" data-aos-duration="1000">
                    {{-- Portrait shot on its own column so nothing overlaps it. --}}
                    <figure>
                        <img src="{{ asset('assets/images/i9.jpg') }}"
                             alt="Students studying together"
                             width="5329" height="7990">
                    </figure>

                    <div class="hm-collage-stack">
                        <figure>
                            <img src="{{ asset('assets/images/i5.jpg') }}"
                                 alt="Mentor guiding a student through brushwork"
                                 width="7662" height="5110">
                        </figure>

                        <div class="hm-collage-note">
                            <b>{{ $category_lists->sum(fn($c) => count($c->products)) }}+</b>
                            <span>@lang('frontend.courses_within_subject')</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div data-aos="fade-left" data-aos-duration="1000">
                    <span class="hm-eyebrow" style="color: var(--ed-color-theme-secondary);">
                        @lang('frontend.why_choose_us')
                    </span>
                    <h2 class="au-title">@lang('frontend.about_high_impact_learning')</h2>

                    @php
                        $reasons = [
                            ['icon' => 'fa-ruler-combined', 'title' => __('frontend.about_our_mission'), 'text' => __('frontend.about_mission_1')],
                            ['icon' => 'fa-users',          'title' => __('frontend.about_our_vision'),  'text' => __('frontend.about_mission_2')],
                            ['icon' => 'fa-layer-group',    'title' => __('frontend.about_our_goal'),    'text' => __('frontend.about_goal_text')],
                        ];
                    @endphp

                    @foreach($reasons as $reason)
                        <div class="hm-feature">
                            <div class="hm-feature-icon"><i class="fas {{ $reason['icon'] }}"></i></div>
                            <div>
                                <h4>{{ $reason['title'] }}</h4>
                                <p>{{ $reason['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Category rows -->
<section class="nf-section">
    <div class="container">
        <div class="nf-section-head" data-aos="fade-up" data-aos-duration="800">
            <h2>@lang('frontend.explore_our_courses')</h2>
            <p>@lang('frontend.top_course_category')</p>
        </div>

        @foreach($category_lists as $cat)
            @php $courses = $cat->products; @endphp

            <div class="nf-row" data-aos="fade-up" data-aos-duration="700">
                <div class="nf-head">
                    @if(!empty($cat->photo))
                        <img src="{{ asset($cat->photo) }}" alt="{{ $cat->title }}" class="nf-head-img">
                    @else
                        {{-- No category photo uploaded yet — placeholder keeps the row aligned. --}}
                        <span class="nf-head-img is-empty"><i class="fa-solid fa-palette"></i></span>
                    @endif

                    <div>
                        <h3>{{ $cat->title }}</h3>
                        <small>{{ count($courses) }} {{ count($courses) === 1 ? __('frontend.course') : __('frontend.courses') }}</small>
                    </div>
                    <a href="{{ url('product-cat/'.$cat->slug) }}" class="nf-viewall">
                        @lang('frontend.explore_more') <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                @if(count($courses))
                    <div class="nf-strip-wrap">
                        <button type="button" class="nf-arrow nf-prev" aria-label="Previous">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>

                        <div class="nf-strip">
                            @foreach($courses as $course)
                                @php
                                    $photo  = explode(',', $course->photo);
                                    $lowest = $course->lowestLevel();
                                @endphp

                                <a href="{{ route('product-detail', $course->slug) }}" class="nf-card">
                                    <img src="{{ asset($photo[0]) }}" alt="{{ $course->title }}" class="nf-card-img">
                                    <span class="nf-card-shade"></span>

                                    <div class="nf-card-body">
                                        <h4 class="nf-card-title">{{ $course->title }}</h4>
                                        <span class="nf-price">
                                            @if($lowest)
                                                {{ __('frontend.from') }}
                                                {{ $course->getCurrencySymbol() }}{{ Helper::getProductPriceByCurrency($currency, $lowest) }}
                                            @else
                                                {{ $course->getCurrencySymbol() }}{{ Helper::getProductPriceByCurrency($currency, $course) }}
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <button type="button" class="nf-arrow nf-next" aria-label="Next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                @else
                    <p class="nf-empty">{{ __('frontend.no_products_found') }}</p>
                @endif
            </div>
        @endforeach
    </div>
</section>

<!-- 4. Inside the studio -->
<section class="st-section">
    <div class="container">
        <div class="st-intro" data-aos="fade-up" data-aos-duration="800">
            <span class="hm-eyebrow">@lang('frontend.inside_the_studio')</span>
            <h2>@lang('frontend.studio_title') <span>@lang('frontend.studio_title_accent')</span></h2>
            <p>@lang('frontend.studio_text')</p>
        </div>

        <div class="row gy-4 align-items-stretch">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <article class="st-card">
                    <div class="st-media">
                        <img src="{{ asset('assets/images/i6.jpg') }}"
                             alt="@lang('frontend.studio_card_1_title')"
                             width="4256" height="2832" loading="lazy">
                    </div>
                    <div class="st-body">
                        <h3>@lang('frontend.studio_card_1_title')</h3>
                        <p>@lang('frontend.studio_card_1_text')</p>
                    </div>
                </article>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <article class="st-card">
                    <div class="st-media">
                        <img src="{{ asset('assets/images/i10.jpg') }}"
                             alt="@lang('frontend.studio_card_2_title')"
                             width="1920" height="1280" loading="lazy">
                    </div>
                    <div class="st-body">
                        <h3>@lang('frontend.studio_card_2_title')</h3>
                        <p>@lang('frontend.studio_card_2_text')</p>
                    </div>
                </article>
            </div>
        </div>

        <div class="st-cta" data-aos="fade-up" data-aos-duration="800">
            <a href="{{ route('product-lists') }}" class="ct-submit">
                <i class="fa-solid fa-palette"></i>
                <span>@lang('frontend.browse_all_courses')</span>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Each category row scrolls horizontally; the arrows page it by ~one viewport.
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.nf-strip-wrap').forEach(function (wrap) {
            var strip = wrap.querySelector('.nf-strip');
            var prev  = wrap.querySelector('.nf-prev');
            var next  = wrap.querySelector('.nf-next');
            if (!strip) return;

            function sync() {
                var overflowing = strip.scrollWidth > strip.clientWidth + 4;
                var atStart = strip.scrollLeft <= 2;
                var atEnd = strip.scrollLeft >= strip.scrollWidth - strip.clientWidth - 2;

                prev.disabled = !overflowing || atStart;
                next.disabled = !overflowing || atEnd;
            }

            function page(direction) {
                strip.scrollBy({ left: direction * (strip.clientWidth * 0.85), behavior: 'smooth' });
            }

            prev.addEventListener('click', function () { page(-1); });
            next.addEventListener('click', function () { page(1); });
            strip.addEventListener('scroll', sync);
            window.addEventListener('resize', sync);

            sync();
        });
    });
</script>
@endpush
