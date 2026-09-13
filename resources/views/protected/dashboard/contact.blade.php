@extends('protected.layouts.dashboard')
@section('title', 'Contact | B7HOTEL Admin')
@section('nav-active', 'contact')
@section('page-title', 'Contact Page')
@section('page-subtitle', 'Edit the public /contact content — hero, form fields, trust strip and location.')

@section('content')
@php
$blocks = [
    ['label' => 'Hero', 'desc' => 'Eyebrow, h1, subcopy, breadcrumb on the dark cinematic band'],
    ['label' => 'Contact Details', 'desc' => 'Call / Email / Visit rows with icons and bordered link styling'],
    ['label' => 'Inquiry Form', 'desc' => 'Name, Email, Phone, Investment select, Shares select, Message textarea'],
    ['label' => 'Form Options', 'desc' => 'Investment tiers + share counts (1/2/3/5/10) + success state'],
    ['label' => 'Trust Strip', 'desc' => 'Secure Inquiry / Transparent Info / Professional Assistance'],
    ['label' => 'Location', 'desc' => 'Address block + Get Directions link + map placeholder'],
];
@endphp

<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div>
        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-brand-gold-deep">Public site · /contact</p>
        <h1 class="font-display text-xl font-extrabold text-brand-navy sm:text-2xl">Contact Content</h1>
        <p class="mt-1 text-sm text-brand-slate">6 editable blocks — hero through the location map.</p>
    </div>
    <a href="{{ route('site.contact') }}" target="_blank" class="btn btn-line-dark btn-sm inline-flex items-center gap-2">
        @include('public.partials.icon', ['name' => 'external-link', 'class' => 'h-4 w-4'])
        View live page
    </a>
</div>

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    @foreach ($blocks as $i => $b)
        <div class="rounded border border-brand-navy/10 bg-white p-5 transition-colors hover:border-brand-gold/40 hover:bg-brand-ivory">
            <div class="flex items-start justify-between gap-3">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded bg-brand-ivory">
                    @include('public.partials.icon', ['name' => $loop->index === 0 ? 'trend' : ($loop->index === 2 ? 'doc' : ($loop->index === 5 ? 'pin' : 'users')), 'class' => 'h-5 w-5 text-brand-gold-deep'])
                </span>
                <span class="rounded bg-brand-gold/10 px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-[0.12em] text-brand-gold-deep">0{{ $i + 1 }}</span>
            </div>
            <h3 class="mt-4 font-display text-base font-extrabold text-brand-navy">{{ $b['label'] }}</h3>
            <p class="mt-1 text-xs text-brand-slate">{{ $b['desc'] }}</p>
            <div class="mt-4">
                <button class="btn btn-gold btn-sm inline-flex items-center gap-2" onclick="alert('Editor opens for: {{ $b['label'] }}')">
                    @include('public.partials.icon', ['name' => 'cog', 'class' => 'h-4 w-4'])
                    Edit
                </button>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-6 rounded border border-dashed border-brand-navy/20 bg-brand-ivory p-6">
    <p class="text-sm font-semibold text-brand-navy">Form behaviour</p>
    <p class="mt-1 text-xs text-brand-slate">The live form uses an Alpine inquiryForm() component with client-side validation and a fake 1200 ms submit. Wire it to a real endpoint (or Livewire) when the backend is ready. All contact details — phone, email, address — are editable here.</p>
</div>
@endsection