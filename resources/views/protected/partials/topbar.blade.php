{{-- Dashboard topbar: sticky white bar with menu toggle, search, notifications, profile dropdown --}}
<header class="sticky top-0 z-30 flex h-16 items-center gap-3 border-b border-brand-navy/10 bg-white/95 px-4 backdrop-blur sm:px-6 lg:px-10">
    <button @click="sidebarOpen = true" class="rounded-lg p-2 text-brand-navy transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep lg:hidden" aria-label="Open menu">
        @include('public.partials.icon', ['name' => 'menu', 'class' => 'h-5 w-5'])
    </button>

    {{-- Breadcrumb / Page title --}}
    <div class="min-w-0 flex-1">
        <h1 class="truncate font-display text-base font-extrabold text-brand-navy sm:text-lg">@yield('page-title', 'Overview')</h1>
        <p class="hidden truncate text-xs text-brand-slate sm:block">@yield('page-subtitle', 'Welcome back — here is what is happening today.')</p>
    </div>

    {{-- Right side actions --}}
    <div class="flex items-center gap-2 sm:gap-3"
         x-data="{
             searchOpen: false,
             notificationsOpen: false,
             profileOpen: false
         }"
         @click.outside="notificationsOpen = false; profileOpen = false; searchOpen = false;">

        {{-- Search - Mobile toggle --}}
        <button
            @click="searchOpen = !searchOpen; notificationsOpen = false; profileOpen = false"
            class="rounded-lg p-2 text-brand-slate transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep md:hidden"
            aria-label="Toggle search">
            @include('public.partials.icon', ['name' => 'search', 'class' => 'h-5 w-5'])
        </button>

        {{-- Search - Desktop --}}
        <label class="hidden items-center gap-2 rounded-lg border border-brand-navy/10 bg-brand-bg px-3 py-2 transition-colors focus-within:border-brand-gold/50 focus-within:ring-2 focus-within:ring-brand-gold/20 md:flex">
            @include('public.partials.icon', ['name' => 'search', 'class' => 'h-4 w-4 text-brand-slate'])
            <input type="search" placeholder="Search..." class="w-48 bg-transparent text-sm text-brand-navy outline-none placeholder:text-brand-slate/70">
        </label>

        {{-- Mobile search panel --}}
        <div x-show="searchOpen" x-transition
             class="absolute inset-x-4 top-14 z-40 rounded-lg border border-brand-navy/10 bg-white p-3 shadow-lg md:hidden">
            <label class="flex items-center gap-2 rounded-lg border border-brand-navy/10 bg-brand-bg px-3 py-2">
                @include('public.partials.icon', ['name' => 'search', 'class' => 'h-4 w-4 text-brand-slate'])
                <input type="search" placeholder="Search..." class="w-full bg-transparent text-sm text-brand-navy outline-none placeholder:text-brand-slate/70">
            </label>
        </div>

        {{-- Notifications --}}
        <div class="relative">
            <button
                @click="notificationsOpen = !notificationsOpen; profileOpen = false; searchOpen = false"
                class="relative rounded-lg p-2 text-brand-slate transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep"
                aria-label="Notifications">
                @include('public.partials.icon', ['name' => 'bell', 'class' => 'h-5 w-5'])
                <span class="absolute right-1.5 top-1.5 h-2.5 w-2.5 rounded-full bg-brand-gold ring-2 ring-white" aria-hidden="true"></span>
            </button>

            {{-- Notifications dropdown --}}
            <div x-show="notificationsOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                 class="absolute right-0 mt-2 w-80 origin-top-right rounded-xl border border-brand-navy/10 bg-white shadow-2xl focus:outline-none">
                <div class="flex items-center justify-between border-b border-brand-navy/10 px-4 py-3">
                    <h3 class="text-sm font-bold text-brand-navy">Notifications</h3>
                    <span class="rounded bg-brand-gold/10 px-2 py-0.5 text-xs font-semibold text-brand-gold-deep">12 new</span>
                </div>
                <div class="max-h-80 overflow-y-auto">
                    <a href="#" class="flex items-start gap-3 border-b border-brand-navy/5 px-4 py-3 transition-colors hover:bg-brand-gold/5">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-gold/10">
                            @include('public.partials.icon', ['name' => 'mail', 'class' => 'h-4 w-4 text-brand-gold-deep'])
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-brand-navy">New inquiry received</p>
                            <p class="mt-0.5 truncate text-xs text-brand-slate">John Doe submitted an inquiry about Suite A</p>
                            <p class="mt-1 text-xs text-brand-slate/70">2 minutes ago</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-start gap-3 border-b border-brand-navy/5 px-4 py-3 transition-colors hover:bg-brand-gold/5">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-gold/10">
                            @include('public.partials.icon', ['name' => 'users', 'class' => 'h-4 w-4 text-brand-gold-deep'])
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-brand-navy">New investor registered</p>
                            <p class="mt-0.5 truncate text-xs text-brand-slate">Sarah Smith purchased 5 shares</p>
                            <p class="mt-1 text-xs text-brand-slate/70">1 hour ago</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-start gap-3 px-4 py-3 transition-colors hover:bg-brand-gold/5">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-gold/10">
                            @include('public.partials.icon', ['name' => 'doc', 'class' => 'h-4 w-4 text-brand-gold-deep'])
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-brand-navy">Document updated</p>
                            <p class="mt-0.5 truncate text-xs text-brand-slate">Annual report 2024 has been uploaded</p>
                            <p class="mt-1 text-xs text-brand-slate/70">3 hours ago</p>
                        </div>
                    </a>
                </div>
                <div class="border-t border-brand-navy/10 px-4 py-2">
                    <a href="#" class="block text-center text-xs font-semibold uppercase tracking-[0.15em] text-brand-gold-deep hover:text-brand-gold">View all</a>
                </div>
            </div>
        </div>

        {{-- Profile dropdown --}}
        <div class="relative">
            <button
                @click="profileOpen = !profileOpen; notificationsOpen = false; searchOpen = false"
                class="flex cursor-pointer items-center gap-2 rounded-lg p-1.5 transition-colors hover:bg-brand-gold/10"
                aria-label="User menu">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-brand-gold to-brand-gold-deep font-display text-xs font-extrabold text-white">A</span>
                <span class="hidden flex-col text-left sm:flex">
                    <span class="text-sm font-bold text-brand-navy">Admin</span>
                    <span class="text-[10px] text-brand-slate">admin@b7hotel.com</span>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="hidden h-4 w-4 text-brand-slate transition-transform duration-200 sm:block" :class="profileOpen ? 'rotate-180' : ''" aria-hidden="true"><path d="M5 8l7 7 7-7"/></svg>
            </button>

            {{-- Profile dropdown menu --}}
            <div x-show="profileOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                 class="absolute right-0 mt-2 w-64 origin-top-right rounded-xl border border-brand-navy/10 bg-white shadow-2xl focus:outline-none">
                <div class="border-b border-brand-navy/10 px-4 py-3">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-brand-gold to-brand-gold-deep font-display text-sm font-extrabold text-white">A</span>
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-brand-navy">Admin</p>
                            <p class="truncate text-xs text-brand-slate">admin@b7hotel.com</p>
                            <p class="mt-0.5 flex items-center gap-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-brand-gold-deep">
                                @include('public.partials.icon', ['name' => 'pin', 'class' => 'h-3 w-3 shrink-0'])
                                B7HOTEL · Dashboard
                            </p>
                        </div>
                    </div>
                </div>
                <div class="py-2">
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-brand-slate transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep">
                        @include('public.partials.icon', ['name' => 'user', 'class' => 'h-4 w-4'])
                        Profile
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-brand-slate transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep">
                        @include('public.partials.icon', ['name' => 'cog', 'class' => 'h-4 w-4'])
                        Settings
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-brand-slate transition-colors hover:bg-brand-gold/10 hover:text-brand-gold-deep">
                        @include('public.partials.icon', ['name' => 'help', 'class' => 'h-4 w-4'])
                        Help & Support
                    </a>
                </div>
                <div class="border-t border-brand-navy/10 py-2">
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm text-red-600 transition-colors hover:bg-red-50">
                            @include('public.partials.icon', ['name' => 'logout', 'class' => 'h-4 w-4'])
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
