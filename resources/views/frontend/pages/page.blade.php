@extends('frontend.layouts.master')

@section('title', $page_data->page_title)
@section('meta_description', Str::limit(strip_tags($page_data->page_desc), 160))

@section('main-content')

<x-breadcrumb
    :title="$page_data->page_title"
    :items="[
        ['label' => __('frontend.home'), 'url' => route('home')],
        ['label' => $page_data->page_title],
    ]" />
<!-- End Breadcrumb Area  -->

<section class="pg-section">
    <div class="container">
        {{-- page_desc is raw WYSIWYG HTML from the DB; .pg-prose styles whatever tags it contains. --}}
        <article class="pg-prose" data-aos="fade-up" data-aos-duration="800">
            {!! $page_data->page_desc !!}
        </article>
    </div>
</section>

@endsection
