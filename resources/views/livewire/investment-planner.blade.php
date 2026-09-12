{{-- PREMIUM planner: amount + period sliders, instant server-verified totals.
      Projections are ILLUSTRATIVE estimates (placeholder rate) — never guaranteed. --}}
<div class="tier-card tier-card-dark reveal-left p-6 sm:p-8 md:p-10">
    <p class="eyebrow-light" style="margin-bottom:0.6rem">
        <span x-show="$store.lang.current === 'en'">Financial planning tool</span>
        <span x-show="$store.lang.current === 'bn'" class="font-bengali">আর্থিক পরিকল্পনার টুল</span>
    </p>
    <h2 class="font-display text-2xl sm:text-3xl font-bold text-white">
        <span x-show="$store.lang.current === 'en'">Investment Calculator</span>
        <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ ক্যালকুলেটর</span>
    </h2>

    {{-- Amount slider (Alpine instant + entangled to Livewire) --}}
    <div x-data="{ amt: $wire.entangle('amount'), min: {{ $minAmount }}, max: {{ $maxAmount }}, get pct() { return ((this.amt - this.min) / (this.max - this.min) * 100).toFixed(1); } }" class="mt-8">
        <div class="flex flex-wrap items-baseline justify-between gap-2">
            <label class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/55">
                <span x-show="$store.lang.current === 'en'">Investment Amount</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের পরিমাণ</span>
            </label>
            <span class="font-display text-2xl font-bold text-brand-gold tnum">৳ {{ \App\Livewire\InvestmentPlanner::inr($amount) }} <span wire:loading class="text-xs font-normal text-white/40">updating…</span></span>
        </div>
        <input type="range" min="{{ $minAmount }}" max="{{ $maxAmount }}" step="{{ $stepAmount }}" x-model.number="amt"
               :style="`--p:${pct}%`" class="slider-gold mt-1" aria-label="Investment amount">
        <div class="flex justify-between text-[11px] uppercase tracking-[0.2em] text-white/40 tnum">
            <span>৳ 5L</span><span>৳ 1Cr</span>
        </div>
    </div>

    {{-- Period slider --}}
    <div x-data="{ yrs: $wire.entangle('years'), min: {{ $minYears }}, max: {{ $maxYears }}, get pct() { return ((this.yrs - this.min) / (this.max - this.min) * 100).toFixed(1); } }" class="mt-6">
        <div class="flex flex-wrap items-baseline justify-between gap-2">
            <label class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/55">
                <span x-show="$store.lang.current === 'en'">Time Period</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">সময়কাল</span>
            </label>
            <span class="font-display text-2xl font-bold text-brand-gold tnum">{{ $years }} <span x-show="$store.lang.current === 'en'" class="text-sm font-semibold text-white/50">Years</span><span x-show="$store.lang.current === 'bn'" class="font-bengali text-sm font-semibold text-white/50">বছর</span></span>
        </div>
        <input type="range" min="{{ $minYears }}" max="{{ $maxYears }}" step="1" x-model.number="yrs"
               :style="`--p:${pct}%`" class="slider-gold mt-1" aria-label="Time period in years">
        <div class="flex justify-between text-[11px] uppercase tracking-[0.2em] text-white/40 tnum">
            <span>1 Year</span><span>10 Years</span>
        </div>
    </div>

    {{-- Calculated values --}}
    <dl class="mt-8 border-t border-white/10 text-sm">
        <div class="flex justify-between items-center gap-4 py-3.5 border-b border-white/10">
            <dt class="text-white/60">
                <span x-show="$store.lang.current === 'en'">Investment Amount</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের পরিমাণ</span>
            </dt>
            <dd class="font-display text-lg font-bold text-white tnum">৳ {{ \App\Livewire\InvestmentPlanner::inr($amount) }}</dd>
        </div>
        <div class="flex justify-between items-center gap-4 py-3.5 border-b border-white/10">
            <dt class="text-white/60">
                <span x-show="$store.lang.current === 'en'">Projected Annual Return *</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">সম্ভাব্য বার্ষিক রিটার্ন *</span>
            </dt>
            <dd class="font-display text-lg font-bold text-brand-gold tnum">৳ {{ \App\Livewire\InvestmentPlanner::inr($this->projectedAnnual) }}</dd>
        </div>
        <div class="flex justify-between items-center gap-4 py-3.5 border-b border-white/10">
            <dt class="text-white/60">
                <span x-show="$store.lang.current === 'en'">Total Projected Returns *</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">মোট সম্ভাব্য রিটার্ন *</span>
            </dt>
            <dd class="font-display text-lg font-bold text-brand-gold tnum">৳ {{ \App\Livewire\InvestmentPlanner::inr($this->totalProjectedReturns) }}</dd>
        </div>
        <div class="flex justify-between items-center gap-4 py-4">
            <dt class="text-white/80 font-semibold">
                <span x-show="$store.lang.current === 'en'">Total Projected Value *</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">মোট সম্ভাব্য মূল্য *</span>
            </dt>
            <dd class="font-display text-2xl sm:text-3xl font-bold text-brand-gold tnum">৳ {{ \App\Livewire\InvestmentPlanner::inr($this->totalProjectedValue) }}</dd>
        </div>
    </dl>

    <a href="/contact" class="btn btn-gold w-full mt-6">
        <span x-show="$store.lang.current === 'en'">Talk to an Advisor →</span>
        <span x-show="$store.lang.current === 'bn'" class="font-bengali">একজন পরামর্শকের সাথে কথা বলুন →</span>
    </a>
    <p class="type-small text-white/45 italic mt-4 leading-relaxed">* <span x-show="$store.lang.current === 'en'">Projected estimate — illustrative only, not guaranteed. Projections are estimates based on stated assumptions and are not guaranteed. Actual results depend on hotel operations, occupancy, revenue and market conditions.</span><span x-show="$store.lang.current === 'bn'" class="font-bengali">* সম্ভাব্য হিসাব — শুধুমাত্র চিত্রণমূলক, নিশ্চিত নয়। প্রকৃত ফলাফল হোটেল পরিচালনা, অকুপেন্সি, আয় ও বাজার পরিস্থিতির ওপর নির্ভরশীল।</span></p>
</div>
