@php
    $flash = null;

    if (session('success')) {
        $flash = ['type' => 'success', 'icon' => 'fa-circle-check', 'message' => session('success')];
    } elseif (session('error')) {
        $flash = ['type' => 'error', 'icon' => 'fa-circle-exclamation', 'message' => session('error')];
    }
@endphp

@if($flash)
<style>
    /* ==========================================================================
       Flash toast (.nt-*) — pinned top-centre, directly under the sticky header.
       ========================================================================== */
    .nt-wrap {
        position: fixed;
        /* the header is ~76px tall and sticky, so clear it */
        top: 96px;
        left: 50%;
        z-index: 1200;
        display: flex;
        justify-content: center;
        width: max-content;
        max-width: min(560px, calc(100vw - 32px));
        transform: translateX(-50%);
        pointer-events: none;
    }

    .nt-toast {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        width: 100%;
        padding: 16px 18px;
        border-radius: 16px;
        background: #fff;
        border: 1px solid var(--ed-color-border-1);
        box-shadow: 0 22px 46px rgba(0, 29, 51, 0.16);
        pointer-events: auto;
        animation: nt-in 0.45s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    .nt-toast.is-leaving { animation: nt-out 0.35s ease forwards; }

    .nt-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        font-size: 1rem;
        color: #fff;
    }
    .nt-success .nt-icon { background: #16a34a; }
    .nt-error   .nt-icon { background: #dc2626; }

    .nt-body { flex: 1 1 auto; min-width: 0; padding-top: 2px; }
    .nt-title {
        display: block;
        margin-bottom: 2px;
        font-size: 0.72rem;
        font-weight: var(--ed-fw-bold);
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }
    .nt-success .nt-title { color: #16a34a; }
    .nt-error   .nt-title { color: #dc2626; }

    .nt-body p {
        margin: 0;
        font-size: 0.92rem;
        line-height: 1.5;
        color: var(--ed-color-heading-primary);
        word-break: break-word;
    }

    .nt-close {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 50%;
        font-size: 0.8rem;
        color: #9aa5b1;
        background: transparent;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .nt-close:hover { color: var(--ed-color-heading-primary); background: var(--ed-color-grey-1); }

    /* Countdown bar — shows the auto-dismiss running out. */
    .nt-bar {
        position: absolute;
        left: 18px;
        right: 18px;
        bottom: 8px;
        height: 3px;
        border-radius: 3px;
        overflow: hidden;
        background: var(--ed-color-grey-1);
    }
    .nt-bar span {
        display: block;
        height: 100%;
        width: 100%;
        border-radius: 3px;
        transform-origin: left center;
        animation: nt-countdown 5s linear forwards;
    }
    .nt-success .nt-bar span { background: #16a34a; }
    .nt-error   .nt-bar span { background: #dc2626; }

    .nt-toast { position: relative; padding-bottom: 20px; }

    @keyframes nt-in {
        from { opacity: 0; transform: translateY(-18px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    @keyframes nt-out {
        to { opacity: 0; transform: translateY(-14px) scale(0.97); }
    }
    @keyframes nt-countdown {
        from { transform: scaleX(1); }
        to   { transform: scaleX(0); }
    }

    @media (max-width: 767px) {
        .nt-wrap { top: 88px; width: calc(100vw - 24px); }
    }

    @media (prefers-reduced-motion: reduce) {
        .nt-toast { animation: none; }
        .nt-bar span { animation-duration: 5s; }
    }
</style>

<div class="nt-wrap" id="nt-wrap">
    <div class="nt-toast nt-{{ $flash['type'] }}" role="alert" aria-live="polite">
        <span class="nt-icon"><i class="fa-solid {{ $flash['icon'] }}"></i></span>

        <div class="nt-body">
            <span class="nt-title">
                {{ $flash['type'] === 'success' ? 'Success' : 'Error' }}
            </span>
            <p>{{ $flash['message'] }}</p>
        </div>

        <button type="button" class="nt-close" id="nt-close" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <span class="nt-bar"><span></span></span>
    </div>
</div>

<script>
    (function () {
        var wrap  = document.getElementById('nt-wrap');
        var toast = wrap ? wrap.querySelector('.nt-toast') : null;
        if (!toast) return;

        var timer;

        function dismiss() {
            clearTimeout(timer);
            toast.classList.add('is-leaving');
            setTimeout(function () { wrap.remove(); }, 350);
        }

        document.getElementById('nt-close').addEventListener('click', dismiss);
        timer = setTimeout(dismiss, 5000);

        // Hovering pauses the countdown so a long message can actually be read.
        toast.addEventListener('mouseenter', function () {
            clearTimeout(timer);
            var bar = toast.querySelector('.nt-bar span');
            if (bar) bar.style.animationPlayState = 'paused';
        });
        toast.addEventListener('mouseleave', function () {
            var bar = toast.querySelector('.nt-bar span');
            if (bar) bar.style.animationPlayState = 'running';
            timer = setTimeout(dismiss, 2500);
        });
    })();
</script>
@endif
