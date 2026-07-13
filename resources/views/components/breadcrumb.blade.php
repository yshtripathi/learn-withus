@props([
    'title' => null,
    'highlight' => null,
    'eyebrow' => null,
    'items' => [],
    'image' => null,
])

@php
    $background = $image ?: asset('assets/images/i12.webp');
@endphp

<section {{ $attributes->merge(['class' => 'section-breadcrumb']) }}
         style="background-image: url('{{ $background }}');">
    <div class="container">
        <div class="bb-breadcrumb-inner">

            <div class="bb-breadcrumb-heading" data-aos="fade-right" data-aos-duration="1000">
                @if($eyebrow)
                    <span class="bb-breadcrumb-eyebrow">{{ $eyebrow }}</span>
                @endif
                <h1 class="bb-breadcrumb-title">
                    {{ $title }}@if($highlight) <span>{{ $highlight }}</span>@endif
                </h1>
            </div>

            @if(count($items))
                <nav class="bb-breadcrumb-nav" aria-label="Breadcrumb" data-aos="fade-left" data-aos-duration="1000">
                    <ol class="bb-breadcrumb-list">
                        @foreach($items as $item)
                            @php
                                $label = is_array($item) ? ($item['label'] ?? '') : $item;
                                $url = is_array($item) ? ($item['url'] ?? null) : null;
                            @endphp

                            <li class="bb-breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                                @if($loop->last) aria-current="page" @endif>
                                @if($url && !$loop->last)
                                    <a href="{{ $url }}">{{ $label }}</a>
                                @else
                                    <span>{{ $label }}</span>
                                @endif
                            </li>

                            @unless($loop->last)
                                <li class="bb-breadcrumb-sep" aria-hidden="true">
                                    <i class="fas fa-angle-right"></i>
                                </li>
                            @endunless
                        @endforeach
                    </ol>
                </nav>
            @endif

        </div>
    </div>
</section>
