{{-- Dashboard topbar: sticky white bar with menu toggle, search, notifications, profile --}}
<header class="sticky top-0 z-30 flex h-16 items-center gap-3 border-b border-brand-navy/10 bg-white/90 px-4 backdrop-blur sm:px-6 lg:px-10">
    <button @click="sidebarOpen = true" class="rounded p-2 text-brand-navy hover:text-brand-gold-deep lg:hidden" aria-label="Open menu">
        @include('public.partials.icon', ['name' => 'menu', 'class' => 'h-6 w-6'])
    </button>

    <div class="min-w-0">
        <h1 class="truncate font-display text-base font-extrabold text-brand-navy sm:text-lg">@yield('page-title', 'Overview')</h1>
        <p class="hidden truncate text-xs text-brand-slate sm:block">@yield('page-subtitle', 'Welcome back — here is what is happening today.')</p>
    </div>

    <div class="ml-auto flex items-center gap-1.5 sm:gap-3">
        <label class="hidden items-center gap-2 rounded border border-brand-navy/10 bg-brand-bg px-3 py-2 md:flex">
            @include('public.partials.icon', ['name' => 'search', 'class' => 'h-4 w-4 text-brand-slate'])
            <input type="search" placeholder="Search inquiries…" class="w-40 bg-transparent text-sm text-brand-navy outline-none placeholder:text-brand-slate/70">
        </label>
        <button class="relative rounded p-2 text-brand-navy transition-colors hover:text-brand-gold-deep" aria-label="Notifications">
            @include('public.partials.icon', ['name' => 'bell', 'class' => 'h-5 w-5'])
            <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-brand-gold" aria-hidden="true"></span>
        </button>
        <span class="hidden h-6 w-px bg-brand-navy/10 sm:block" aria-hidden="true"></span>
        <span class="hidden items-center gap-2.5 sm:flex">
            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-brand-navy font-display text-xs font-extrabold text-brand-gold">A</span>
            <span class="hidden text-left xl:block">
                <span class="block text-sm font-bold leading-tight">Admin</span>
                <span class="block text-xs leading-tight text-brand-slate">Administrator</span>
            </span>
        </span>
    </div>
</header>
