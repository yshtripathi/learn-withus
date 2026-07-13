@extends('frontend.layouts.master')

@section('title','Forgot Password')

@section('main-content')

<main>
    <x-breadcrumb
        :title="__('common.forget_password')"
        :items="[
            ['label' => __('common.home'), 'url' => route('home')],
            ['label' => __('common.forget_password')],
        ]" />
    <div class="modal-dialog forget-p-modal">
        <div class="modal-content">
            <!-- Signin -->
            <div class="collapse show" id="collapseSignin" data-bs-parent="#accountModal">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('common.forget_password') }}</h5>
                    <h5>@if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        else
                        <div class="alert alert-success">
                            {{ __('common.check_your_email') }}
                        </div>
                        @endif
                    </h5>
                </div>

                <div class="modal-body auth-frm">

                    <!-- Form Signin -->
                    <form name="frmLogin2" id="frmLogin2" action="{{route('password.email')}}" method="post"
                        class="comment-one__form">
                        @csrf
                        <!-- <form class="mb-5" onsubmit="redirectToAccount(event)"> -->

                        <!-- Email -->
                        <div class="form-group mb-5">
                            <label for="modalSigninEmail">
                                {{ __('common.email') }}
                            </label>
                            <!-- <input type="email" class="form-control" id="modalSigninEmail" placeholder="creativelayers"> -->
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}"
                                required>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group w-100 row mt-4 mb-3">
                        <div class="col-md-8">         
                        <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ __('common.fill_captcha') }}" required>
                            @error('captcha')
                        <span class="text-danger" id="captcha-error">{{ __('common.captcha_error') }}</span>
                            @enderror 
                        </div> 
                        <div class="col-md-4">                                   
                        @captcha 
                        </div> 
                        </div>


                        <button type="submit" name="submit"
                            class="ed-primary-btn justify-content-center mb-5 w-100 ">{{ __('common.forget_password') }}</button>
                    </form>

                    <!-- Text -->
                    <p class="mb-0 font-size-sm text-center">
                        {{ __('common.dont_have_account') }} <a class="text-underline"
                            href="{{ route('register.form') }}">{{ __('common.sign_up') }}</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $("#frmLogin").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_confirmation_min') }}"
                },
                email: "{{ __('common.email_required') }}"
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#frmRegister").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                terms: "required",
                captcha:"required"
            },
            messages: {
                password: {
                    required: "{{ __('common.password_required') }}",
                    minlength: "{{ __('common.password_min') }}"
                },
                email: "{{ __('common.email_required') }}",
                terms: "{{ __('common.terms_required') }}", // Add this for terms error message
                captcha:"{{__('common.fill_it')}}",
            },
        });
    });
</script>
@endpush
@push('styles')
<style>
    .shop.login .form .btn {
        margin-right: 0;
    }

    .btn-facebook {
        background: #39579A;
    }

    .btn-facebook:hover {
        background: #073088 !important;
    }

    .btn-github {
        background: #444444;
        color: white;
    }

    .btn-github:hover {
        background: black !important;
    }

    .btn-google {
        background: #ea4335;
        color: white;
    }

    .btn-google:hover {
        background: rgb(243, 26, 26) !important;
    }
</style>
@endpush