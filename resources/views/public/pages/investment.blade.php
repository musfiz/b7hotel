@extends('public.layouts.site')
@section('title', 'Investment | B7HOTEL')
@section('content')
@php
// PLACEHOLDER investment data — example figures only. Replace every price,
// ownership share, dividend schedule and benefit with verified B7HOTEL data
// from official project documents before presenting as real.
$tiers = [
    [
        'name' => 'Starter Share', 'bn' => 'স্টার্টার শেয়ার',
        'shares' => '1 Share', 'shares_bn' => '১টি শেয়ার',
        'price' => '৳ 5,00,000', 'ownership' => '0.5%', 'ownership_bn' => '০.৫%',
        'featured' => false,
        'benefits' => [
            ['Quarterly dividend distributions', 'ত্রৈমাসিক লভ্যাংশ বিতরণ'],
            ['Access to investor portal', 'বিনিয়োগকারী পোর্টালে প্রবেশাধিকার'],
            ['2 complimentary nights per year', 'প্রতি বছর ২টি প্রশংসামূলক রাত্রিযাপন'],
            ['Annual investor meeting access', 'বার্ষিক বিনিয়োগকারী সভায় অংশগ্রহণ'],
        ],
    ],
    [
        'name' => 'Premium Share', 'bn' => 'প্রিমিয়াম শেয়ার',
        'shares' => '5 Shares', 'shares_bn' => '৫টি শেয়ার',
        'price' => '৳ 25,00,000', 'ownership' => '2.5%', 'ownership_bn' => '২.৫%',
        'featured' => true,
        'benefits' => [
            ['Quarterly dividend distributions', 'ত্রৈমাসিক লভ্যাংশ বিতরণ'],
            ['Full investor portal access', 'সম্পূর্ণ বিনিয়োগকারী পোর্টাল সুবিধা'],
            ['7 complimentary nights per year', 'প্রতি বছর ৭টি প্রশংসামূলক রাত্রিযাপন'],
            ['Priority dining & spa reservations', 'ডাইনিং ও স্পায় অগ্রাধিকার বুকিং'],
            ['Quarterly performance reports', 'ত্রৈমাসিক পারফরম্যান্স রিপোর্ট'],
        ],
    ],
    [
        'name' => 'Executive Share', 'bn' => 'এক্সিকিউটিভ শেয়ার',
        'shares' => '10 Shares', 'shares_bn' => '১০টি শেয়ার',
        'price' => '৳ 1,00,00,000', 'ownership' => '10%', 'ownership_bn' => '১০%',
        'featured' => false,
        'benefits' => [
            ['Monthly dividend distributions', 'মাসিক লভ্যাংশ বিতরণ'],
            ['Executive investor portal access', 'এক্সিকিউটিভ পোর্টাল সুবিধা'],
            ['21 complimentary nights per year', 'প্রতি বছর ২১টি প্রশংসামূলক রাত্রিযাপন'],
            ['Suite upgrades & concierge service', 'স্যুট আপগ্রেড ও কনসিয়ার্জ সেবা'],
            ['Dedicated relationship manager', 'নিবেদিত রিলেশনশিপ ম্যানেজার'],
            ['Monthly performance reports', 'মাসিক পারফরম্যান্স রিপোর্ট'],
        ],
    ],
];
$benefitCards = [
    ['icon' => 'trend', 'title' => 'Regular Dividends', 'bn' => 'নিয়মিত লভ্যাংশ', 'desc' => 'Quarterly or monthly distributions based on actual project structure.'],
    ['icon' => 'doc', 'title' => 'Legal Ownership', 'bn' => 'আইনি মালিকানা', 'desc' => 'Registered share ownership with documented legal title where applicable.'],
    ['icon' => 'bars', 'title' => 'Capital Appreciation', 'bn' => 'মূলধন বৃদ্ধি', 'desc' => 'Potential benefit from land and property value growth over time.'],
    ['icon' => 'eye', 'title' => 'Full Transparency', 'bn' => 'পূর্ণ স্বচ্ছতা', 'desc' => 'Financial reports, project updates and investor portal access.'],
];
$trustPoints = [
    ['Verified Project Information', 'যাচাইকৃত প্রকল্প তথ্য'],
    ['Transparent Documentation', 'স্বচ্ছ দলিলপত্র'],
    ['Professional Management', 'পেশাদার ব্যবস্থাপনা'],
    ['Secure Investor Access', 'নিরাপদ বিনিয়োগকারী প্রবেশাধিকার'],
];
$documents = [
    ['Land Documents', 'জমির দলিল'],
    ['Company Documents', 'কোম্পানির নথি'],
    ['Project Approval', 'প্রকল্প অনুমোদন'],
    ['Building Plan', 'ভবন নকশা'],
    ['Share Agreement', 'শেয়ার চুক্তি'],
    ['Terms & Conditions', 'শর্তাবলি'],
];
$steps = [
    ['Explore B7HOTEL', 'B7HOTEL সম্পর্কে জানুন'],
    ['Review Investment Details', 'বিনিয়োগের বিস্তারিত দেখুন'],
    ['Talk to an Advisor', 'পরামর্শকের সাথে কথা বলুন'],
    ['Review Documents', 'দলিলপত্র যাচাই করুন'],
    ['Select Shares', 'শেয়ার নির্বাচন করুন'],
    ['Complete Agreement', 'চুক্তি সম্পন্ন করুন'],
    ['Investment Confirmation', 'বিনিয়োগ নিশ্চিতকরণ'],
];
@endphp
<div class="bg-white text-brand-navy">

    {{-- 1. Compact navy hero with cinematic architectural backdrop --}}
    <section class="relative overflow-hidden bg-brand-navy-deep text-white">
        <div class="absolute inset-0" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2400&auto=format&fit=crop" alt="" fetchpriority="high" class="h-full w-full object-cover opacity-30">
            <div class="absolute inset-0 bg-brand-navy-deep/75"></div>
            <div class="absolute inset-x-0 bottom-0 h-24" style="background: linear-gradient(0deg, rgb(7 15 29 / 0.85) 0%, transparent 100%);"></div>
        </div>
        <div class="relative mx-auto max-w-4xl px-5 sm:px-6 pt-28 sm:pt-36 pb-12 sm:pb-16 text-center">
            <p class="hero-animate hero-delay-1 eyebrow-split">
                <span x-show="$store.lang.current === 'en'">Investment</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ</span>
            </p>
            <h1 class="hero-animate hero-delay-2 type-hero text-balance mt-5">
                <span x-show="$store.lang.current === 'en'">Invest with Confidence</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">আত্মবিশ্বাসের সাথে বিনিয়োগ করুন</span>
            </h1>
            <p class="hero-animate hero-delay-3 mx-auto mt-6 max-w-2xl text-base sm:text-lg font-light leading-relaxed text-white/70">
                <span x-show="$store.lang.current === 'en'">Own a verified share in a premium hospitality asset with transparent governance, professional management, and clear growth potential.</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">স্বচ্ছ ব্যবস্থাপনা, পেশাদার পরিচালনা এবং সুস্পষ্ট বিনিয়োগ কাঠামোর মাধ্যমে একটি প্রিমিয়াম Hospitality Asset-এর অংশীদার হওয়ার সুযোগ।</span>
            </p>
        </div>
    </section>

    {{-- 2. Investment packages on white — featured tier stays deep navy --}}
    <section id="packages" class="mx-auto max-w-7xl px-4 sm:px-6 py-14 sm:py-20 scroll-mt-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 items-stretch">
            @foreach ($tiers as $tier)
            <div class="reveal tier-card{{ $tier['featured'] ? ' tier-featured' : '' }} p-7 md:p-8" @if($loop->index > 0) style="--reveal-delay:{{ $loop->index * 80 }}ms" @endif>
                @if ($tier['featured'])
                <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full bg-brand-gold px-4 py-1.5 font-display text-[10px] font-bold uppercase tracking-[0.22em] text-brand-navy">Most Popular</span>
                @endif
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] {{ $tier['featured'] ? 'text-brand-gold' : 'text-brand-gold-deep' }}">{{ $tier['name'] }}</p>
                <p class="font-bengali mt-1 {{ $tier['featured'] ? 'text-white/60' : 'text-brand-slate/70' }}">{{ $tier['bn'] }}</p>
                <p class="font-display text-[2rem] md:text-[2.6rem] leading-none font-bold tnum mt-5 {{ $tier['featured'] ? 'text-brand-gold' : 'text-brand-gold-deep' }}">{{ $tier['price'] }}</p>
                <p class="mt-2 text-sm {{ $tier['featured'] ? 'text-white/55' : 'text-brand-slate' }}">
                    <span x-show="$store.lang.current === 'en'">{{ $tier['shares'] }} · Ownership share: {{ $tier['ownership'] }}</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">{{ $tier['shares_bn'] }} · মালিকানার অংশ: {{ $tier['ownership_bn'] }}</span>
                </p>
                <ul class="mt-7 space-y-3 text-[0.95rem] flex-1 {{ $tier['featured'] ? 'text-white/75' : 'text-brand-slate-deep' }}">
                    @foreach ($tier['benefits'] as [$bEn, $bBn])
                    <li class="flex items-start gap-3">
                        @include('public.partials.icon', ['name' => 'check', 'class' => 'h-4 w-4 mt-1 shrink-0 '.($tier['featured'] ? 'text-brand-gold' : 'text-brand-gold-deep')])
                        <span><span x-show="$store.lang.current === 'en'">{{ $bEn }}</span><span x-show="$store.lang.current === 'bn'" class="font-bengali">{{ $bBn }}</span></span>
                    </li>
                    @endforeach
                </ul>
                <a href="/contact" class="btn {{ $tier['featured'] ? 'btn-gold' : 'btn-line-dark' }} w-full mt-8">
                    <span x-show="$store.lang.current === 'en'">Request Investment Details →</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের বিস্তারিত জানুন →</span>
                </a>
            </div>
            @endforeach
        </div>
        <p class="reveal type-small text-brand-slate/70 italic mt-8 max-w-4xl mx-auto text-center leading-relaxed">
            <span x-show="$store.lang.current === 'en'">Investment information is provided for general informational purposes only. Prices, ownership shares, dividends and benefits shown are placeholders — actual terms only per official project documents, applicable laws and executed agreements.</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ সংক্রান্ত তথ্য শুধুমাত্র সাধারণ তথ্যের জন্য। প্রদর্শিত মূল্য, মালিকানা, লভ্যাংশ ও সুবিধা নমুনা — প্রকৃত শর্ত প্রকল্পের অনুমোদিত দলিল ও চুক্তি অনুযায়ী।</span>
        </p>
    </section>

    {{-- 3. Calculator + Investor benefits on ivory --}}
    <section id="calculator" class="bg-brand-ivory border-y border-brand-navy/5 scroll-mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 py-14 sm:py-20 grid lg:grid-cols-2 gap-5 lg:gap-6 items-stretch">
            <livewire:investment-planner />
            <div class="tier-card reveal-right p-6 sm:p-8 md:p-10" style="--reveal-delay:120ms">
                <p class="eyebrow" style="margin-bottom:0.6rem">
                    <span x-show="$store.lang.current === 'en'">Long-term value</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">দীর্ঘমেয়াদি মূল্য</span>
                </p>
                <h2 class="font-display text-2xl sm:text-3xl font-bold text-brand-navy">
                    <span x-show="$store.lang.current === 'en'">Investor Benefits</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগকারীর সুবিধাসমূহ</span>
                </h2>
                <p class="mt-3 text-brand-slate leading-relaxed">
                    <span x-show="$store.lang.current === 'en'">Why investors choose B7HOTEL for long-term wealth building.</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">দীর্ঘমেয়াদি সম্পদ গঠনের সম্ভাবনার জন্য কেন বিনিয়োগকারীরা B7HOTEL বেছে নেবেন।</span>
                </p>
                <div class="grid sm:grid-cols-2 gap-4 mt-8">
                    @foreach ($benefitCards as $b)
                    <div class="border border-brand-navy/10 bg-white rounded-2xl p-5">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-navy border border-brand-gold/40 text-brand-gold">
                            @include('public.partials.icon', ['name' => $b['icon'], 'class' => 'h-5 w-5'])
                        </span>
                        <p class="font-display font-bold mt-4 text-brand-navy">{{ $b['title'] }}</p>
                        <p class="font-bengali text-sm text-brand-gold-deep mt-0.5">{{ $b['bn'] }}</p>
                        <p class="text-sm text-brand-slate leading-relaxed mt-2">{{ $b['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Trust + transparency on navy --}}
    <section class="relative overflow-hidden bg-brand-navy-deep text-white">
        <div class="absolute inset-0" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1445019980597-93fa8acb246c?q=80&w=2400&auto=format&fit=crop" alt="" loading="lazy" class="h-full w-full object-cover opacity-15">
            <div class="absolute inset-0 bg-brand-navy-deep/80"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 py-14 sm:py-20">
            <div class="reveal border border-white/10 bg-white/[0.03] rounded-[18px] px-6 py-10 sm:p-12 text-center backdrop-blur-sm">
                <p class="eyebrow-light eyebrow-center" style="justify-content:center">
                    <span x-show="$store.lang.current === 'en'">Trust &amp; transparency</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">আস্থা ও স্বচ্ছতা</span>
                </p>
                <h2 class="type-h2 text-balance">
                    <span x-show="$store.lang.current === 'en'">Your Investment. Our Transparency.</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার বিনিয়োগ, আমাদের স্বচ্ছতা।</span>
                </h2>
                <ul class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                    @foreach ($trustPoints as [$tEn, $tBn])
                    <li class="flex items-center gap-3 border border-white/10 rounded-2xl px-5 py-4 text-[0.95rem] text-white/80">
                        @include('public.partials.icon', ['name' => 'check', 'class' => 'h-5 w-5 shrink-0 text-brand-gold'])
                        <span><span x-show="$store.lang.current === 'en'">{{ $tEn }}</span><span x-show="$store.lang.current === 'bn'" class="font-bengali">{{ $tBn }}</span></span>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-10 text-left">
                    <p class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/50">
                        <span x-show="$store.lang.current === 'en'">Available documents</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">প্রাপ্য দলিলসমূহ</span>
                    </p>
                    <ul class="mt-4 flex flex-wrap gap-2.5">
                        @foreach ($documents as [$dEn, $dBn])
                        <li class="flex items-center gap-2 border border-white/10 rounded-full px-4 py-2 text-sm text-white/70">
                            @include('public.partials.icon', ['name' => 'doc', 'class' => 'h-4 w-4 text-brand-gold'])
                            <span x-show="$store.lang.current === 'en'">{{ $dEn }}</span><span x-show="$store.lang.current === 'bn'" class="font-bengali">{{ $dBn }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 flex items-center gap-2 text-xs text-white/45">
                        @include('public.partials.icon', ['name' => 'lock', 'class' => 'h-4 w-4 text-brand-gold/70'])
                        <span x-show="$store.lang.current === 'en'">Sensitive documents are protected behind investor authentication.</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">সংবেদনশীল দলিল বিনিয়োগকারী প্রমাণীকরণের মাধ্যমে সুরক্ষিত।</span>
                    </p>
                </div>
                <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/docs" class="btn btn-line-light">
                        <span x-show="$store.lang.current === 'en'">View Documents</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">ডকুমেন্ট দেখুন</span>
                    </a>
                    <a href="/contact" class="btn btn-gold">
                        <span x-show="$store.lang.current === 'en'">Talk to an Advisor</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">একজন পরামর্শকের সাথে কথা বলুন</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Investment process on white --}}
    <section class="mx-auto max-w-7xl px-4 sm:px-6 py-14 sm:py-20">
        <div class="reveal text-center mb-12">
            <p class="eyebrow eyebrow-center" style="justify-content:center">
                <span x-show="$store.lang.current === 'en'">How it works</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">যেভাবে কাজ করে</span>
            </p>
            <h2 class="type-h2 text-brand-navy">
                <span x-show="$store.lang.current === 'en'">Your Path to Ownership</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">মালিকানার পথে আপনার যাত্রা</span>
            </h2>
        </div>
        <ol class="process-rail grid gap-8 lg:grid-cols-7 lg:gap-4">
            @foreach ($steps as [$sEn, $sBn])
            <li class="reveal flex lg:flex-col lg:items-center lg:text-center gap-4 lg:gap-0" @if($loop->index > 0) style="--reveal-delay:{{ min($loop->index, 4) * 60 }}ms" @endif>
                <span class="step-dot">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <span class="lg:mt-4">
                    <span class="block font-display text-[0.95rem] font-bold leading-snug text-brand-navy">{{ $sEn }}</span>
                    <span class="font-bengali block text-sm text-brand-slate mt-1">{{ $sBn }}</span>
                </span>
            </li>
            @endforeach
        </ol>
    </section>

    {{-- 6. Final navy CTA --}}
    <section class="relative overflow-hidden bg-brand-navy-deep text-white">
        <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=2400&auto=format&fit=crop" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-brand-navy-deep/80"></div>
        <div class="reveal relative mx-auto max-w-3xl px-5 sm:px-6 py-20 md:py-28 text-center">
            <p class="eyebrow-light eyebrow-center" style="justify-content:center">
                <span x-show="$store.lang.current === 'en'">Your next step</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার পরবর্তী পদক্ষেপ</span>
            </p>
            <h2 class="type-h2">
                <span x-show="$store.lang.current === 'en'">Be Part of B7HOTEL</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">B7HOTEL-এর অংশীদার হোন</span>
            </h2>
            <p class="mt-4 text-white/70 text-lg">
                <span x-show="$store.lang.current === 'en'">Start your investment journey today.</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">আজই আপনার বিনিয়োগের যাত্রা শুরু করুন।</span>
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="/contact" class="btn btn-line-light">
                    <span x-show="$store.lang.current === 'en'">Talk to an Advisor</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">একজন পরামর্শকের সাথে কথা বলুন</span>
                </a>
                <a href="/contact" class="btn btn-gold">
                    <span x-show="$store.lang.current === 'en'">Request Investment Details</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের বিস্তারিত জানুন</span>
                </a>
            </div>
        </div>
    </section>

    {{-- 7. Legal disclaimer --}}
    <section class="mx-auto max-w-4xl px-5 sm:px-6 py-12 sm:py-16">
        <p class="type-small text-brand-slate/70 leading-relaxed text-center">
            <span x-show="$store.lang.current === 'en'">Investment information is provided for general informational purposes only. Investment terms, ownership rights, projected returns and benefits are subject to official project documents, applicable laws and executed agreements. Projected returns are estimates and are not guaranteed.</span>
            <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ সংক্রান্ত তথ্য সাধারণ তথ্য প্রদানের উদ্দেশ্যে প্রদান করা হয়েছে। মালিকানার অধিকার, বিনিয়োগের শর্ত, সম্ভাব্য রিটার্ন ও অন্যান্য সুবিধা প্রকল্পের অনুমোদিত দলিল, প্রযোজ্য আইন এবং সম্পাদিত চুক্তির ওপর নির্ভরশীল। সম্ভাব্য রিটার্ন কোনোভাবেই নিশ্চিত বা গ্যারান্টিযুক্ত নয়।</span>
        </p>
    </section>
</div>
@endsection
