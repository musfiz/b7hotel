{{-- Attractive Alpine.js slider: auto-play + arrows + dots, no server trips --}}
<div x-data="{
    active: 0,
    total: 3,
    timer: null,
    start() { this.timer = setInterval(() => { this.active = (this.active + 1) % this.total }, 6000) },
    stop() { clearInterval(this.timer) },
    go(i) { this.active = i; this.stop(); this.start(); }
}" x-init="start()" class="relative h-[92vh] min-h-[560px] flex items-center overflow-hidden bg-brand-navy">

    {{-- Slides --}}
    <template x-for="i in total" :key="i">
        <div></div>
    </template>

    {{-- Slide 1 --}}
    <div x-show="active === 0" x-transition.opacity.duration.700ms class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-navy via-[#14305a] to-brand-navy"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 20% 30%, #D4AF37 0, transparent 35%), radial-gradient(circle at 80% 70%, #D4AF37 0, transparent 25%);"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-transparent to-brand-navy/40"></div>
    </div>
    {{-- Slide 2 --}}
    <div x-show="active === 1" x-cloak x-transition.opacity.duration.700ms class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0b192c] via-[#3a2f10] to-brand-navy"></div>
        <div class="absolute inset-0 opacity-25" style="background-image: linear-gradient(115deg, transparent 40%, rgba(212,175,55,.35) 45%, transparent 55%), linear-gradient(65deg, transparent 55%, rgba(212,175,55,.25) 60%, transparent 70%);"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-transparent to-brand-navy/40"></div>
    </div>
    {{-- Slide 3 --}}
    <div x-show="active === 2" x-cloak x-transition.opacity.duration.700ms class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-navy via-[#0e3a3a] to-[#0b192c]"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(ellipse at 70% 20%, rgba(212,175,55,.5), transparent 45%), radial-gradient(ellipse at 25% 80%, rgba(255,255,255,.25), transparent 40%);"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-transparent to-brand-navy/40"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center w-full">
        <span class="text-brand-gold uppercase tracking-[0.4em] text-xs md:text-sm font-semibold">B7HOTEL • Premium Hospitality</span>

        <div x-show="active === 0">
            <h1 class="mt-4 text-4xl md:text-6xl font-light text-white leading-tight">
                <span x-show="$store.lang.current === 'en'">A New Destination.<br><span class="font-bold text-brand-gold">A Smart Investment.</span></span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">পটুয়াখালীতে হোটেল ও জমির<br><span class="font-bold text-brand-gold">মালিকানার অংশীদার হোন</span></span>
            </h1>
            <p class="mt-5 text-white/70 max-w-2xl mx-auto">Co-own commercial land + international-standard hotel operations in Patuakhali.</p>
        </div>
        <div x-show="active === 1" x-cloak>
            <h1 class="mt-4 text-4xl md:text-6xl font-light text-white leading-tight">
                <span x-show="$store.lang.current === 'en'">Hotel Business +<br><span class="font-bold text-brand-gold">Land Ownership.</span></span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">হোটেল ব্যবসা +<br><span class="font-bold text-brand-gold">জমির মালিকানা।</span></span>
            </h1>
            <p class="mt-5 text-white/70 max-w-2xl mx-auto">Structured share model • Clear agreements • Professional management.</p>
        </div>
        <div x-show="active === 2" x-cloak>
            <h1 class="mt-4 text-4xl md:text-6xl font-light text-white leading-tight">
                <span x-show="$store.lang.current === 'en'">Calculate. Review.<br><span class="font-bold text-brand-gold">Talk to an Advisor.</span></span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">হিসাব করুন। যাচাই করুন।<br><span class="font-bold text-brand-gold">উপদেষ্টার সাথে কথা বলুন।</span></span>
            </h1>
            <p class="mt-5 text-white/70 max-w-2xl mx-auto">Transparent documents • Investor support • Project progress updates.</p>
        </div>

        <div class="mt-9 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('site.project') }}" class="border border-brand-gold text-brand-gold px-8 py-3.5 text-sm font-semibold uppercase tracking-widest hover:bg-brand-gold hover:text-brand-navy transition">Explore Project</a>
            <a href="{{ route('site.investment') }}" class="bg-brand-gold text-brand-navy px-8 py-3.5 text-sm font-bold uppercase tracking-widest hover:bg-white transition">Invest Now</a>
        </div>
        <p class="mt-6 text-white/50 text-xs tracking-widest uppercase">Patuakhali, Bangladesh • Hotel + Land Ownership</p>
    </div>

    {{-- Arrows --}}
    <button type="button" @click="go((active - 1 + total) % total)" aria-label="Previous"
        class="absolute left-4 md:left-8 z-20 w-11 h-11 border border-white/20 text-white/70 hover:text-brand-gold hover:border-brand-gold flex items-center justify-center transition">←</button>
    <button type="button" @click="go((active + 1) % total)" aria-label="Next"
        class="absolute right-4 md:right-8 z-20 w-11 h-11 border border-white/20 text-white/70 hover:text-brand-gold hover:border-brand-gold flex items-center justify-center transition">→</button>

    {{-- Dots --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2.5">
        <button type="button" @click="go(0)" aria-label="Slide 1" :class="active === 0 ? 'bg-brand-gold w-8' : 'bg-white/30 w-3'" class="h-1.5 transition-all"></button>
        <button type="button" @click="go(1)" aria-label="Slide 2" :class="active === 1 ? 'bg-brand-gold w-8' : 'bg-white/30 w-3'" class="h-1.5 transition-all"></button>
        <button type="button" @click="go(2)" aria-label="Slide 3" :class="active === 2 ? 'bg-brand-gold w-8' : 'bg-white/30 w-3'" class="h-1.5 transition-all"></button>
    </div>
</div>
