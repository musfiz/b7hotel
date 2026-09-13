{{-- Dashboard sidebar: off-canvas on mobile, fixed column on desktop with dropdowns --}}
@php
$navMain = [
    ['key' => 'overview', 'label' => 'Dashboard', 'icon' => 'grid', 'href' => route('dashboard.index'), 'badge' => null],
];
$navManage = [
    ['key' => 'inquiries', 'label' => 'Inquiries', 'icon' => 'mail', 'href' => '#', 'badge' => '12'],
    ['key' => 'investors', 'label' => 'Investors', 'icon' => 'users', 'href' => '#', 'badge' => null],
];
$navShares = [
    ['key' => 'shares', 'label' => 'Shares & Tiers', 'icon' => 'bank', 'href' => '#', 'badge' => null],
    ['key' => 'documents', 'label' => 'Documents', 'icon' => 'doc', 'href' => '#', 'badge' => null],
];
$navSettings = [
    ['key' => 'settings', 'label' => 'Settings', 'icon' => 'cog', 'href' => '#', 'badge' => null],
    ['key' => 'reports', 'label' => 'Reports', 'icon' => 'chart', 'href' => '#', 'badge' => null],
];
@endphp
<aside
    x-data="{
        openSite: false,
        openInquiries: false,
        openShares: false,
        openSettings: false
    }"
    @click.outside="openSite = false; openInquiries = false; openShares = false; openSettings = false"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 flex w-[18rem] flex-col border-r border-brand-navy/10 bg-white text-brand-navy transition-transform duration-300 lg:static lg:z-auto lg:translate-x-0"
    aria-label="Dashboard navigation">

    {{-- Brand --}}
    <div class="flex h-16 items-center gap-3 border-b border-brand-navy/10 px-5">
        <span class="flex h-9 w-9 items-center justify-center rounded bg-brand-gold font-display text-sm font-extrabold text-white">B7</span>
        <span class="min-w-0">
            <span class="block font-display text-sm font-extrabold tracking-[0.18em] truncate">B7<span class="text-brand-gold-deep">HOTEL</span></span>
            <span class="block text-[10px] font-semibold uppercase tracking-[0.24em] text-brand-slate">Admin Panel</span>
        </span>
        <button @click="sidebarOpen = false" class="ml-auto rounded p-1.5 text-brand-slate hover:text-brand-navy lg:hidden" aria-label="Close menu">
            @include('public.partials.icon', ['name' => 'close', 'class' => 'h-5 w-5'])
        </button>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto px-2.5 py-3">
        {{-- Main Section --}}
        <p class="px-2.5 pb-1.5 pt-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Main</p>
        <ul class="space-y-0.5">
            @foreach ($navMain as $item)
                <li>
                    <a href="{{ $item['href'] }}"
                       @if ($active === $item['key']) aria-current="page" @endif
                       class="group flex cursor-pointer items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold transition-colors {{ $active === $item['key'] ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-navy' }}">
                        @include('public.partials.icon', ['name' => $item['icon'], 'class' => 'h-5 w-5 shrink-0 ' . ($active === $item['key'] ? 'text-brand-gold-deep' : 'text-brand-gold-deep/70')])
                        <span class="flex-1">{{ $item['label'] }}</span>
                        @if ($item['badge'])
                            <span class="ml-auto rounded bg-brand-gold px-1.5 py-0.5 text-[10px] font-extrabold text-white">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Site Management Dropdown --}}
        <div class="mt-3">
            <p class="px-2.5 pb-1.5 pt-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Site Management</p>
            <button
                @click="openSite = !openSite"
                class="group flex cursor-pointer w-full items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                @include('public.partials.icon', ['name' => 'browser', 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep/70'])
                <span class="flex-1 text-left">Public Site</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-brand-slate transition-transform duration-200" :class="openSite ? 'rotate-180' : ''" aria-hidden="true"><path d="M5 8l7 7 7-7"/></svg>
            </button>
            <ul x-show="openSite" x-collapse class="mt-0.5 space-y-0.5 pl-4">
                <li>
                    <a href="{{ route('dashboard.about') }}" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs font-semibold transition-colors {{ $active === 'about' ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-gold-deep' }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $active === 'about' ? 'bg-brand-gold-deep' : 'bg-brand-gold/50' }}"></span>
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.project') }}" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs font-semibold transition-colors {{ $active === 'project' ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-gold-deep' }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $active === 'project' ? 'bg-brand-gold-deep' : 'bg-brand-gold/50' }}"></span>
                        Project
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.investment') }}" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs font-semibold transition-colors {{ $active === 'investment' ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-gold-deep' }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $active === 'investment' ? 'bg-brand-gold-deep' : 'bg-brand-gold/50' }}"></span>
                        Investment
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.gallery') }}" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs font-semibold transition-colors {{ $active === 'gallery' ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-gold-deep' }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $active === 'gallery' ? 'bg-brand-gold-deep' : 'bg-brand-gold/50' }}"></span>
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.contact') }}" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs font-semibold transition-colors {{ $active === 'contact' ? 'bg-brand-gold/10 text-brand-gold-deep' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-gold-deep' }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $active === 'contact' ? 'bg-brand-gold-deep' : 'bg-brand-gold/50' }}"></span>
                        Contact
                    </a>
                </li>
            </ul>
        </div>

        {{-- Inquiries Dropdown --}}
        <div class="mt-3">
            <p class="px-2.5 pb-1.5 pt-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Inquiries & Investors</p>
            <button
                @click="openInquiries = !openInquiries"
                class="group flex cursor-pointer w-full items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                @include('public.partials.icon', ['name' => 'mail', 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep/70'])
                <span class="flex-1 text-left">Inquiries</span>
                <span x-show="!openInquiries" class="rounded bg-brand-gold/10 px-1.5 py-0.5 text-[10px] font-extrabold text-brand-gold-deep">12</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-brand-slate transition-transform duration-200" :class="openInquiries ? 'rotate-180' : ''" aria-hidden="true"><path d="M5 8l7 7 7-7"/></svg>
            </button>
            <ul x-show="openInquiries" x-collapse class="mt-0.5 space-y-0.5 pl-4">
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        All Inquiries
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Pending
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Resolved
                    </a>
                </li>
            </ul>
        </div>

        {{-- Investors --}}
        <ul class="mt-2 space-y-0.5">
            <li>
                <a href="#" class="group flex cursor-pointer items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                    @include('public.partials.icon', ['name' => 'users', 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep/70'])
                    <span class="flex-1">Investors</span>
                    @include('public.partials.icon', ['name' => 'chevron-right', 'class' => 'h-4 w-4 shrink-0 text-brand-slate/60 transition-all duration-200 group-hover:translate-x-0.5 group-hover:text-brand-gold-deep'])
                </a>
            </li>
        </ul>

        {{-- Shares & Documents Dropdown --}}
        <div class="mt-3">
            <p class="px-2.5 pb-1.5 pt-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Shares & Documents</p>
            <button
                @click="openShares = !openShares"
                class="group flex cursor-pointer w-full items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                @include('public.partials.icon', ['name' => 'bank', 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep/70'])
                <span class="flex-1 text-left">Shares & Tiers</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-brand-slate transition-transform duration-200" :class="openShares ? 'rotate-180' : ''" aria-hidden="true"><path d="M5 8l7 7 7-7"/></svg>
            </button>
            <ul x-show="openShares" x-collapse class="mt-0.5 space-y-0.5 pl-4">
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Share Tiers
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Documents
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Certificates
                    </a>
                </li>
            </ul>
        </div>

        {{-- Settings Dropdown --}}
        <div class="mt-3">
            <p class="px-2.5 pb-1.5 pt-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">System</p>
            <button
                @click="openSettings = !openSettings"
                class="group flex cursor-pointer w-full items-center gap-3 rounded px-2.5 py-2 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                @include('public.partials.icon', ['name' => 'cog', 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep/70'])
                <span class="flex-1 text-left">Settings</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-brand-slate transition-transform duration-200" :class="openSettings ? 'rotate-180' : ''" aria-hidden="true"><path d="M5 8l7 7 7-7"/></svg>
            </button>
            <ul x-show="openSettings" x-collapse class="mt-0.5 space-y-0.5 pl-4">
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        General Settings
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        Reports
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded px-2.5 py-1.5 text-xs text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-gold-deep">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-gold/50"></span>
                        User Management
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
