// B7 global loading system.
// One stylish overlay tied to every loading source on the site:
//   1. Full page loads (reload / hard navigation) — until window 'load'
//   2. Livewire SPA navigation (wire:navigate) and Livewire network requests
//   3. ALL fetch() / XMLHttpRequest calls (auto-intercepted) + window.b7Request()
//   4. Manual window.B7Loader.show() / hide() (e.g. login form submit)
//   5. Lazy images (img.b7-lazy shimmer) handled separately below
(() => {
    const overlay = document.getElementById('b7-global-loader');
    if (!overlay) return;

    const labelEl = overlay.querySelector('.b7-loader-label');
    // reason -> active count, so concurrent requests sharing a label each
    // need their own matching hide().
    const counts = new Map();
    let timer = null;

    const activate = () => {
        overlay.classList.add('is-active');
        overlay.setAttribute('aria-hidden', 'false');
    };
    const deactivate = () => {
        clearTimeout(timer);
        overlay.classList.remove('is-active');
        overlay.setAttribute('aria-hidden', 'true');
    };

    const B7Loader = {
        show(reason = 'Loading…') {
            counts.set(reason, (counts.get(reason) || 0) + 1);
            if (labelEl) labelEl.textContent = reason;
            if (counts.size === 1 && !overlay.classList.contains('is-active')) {
                // Short calls (< 220ms) never flash the overlay.
                clearTimeout(timer);
                timer = setTimeout(() => { if (counts.size > 0) activate(); }, 220);
            }
        },
        hide(reason = null) {
            if (reason) {
                const left = (counts.get(reason) || 0) - 1;
                if (left > 0) counts.set(reason, left);
                else counts.delete(reason);
            } else {
                counts.clear();
            }
            if (counts.size === 0) deactivate();
        },
        // Dark variant for navy sections so the light card stays readable.
        setDark(dark = true) {
            overlay.classList.toggle('is-dark', dark);
        }
    };

    window.B7Loader = B7Loader;

    // ---- 1. Full page load: script runs at end of <head>/<body>, so we
    // show while images/fonts/subresources are still arriving, hide on load.
    B7Loader.show('Loading…');
    if (document.readyState === 'complete') B7Loader.hide('Loading…');
    else window.addEventListener('load', () => B7Loader.hide('Loading…'), { once: true });

    // ---- 2a. Livewire SPA navigation (links with wire:navigate)
    document.addEventListener('livewire:navigate', () => B7Loader.show('Loading…'));
    document.addEventListener('livewire:navigated', () => {
        B7Loader.hide('Loading…');
        initLazy();
    });

    // ---- 2b. Livewire network requests ('request' fires before send,
    // 'commit' once the response is patched into the DOM)
    let livewireWired = false;
    const registerLivewire = () => {
        if (livewireWired || !window.Livewire) return;
        livewireWired = true;
        Livewire.hook('request', () => B7Loader.show('Processing…'));
        Livewire.hook('commit', () => B7Loader.hide('Processing…'));
    };
    document.addEventListener('livewire:init', registerLivewire);
    registerLivewire();

    // ---- 3a. Intercept ALL fetch() calls automatically.
    const nativeFetch = window.fetch;
    if (nativeFetch) {
        window.fetch = function (input, init) {
            if ((init && init.b7NoLoader) || (typeof input === 'object' && input && input.b7NoLoader)) {
                return nativeFetch.call(this, input, init);
            }
            B7Loader.show('Loading…');
            return nativeFetch.call(this, input, init).finally(() => B7Loader.hide('Loading…'));
        };
    }

    // Convenience wrapper kept for explicit labels: b7Request(url, opts, 'Fetching rooms…')
    window.b7Request = async (url, options = {}, label = 'Loading…') => {
        B7Loader.show(label);
        try {
            return await (nativeFetch || fetch).call(window, url, options);
        } finally {
            B7Loader.hide(label);
        }
    };

    // ---- 3b. Intercept XMLHttpRequest (jQuery/axios/Livewire polls)
    const xhrProto = XMLHttpRequest.prototype;
    const nativeOpen = xhrProto.open;
    const nativeSend = xhrProto.send;
    xhrProto.open = function (method, url) {
        this.__b7url = url;
        return nativeOpen.apply(this, arguments);
    };
    xhrProto.send = function () {
        if (this.__b7url && String(this.__b7url).indexOf('b7NoLoader') !== -1) {
            return nativeSend.apply(this, arguments);
        }
        B7Loader.show('Loading…');
        this.addEventListener('loadend', () => B7Loader.hide('Loading…'), { once: true });
        return nativeSend.apply(this, arguments);
    };

    // ---- 5. lazy images: shimmer until loaded
    const markLoaded = (img) => {
        img.classList.add('is-loaded');
        img.removeAttribute('data-b7-lazy');
    };
    const initLazy = () => {
        document.querySelectorAll('img.b7-lazy:not([data-b7-lazy])').forEach((img) => {
            img.setAttribute('data-b7-lazy', '1');
            if (img.complete && img.naturalWidth > 0) {
                markLoaded(img);
            } else {
                img.addEventListener('load', () => markLoaded(img), { once: true });
                img.addEventListener('error', () => markLoaded(img), { once: true });
            }
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLazy);
    } else {
        initLazy();
    }
    window.B7InitLazy = initLazy;
})();
