@extends('frontend.layouts.master')

@section('title','Checkout')

@section('main-content')
<style>
    .error {
        color: red !important;
    }

    #delivery-error::before,
    #privacy-error::before,
    #terms-error::before,
    #refund-error::before {
        display: none;
    }
</style>
<main>
    <x-breadcrumb
        :title="__('common.checkout')"
        :items="[
            ['label' => __('common.home'), 'url' => route('home')],
            ['label' => __('common.cart'), 'url' => route('cart')],
            ['label' => __('common.checkout')],
        ]" />

    <section class="checkout-section pt-90 pb-90">
        <div class="container">
            <form name="frmCheckout" id="frmCheckout" method="POST" action="{{route('cart.order')}}">
                @csrf
                <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="checkout-left border shadow p-3">
                                <h3 class="form-header">{{ __('common.billing_details') }}</h3>
                                <div class="checkout-form-wrap">
                                    <div class="form-group row">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-item">
                                                    <h4 class="form-title">{{ __('common.email') }}*</h4>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{ auth()->user()->email ?? '' }}">
                                                    @error('email')
                                                    <span class='text-danger'>{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-item name">
                                                <h4 class="form-title">{{ __('common.first_name') }}*</h4>
                                                <input type="text" name="first_name" id="first_name" class="form-control"
                                                    value="{{ auth()->user()->first_name ?? '' }}">
                                                @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.last_name') }}*</h4>
                                                <input type="text" name="last_name" id="last_name" class="form-control"
                                                    value="{{ auth()->user()->last_name ?? '' }}">
                                                @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.country') }}*</h4>
                                                <select name="country" id="billing_country" class="form-control"
                                                    autocomplete="country" tabindex="-1" aria-invalid="false">
                                                    <option value="">{{ __('common.select_country') }}</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos [Keeling] Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo - Brazzaville</option>
                                                    <option value="CD">Congo - Kinshasa</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d’Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong SAR China</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macau SAR China</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar [Burma]</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territories</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn Islands</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">São Tomé and Príncipe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syria</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="Uk">United Kingdom</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UM">U.S. Minor Outlying Islands</option>
                                                    <option value="VI">U.S. Virgin Islands</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VA">Vatican City</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                @error('country')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.street_address') }}*</h4>
                                                <input type="text" name="address1" id="address" class="form-control"
                                                    value="{{ auth()->user()->address ?? '' }}">
                                                @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.town_city') }}*</h4>
                                                <input type="text" name="city" id="city" class="form-control"
                                                    value="{{ auth()->user()->city ?? '' }}">
                                                @error('city')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.state') }}</h4>
                                                <input type="text" name="state" id="state" class="form-control"
                                                    value="{{ auth()->user()->state ?? '' }}">
                                                @error('state')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.zip_code') }}*</h4>
                                                <input type="text" name="post_code" id="post_code" class="form-control"
                                                    value="{{ auth()->user()->post_code ?? '' }}">
                                                @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.phone') }}*</h4>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    value="{{ auth()->user()->phone ?? '' }}" pattern="[0-9+\-\(\)\s]+" inputmode="tel" oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '')">
                                                @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-item">
                                                <h4 class="form-title">{{ __('common.order_notes') }}</h4>
                                                <textarea name="form_order_notes" class="form-control address"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="checkout-right">
                                <h3 class="form-header">{{ __('common.your_order') }}</h3>
                                <div class="order-box mb-3">
                                    <div class="order-items">
                                        @if(Helper::cartCount())
                                            <!-- Header Row -->
                                            <div class="row align-items-center fw-bold g-2 mb-3 pb-2 border-bottom">
                                                <div class="col-3 col-md-2">
                                                    {{ __('common.product') }}
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    {{ __('common.description') }}
                                                </div>
                                                <div class="col-3 col-md-4 text-end">
                                                    {{ __('common.total') }}
                                                </div>
                                            </div>

                                            <!-- Product Items -->
                                            @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                                @php $photo = explode(',', $cart->product['photo']); @endphp
                                                <div class="row align-items-center g-2 mb-3 pb-3 border-bottom">
                                                    <div class="col-3 col-md-2 d-flex justify-content-center">
                                                        <img src="{{ url($photo[0]) }}" alt="{{ $cart->product['title'] }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 4px;">
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        <h6 class="mb-2 fs-6 product-title" style="line-height: 1.4; word-wrap: break-word; overflow-wrap: break-word;">{{ $cart->product['title'] }}</h6>
                                                        <small class="text-muted d-block">{{ __('common.quantity') }}: <strong>{{ $cart->quantity }}</strong></small>
                                                    </div>
                                                    <div class="col-3 col-md-4 text-end">
                                                        <span class="price fw-bold">{{ Helper::getCurrencySymbol(session('currency')) }}
                                                            @if(session('currency') == 'JPY')
                                                                {{ number_format($cart['amount'], 0) }}
                                                            @else
                                                                {{ number_format($cart['amount'], 2, '.', ',') }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        {{-- <div class="order-item item-1">
                                            <div class="order-left">
                                                <span class="left-title">{{ __('common.subtotal') }}</span>
                                            </div>
                                            <div class="order-right">
                                                <span
                                                    class="right-title">{{ Helper::getCurrencySymbol(session('currency')) }}

                                                    {{number_format(Helper::totalCartPrice(), Helper::getCurrencySymbol(session('currency'))=='¥' ? 0 : 2)}}
                                                </span>
                                            </div>
                                        </div> --}}

                                        <div class="order-item item-1">
                                            <div class="order-left">
                                                <span class="left-title">{{ __('common.total') }}:</span>
                                            </div>
                                            <div class="order-right">
                                                <span
                                                    class="right-title title-2">{{ Helper::getCurrencySymbol(session('currency')) }}
                                                    @if(session('currency') == 'JPY')
                                                        {{ number_format(Helper::totalCartPrice(), 0) }}
                                                    @else
                                                        {{ number_format(Helper::totalCartPrice(), 2, '.', ',') }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-method mt-3">
                                        <h3 class="mb-3">{{ __('common.choose_payment_method') }}</h3>
                                        <div class="acc-content current">
                                            <div class="payment-info">
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                        <div class="form-item mb-3">
                                                            <input type="text" name="name" id="name_on_card"
                                                                class="form-control"
                                                                placeholder="{{ __('common.card_holder_name') }}">
                                                            <span id="card-name-error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                        <div class="form-item mb-3">
                                                            <input type="text" name="card_number" id="card_number"
                                                                class="form-control cc-number"
                                                                placeholder="0000 0000 0000 0000" inputmode="numeric" pattern="[0-9\s]+" oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
                                                            <span id="card-number-error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                        <div
                                                            class="form-item mb-3 d-flex align-items-center position-relative customd-mnth">
                                                            <input type="text" name="expiry_month" id="expiry_month"
                                                                class="form-control" placeholder="MM" maxlength="2" inputmode="numeric" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="icn-winfo"> / </span>
                                                            <input type="text" name="expiry_year" id="expiry_year"
                                                                class="form-control cc-year" placeholder="YYYY" maxlength="4" inputmode="numeric" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        </div>
                                                        <span id="card-month-error" class="text-danger"></span>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                        <div class="form-item mb-3">
                                                            <input type="text" name="cvv" id="cvv" class="form-control cc-cvc"
                                                                placeholder="{{ __('common.card_cvc') }}" inputmode="numeric" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span id="card-cvv-error" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group w-100 row mt-4">
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
                                            <p>{{ __('common.when_you_purchase') }}"<img src="../assets/images/dba.png"
                                                    alt="dba" style="width:66px;">".</p>
                                            <div class="col-lg-6 col-12  mt-3 mt-lg-0">
                                                <img src="../assets/img/payment.png" alt="payment-icon" class="img-fluid">
                                            </div>
                                        </div>
    
                                        <div class="checkout-cntnt p-3 shadow mb-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" name="terms">
                                                <label class="form-check-label" for="terms">
                                                    {{ __('common.terms_agreement') }} <a
                                                        href="{{ route('pages', 'terms-conditions') }}"
                                                        target="_blank">{{ __('common.terms_policy') }}</a>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="privacy" name="privacy">
                                                <label class="form-check-label" for="privacy">
                                                    {{ __('common.terms_agreement') }} <a
                                                        href="{{ route('pages', 'privacy-policy') }}"
                                                        target="_blank">{{ __('common.privacy_policy') }}</a>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="delivery" name="delivery">
                                                <label class="form-check-label" for="delivery">
                                                    {{ __('common.terms_agreement') }} <a
                                                        href="{{ route('pages', 'delivery-policy') }}"
                                                        target="_blank">{{ __('common.delivery_policy') }}</a>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="refund" name="refund">
                                                <label class="form-check-label" for="refund">
                                                    {{ __('common.terms_agreement') }} <a
                                                        href="{{ route('pages', 'refund-policy') }}"
                                                        target="_blank">{{ __('common.refund_policy') }}</a>
                                                </label>
                                            </div>
                                        </div>
    
                                        <button type="submit"
                                            class="ed-primary-btn order-btn">{{ __('common.place_order') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection
@push('styles')

@endpush
@push('scripts')

<script src="{{asset('assets/js/jquery.payment.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $("#frmCheckout").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                address1: "required",
                post_code: "required",
                city: "required",
                state: "required",
                country: "required",
                terms: "required",
                privacy: "required",
                delivery: "required",
                refund: "required",
                captcha:"required"
            },
            messages: {
                first_name: "{{ __('common.name_required') }}",
                last_name: "{{ __('common.name_required') }}",
                phone: {
                    required: "{{ __('common.phone_required') }}",
                    minlength: "{{ __('common.phone_min') }}"
                },
                address1: "{{ __('common.address_required') }}",
                email: "{{ __('common.email_required') }}",
                post_code: "{{ __('common.post_code_required') }}",
                city: "{{ __('common.city_required') }} ",
                state: "{{ __('common.state_required') }}",
                country: "{{ __('common.country_required') }}",
                terms: "{{ __('common.accept_terms') }}",
                privacy: "{{ __('common.accept_privacy') }}",
                delivery: "{{ __('common.accept_delivery') }}",
                refund: "{{ __('common.accept_refund') }}",
                captcha:"{{__('common.fill_it')}}",
            }
        });
    });
</script>
<!-- <script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script> -->
<script>
    function showMe(box) {
        var checkbox = document.getElementById('shipping').style.display;
        // alert(checkbox);
        var vis = 'none';
        if (checkbox == "none") {
            vis = 'block';
        }
        if (checkbox == "block") {
            vis = "none";
        }
        document.getElementById(box).style.display = vis;
    }
</script>
<script>
    $(document).ready(function() {
        $('.shipping select[name=shipping]').change(function() {
            let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
            let subtotal = parseFloat($('.order_subtotal').data('price'));
            let coupon = parseFloat($('.coupon_price').data('price')) || 0;
            // alert(coupon);
            $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
        });
    });
</script>

<script>
    var cardType = '';

    function cardFormValidate() {
        var cardValid = 0;
        $('#card_number').validateCreditCard(function(result) {
            if (result.valid) {
                $("#card-number-error").text('');
                $("#card-month-error").text('');
                $("#card-number-error").fadeOut(300);
                cardValid = 1;
                cardType = result.card_type.name;
                var cardName = $("#name_on_card").val();
                var expMonth = $("#expiry_month").val();
                var expYear = $("#expiry_year").val();
                var cvv = $("#cvv").val();
                var regName = /^[a-z ,.'-]+$/i;
                var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
                var regYear =
                    /^2024|2025|2026|2027|2028|2029|2030|2031|2032|2033|2034|2035|2036|2037|2038|2039|2040|2041|2042|2043|2044|2045|2046|2047|2048|2049|2050$/;
                var regCVV = /^[0-9]{3,4}$/;
                if (!regMonth.test(expMonth)) {
                    $("#card-number-error").text('');
                    $("#card-number-error").fadeOut(300);
                    $("#card-month-error").text('Invalid Card Expiry Month');
                    $("#expiry_month").focus();
                    cardValid = 0;
                } else if (!regYear.test(expYear)) {
                    $("#card-number-error").text('');
                    $("#card-number-error").fadeOut(300);
                    $("#card-month-error").text('Invalid Card Expiry Year');
                    $("#expiry_month").focus();
                    cardValid = 0;
                } else if (!regCVV.test(cvv)) {
                    $("#card-number-error").text('');
                    $("#card-number-error").fadeOut(300);
                    $("#card-month-error").text('');
                    $("#card-cvv-error").text('Invalid CVC');
                    $("#cvv").focus();
                    cardValid = 0;
                } else if (!regName.test(cardName)) {
                    $("#card-number-error").text('');
                    $("#card-number-error").fadeOut(300);
                    $("#card-month-error").text('');
                    $("#card-cvv-error").text('');
                    $("#card-name-error").text('Invalid Card Holder Name');
                    $("#name_on_card").focus();
                    cardValid = 0;
                }
            } else {
                $("#card-number-error").text('Card Number is invalid');
                $("#card-number-error").css("display", "inline-block");
                cardValid = 0;
            }
        });
        switch (cardType) {
            case 'Visa':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-visa');
                break;
            case 'Amex':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-amex');
                break;
            case 'diners_club_carte_blanche':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-diners-club');
                break;
            case 'diners_club_international':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-diners-club');
                break;
            case 'jcb':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-jcb');
                break;
            case 'laser':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-credit-card');
                break;
            case 'visa_electron':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-visa');
                break;
            case 'MasterCard':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-mastercard');
                break;
            case 'Maestro':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-mastercard');
                break;
            case 'Discover':
                $('#card-icon').removeClass('fa-credit-card').addClass('fa-cc-discover');
                break;
        }
        return cardValid;
    }
    $(document).ready(function() {
        //card validation on input fields
        $('#button-confirm').on('click', function() {
            $("#overlay").fadeIn(300);
            if (cardFormValidate()) {
                var cardNumber = $("#card_number").val();
                var cardName = $("#name_on_card").val();
                var expMonth = $("#expiry_month").val();
                var expYear = $("#expiry_year").val();
                var cvv = $("#cvv").val();
                $.ajax({
                    //url: 'index.php?route=extension/payment/dasgateway/cc_payment',
                    url: '{{route("cart.payment")}}',
                    type: 'post',
                    data: {
                        'card_number': cardNumber,
                        'name': cardName,
                        'expiry_month': expMonth,
                        'expiry_year': expYear,
                        'cvv': cvv,
                        'card_type': cardType,
                        '_token': token
                    },
                    dataType: 'json',
                    cache: false,
                    beforeSend: function() {
                        $('#button-confirm').button('loading');
                    },
                    complete: function() {
                        $('#button-confirm').button('reset');
                        $("#overlay").fadeOut(300);
                    },
                    success: function(json) {
                        if (json['error']) {
                            //$('form').hide();
                            //$('#continue').click();
                            $('#payment-error').text(json['error']);
                            $("#overlay").fadeOut(300);
                        }
                        if (json['redirect']) {
                            $("#overlay").fadeOut(300);
                            location = json['redirect'];
                        }
                    }
                });
            } else {
                $("#overlay").fadeOut(300);
            }
        });
        $('[data-numeric]').payment('restrictNumeric');
        $('.cc-number').payment('formatCardNumber');
        $('.cc-exp').payment('formatCardExpiry');
        $('.cc-cvc').payment('formatCardCVC');
        $.fn.toggleInputError = function(erred) {
            this.parent('.form-group').toggleClass('has-error', erred);
            return this;
        };
    });
    (function() {
        var $,
            __indexOf = [].indexOf || function(item) {
                for (var i = 0, l = this.length; i < l; i++) {
                    if (i in this && this[i] === item) return i;
                }
                return -1;
            };
        $ = jQuery;
        $.fn.validateCreditCard = function(callback, options) {
            var bind, card, card_type, card_types, get_card_type, is_valid_length, is_valid_luhn, normalize,
                validate, validate_number, _i, _len, _ref;
            card_types = [{
                name: 'Amex',
                pattern: /^3[47]/,
                valid_length: [15]
            }, {
                name: 'diners_club_carte_blanche',
                pattern: /^30[0-5]/,
                valid_length: [14]
            }, {
                name: 'diners_club_international',
                pattern: /^36/,
                valid_length: [14]
            }, {
                name: 'jcb',
                pattern: /^35(2[89]|[3-8][0-9])/,
                valid_length: [16]
            }, {
                name: 'laser',
                pattern: /^(6304|670[69]|6771)/,
                valid_length: [16, 17, 18, 19]
            }, {
                name: 'visa_electron',
                pattern: /^(4026|417500|4508|4844|491(3|7))/,
                valid_length: [16]
            }, {
                name: 'Visa',
                pattern: /^4/,
                valid_length: [16]
            }, {
                name: 'MasterCard',
                pattern: /^5[1-5]/,
                valid_length: [16]
            }, {
                name: 'Maestro',
                pattern: /^(5018|5020|5038|6304|6759|676[1-3])/,
                valid_length: [12, 13, 14, 15, 16, 17, 18, 19]
            }, {
                name: 'Discover',
                pattern: /^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)/,
                valid_length: [16]
            }];
            bind = false;
            if (callback) {
                if (typeof callback === 'object') {
                    options = callback;
                    bind = false;
                    callback = null;
                } else if (typeof callback === 'function') {
                    bind = true;
                }
            }
            if (options == null) {
                options = {};
            }
            if (options.accept == null) {
                options.accept = (function() {
                    var _i, _len, _results;
                    _results = [];
                    for (_i = 0, _len = card_types.length; _i < _len; _i++) {
                        card = card_types[_i];
                        _results.push(card.name);
                    }
                    return _results;
                })();
            }
            _ref = options.accept;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                card_type = _ref[_i];
                if (__indexOf.call((function() {
                        var _j, _len1, _results;
                        _results = [];
                        for (_j = 0, _len1 = card_types.length; _j < _len1; _j++) {
                            card = card_types[_j];
                            _results.push(card.name);
                        }
                        return _results;
                    })(), card_type) < 0) {
                    throw "Credit card type '" + card_type + "' is not supported";
                }
            }
            get_card_type = function(number) {
                var _j, _len1, _ref1;
                _ref1 = (function() {
                    var _k, _len1, _ref1, _results;
                    _results = [];
                    for (_k = 0, _len1 = card_types.length; _k < _len1; _k++) {
                        card = card_types[_k];
                        if (_ref1 = card.name, __indexOf.call(options.accept, _ref1) >= 0) {
                            _results.push(card);
                        }
                    }
                    return _results;
                })();
                for (_j = 0, _len1 = _ref1.length; _j < _len1; _j++) {
                    card_type = _ref1[_j];
                    if (number.match(card_type.pattern)) {
                        return card_type;
                    }
                }
                return null;
            };
            is_valid_luhn = function(number) {
                var digit, n, sum, _j, _len1, _ref1;
                sum = 0;
                _ref1 = number.split('').reverse();
                for (n = _j = 0, _len1 = _ref1.length; _j < _len1; n = ++_j) {
                    digit = _ref1[n];
                    digit = +digit;
                    if (n % 2) {
                        digit *= 2;
                        if (digit < 10) {
                            sum += digit;
                        } else {
                            sum += digit - 9;
                        }
                    } else {
                        sum += digit;
                    }
                }
                return sum % 10 === 0;
            };
            is_valid_length = function(number, card_type) {
                var _ref1;
                return _ref1 = number.length, __indexOf.call(card_type.valid_length, _ref1) >= 0;
            };
            validate_number = (function(_this) {
                return function(number) {
                    var length_valid, luhn_valid;
                    card_type = get_card_type(number);
                    luhn_valid = false;
                    length_valid = false;
                    if (card_type != null) {
                        luhn_valid = is_valid_luhn(number);
                        length_valid = is_valid_length(number, card_type);
                    }
                    return {
                        card_type: card_type,
                        valid: luhn_valid && length_valid,
                        luhn_valid: luhn_valid,
                        length_valid: length_valid
                    };
                };
            })(this);
            validate = (function(_this) {
                return function() {
                    var number;
                    number = normalize($(_this).val());
                    return validate_number(number);
                };
            })(this);
            normalize = function(number) {
                return number.replace(/[ -]/g, '');
            };
            if (!bind) {
                return validate();
            }
            this.on('input.jccv', (function(_this) {
                return function() {
                    $(_this).off('keyup.jccv');
                    return callback.call(_this, validate());
                };
            })(this));
            this.on('keyup.jccv', (function(_this) {
                return function() {
                    return callback.call(_this, validate());
                };
            })(this));
            callback.call(this, validate());
            return this;
        };
    }).call(this);
</script>

@endpush