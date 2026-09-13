@extends('protected.layouts.dashboard')
@section('title', 'Investment | B7HOTEL Admin')
@section('nav-active', 'investment')
@section('page-title', 'Investment Page')
@section('page-subtitle', 'Edit tiers, benefits, trust points, documents and the process flow.')

@section('content')
@php
$groups = [
    ['key' => 'tiers', 'label' => 'Investment Tiers', 'desc' => 'Starter / Premium / Executive — price, shares, ownership, benefits', 'count' => 3],
    ['key' => 'benefits', 'label' => 'Investor Benefits', 'desc' => '4 long-term value cards with icon, title, desc', 'count' => 4],
    ['key' => 'trust', 'label' => 'Trust & Transparency', 'desc' => '4 trust-point check cards + 6 document pills', 'count' => 10],
    ['key' => 'steps', 'label' => 'How It Works', 'desc' => '7-step process-rail from Explore to Confirmation', 'count' => 7],
    ['key' => 'hero', 'label' => 'Hero Band', 'desc' => 'Eyebrow, h1, subcopy and cinematic backdrop', 'count' => 1],
    ['key' => 'cta', 'label' => 'Final CTA', 'desc' => 'Dark band with image + two buttons', 'count' => 1],
    ['key' => 'disclaimer', 'label' => 'Legal Disclaimer', 'desc' => 'Centered type-small en + bn note', 'count' => 1],
];
@endphp

<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div>
        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-brand-gold-deep">Public site · /investment</p>
        <h1 class="font-display text-xl font-extrabold text-brand-navy sm:text-2xl">Investment Content</h1>
        <p class="mt-1 text-sm text-brand-slate">7 groups — tiers, benefits, trust, process, hero, CTA, disclaimer.</p>
    </div>
    <a href="{{ route('site.investment') }}" target="_blank" class="btn btn-line-dark btn-sm inline-flex items-center gap-2">
        @include('public.partials.icon', ['name' => 'external-link', 'class' => 'h-4 w-4'])
        View live page
    </a>
</div>

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    @foreach ($groups as $i => $g)
        <div class="rounded border border-brand-navy/10 bg-white p-5 transition-colors hover:border-brand-gold/40 hover:bg-brand-ivory">
            <div class="flex items-start justify-between gap-3">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded bg-brand-ivory">
                    @include('public.partials.icon', ['name' => $g['key'] === 'tiers' ? 'bank' : ($g['key'] === 'benefits' ? 'users' : ($g['key'] === 'trust' ? 'lock' : ($g['key'] === 'steps' ? 'refresh' : ($g['key'] === 'cta' ? 'trend' : 'doc')))), 'class' => 'h-5 w-5 text-brand-gold-deep'])
                </span>
                <span class="flex items-center gap-2">
                    <span class="rounded bg-brand-gold/10 px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-[0.12em] text-brand-gold-deep">{{ $g['count'] }}</span>
                    <span class="text-[10px] font-bold text-brand-slate">0{{ $i + 1 }}</span>
                </span>
            </div>
            <h3 class="mt-4 font-display text-base font-extrabold text-brand-navy">{{ $g['label'] }}</h3>
            <p class="mt-1 text-xs text-brand-slate">{{ $g['desc'] }}</p>
            <div class="mt-4">
                <button class="btn btn-gold btn-sm inline-flex items-center gap-2" onclick="alert('Editor opens for: {{ $g['label'] }}')">
                    @include('public.partials.icon', ['name' => 'cog', 'class' => 'h-4 w-4'])
                    Edit
                </button>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-6 rounded border border-dashed border-brand-navy/20 bg-brand-ivory p-6">
    <p class="text-sm font-semibold text-brand-navy">Placeholder pricing &amp; docs</p>
    <p class="mt-1 text-xs text-brand-slate">All prices, ownership %, benefits and document names are placeholders. Replace with verified B7HOTEL data from official project documents before publishing.</p>
</div>
@endsection