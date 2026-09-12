@extends('public.layouts.site')

@section('title', 'B7HOTEL | Premium Hotel & Land Share Investment in Patuakhali')

@section('content')

@include('public.partials.hero-slider')

{{-- 7. Project at a Glance — statistics band, editorial left-aligned header --}}
<section id="glance" class="py-24 md:py-32 bg-brand-ivory border-b border-brand-gold/15 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="reveal mb-14 grid gap-6 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                <p class="eyebrow">Project snapshot</p>
                <h2 class="type-h2 text-brand-navy uppercase">
                    <span x-show="$store.lang.current === 'en'">B7HOTEL at a Glance</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">এক নজরে B7HOTEL</span>
                </h2>
            </div>
            <p class="type-small text-brand-slate/70 max-w-xs lg:text-right lg:pb-2">Figures are placeholders until verified project data is supplied.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-5">
            @foreach ([['Total Land','XX Decimal','XX ডেসিমেল'],['Total Shares','XX Shares','XX শেয়ার'],['Hotel Rooms','XX Rooms','XX রুম'],['Project Area','XX Sq. Ft.','XX স্কয়ার ফিট'],['Investment From','৳ XX,XXX','৳ XX,XXX'],['Location','Patuakhali','পটুয়াখালী']] as [$label,$en,$bn])
            <div class="reveal stat-card" style="--reveal-delay:{{ min($loop->index, 3) * 50 }}ms">
                <span class="stat-label">{{ $label }}</span>
                <span class="stat-value">
                    <span x-show="$store.lang.current === 'en'">{{ $en }}</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">{{ $bn }}</span>
                </span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 8. Why B7HOTEL — centered card grid --}}
<section class="py-24 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="reveal eyebrow eyebrow-center">Investment thesis</p>
        <h2 class="type-h2 text-brand-navy uppercase">
            <span x-show="$store.lang.current === 'en'">Why B7HOTEL?</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">কেন B7HOTEL?</span>
        </h2>
        <p class="mt-6 text-lg text-brand-slate/90 max-w-2xl mx-auto leading-relaxed">
            <span x-show="$store.lang.current === 'en'">B7HOTEL is more than a hotel project. It combines hospitality business potential with land ownership through a structured investment model.</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">B7Hotel শুধু একটি হোটেল প্রকল্প নয় — এটি হোটেল ব্যবসা এবং জমির মালিকানার সমন্বিত একটি বিনিয়োগ প্রকল্প।</span>
        </p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-16 text-left">
            @foreach ([['Land Ownership','জমির মালিকানার অংশ'],['Hospitality Business','হোটেল ব্যবসায় অংশগ্রহণ'],['Strategic Location','কৌশলগত অবস্থান'],['Professional Management','পেশাদার ব্যবস্থাপনা'],['Long-Term Asset','দীর্ঘমেয়াদি সম্পদ সম্ভাবনা']] as [$en,$bn])
            <div class="reveal why-card" style="--reveal-delay:{{ min($loop->iteration, 4) * 50 }}ms">
                <span class="mb-5 block font-display text-sm font-bold tracking-[0.2em] text-brand-gold-deep tnum">0{{ $loop->iteration }}</span>
                <p class="font-display text-[1.05rem] font-bold text-brand-navy">{{ $en }}</p>
                <p class="text-sm text-brand-slate font-bengali mt-1.5">{{ $bn }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 9. The Project — image + content split --}}
<section class="py-24 md:py-32 bg-brand-bg">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
        <figure class="reveal-img card-media">
            <div class="aspect-[4/3] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=1600&auto=format&fit=crop" alt="Representative luxury hotel exterior at dusk — final B7HOTEL renders to follow" loading="lazy" class="h-full w-full object-cover">
            </div>
            <figcaption class="flex items-center justify-between px-5 py-4 text-xs uppercase tracking-[0.18em] text-white/70">
                <span>Architectural Preview</span><span class="text-brand-gold/80">Patuakhali</span>
            </figcaption>
        </figure>
        <div class="reveal-right">
            <p class="eyebrow">The asset</p>
            <h2 class="type-h2 text-brand-navy">B7HOTEL Project</h2>
            <p class="mt-4 text-brand-slate font-bengali text-lg">পটুয়াখালীর একটি পরিকল্পিত আধুনিক Hotel &amp; Hospitality Project।</p>
            <ul class="mt-8 space-y-0 text-[0.95rem] text-brand-navy/80">
                @foreach (['Project Location — Patuakhali','Land Area — XX Decimal','Building Area — XX Sq. Ft.','Floors — XX','Rooms — XX','Restaurant • Conference • Parking'] as $row)
                <li class="flex gap-4 border-b border-brand-navy/10 py-3"><span class="text-brand-gold-deep" aria-hidden="true">—</span>{{ $row }}</li>
                @endforeach
            </ul>
            <a href="/project" class="btn btn-line-dark mt-10">View Project Details</a>
        </div>
    </div>
</section>

{{-- 10. Investment packages — dark contrast section with faint architectural backdrop --}}
<section class="band relative py-24 md:py-32 text-white overflow-hidden">
    <div class="absolute inset-0" aria-hidden="true">
        <img src="https://images.unsplash.com/photo-1445019980597-93fa8acb246c?q=80&w=2400&auto=format&fit=crop" alt="" loading="lazy" class="h-full w-full object-cover opacity-20">
        <div class="absolute inset-0 bg-brand-navy-deep/80"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <p class="reveal eyebrow-light eyebrow-center">Entry points</p>
        <h2 class="type-h2 uppercase">
            <span x-show="$store.lang.current === 'en'">Choose Your Investment</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার বিনিয়োগের সুযোগ নির্বাচন করুন</span>
        </h2>
        <div class="grid gap-5 sm:gap-6 mt-12 sm:mt-16 text-left items-stretch md:grid-cols-3">
            <div class="reveal order-2 bg-white/[0.04] border border-white/10 p-6 sm:p-8 md:p-10 md:order-1 backdrop-blur-sm">
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-brand-gold">Starter</p>
                <p class="font-display text-4xl font-bold tnum mt-3"><span data-countup="1">1</span> Share</p>
                <p class="text-xl text-brand-gold mt-2 tnum">৳ XX,XXX</p>
                <ul class="mt-6 space-y-2.5 text-[0.95rem] text-white/70"><li>• Land Ownership Share</li><li>• Hotel Project Participation</li><li>• Agreement</li><li>• Investor Support</li></ul>
                <a href="/investment#calculator" class="btn btn-gold w-full mt-8">Invest Now</a>
            </div>
            <div class="reveal order-1 bg-brand-gold text-brand-navy p-6 sm:p-8 md:p-10 md:order-2 relative md:-my-4" style="--reveal-delay:80ms">
                <span class="absolute top-0 right-0 bg-brand-navy text-brand-gold text-[10px] font-bold px-4 py-1.5 uppercase tracking-[0.2em]">Recommended</span>
                <p class="text-[11px] font-bold uppercase tracking-[0.28em]">Premium</p>
                <p class="font-display text-4xl font-bold tnum mt-3"><span data-countup="5">5</span> Shares</p>
                <p class="text-xl font-bold mt-2 tnum">৳ XXX,XXX</p>
                <ul class="mt-6 space-y-2.5 text-[0.95rem]"><li>• Land Ownership Share</li><li>• Hotel Project Participation</li><li>• Priority Support</li><li>• Investor Benefits</li></ul>
                <a href="/investment#calculator" class="btn btn-navy w-full mt-8">Invest Now</a>
            </div>
            <div class="reveal order-3 bg-white/[0.04] border border-white/10 p-6 sm:p-8 md:p-10 backdrop-blur-sm" style="--reveal-delay:160ms">
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-brand-gold">Elite</p>
                <p class="font-display text-4xl font-bold tnum mt-3"><span data-countup="10">10</span> Shares</p>
                <p class="text-xl text-brand-gold mt-2 tnum">৳ X,XXX,XXX</p>
                <ul class="mt-6 space-y-2.5 text-[0.95rem] text-white/70"><li>• Multiple Shares</li><li>• Premium Investor Support</li><li>• Special Benefits</li></ul>
                <a href="/contact" class="btn btn-line-light w-full mt-8">Contact Us</a>
            </div>
        </div>

        {{-- Tier comparison (facts only — no returns, no projections) --}}
        <div class="reveal-fade mt-12 sm:mt-16 overflow-x-auto rounded-2xl border border-white/10 text-left">
            <table class="tier-table w-full min-w-[560px] text-sm">
                <caption class="sr-only">Investment tier comparison</caption>
                <thead>
                    <tr class="text-[11px] uppercase tracking-[0.22em] text-white/50">
                        <th scope="col" class="px-6 py-4 font-semibold">Compare tiers</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Starter</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-brand-gold">Premium</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Elite</th>
                    </tr>
                </thead>
                <tbody class="text-white/75">
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Shares included</th>
                        <td class="px-6 py-4 tnum">1</td>
                        <td class="px-6 py-4 tnum bg-white/[0.05]">5</td>
                        <td class="px-6 py-4 tnum">10</td>
                    </tr>
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Indicative price</th>
                        <td class="px-6 py-4 tnum">৳ XX,XXX</td>
                        <td class="px-6 py-4 tnum bg-white/[0.05]">৳ XXX,XXX</td>
                        <td class="px-6 py-4 tnum">৳ X,XXX,XXX</td>
                    </tr>
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Land ownership share</th>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4 bg-white/[0.05]">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                    </tr>
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Hotel project participation</th>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4 bg-white/[0.05]">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                    </tr>
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Written agreement</th>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4 bg-white/[0.05]">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                        <td class="px-6 py-4">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold'])<span class="sr-only">Included</span></td>
                    </tr>
                    <tr class="border-t border-white/10">
                        <th scope="row" class="px-6 py-4 font-medium text-white/60">Investor support</th>
                        <td class="px-6 py-4">Standard</td>
                        <td class="px-6 py-4 bg-white/[0.05]">Priority</td>
                        <td class="px-6 py-4">Dedicated</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <ul class="mt-10 flex flex-col items-center justify-center gap-3 text-[13px] text-white/60 sm:flex-row sm:gap-8">
            <li class="flex items-center gap-2">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold']) Priced per official documents</li>
            <li class="flex items-center gap-2">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold']) No guaranteed returns</li>
            <li class="flex items-center gap-2">@include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 text-brand-gold']) Advisor guidance included</li>
        </ul>
        <p class="type-small text-white/45 italic mt-6 max-w-3xl mx-auto">Actual share price, ownership structure, benefits and payment terms are per legally approved documents only. No guaranteed profit, return or risk-free appreciation is claimed.</p>
    </div>
</section>

{{-- 11. Calculator (Livewire + Alpine starter) --}}
<livewire:investment-calculator />

{{-- 12–15: journey timeline (numbered path, not another card grid) --}}
<section class="py-24 md:py-32 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="reveal mb-12 grid gap-6 md:grid-cols-[1fr_auto] md:items-end">
            <div>
                <p class="eyebrow">Continue exploring</p>
                <h2 class="type-h2 text-brand-navy uppercase">Explore Further</h2>
            </div>
            <p class="type-small text-brand-slate/70 max-w-xs md:text-right md:pb-2">Four paths through the project — process, place, design and progress.</p>
        </div>
        <ol class="border-t border-brand-navy/10">
            <li class="reveal border-b border-brand-navy/10">
                <a href="/project" class="group grid grid-cols-[2.75rem_1fr_auto] sm:grid-cols-[3.5rem_1fr_auto] items-center gap-3 sm:gap-4 py-5 sm:py-7 transition-colors hover:bg-white/60">
                    <span class="font-display text-xl sm:text-2xl font-bold text-brand-gold-deep tnum">01</span>
                    <span><span class="block font-display text-base sm:text-lg font-bold text-brand-navy">Investment Process</span>
                    <span class="mt-1 block text-[0.92rem] leading-relaxed text-brand-slate">Explore → Review → Talk to Advisor → Agreement → Confirmation.</span></span>
                    @include('public.partials.icon', ['name' => 'arrow-right', 'class' => 'card-arrow h-5 w-5'])
                </a>
            </li>
            <li class="reveal border-b border-brand-navy/10" style="--reveal-delay:60ms">
                <a href="/project" class="group grid grid-cols-[2.75rem_1fr_auto] sm:grid-cols-[3.5rem_1fr_auto] items-center gap-3 sm:gap-4 py-5 sm:py-7 transition-colors hover:bg-white/60">
                    <span class="font-display text-xl sm:text-2xl font-bold text-brand-gold-deep tnum">02</span>
                    <span><span class="block font-display text-base sm:text-lg font-bold text-brand-navy">Prime Location</span>
                    <span class="mt-1 block text-[0.92rem] leading-relaxed text-brand-slate">Patuakhali with verified distances — XX km placeholders.</span></span>
                    @include('public.partials.icon', ['name' => 'arrow-right', 'class' => 'card-arrow h-5 w-5'])
                </a>
            </li>
            <li class="reveal border-b border-brand-navy/10" style="--reveal-delay:120ms">
                <a href="/gallery" class="group grid grid-cols-[2.75rem_1fr_auto] sm:grid-cols-[3.5rem_1fr_auto] items-center gap-3 sm:gap-4 py-5 sm:py-7 transition-colors hover:bg-white/60">
                    <span class="font-display text-xl sm:text-2xl font-bold text-brand-gold-deep tnum">03</span>
                    <span><span class="block font-display text-base sm:text-lg font-bold text-brand-navy">Facilities &amp; Design</span>
                    <span class="mt-1 block text-[0.92rem] leading-relaxed text-brand-slate">Rooms • Restaurant • Pool • Conference • Rooftop • Parking.</span></span>
                    @include('public.partials.icon', ['name' => 'arrow-right', 'class' => 'card-arrow h-5 w-5'])
                </a>
            </li>
            <li class="reveal border-b border-brand-navy/10" style="--reveal-delay:180ms">
                <a href="/project" class="group grid grid-cols-[2.75rem_1fr_auto] sm:grid-cols-[3.5rem_1fr_auto] items-center gap-3 sm:gap-4 py-5 sm:py-7 transition-colors hover:bg-white/60">
                    <span class="font-display text-xl sm:text-2xl font-bold text-brand-gold-deep tnum">04</span>
                    <span><span class="block font-display text-base sm:text-lg font-bold text-brand-navy">From Land to Landmark</span>
                    <span class="mt-1 block text-[0.92rem] leading-relaxed text-brand-slate">Land @include('public.partials.icon', ['name' => 'check', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) • Design @include('public.partials.icon', ['name' => 'check', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) • Construction @include('public.partials.icon', ['name' => 'refresh', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) • Finishing • Opening.</span></span>
                    @include('public.partials.icon', ['name' => 'arrow-right', 'class' => 'card-arrow h-5 w-5'])
                </a>
            </li>
        </ol>
    </div>
</section>

{{-- 19. FAQ (pure Alpine accordion) --}}
<section id="faq" class="py-24 md:py-32 bg-brand-bg">
    <div class="max-w-3xl mx-auto px-6" x-data="{ open: 1 }">
        <div class="reveal text-center mb-12">
            <p class="eyebrow eyebrow-center">Questions, answered</p>
            <h2 class="type-h2 text-brand-navy">Frequently Asked Questions</h2>
            <p class="font-bengali text-brand-slate mt-3">সচরাচর জিজ্ঞাসিত প্রশ্ন</p>
        </div>
        <div class="border-t border-brand-navy/10">
        @foreach ([['Where is B7HOTEL located?','Patuakhali, Bangladesh. Full verified address to be published from official documents.'],['What is the price of one share?','৳ XX,XXX (placeholder). Actual pricing only per legally approved documents.'],['Can I buy shares in installments?','Payment plans apply only if offered in the official project documents.'],['Who will operate the hotel?','Professional hotel management — details per official announcements.']] as $i => [$q,$a])
        <div class="reveal faq-item" style="--reveal-delay:{{ min($i, 2) * 50 }}ms">
            <button @click="open = (open === {{ $i+1 }} ? null : {{ $i+1 }})" class="w-full flex justify-between items-center gap-6 px-2 sm:px-4 py-6 text-left font-display text-[1.02rem] font-semibold text-brand-navy">
                {{ $q }} <span x-text="open === {{ $i+1 }} ? '−' : '+'" class="text-brand-gold-deep text-2xl font-light shrink-0" aria-hidden="true"></span>
            </button>
            <div x-show="open === {{ $i+1 }}" x-cloak class="px-2 sm:px-4 pb-7 text-brand-slate leading-relaxed max-w-2xl">{{ $a }}</div>
        </div>
        @endforeach
        </div>
    </div>
</section>

{{-- 20. Final CTA — full-width visual --}}
<section class="relative py-28 md:py-36 text-center overflow-hidden bg-brand-navy-deep">
    <div class="absolute inset-0" aria-hidden="true">
        <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=2400&auto=format&fit=crop" alt="" loading="lazy" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-brand-navy-deep/70"></div>
    </div>
    <div class="reveal relative max-w-3xl mx-auto px-6">
        <p class="eyebrow-light eyebrow-center">Your next step</p>
        <h2 class="type-h2 text-white">Be Part of B7HOTEL</h2>
        <p class="font-bengali text-brand-gold mt-4 text-lg">B7HOTEL-এর অংশীদার হোন — আজই আপনার Investment Journey শুরু করুন।</p>
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            <a href="/contact" class="btn btn-line-light">Talk to an Advisor</a>
            <a href="/investment#calculator" class="btn btn-gold">Invest Now</a>
        </div>
    </div>
</section>

{{-- 21. Contact strip --}}
<section class="py-24 md:py-32 bg-white">
    <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-2 gap-12 lg:gap-16 items-start">
        <div class="reveal-left">
            <p class="eyebrow">Private consultation</p>
            <h2 class="type-h2 text-brand-navy">Let's Talk About Your Investment</h2>
            <p class="font-bengali text-brand-slate mt-4 text-lg">আপনার বিনিয়োগ নিয়ে কথা বলুন</p>
            <ul class="mt-8 space-y-0 text-[0.95rem]">
                <li class="border-b border-brand-navy/10 py-3.5"><span class="text-brand-slate/60 text-xs uppercase tracking-[0.2em] block mb-1">Phone</span>01XXXXXXXXX</li>
                <li class="border-b border-brand-navy/10 py-3.5"><span class="text-brand-slate/60 text-xs uppercase tracking-[0.2em] block mb-1">Email</span>info@b7hotel.com</li>
                <li class="py-3.5"><span class="text-brand-slate/60 text-xs uppercase tracking-[0.2em] block mb-1">Office</span>Patuakhali, Bangladesh</li>
            </ul>
        </div>
        <form action="/contact" method="GET" class="reveal-right bg-brand-bg border border-brand-navy/10 p-6 sm:p-8 space-y-4" style="--reveal-delay:120ms">
            <input required name="name" aria-label="Full Name" placeholder="Full Name" autocomplete="name" enterkeyhint="next" class="field">
            <input required name="phone" aria-label="Phone Number" placeholder="Phone Number" inputmode="tel" autocomplete="tel" enterkeyhint="next" class="field">
            <input type="email" name="email" aria-label="Email" placeholder="Email" inputmode="email" autocomplete="email" enterkeyhint="send" class="field">
            <button class="btn btn-navy w-full">Submit Inquiry</button>
            <p class="type-small text-brand-slate/70 italic text-center">Thank you. Our investment advisor will contact you soon.</p>
        </form>
    </div>
</section>

@endsection
