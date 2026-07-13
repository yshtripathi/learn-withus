@extends('frontend.layouts.master')

@section('title','Order Status')

@section('main-content')
        <x-breadcrumb
            :title="__('common.order_status')"
            :items="[
                ['label' => __('common.home'), 'url' => route('home')],
                ['label' => __('common.order_status')],
            ]" />
        <section class="appointment-section order-usuces pt-5 pb-5">
    <div class="container">
        <div class="appointment-wrap shadow border ">            
            <div class="appointment-top">
                <div class="section-heading text-center mb-3">
                    <h2 class="text-white">{{ __('common.order_successful') }}</h2>
                    <h4 class="order-invoice-number text-white">{{ __('common.invoice_number') }}<span> {{ $transaction_id }}<span></h4>
                    <h3 class="text-white">{{ __('common.thank_you_order') }}</h3>
                    <h5>{{ __('common.order_confirmation') }} {{ $transaction_id }}</h5>
                    <p>{{ __('common.team_contact') }}</p>
                    <h5>{{ __('common.need_assistance') }}</h5>
                    <p>{{ __('common.reach_out_for_help') }} <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection