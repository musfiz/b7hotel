{{-- STARTER: Livewire (server truth) + Alpine (instant feel) via $wire.entangle.
     Stepper = pure Livewire (wire:click). Slider = Alpine x-model entangled to Livewire `shares`. --}}
<section id="calculator" class="py-24 md:py-32 bg-brand-ivory border-y border-brand-gold/15 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-16 items-start">
        {{-- Explainer column (sticky on desktop) --}}
        <div class="reveal-left lg:sticky lg:top-28">
            <p class="eyebrow">Interactive model</p>
            <h2 class="type-h2 text-brand-navy">
                <span x-show="$store.lang.current === 'en'">Calculate Your Investment</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার বিনিয়োগ হিসাব করুন</span>
            </h2>
            <p class="mt-5 text-brand-slate leading-relaxed max-w-md">
                <span x-show="$store.lang.current === 'en'">Move the slider or step through share counts — totals update live from official per-share pricing. Illustrative only.</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">স্লাইডার ঘুরিয়ে বা শেয়ার সংখ্যা বেছে মোট মূল্য দেখুন — সরকারি দলিলের দাম অনুযায়ী হিসাব।</span>
            </p>
            <ul class="mt-8 space-y-4 text-[0.95rem] text-brand-navy/85">
                <li class="flex items-center gap-3">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep']) Live totals, server-verified</li>
                <li class="flex items-center gap-3">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep']) 1–50 shares per investor</li>
                <li class="flex items-center gap-3">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep']) No guaranteed returns</li>
            </ul>
        </div>

        {{-- Interactive tool card --}}
        <div class="reveal-fade card-luxe p-6 sm:p-8 md:p-10" style="--reveal-delay:100ms">
        {{-- Stepper (server round-trip per click) --}}
        <div class="flex flex-col items-center justify-center bg-brand-bg p-5 sm:p-6 border border-brand-navy/5 rounded-xl">
            <label class="text-xs uppercase tracking-widest text-brand-slate mb-4 font-semibold">
                <span x-show="$store.lang.current === 'en'">Number of Shares</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">শেয়ার সংখ্যা</span>
            </label>
            <div class="flex items-center gap-4 sm:gap-6">
                <button type="button" wire:click="decrement"
                        class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold-deep hover:text-brand-gold-deep active:bg-brand-navy active:text-white transition duration-200" aria-label="Decrease">−</button>
                <span class="text-4xl font-bold text-brand-navy w-20 text-center tnum">{{ $shares }}</span>
                <button type="button" wire:click="increment"
                        class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold-deep hover:text-brand-gold-deep active:bg-brand-navy active:text-white transition duration-200" aria-label="Increase">+</button>
            </div>
            {{-- Quick presets: one tap instead of 25 stepper clicks on a phone --}}
            <div class="mt-5 flex flex-wrap justify-center gap-2" role="group" aria-label="Share presets">
                @foreach ([1, 5, 10, 25, 50] as $preset)
                <button type="button" wire:click="$set('shares', {{ $preset }})"
                        @class(['min-h-[44px] min-w-[52px] px-4 rounded-full text-sm font-semibold tnum border transition duration-200', 'bg-brand-navy text-white border-brand-navy' => $shares === $preset, 'bg-white text-brand-navy border-brand-navy/15 active:border-brand-gold-deep' => $shares !== $preset])
                        aria-pressed="{{ $shares === $preset ? 'true' : 'false' }}">{{ $preset }}</button>
                @endforeach
            </div>
        </div>

        {{-- Slider (Alpine instant + entangled to Livewire) --}}
        <div x-data="{ sliderShares: $wire.entangle('shares') }" class="mt-6 sm:mt-8 px-1 sm:px-2">
            <div class="flex justify-between text-xs uppercase tracking-widest text-brand-slate mb-1 tnum">
                <span>1</span>
                <span><span x-text="sliderShares"></span> shares</span>
                <span>50</span>
            </div>
            <input type="range" min="1" max="50" x-model.number="sliderShares"
                    class="slider-touch accent-[#7a5f0f]" aria-label="Shares slider">
        </div>

        <div class="mt-4 sm:mt-6 px-1 sm:px-2 flex flex-wrap justify-between items-center gap-x-4 gap-y-1 text-sm border-b border-brand-navy/5 pb-4">
            <span class="text-brand-slate uppercase tracking-wider text-[13px]">Price per Share:</span>
            <span class="text-lg font-medium text-brand-navy tnum">৳ {{ number_format($pricePerShare) }}</span>
        </div>

        {{-- Total: stacks label above value on phones so the figure never squeezes --}}
        <div class="bg-brand-navy p-5 sm:p-6 flex flex-col gap-2 sm:flex-row sm:justify-between sm:items-center text-white rounded-xl mt-4">
            <span class="text-xs uppercase tracking-widest text-white/70 font-medium">Total Strategic Asset Value:</span>
            <span class="font-display text-[1.75rem] leading-none sm:text-3xl md:text-4xl font-bold text-brand-gold tnum">
                ৳ {{ number_format($this->total) }}
                <span wire:loading class="text-xs font-normal text-white/50">updating…</span>
            </span>
        </div>

        <a href="/contact" class="btn btn-gold w-full mt-8">
            <span x-show="$store.lang.current === 'en'">Request Investment Details</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের বিস্তারিত নথিপত্র সংগ্রহ করুন</span>
        </a>

        <p class="type-small text-brand-slate/80 text-center italic mt-4">
            <span x-show="$store.lang.current === 'en'">* Actual share price, ownership structure, benefits, payment terms and investment conditions are per the project's legally approved documents. No fixed or risk-free appreciation is guaranteed.</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">* প্রকৃত শেয়ার মূল্য, মালিকানার কাঠামো, সুবিধা ও শর্ত প্রকল্পের বৈধ দলিল ও চুক্তি অনুযায়ী নির্ধারিত হবে। কোনো নিশ্চিত লভ্যাংশের প্রতিশ্রুতি নেই।</span>
        </p>
        </div>
    </div>
</section>
