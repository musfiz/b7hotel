@extends('protected.layouts.dashboard')
@section('title', 'About | B7HOTEL Admin')
@section('nav-active', 'about')
@section('page-title', 'About Page')
@section('page-subtitle', 'Edit the public /about content — vision, mission and company story.')

@section('content')
@php
$blocks = [
    ['label' => 'Hero Band', 'desc' => 'Eyebrow, page title and Bengali subtitle'],
    ['label' => 'Intro Paragraph', 'desc' => 'Who B7HOTEL is — plain text, rendered first'],
    ['label' => 'Vision', 'desc' => 'Long-term vision statement'],
    ['label' => 'Mission', 'desc' => 'Core mission bullets'],
    ['label' => 'Values', 'desc' => 'Company values / principles'],
    ['label' => 'Team', 'desc' => 'Leadership profiles (optional)'],
];
@endphp

<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div>
        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-brand-gold-deep">Public site · /about</p>
        <h1 class="font-display text-xl font-extrabold text-brand-navy sm:text-2xl">About Content</h1>
        <p class="mt-1 text-sm text-brand-slate">6 editable blocks — hero through team.</p>
    </div>
    <a href="{{ route('site.about') }}" target="_blank" class="btn btn-line-dark btn-sm inline-flex items-center gap-2">
        @include('public.partials.icon', ['name' => 'external-link', 'class' => 'h-4 w-4'])
        View live page
    </a>
</div>

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    @foreach ($blocks as $i => $b)
        <div class="rounded border border-brand-navy/10 bg-white p-5 transition-colors hover:border-brand-gold/40 hover:bg-brand-ivory">
            <div class="flex items-start justify-between gap-3">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded bg-brand-ivory">
                    @include('public.partials.icon', ['name' => $loop->index === 0 ? 'trend' : ($loop->index < 3 ? 'doc' : 'users'), 'class' => 'h-5 w-5 text-brand-gold-deep'])
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
@endsection