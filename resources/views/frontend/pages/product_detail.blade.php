@extends('frontend.layouts.master')

@section('meta')
	<meta name="description" content="{{ Str::limit(strip_tags($product_detail->summary), 160) }}">
	<meta property="og:url" content="{{ route('product-detail', $product_detail->slug) }}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $product_detail->title }}">
	<meta property="og:image" content="{{ asset(explode(',', $product_detail->photo)[0]) }}">
	<meta property="og:description" content="{{ Str::limit(strip_tags($product_detail->description), 200) }}">
@endsection

@section('title', $product_detail->title)

@section('main-content')

@php
    $photo    = explode(',', $product_detail->photo);
    $levels   = $product_detail->levels;
    $currency = session('currency', 'USD');
    $symbol   = $product_detail->getCurrencySymbol();

    // The course carries no price of its own — the selected skill level does.
    $selected = $levels->first();
@endphp

<x-breadcrumb
    :title="$product_detail->title"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => __('frontend.shop'), 'url' => route('product-lists')],
        ['label' => $product_detail->title],
    ]" />

<section class="pd-section">
    <div class="container">

        {{-- One form spans both columns, so the chosen level posts with no JS. --}}
        <form action="{{ route('single-add-to-cart') }}" method="POST">
            @csrf
            <input type="hidden" name="quant[1]" value="1">
            <input type="hidden" name="slug" value="{{ $product_detail->slug }}">

            <div class="row gy-4">

                <!-- Left: media, description, levels -->
                <div class="col-lg-8">

                    <div class="pd-media" data-aos="fade-up" data-aos-duration="800">
                        <img src="{{ asset($photo[0]) }}" alt="{{ $product_detail->title }}">
                    </div>

                    @if($product_detail->summary || $product_detail->description)
                        <div class="pd-block" data-aos="fade-up" data-aos-duration="800">
                            <h2 class="pd-heading">{{ __('frontend.course_description') }}</h2>

                            @if($product_detail->summary)
                                <p class="pd-summary">{{ $product_detail->summary }}</p>
                            @endif

                            @if($product_detail->description)
                                <p class="pd-text">{{ $product_detail->description }}</p>
                            @endif
                        </div>
                    @endif

                    @if($levels->count())
                        <div class="pd-block" data-aos="fade-up" data-aos-duration="800">
                            <span class="pd-eyebrow">{{ __('frontend.skill_level') }}</span>
                            <h2 class="pd-heading">{{ __('frontend.choose_your_level') }}</h2>

                            <div class="pd-levels">
                                @foreach($levels as $i => $level)
                                    <label class="pd-level">
                                        <input type="radio"
                                               name="product_level_id"
                                               value="{{ $level->id }}"
                                               data-name="{{ $level->localized('skill_level') }}"
                                               data-price="{{ $symbol }} {{ Helper::getProductPriceByCurrency($currency, $level) }}"
                                               {{ $i === 0 ? 'checked' : '' }}>
                                        <span class="pd-level-box">
                                            <span class="pd-level-name">{{ $level->localized('skill_level') }}</span>
                                            <span class="pd-level-price">
                                                {{ $symbol }} {{ Helper::getProductPriceByCurrency($currency, $level) }}
                                            </span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        @foreach($levels as $i => $level)
                            <div class="pd-block pd-panel {{ $i === 0 ? 'is-active' : '' }}" data-panel="{{ $level->id }}">
                                @if($level->localized('purpose'))
                                    <h6>{{ __('frontend.purpose') }}</h6>
                                    <p>{{ $level->localized('purpose') }}</p>
                                @endif
                                @if($level->localized('learn_info'))
                                    <h6>{{ __('frontend.what_you_will_learn') }}</h6>
                                    <p>{{ $level->localized('learn_info') }}</p>
                                @endif
                                @if($level->localized('outcome'))
                                    <h6>{{ __('frontend.outcome') }}</h6>
                                    <p>{{ $level->localized('outcome') }}</p>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Right: sticky purchase card -->
                <div class="col-lg-4">
                    <aside class="pd-buy" data-aos="fade-left" data-aos-duration="800">
                        <span class="pd-eyebrow">{{ $product_detail->cat_info->title ?? __('frontend.course') }}</span>
                        <h1 class="pd-heading">{{ $product_detail->title }}</h1>

                        @if($selected)
                            <span class="pd-buy-label">{{ __('frontend.skill_level') }}</span>
                            <span class="pd-buy-level" id="pd-level-name">{{ $selected->localized('skill_level') }}</span>
                        @endif

                        <span class="pd-buy-label">{{ __('frontend.price') }}</span>
                        <span class="pd-buy-price" id="pd-price">
                            {{ $symbol }}
                            @if($selected)
                                {{ Helper::getProductPriceByCurrency($currency, $selected) }}
                            @else
                                {{ Helper::getProductPriceByCurrency($currency, $product_detail) }}
                            @endif
                        </span>

                        <button type="submit" class="ct-submit" {{ $product_detail->stock <= 0 ? 'disabled' : '' }}>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>{{ $product_detail->stock <= 0 ? __('frontend.sold_out') : __('frontend.add_to_cart') }}</span>
                        </button>

                        @if($product_detail->lectures || $product_detail->language)
                            <ul class="pd-meta">
                                @if($product_detail->lectures)
                                    <li>
                                        <span><i class="fa-solid fa-play"></i> {{ __('frontend.lectures') }}</span>
                                        <b>{{ $product_detail->lectures }}</b>
                                    </li>
                                @endif
                                @if($product_detail->language)
                                    <li>
                                        <span><i class="fa-solid fa-globe"></i> {{ __('frontend.language') }}</span>
                                        <b>{{ $product_detail->language }}</b>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </aside>
                </div>
            </div>
        </form>

        <!-- Related -->
        @php
            // Every other course in this category — not a trimmed selection.
            $related = $product_detail->rel_prods->where('id', '!=', $product_detail->id);
        @endphp

        @if($related->count())
            <div class="pd-related">
                <h2 class="pd-related-title">{{ __('frontend.related_courses') }}</h2>

                <div class="row gy-4">
                    @foreach($related as $rel)
                        @php
                            $relPhoto = explode(',', $rel->photo);
                            $relLowest = $rel->lowestLevel();
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <article class="sh-card">
                                <div class="sh-thumb">
                                    <img src="{{ asset($relPhoto[0]) }}" alt="{{ $rel->title }}">
                                   
                                    <div class="sh-overlay">
                                        <a href="{{ route('product-detail', $rel->slug) }}" class="sh-view">
                                            <i class="fa-regular fa-eye"></i> {{ __('frontend.view_details') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="sh-body">
                                    <h4 class="sh-title">
                                        <a href="{{ route('product-detail', $rel->slug) }}">{{ $rel->title }}</a>
                                    </h4>
                                    <div class="sh-foot">
                                        <span class="sh-price">
                                            @if($relLowest)
                                                <small class="sh-from">{{ __('frontend.from') }}</small>
                                                {{ $symbol }} {{ Helper::getProductPriceByCurrency($currency, $relLowest) }}
                                            @else
                                                {{ $symbol }} {{ Helper::getProductPriceByCurrency($currency, $rel) }}
                                            @endif
                                        </span>
                                        <a href="{{ route('product-detail', $rel->slug) }}" class="sh-add">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

@endsection

@push('scripts')
<script>
    // Selecting a level swaps the sticky card's price/name and the content panel.
    document.addEventListener('DOMContentLoaded', function () {
        var radios = document.querySelectorAll('.pd-level input[type=radio]');
        var panels = document.querySelectorAll('.pd-panel');
        var priceEl = document.getElementById('pd-price');
        var nameEl = document.getElementById('pd-level-name');

        radios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (priceEl) priceEl.textContent = this.dataset.price;
                if (nameEl) nameEl.textContent = this.dataset.name;

                panels.forEach(function (panel) {
                    panel.classList.toggle('is-active', panel.dataset.panel === radio.value);
                });
            });
        });
    });
</script>
@endpush
