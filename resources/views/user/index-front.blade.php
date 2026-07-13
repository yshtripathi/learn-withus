@extends('frontend.layouts.master')
@section('title','My Account')
@section('main-content')

<x-breadcrumb
    :title="__('common.my_account')"
    :items="[
        ['label' => __('common.home'), 'url' => route('home')],
        ['label' => __('common.my_account')],
    ]" />

@php
    $user = auth()->user();

    // A failed password change redirects back here, so open that panel rather than
    // dropping the user on Orders with their errors hidden out of sight.
    $passwordFields = ['current_password', 'new_password', 'new_confirm_password'];
    $activeTab = $errors->hasAny($passwordFields) ? 'password' : 'orders';

    $initial = strtoupper(mb_substr($user->name ?? $user->email, 0, 1));
@endphp

<section class="or-section">
    <div class="container">

        @include('user.layouts.notification')

        <div class="row gy-4">

            <!-- Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <aside class="ac-sidebar" data-aos="fade-right" data-aos-duration="800">
                    <div class="ac-user">
                        <span class="ac-avatar">{{ $initial }}</span>
                        <div class="ac-user-info">
                            <b>{{ $user->name }}</b>
                            <span>{{ $user->email }}</span>
                        </div>
                    </div>

                    <nav class="ac-nav">
                        <button type="button"
                                class="ac-nav-item {{ $activeTab === 'orders' ? 'is-active' : '' }}"
                                data-tab="orders">
                            <i class="fa-regular fa-file-lines"></i>
                            {{ __('common.order_detail') }}
                            <span class="ac-count">{{ $orders->total() }}</span>
                        </button>

                        <button type="button"
                                class="ac-nav-item {{ $activeTab === 'password' ? 'is-active' : '' }}"
                                data-tab="password">
                            <i class="fa-solid fa-shield-halved"></i>
                            {{ __('common.change_password') }}
                        </button>
                    </nav>
                </aside>
            </div>

            <!-- Content -->
            <div class="col-lg-8 col-xl-9">

                <!-- Orders -->
                <div class="ac-panel {{ $activeTab === 'orders' ? 'is-active' : '' }}" data-panel="orders">
                    @if(count($orders))
                        <div class="or-head">
                            <h2>{{ __('common.order_detail') }}</h2>
                        </div>

                        @foreach($orders as $order)
                            @php
                                $symbol = Helper::getCurrencySymbol($order->currency);
                                $decimals = $order->currency == 'JPY' ? 0 : 2;

                                $status = strtolower($order->status);
                                $statusClass = match($status) {
                                    'delivered' => 'or-status-delivered',
                                    'process'   => 'or-status-process',
                                    'cancel'    => 'or-status-cancel',
                                    default     => 'or-status-new',
                                };
                            @endphp

                            <article class="or-card">
                                <div class="or-num">
                                    <small>{{ __('common.order_number') }}</small>
                                    <b>{{ $order->order_number }}</b>
                                </div>

                                <div class="or-cell">
                                    <small>{{ __('common.order_date') }}</small>
                                    <span>{{ $order->created_at ? $order->created_at->format('d M, Y') : '—' }}</span>
                                </div>

                                <div class="or-cell">
                                    <small>{{ __('common.total_amount') }}</small>
                                    <span class="or-amount">
                                        {{ $symbol }}{{ number_format($order->total_amount, $decimals) }}
                                    </span>
                                </div>

                                <div class="or-cell">
                                    <small>{{ __('common.status') }}</small>
                                    <span class="or-status {{ $statusClass }}">{{ ucwords($order->status) }}</span>
                                </div>

                                <a href="{{ route('user.order.show', $order->id) }}" class="or-view">
                                    <i class="fa-regular fa-eye"></i>
                                    {{ __('common.view_details') }}
                                </a>
                            </article>
                        @endforeach

                        @if($orders->hasPages())
                            <div class="sh-pagination">
                                {{ $orders->onEachSide(1)->links() }}
                            </div>
                        @endif
                    @else
                        <div class="or-empty">
                            <i class="fa-regular fa-file-lines"></i>
                            <h4>{{ __('common.no_orders_found') }}</h4>
                            <p>{{ __('common.try_another_category') }}</p>
                            <a href="{{ route('product-lists') }}" class="ct-submit">
                                <i class="fa-solid fa-palette"></i>
                                <span>{{ __('common.browse_all_courses') }}</span>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Change password -->
                <div class="ac-panel {{ $activeTab === 'password' ? 'is-active' : '' }}" data-panel="password">
                    <div class="ct-card">
                        <h2>{{ __('common.change_password') }}</h2>
                        <p>{{ __('common.password_min') }}</p>

                        <form action="{{ route('change.password') }}" method="POST" id="frmChangePassword" novalidate>
                            @csrf

                            <div class="ct-field @error('current_password') is-invalid @enderror">
                                <label class="ct-label" for="current_password">{{ __('common.current_password') }} <span>*</span></label>
                                <div class="ct-control has-icon">
                                    <input type="password" name="current_password" id="current_password" class="ct-input">
                                    <i class="ct-icon fa-solid fa-lock"></i>
                                </div>
                                @error('current_password')<span class="ct-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="ct-field @error('new_password') is-invalid @enderror">
                                        <label class="ct-label" for="new_password">{{ __('common.new_password') }} <span>*</span></label>
                                        <div class="ct-control has-icon">
                                            <input type="password" name="new_password" id="new_password" class="ct-input">
                                            <i class="ct-icon fa-solid fa-key"></i>
                                        </div>
                                        @error('new_password')<span class="ct-error">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="ct-field @error('new_confirm_password') is-invalid @enderror">
                                        <label class="ct-label" for="new_confirm_password">{{ __('common.confirm_password') }} <span>*</span></label>
                                        <div class="ct-control has-icon">
                                            <input type="password" name="new_confirm_password" id="new_confirm_password" class="ct-input">
                                            <i class="ct-icon fa-solid fa-key"></i>
                                        </div>
                                        @error('new_confirm_password')<span class="ct-error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="ct-submit">
                                <i class="fa-solid fa-shield-halved"></i>
                                <span>{{ __('common.change_password') }}</span>
                            </button>
                        </form>
                    </div>
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

        // Sidebar tabs
        function showTab(tab) {
            $('.ac-nav-item').removeClass('is-active')
                .filter('[data-tab="' + tab + '"]').addClass('is-active');
            $('.ac-panel').removeClass('is-active')
                .filter('[data-panel="' + tab + '"]').addClass('is-active');
        }

        $('.ac-nav-item').on('click', function () {
            var tab = $(this).data('tab');
            showTab(tab);
            history.replaceState(null, '', '#' + tab);
        });

        // Deep link (#password) — but never override a panel opened by validation errors.
        var hash = (window.location.hash || '').replace('#', '');
        if (hash && $('.ac-panel[data-panel="' + hash + '"]').length && !$('.ct-error:not(:empty)').length) {
            showTab(hash);
        }

        $("#frmChangePassword").validate({
            errorClass: 'ct-error',
            errorElement: 'span',
            rules: {
                current_password: "required",
                new_password: { required: true, minlength: 6 },
                new_confirm_password: { required: true, equalTo: "#new_password" }
            },
            messages: {
                current_password: "{{ __('common.password_required') }}",
                new_password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_min') }}"
                },
                new_confirm_password: {
                    required: "{{ __('common.password_required') }}",
                    equalTo: "{{ __('common.password_not_match') }}"
                }
            },
            // .ct-field is a block, so the message lands under the input.
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
