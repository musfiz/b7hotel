{{-- Cinematic full-screen hero: slides under the transparent navbar (see site-header) --}}
<section class="-mt-[76px] relative flex min-h-[100svh] items-center justify-center overflow-hidden bg-brand-navy-deep" aria-label="B7HOTEL introduction">
    {{-- Backdrop: high-quality hotel rendering with slow cinematic zoom + gentle parallax --}}
    <div class="absolute inset-x-0 -top-12 -bottom-12" data-parallax="0.08" aria-hidden="true">
        <img
            src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2400&auto=format&fit=crop"
            alt=""
            fetchpriority="high"
            class="hero-kenburns h-full w-full object-cover"
        >
        {{-- Single dark legibility overlay (functional, not decorative) --}}
        <div class="absolute inset-0 bg-brand-navy-deep/55"></div>
        <div class="absolute inset-x-0 bottom-0 h-40" style="background: linear-gradient(180deg, transparent 0%, rgb(7 15 29 / 0.72) 100%);"></div>
    </div>

    {{-- Content: tighter rhythm on phones, full measure from sm up --}}
    <div class="relative z-10 mx-auto w-full max-w-4xl px-5 pb-16 pt-32 text-center sm:px-6 sm:pb-24 sm:pt-40 md:pb-28">
        <p class="hero-animate hero-delay-1 eyebrow-light eyebrow-center">
            <span x-show="$store.lang.current === 'en'">B7HOTEL • Premium Hospitality</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">B7HOTEL • প্রিমিয়াম হসপিটালিটি</span>
        </p>

        <h1 class="hero-animate hero-delay-2 type-hero text-balance text-white">
            <span x-show="$store.lang.current === 'en'">A New Destination.<br><span class="text-brand-gold">A Smart Investment.</span></span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">পটুয়াখালীতে হোটেল ও জমির<br><span class="text-brand-gold">মালিকানার অংশীদার হওয়ার সুযোগ</span></span>
        </h1>

        <p class="hero-animate hero-delay-3 mx-auto mt-6 max-w-xl text-[1.05rem] font-light leading-relaxed text-white/75 sm:mt-7 sm:text-lg">
            <span x-show="$store.lang.current === 'en'">Co-own premier commercial real estate alongside resort-standard hotel operations — transparent documents, professional management.</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">আন্তর্জাতিক মানের রিসোর্ট ও হোটেল ব্যবসার সাথে লাভজনক বাণিজ্যিক জমির যৌথ মালিকানার সুযোগ — স্বচ্ছ দলিল ও পেশাদার ব্যবস্থাপনায়।</span>
        </p>

        <div class="hero-animate hero-delay-4 mx-auto mt-9 flex max-w-md flex-col items-stretch justify-center gap-3 sm:mt-11 sm:max-w-none sm:flex-row sm:items-center sm:gap-4">
            <a href="/investment#calculator" class="btn btn-gold w-full sm:w-auto">
                <span x-show="$store.lang.current === 'en'">Invest Now</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ শুরু করুন</span>
            </a>
            <a href="/project" class="btn btn-line-light w-full sm:w-auto">
                <span x-show="$store.lang.current === 'en'">Explore Project</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">প্রজেক্ট দেখুন</span>
            </a>
        </div>

        {{-- Location / project metadata: wraps gracefully on narrow screens --}}
        <p class="hero-animate hero-delay-5 mx-auto mt-10 max-w-sm text-balance text-[10px] uppercase leading-loose tracking-[0.2em] text-white/50 sm:mt-12 sm:max-w-none sm:text-[11px] sm:tracking-[0.28em]">
            Patuakhali, Bangladesh &nbsp;·&nbsp; Premium Hospitality &nbsp;·&nbsp; Hotel + Land Ownership
        </p>
    </div>

    {{-- Scroll indicator: desktop only — on phones it crowds the CTAs above the sticky bar --}}
    <a href="#glance" class="hero-animate hero-delay-5 absolute bottom-7 left-1/2 z-10 hidden -translate-x-1/2 flex-col items-center gap-3 text-white/50 transition hover:text-brand-gold sm:flex" aria-label="Scroll to project overview">
        <span class="text-[10px] font-semibold uppercase tracking-[0.32em]">Scroll</span>
        <span class="cue-track flex h-12 w-px justify-center bg-white/20">
            <span class="cue-dot block h-1/2 w-px bg-brand-gold"></span>
        </span>
    </a>
</section>
