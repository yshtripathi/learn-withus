<style>
/* Antigravity Premium Footer Styles */
.ap-footer {
    position: relative;
    background: linear-gradient(180deg, #090d16 0%, #05070a 100%) !important;
    color: rgba(255, 255, 255, 0.7) !important;
    font-family: var(--ed-ff-body, 'Google Sans', sans-serif) !important;
    padding: 90px 0 0 0 !important;
    overflow: hidden !important;
    border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
}

/* Background gradient meshes */
.ap-footer::before {
    content: "" !important;
    position: absolute !important;
    top: -100px !important;
    left: -100px !important;
    width: 350px !important;
    height: 350px !important;
    background: radial-gradient(circle, rgba(0, 56, 189, 0.15) 0%, rgba(0, 56, 189, 0) 70%) !important;
    pointer-events: none !important;
    z-index: 1 !important;
}

.ap-footer::after {
    content: "" !important;
    position: absolute !important;
    bottom: -50px !important;
    right: -50px !important;
    width: 400px !important;
    height: 400px !important;
    background: radial-gradient(circle, rgba(239, 142, 1, 0.1) 0%, rgba(239, 142, 1, 0) 70%) !important;
    pointer-events: none !important;
    z-index: 1 !important;
}

.ap-footer-container {
    position: relative !important;
    z-index: 2 !important;
}

/* Footer widgets layout */
.ap-footer-widget {
    margin-bottom: 40px !important;
}

.ap-footer-logo {
    display: inline-block !important;
    margin-bottom: 25px !important;
}

.ap-footer-logo img {
    height: 48px !important;
    width: auto !important;
    filter: brightness(0) invert(1) !important;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
}

.ap-footer-logo:hover img {
    transform: translateY(-2px) scale(1.03) !important;
    filter: brightness(0) invert(1) drop-shadow(0 5px 15px rgba(255, 255, 255, 0.15)) !important;
}

/* Contact information list */
.ap-contact-list {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

.ap-contact-item {
    display: flex !important;
    align-items: flex-start !important;
    gap: 16px !important;
    margin-bottom: 24px !important;
    transition: all 0.3s ease !important;
}

.ap-contact-icon {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 44px !important;
    height: 44px !important;
    background: rgba(255, 255, 255, 0.03) !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
    border-radius: 12px !important;
    color: var(--ed-color-theme-secondary, #EF8E01) !important;
    font-size: 16px !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    flex-shrink: 0 !important;
    margin-top: 2px !important;
}

.ap-contact-item:hover .ap-contact-icon {
    background: var(--ed-color-theme-primary, #0038BD) !important;
    border-color: var(--ed-color-theme-primary, #0038BD) !important;
    color: #ffffff !important;
    transform: translateY(-4px) scale(1.08) !important;
    box-shadow: 0 8px 20px rgba(0, 56, 189, 0.35) !important;
}

.ap-contact-text {
    margin: 0 !important;
}

.ap-contact-text span {
    display: block !important;
    font-size: 11px !important;
    text-transform: uppercase !important;
    letter-spacing: 1.5px !important;
    color: rgba(255, 255, 255, 0.4) !important;
    margin-bottom: 4px !important;
    font-weight: 700 !important;
}

.ap-contact-text p, 
.ap-contact-text a {
    color: rgba(255, 255, 255, 0.85) !important;
    font-size: 15px !important;
    line-height: 1.5 !important;
    margin: 0 !important;
    text-decoration: none !important;
    transition: color 0.25s ease !important;
}

.ap-contact-text a:hover {
    color: var(--ed-color-theme-secondary, #EF8E01) !important;
}

/* Titles */
.ap-footer-title {
    color: #ffffff !important;
    font-family: var(--ed-ff-heading, 'Google Sans', sans-serif) !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    margin-bottom: 26px !important;
    position: relative !important;
    padding-bottom: 12px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.ap-footer-title::after {
    content: "" !important;
    position: absolute !important;
    left: 0 !important;
    bottom: 0 !important;
    width: 35px !important;
    height: 3px !important;
    background: linear-gradient(90deg, var(--ed-color-theme-primary, #0038BD) 0%, var(--ed-color-theme-secondary, #EF8E01) 100%) !important;
    border-radius: 2px !important;
    transition: width 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

.ap-footer-widget:hover .ap-footer-title::after {
    width: 55px !important;
}

/* Links lists with premium sliding bullet animation */
.ap-link-list {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

.ap-link-list li {
    margin-bottom: 14px !important;
}

.ap-link-list a {
    color: rgba(255, 255, 255, 0.65) !important;
    font-size: 15px !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    position: relative !important;
    padding-left: 0 !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

.ap-link-list a::before {
    content: "\f105" !important;
    font-family: "Font Awesome 6 Pro", "Font Awesome 5 Free", sans-serif !important;
    font-weight: 900 !important;
    position: absolute !important;
    left: -15px !important;
    opacity: 0 !important;
    color: var(--ed-color-theme-secondary, #EF8E01) !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

.ap-link-list a:hover {
    color: #ffffff !important;
    padding-left: 16px !important;
}

.ap-link-list a:hover::before {
    left: 0 !important;
    opacity: 1 !important;
}

/* Newsletter Box styling */
.ap-subscribe-box {
    background: rgba(255, 255, 255, 0.01) !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    padding: 24px !important;
    border-radius: 16px !important;
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    margin-top: 10px !important;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2) !important;
}

.ap-subscribe-form {
    display: flex !important;
    flex-direction: column !important;
    gap: 12px !important;
}

.ap-subscribe-form .form-item {
    position: relative !important;
    width: 100% !important;
}

.ap-subscribe-form input {
    width: 100% !important;
    background: rgba(255, 255, 255, 0.03) !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
    color: #ffffff !important;
    padding: 13px 18px !important;
    border-radius: 10px !important;
    font-size: 14px !important;
    outline: none !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
}

.ap-subscribe-form input:focus {
    border-color: var(--ed-color-theme-secondary, #EF8E01) !important;
    background: rgba(255, 255, 255, 0.06) !important;
    box-shadow: 0 0 15px rgba(239, 142, 1, 0.15) !important;
}

.ap-subscribe-form button {
    background: linear-gradient(90deg, var(--ed-color-theme-primary, #0038BD) 0%, #0054ff 100%) !important;
    border: none !important;
    color: #ffffff !important;
    padding: 13px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    border-radius: 10px !important;
    cursor: pointer !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    box-shadow: 0 4px 15px rgba(0, 56, 189, 0.25) !important;
}

.ap-subscribe-form button:hover {
    background: linear-gradient(90deg, #0054ff 0%, var(--ed-color-theme-primary, #0038BD) 100%) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(0, 56, 189, 0.4) !important;
}

.ap-subscribe-form button i {
    font-size: 13px !important;
}

/* Success Message Alert */
.success_message {
    display: none;
    background: rgba(46, 213, 115, 0.1) !important;
    border: 1px solid rgba(46, 213, 115, 0.25) !important;
    color: #2ed573 !important;
    padding: 12px 16px !important;
    border-radius: 10px !important;
    font-size: 14px !important;
    margin-bottom: 15px !important;
    align-items: center !important;
    gap: 8px !important;
}

.success_message.show {
    display: flex !important;
    animation: fadeIn 0.4s ease forwards !important;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Copyright area styling */
.ap-copyright-area {
    border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
    padding: 26px 0 !important;
    margin-top: 50px !important;
    background: rgba(0, 0, 0, 0.15) !important;
}

.ap-copyright-text {
    font-size: 14px !important;
    color: rgba(255, 255, 255, 0.45) !important;
    margin: 0 !important;
}

.ap-payment-methods img {
    max-height: 24px !important;
    opacity: 0.75 !important;
    transition: opacity 0.3s ease !important;
}

.ap-payment-methods img:hover {
    opacity: 1 !important;
}

/* Overriding Scroll-to-Top */
#scrollup.scroll-to-top {
    position: fixed !important;
    bottom: 30px !important;
    right: 30px !important;
    width: 48px !important;
    height: 48px !important;
    border-radius: 12px !important;
    background: var(--ed-color-theme-secondary, #EF8E01) !important;
    color: #ffffff !important;
    border: none !important;
    box-shadow: 0 8px 25px rgba(239, 142, 1, 0.35) !important;
    z-index: 9999 !important;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    line-height: 48px !important;
    opacity: 0;
    visibility: hidden;
}

#scrollup.scroll-to-top.show {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) !important;
}

#scrollup.scroll-to-top.hide {
    opacity: 0 !important;
    visibility: hidden !important;
}

#scrollup.scroll-to-top:hover {
    background: var(--ed-color-theme-primary, #0038BD) !important;
    transform: translateY(-5px) !important;
    box-shadow: 0 12px 30px rgba(0, 56, 189, 0.45) !important;
}

#scrollup.scroll-to-top span {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    height: 100% !important;
    width: 100% !important;
}

#scrollup.scroll-to-top span i {
    font-size: 16px !important;
    margin: 0 !important;
    line-height: 1 !important;
}

@media (max-width: 991px) {
    .ap-footer {
        padding-top: 70px !important;
    }
    .ap-footer-widget {
        margin-bottom: 35px !important;
    }
}
</style>

<footer class="footer-section ap-footer">
    <div class="ap-footer-container container">
        <div class="row">
            <!-- Company Info & Contact -->
            <div class="col-lg-5 col-md-6">
                <div class="ap-footer-widget">
                    <div class="ap-footer-logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('assets/img/logo/logo-1.png') }}" alt="LearnWithUs">
                        </a>
                    </div>
                    
                    <ul class="ap-contact-list">
                        <li class="ap-contact-item">
                            <div class="ap-contact-icon">
                                <i class="fa-regular fa-map-marker-alt"></i>
                            </div>
                            <div class="ap-contact-text">
                                <span>{{ __('frontend.address') }}</span>
                                <p>{{ env('APP_ADDRESS') }}</p>
                            </div>
                        </li>
                        <li class="ap-contact-item">
                            <div class="ap-contact-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="ap-contact-text">
                                <span>{{ __('frontend.email') }}</span>
                                <a href="mailto:{{ env('APP_EMAIL') }}">{{ env('APP_EMAIL') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <div class="ap-footer-widget">
                    <h3 class="ap-footer-title">{{ __('frontend.quick_links') }}</h3>
                    <ul class="ap-link-list">
                        <li><a href="{{route('home')}}">{{ __('frontend.home') }}</a></li>
                        <li><a href="{{ route('about-us') }}">{{ __('frontend.about') }}</a></li>
                        <li><a href="{{ url('/product-lists') }}">{{ __('frontend.courses') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('frontend.contact') }}</a></li>
                    </ul>
                </div>
            </div>

            <!-- Support & Newsletter -->
            <div class="col-lg-4 col-md-12">
                <div class="ap-footer-widget">
                    <h3 class="ap-footer-title">{{ __('frontend.support') }}</h3>
                    <ul class="ap-link-list">
                        <li><a href="{{ route('pages', 'terms-conditions') }}">{{ __('frontend.terms_policy') }}</a></li>
                        <li><a href="{{ route('pages', 'privacy-policy') }}">{{ __('frontend.privacy_policy') }}</a></li>
                        <li><a href="{{ route('pages', 'delivery-policy') }}">{{ __('frontend.delivery_policy') }}</a></li>
                        <li><a href="{{ route('pages', 'refund-policy') }}">{{ __('frontend.refund_policy') }}</a></li>
                    </ul>
                    
                    <h4 class="ap-footer-title" style="font-size: 15px; margin-top: 30px; margin-bottom: 12px;">{{ __('frontend.subscribe_newsletter') }}</h4>
                    <div class="ap-subscribe-box">
                        <div class="success_message">
                            <i class="fa-regular fa-circle-check"></i>
                            <span>{{ __('frontend.subscribe_success') }}</span>
                        </div>
                        <form class="ap-subscribe-form" id="subscribe-form">
                            <div class="form-item">
                                <input type="email" placeholder="{{ __('frontend.your_email_address') }}" class="form-control" required>
                            </div>
                            <button type="submit" class="ed-primary-btn" aria-label="{{ __('frontend.subscribe_now') }}">
                                <span>{{ __('frontend.subscribe_now') }}</span>
                                <i class="fa-regular fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="ap-copyright-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-12 text-center text-lg-start mb-3 mb-lg-0">
                    <p class="ap-copyright-text">
                        © {{ date('Y') }} {{ __('frontend.platform_name') }}. {{ __('frontend.all_rights_reserved') }}
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-center text-lg-end ap-payment-methods">
                    <img src="{{ asset('assets/img/payment.png') }}" alt="payment-icon" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</footer>

<button id="scrollup" class="scroll-to-top" aria-label="{{ __('frontend.scroll_to_top') }}">
    <span><i class="fa-regular fa-arrow-up-long"></i></span>
</button>

<!-- JS here -->
<script src="{{ asset('assets/js/vendor/jquary-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.isotope.js') }}"></script>
<script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/moment.min.jsv') }}"></script>
<script src="{{ asset('assets/js/vendor/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/venobox.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/countdown.js') }}"></script>
<script src="{{ asset('assets/js/vendor/meanmenu.js') }}"></script>
<script src="{{ asset('/js/vendor/smooth-scroll.js') }}"></script>
<script src="{{ asset('assets/js/vendor/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/vendor/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.carouselTicker.js') }}"></script>
<script src="{{ asset('assets/js/vendor/nice-select.js') }}"></script>
<script src="{{ asset('assets/js/vendor/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
$(document).ready(function () {
  $("#subscribe-form").on("submit", function (e) {
    e.preventDefault(); // Prevent page reload

    $(".success_message").addClass("show");

    // Fade out after 3 seconds and reset input
    setTimeout(function () {
      $(".success_message").removeClass("show");

      // Clear the input field
      $("#subscribe-form input[type='email']").val("");
    }, 3000);
  });
});
setTimeout(function() {   
    $('.alert').slideUp();    
}, 3000);
</script>
</body>
</html>
