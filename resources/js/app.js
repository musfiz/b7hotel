// Premium motion: directional scroll reveals + count-ups + gentle parallax.
// Expo-out easing, 0.8s reveals. Respects prefers-reduced-motion.
(() => {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const revealSelector = '.reveal, .reveal-fade, .reveal-scale, .reveal-left, .reveal-right, .reveal-img';
    const pendingSelector = '.reveal:not(.is-visible), .reveal-fade:not(.is-visible), .reveal-scale:not(.is-visible), .reveal-left:not(.is-visible), .reveal-right:not(.is-visible), .reveal-img:not(.is-visible)';

    // Count-up: <span data-countup="10">0</span> animates 0 → target in ~2s
    // ease-out-cubic once visible. Optional data-countup-decimals="2".
    // Final text always equals the target — screen readers get the real value.
    const runCountUp = (el) => {
        if (el.dataset.counted === '1') return;
        el.dataset.counted = '1';
        const target = parseFloat(el.dataset.countup || '0');
        const decimals = parseInt(el.dataset.countupDecimals || '0', 10);
        if (reduce || !Number.isFinite(target)) {
            el.textContent = target.toFixed(decimals);
            return;
        }
        const duration = 2000;
        const started = performance.now();
        const frame = (now) => {
            const progress = Math.min((now - started) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = (target * eased).toFixed(decimals);
            if (progress < 1) {
                requestAnimationFrame(frame);
            } else {
                el.textContent = target.toFixed(decimals);
            }
        };
        requestAnimationFrame(frame);
    };

    const counters = new WeakMap();
    const watchCounters = (root = document) => {
        root.querySelectorAll('[data-countup]:not([data-counted])').forEach((el) => {
            counters.set(el, true);
            counterObserver.observe(el);
        });
    };

    const counterObserver = ('IntersectionObserver' in window)
        ? new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    runCountUp(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 })
        : null;

    const showAll = () => {
        document.querySelectorAll(revealSelector).forEach((el) => el.classList.add('is-visible'));
        document.querySelectorAll('[data-countup]:not([data-counted])').forEach(runCountUp);
    };

    if (reduce || !('IntersectionObserver' in window)) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', showAll);
        } else {
            showAll();
        }
    } else {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

        const watch = () => {
            document.querySelectorAll(pendingSelector).forEach((el) => io.observe(el));
            if (counterObserver) watchCounters();
            else document.querySelectorAll('[data-countup]:not([data-counted])').forEach(runCountUp);
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', watch);
        } else {
            watch();
        }
        document.addEventListener('livewire:navigated', watch);
    }

    // Gentle parallax: vertical drift only (±40px max), applied to bleed wrappers
    // so edges never show. Never combined with scale/rotate.
    const layers = document.querySelectorAll('[data-parallax]');
    if (!reduce && layers.length > 0 && 'requestAnimationFrame' in window) {
        let ticking = false;
        const update = () => {
            const vh = window.innerHeight;
            layers.forEach((el) => {
                const rect = el.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > vh) return;
                const speed = parseFloat(el.dataset.parallax || '0.08');
                const shift = (rect.top + rect.height / 2 - vh / 2) * speed;
                el.style.transform = `translate3d(0, ${shift.toFixed(1)}px, 0)`;
            });
            ticking = false;
        };
        const onScroll = () => {
            if (!ticking) {
                ticking = true;
                window.requestAnimationFrame(update);
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        update();
    }
})();
