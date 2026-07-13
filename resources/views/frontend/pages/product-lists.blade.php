@extends('frontend.layouts.master')

@php
    // /product-lists       -> $products is a LengthAwarePaginator, no $category
    // /product-cat/{slug}  -> $products is a plain Collection, $category is set
    $activeCategory = (isset($category) && is_object($category) && isset($category->title)) ? $category : null;

    $isPaginated = $products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
    $total = $isPaginated ? $products->total() : count($products);

    // The category row is stored untranslated, so pick the JP column when the site is in Japanese.
    $isJa = App::getLocale() == 'ja';
    $catTitle = $activeCategory
        ? (($isJa && $activeCategory->title_jp) ? $activeCategory->title_jp : $activeCategory->title)
        : null;
    $catSummary = $activeCategory
        ? (($isJa && $activeCategory->summary_jp) ? $activeCategory->summary_jp : $activeCategory->summary)
        : null;
@endphp

@section('title', $catTitle ?? __('frontend.shop'))

@section('main-content')

<x-breadcrumb
    :title="$catTitle ?? __('frontend.shop')"
    :items="$activeCategory
        ? [
            ['label' => __('frontend.home'), 'url' => route('home')],
            ['label' => __('frontend.shop'), 'url' => route('product-lists')],
            ['label' => $catTitle],
          ]
        : [
            ['label' => __('frontend.home'), 'url' => route('home')],
            ['label' => __('frontend.shop')],
          ]" />

<section class="sh-section">
    <div class="container">

        {{-- Category header — only on /product-cat/{slug} --}}
        @if($activeCategory)
            <div class="sh-cat" data-aos="fade-up" data-aos-duration="800">
                @if(!empty($activeCategory->photo))
                    <div class="sh-cat-media">
                        <img src="{{ asset($activeCategory->photo) }}" alt="{{ $catTitle }}">
                    </div>
                @else
                    {{-- No category photo uploaded yet — placeholder keeps the layout intact. --}}
                    <div class="sh-cat-media is-empty">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                @endif

                <div class="sh-cat-body">
                    <span class="sh-cat-eyebrow">{{ __('frontend.category') }}</span>
                    <h2 class="sh-cat-title">{{ $catTitle }}</h2>
                    @if($catSummary)
                        <p class="sh-cat-summary">{{ $catSummary }}</p>
                    @endif
                </div>
            </div>
        @endif

        <div class="sh-toolbar">
            <p class="sh-count">
                <b>{{ $total }}</b>
                {{ $total === 1 ? __('frontend.course') : __('frontend.courses') }}
                @if($activeCategory)
                    — {{ $catTitle }}
                @endif
            </p>
        </div>

        @if($total)
            <div class="row gy-4">
                @foreach($products as $product)
                    @php
                        $photo = explode(',', $product->photo);
                        $summary = trim(strip_tags($product->summary ?? ''));
                        // Courses are priced per skill level, so the card advertises the cheapest one.
                        $lowest = $product->lowestLevel();
                    @endphp

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                        <article class="sh-card">
                            <div class="sh-thumb">
                                <img src="{{ asset($photo[0]) }}" alt="{{ $product->title }}">
                                <span class="sh-tag">{{ __('frontend.course') }}</span>

                                @if($product->discount > 0)
                                    <span class="sh-off">-{{ (int) $product->discount }}%</span>
                                @endif

                                <div class="sh-overlay">
                                    <a href="{{ route('product-detail', $product->slug) }}" class="sh-view">
                                        <i class="fa-regular fa-eye"></i> {{ __('frontend.view_details') }}
                                    </a>
                                </div>
                            </div>

                            <div class="sh-body">
                                <h4 class="sh-title">
                                    <a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                </h4>

                                @if($summary)
                                    <p class="sh-summary">{{ \Illuminate\Support\Str::limit($summary, 80) }}</p>
                                @endif

                                <div class="sh-foot">
                                    <span class="sh-price">
                                        @if($lowest)
                                            <small class="sh-from">{{ __('frontend.from') }}</small>
                                            {{ $product->getCurrencySymbol() }}
                                            {{ Helper::getProductPriceByCurrency(session('currency'), $lowest) }}
                                        @else
                                            {{ $product->getCurrencySymbol() }}
                                            {{ Helper::getProductPriceByCurrency(session('currency'), $product) }}
                                        @endif
                                    </span>

                                    <form action="{{ route('single-add-to-cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quant[1]" value="1">
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        {{-- Without a level the cart would fall back to the course price, which is 0. --}}
                                        @if($lowest)
                                            <input type="hidden" name="product_level_id" value="{{ $lowest->id }}">
                                        @endif
                                        <button type="submit" class="sh-add" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            {{ $product->stock <= 0 ? __('frontend.sold_out') : __('frontend.add_to_cart') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            @if($isPaginated && $products->hasPages())
                <div class="sh-pagination">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            @endif
        @else
            <div class="sh-empty">
                <i class="fa-regular fa-folder-open"></i>
                <h4>{{ __('frontend.no_products_found') }}</h4>
                <p>{{ __('frontend.try_another_category') }}</p>
                <a href="{{ route('product-lists') }}" class="ct-submit">
                    <i class="fa-solid fa-palette"></i>
                    <span>{{ __('frontend.browse_all_courses') }}</span>
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
