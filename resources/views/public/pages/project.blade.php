@extends('public.layouts.site')
@section('title', 'Our Project | B7HOTEL')
@section('content')
<section class="band pb-16 pt-28 sm:pb-20 sm:pt-32 md:pb-28 md:pt-40 text-center px-6">
    <p class="eyebrow-light eyebrow-center">Land · Building · Progress</p>
    <h1 class="type-page-title">Our Project</h1>
    <p class="text-white/60 mt-2 text-sm">Land • Building • Architecture • Progress</p>
</section>
<section class="py-20 md:py-28 bg-white"><div class="max-w-5xl mx-auto px-6 grid md:grid-cols-2 gap-8 items-center">
    <figure class="reveal-img card-media">
        <div class="aspect-[4/3] overflow-hidden">
            <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=1600&auto=format&fit=crop" alt="Representative construction progress — final B7HOTEL site imagery to follow" loading="lazy" class="h-full w-full object-cover">
        </div>
        <figcaption class="flex items-center justify-between px-5 py-4 text-xs uppercase tracking-[0.18em] text-white/70">
            <span>Site &amp; Construction</span><span class="text-brand-gold/80">Patuakhali</span>
        </figcaption>
    </figure>
    <div class="reveal-right text-sm text-brand-slate space-y-3" style="--reveal-delay:100ms">
        @foreach (['Land Area — XX Decimal','Building Area — XX Sq. Ft.','Floors — XX','Rooms — XX','Restaurant • Conference • Banquet • Rooftop • Parking'] as $r)
        <p class="border-b border-brand-navy/5 pb-2">— {{ $r }}</p>
        @endforeach
        <p class="font-bold text-brand-navy pt-2">From Land to Landmark</p>
        <p>01 Land @include('public.partials.icon', ['name' => 'check', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) → 02 Planning @include('public.partials.icon', ['name' => 'check', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) → 03 Construction @include('public.partials.icon', ['name' => 'refresh', 'class' => 'inline h-4 w-4 text-brand-gold-deep']) → 04 Finishing → 05 Opening</p>
    </div>
</div></section>
@endsection
