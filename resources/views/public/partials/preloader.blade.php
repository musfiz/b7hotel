{{-- Template preloader: paints the instant HTML reaches <body> and fades out on
     window load. Fully self-contained (inline <style> + tiny inline <script>) so
     it works before app.css / app.js have finished downloading. Placed at the top
     of <body> in every layout: frontend site, backend dashboard, and login page.
     noscript + a 6s failsafe guarantee the overlay can never get stuck. --}}
<div id="b7-preloader" aria-hidden="true">
    <div class="b7-pre__spinner"></div>
</div>
<style>
    #b7-preloader{position:fixed;inset:0;z-index:2147483000;display:flex;align-items:center;justify-content:center;background:#0b192c;opacity:1;transition:opacity .5s ease}
    #b7-preloader.is-hidden{opacity:0;pointer-events:none}
    .b7-pre__spinner{width:46px;height:46px;border-radius:999px;border:3px solid rgba(16,185,129,.2);border-top-color:#10b981;border-right-color:#34d399;animation:b7-pre-spin .8s linear infinite}
    @keyframes b7-pre-spin{to{transform:rotate(360deg)}}
    @media (prefers-reduced-motion:reduce){.b7-pre__spinner{animation-duration:1.6s}}
</style>
<noscript><style>#b7-preloader{display:none!important}</style></noscript>
<script>
    (function () {
        var pre = document.getElementById('b7-preloader');
        if (!pre) return;
        var done = false;
        function finish() {
            if (done) return;
            done = true;
            pre.classList.add('is-hidden');
            setTimeout(function () { pre.remove(); }, 500);
        }
        if (document.readyState === 'complete') finish();
        else window.addEventListener('load', finish, { once: true });
        // Failsafe: never trap the user behind the overlay.
        setTimeout(finish, 6000);
    })();
</script>
