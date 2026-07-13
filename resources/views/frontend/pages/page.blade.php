@extends('frontend.layouts.master')

@section('title', $page_data->page_title)
@section('main-content')
<main>
    <x-breadcrumb
        :title="$page_data->page_title"
        :items="[
            ['label' => __('common.home'), 'url' => route('home')],
            ['label' => $page_data->page_title],
        ]" />

        <!-- End Breadcrumb Area  -->
        {!! $page_data->page_desc !!}
</main>
@endsection