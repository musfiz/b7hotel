@extends('public.layouts.site')
@section('title', 'Gallery | B7HOTEL')
@section('content')
<section class="band pb-16 pt-28 sm:pb-20 sm:pt-32 md:pb-28 md:pt-40 text-center px-6">
    <p class="eyebrow-light eyebrow-center">Renders · Site · Craft</p>
    <h1 class="type-page-title">Project Gallery</h1>
    <p class="font-bengali text-brand-gold mt-2">প্রকল্পের গ্যালারি</p>
</section>
<section class="py-20 md:py-28 bg-white" x-data="{ tab: 'All', tabs: ['All','Land','Exterior','Rooms','Facilities','Construction'] }">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-wrap gap-2 justify-center mb-10">
            <template x-for="t in tabs" :key="t">
                <button @click="tab = t" :class="tab === t ? 'bg-brand-navy text-white' : 'border border-brand-navy/15 text-brand-navy'" class="px-5 py-2 text-xs uppercase tracking-widest transition" x-text="t"></button>
            </template>
        </div>
        <div class="flex gap-4 overflow-x-auto overflow-y-hidden snap-x snap-mandatory -mx-6 px-6 pb-4 sm:mx-0 sm:px-0 sm:pb-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-5 sm:overflow-visible">
            @foreach ([
                ['https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200&auto=format&fit=crop', 'Hotel Exterior'],
                ['https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop', 'Resort & Pool'],
                ['https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?q=80&w=1200&auto=format&fit=crop', 'Architecture'],
                ['https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1200&auto=format&fit=crop', 'Guest Room'],
                ['https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1200&auto=format&fit=crop', 'Suite Interior'],
                ['https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=1200&auto=format&fit=crop', 'Restaurant'],
            ] as [$src, $label])
            <figure class="reveal card-media w-[82vw] max-w-[22rem] shrink-0 snap-center sm:w-auto sm:max-w-none" style="--reveal-delay:{{ min($loop->index, 3) * 60 }}ms">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="{{ $src }}" alt="{{ $label }} — representative B7HOTEL imagery" loading="lazy" class="h-full w-full object-cover">
                </div>
                <figcaption class="flex items-center justify-between px-5 py-4 text-xs uppercase tracking-[0.18em] text-white/70">
                    <span>{{ $label }}</span><span x-text="tab" class="text-brand-gold/80"></span>
                </figcaption>
            </figure>
            @endforeach
        </div>
        <p class="sm:hidden text-center text-[11px] uppercase tracking-[0.24em] text-brand-slate/60 mt-5" aria-hidden="true">Swipe to explore</p>
        <p class="text-center text-xs text-brand-slate/60 mt-4 sm:mt-6">Replace placeholders with lazy-loaded .webp/.avif renders + lightbox.</p>
    </div>
</section>
@endsection
