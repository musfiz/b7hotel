<section id="calculator" class="py-24 bg-brand-ivory border-y border-brand-gold/20">
    <div class="max-w-3xl mx-auto px-6">
        <div class="bg-white p-8 md:p-12 shadow-xl border border-brand-navy/10">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-light tracking-tight text-brand-navy">
                    <span x-show="$store.lang.current === 'en'">Calculate Your Investment</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার বিনিয়োগ হিসাব করুন</span>
                </h2>
                <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
                <p class="mt-3 text-xs uppercase tracking-widest text-brand-slate">
                    Livewire component — totals are computed on the server
                </p>
            </div>

            <div class="space-y-8">
                {{-- Stepper: pure Livewire server round-trip --}}
                <div class="flex flex-col items-center justify-center bg-brand-bg p-6 border border-brand-navy/10">
                    <span class="text-xs uppercase tracking-widest text-brand-slate mb-4 font-semibold">
                        <span x-show="$store.lang.current === 'en'">Number of Shares</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">শেয়ার সংখ্যা</span>
                    </span>

                    <div class="flex items-center space-x-6">
                        <button type="button" wire:click="decrement"
                            class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold hover:text-brand-gold transition duration-200">−</button>
                        <span class="text-4xl font-bold text-brand-navy w-20 text-center">{{ $shares }}</span>
                        <button type="button" wire:click="increment"
                            class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold hover:text-brand-gold transition duration-200">+</button>
                    </div>
                </div>

                {{-- Slider: Alpine input entangled with the Livewire property --}}
                <div x-data="{ sliderShares: $wire.entangle('shares') }" class="px-2">
                    <div class="flex justify-between items-center text-sm mb-2">
                        <label for="shares-slider" class="text-brand-slate uppercase tracking-wider text-xs font-semibold">
                            <span x-show="$store.lang.current === 'en'">Drag to adjust (Alpine + Livewire)</span>
                            <span x-show="$store.lang.current === 'bn'" class="font-bengali">স্লাইডার দিয়ে সমন্বয় করুন</span>
                        </label>
                        <span class="text-brand-navy font-semibold"><span x-text="sliderShares"></span> shares</span>
                    </div>
                    <input id="shares-slider" type="range" min="1" max="50" x-model.number="sliderShares"
                        class="w-full accent-[#D4AF37]">
                </div>

                <div class="px-2 flex justify-between items-center text-sm border-b border-brand-navy/10 pb-4">
                    <span class="text-brand-slate uppercase tracking-wider">Price per Share:</span>
                    <span class="text-lg font-medium text-brand-navy">৳ {{ number_format($pricePerShare) }}</span>
                </div>

                <div class="bg-brand-navy p-6 flex justify-between items-center text-white">
                    <span class="text-xs uppercase tracking-widest text-white/70 font-medium">Total Investment:</span>
                    <span class="text-2xl md:text-3xl font-bold text-brand-gold">
                        <span wire:loading class="text-sm font-normal text-white/60">updating…</span>
                        <span wire:loading.remove>৳ {{ number_format($this->total) }}</span>
                    </span>
                </div>

                <a href="#contact"
                    class="block w-full text-center bg-brand-gold text-brand-navy py-4 uppercase tracking-widest text-xs font-bold hover:bg-brand-navy hover:text-white transition duration-300">
                    <span x-show="$store.lang.current === 'en'">Request Investment Details</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের বিস্তারিত জানুন</span>
                </a>

                <p class="text-[11px] text-brand-slate/80 leading-relaxed text-center italic mt-4">
                    <span x-show="$store.lang.current === 'en'">* Illustrative estimate only. Actual share price, ownership structure and terms follow the project's legally approved documents. No guaranteed returns.</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">* শুধুমাত্র আনুমানিক হিসাব। প্রকৃত মূল্য ও শর্ত প্রকল্পের বৈধ দলিল অনুযায়ী নির্ধারিত হবে।</span>
                </p>
            </div>
        </div>
    </div>
</section>
