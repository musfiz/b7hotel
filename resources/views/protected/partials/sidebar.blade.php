{{-- Dashboard sidebar: off-canvas on mobile, fixed column on desktop --}}
@php
$navMain = [
    ['key' => 'overview', 'label' => 'Overview', 'icon' => 'grid', 'href' => route('dashboard.index'), 'badge' => null],
    ['key' => 'inquiries', 'label' => 'Inquiries', 'icon' => 'mail', 'href' => '#', 'badge' => '12'],
    ['key' => 'investors', 'label' => 'Investors', 'icon' => 'users', 'href' => '#', 'badge' => null],
];
$navManage = [
    ['key' => 'shares', 'label' => 'Shares & Tiers', 'icon' => 'bank', 'href' => '#', 'badge' => null],
    ['key' => 'documents', 'label' => 'Documents', 'icon' => 'doc', 'href' => '#', 'badge' => null],
    ['key' => 'settings', 'label' => 'Settings', 'icon' => 'cog', 'href' => '#', 'badge' => null],
];
@endphp
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 flex w-[17rem] flex-col border-r border-brand-navy/10 bg-white text-brand-navy transition-transform duration-300 lg:static lg:z-auto lg:translate-x-0"
       aria-label="Dashboard navigation">
    {{-- Brand --}}
    <div class="flex h-16 items-center gap-3 border-b border-brand-navy/10 px-5">
        <span class="flex h-9 w-9 items-center justify-center rounded bg-brand-gold font-display text-sm font-extrabold text-brand-navy">B7</span>
        <span>
            <span class="block font-display text-sm font-extrabold tracking-[0.18em]">B7<span class="text-brand-gold-deep">HOTEL</span></span>
            <span class="block text-[10px] font-semibold uppercase tracking-[0.24em] text-brand-slate">Admin Panel</span>
        </span>
        <button @click="sidebarOpen = false" class="ml-auto rounded p-1.5 text-brand-slate hover:text-brand-navy lg:hidden" aria-label="Close menu">
            @include('public.partials.icon', ['name' => 'close', 'class' => 'h-5 w-5'])
        </button>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto px-3 py-5">
        <p class="px-3 pb-2 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Main</p>
        <ul class="space-y-1">
            @foreach ($navMain as $item)
                <li>
                    <a href="{{ $item['href'] }}"
                       @if ($active === $item['key']) aria-current="page" @endif
                       class="group flex items-center gap-3 rounded px-3 py-2.5 text-sm font-semibold transition-colors {{ $active === $item['key'] ? 'bg-brand-gold text-brand-navy' : 'text-brand-slate hover:bg-brand-bg hover:text-brand-navy' }}">
                        @include('public.partials.icon', ['name' => $item['icon'], 'class' => 'h-5 w-5 shrink-0 ' . ($active === $item['key'] ? 'text-brand-navy' : 'text-brand-gold-deep')])
                        <span>{{ $item['label'] }}</span>
                        @if ($item['badge'])
                            <span class="ml-auto rounded bg-brand-gold px-1.5 py-0.5 text-[10px] font-extrabold text-brand-navy">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>

        <p class="px-3 pb-2 pt-6 text-[10px] font-bold uppercase tracking-[0.24em] text-brand-slate">Manage</p>
        <ul class="space-y-1">
            @foreach ($navManage as $item)
                <li>
                    <a href="{{ $item['href'] }}"
                       class="group flex items-center gap-3 rounded px-3 py-2.5 text-sm font-semibold text-brand-slate transition-colors hover:bg-brand-bg hover:text-brand-navy">
                        @include('public.partials.icon', ['name' => $item['icon'], 'class' => 'h-5 w-5 shrink-0 text-brand-gold-deep'])
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Footer: back to site + admin + logout --}}
    <div class="border-t border-brand-navy/10 p-4">
        <a href="{{ route('site.home') }}" class="flex items-center gap-2.5 px-1 pb-4 text-xs font-semibold uppercase tracking-[0.18em] text-brand-slate transition-colors hover:text-brand-gold-deep">
            @include('public.partials.icon', ['name' => 'eye', 'class' => 'h-4 w-4'])
            View website
        </a>
        <div class="flex items-center gap-3 rounded bg-brand-bg p-3">
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-gold font-display text-xs font-extrabold text-brand-navy">A</span>
            <span class="min-w-0">
                <span class="block truncate text-sm font-bold">Admin</span>
                <span class="block truncate text-xs text-brand-slate">admin@b7hotel.com</span>
            </span>
            <a href="{{ route('login') }}" class="ml-auto rounded p-1.5 text-brand-slate transition-colors hover:text-brand-gold-deep" aria-label="Log out" title="Log out">
                @include('public.partials.icon', ['name' => 'logout', 'class' => 'h-5 w-5'])
            </a>
        </div>
    </div>
</aside>
