{{-- Sticky premium header: logo + search + nav + EN|বাংলা + Invest (docs §5) --}}
<header
    x-data="{
        scrolled: false,
        mobileOpen: false,
        searchOpen: false,
        query: '',
        links: [
            { label_en: 'Home', label_bn: 'হোম', href: '/' },
            { label_en: 'About', label_bn: 'পরিচিতি', href: '/about' },
            { label_en: 'Our Project', label_bn: 'প্রকল্প', href: '/project' },
            { label_en: 'Investment', label_bn: 'বিনিয়োগ', href: '/investment' },
            { label_en: 'Gallery', label_bn: 'গ্যালারি', href: '/gallery' },
            { label_en: 'Contact', label_bn: 'যোগাযোগ', href: '/contact' },
            { label_en: 'Docs', label_bn: 'ডকস', href: '/docs' },
        ],
        get results() {
            if (!this.query) return this.links;
            const q = this.query.toLowerCase();
            return this.links.filter(l => l.label_en.toLowerCase().includes(q) || l.label_bn.includes(this.query));
        }
    }"
    @scroll.window="scrolled = (window.pageYOffset > 24)"
    :class="scrolled || mobileOpen
        ? 'bg-brand-navy-deep/85 backdrop-blur-xl border-white/10 py-2.5 shadow-[0_12px_36px_-16px_rgb(0_0_0/0.65)]'
        : 'bg-transparent border-transparent py-4'"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 border-b"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 flex items-center justify-between gap-4">
        {{-- Logo --}}
        <a href="/" class="font-display text-[1.35rem] font-bold tracking-[0.12em] text-white shrink-0" aria-label="B7HOTEL home">
            B7<span class="text-brand-gold">HOTEL</span>
        </a>

        {{-- Desktop navbar (xl+: room for links + Call + Invest) --}}
        <nav class="hidden xl:flex items-center space-x-7 text-[13px] uppercase tracking-widest text-white/80" aria-label="Primary">
            <a href="/about" class="nav-link{{ request()->is('about') ? ' is-active' : '' }}" @if(request()->is('about')) aria-current="page" @endif>
                <span x-show="$store.lang.current === 'en'">About</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">পরিচিতি</span>
            </a>
            <a href="/project" class="nav-link{{ request()->is('project') ? ' is-active' : '' }}" @if(request()->is('project')) aria-current="page" @endif>
                <span x-show="$store.lang.current === 'en'">Our Project</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">প্রকল্প</span>
            </a>
            <a href="/investment" class="nav-link{{ request()->is('investment') ? ' is-active' : '' }}" @if(request()->is('investment')) aria-current="page" @endif>
                <span x-show="$store.lang.current === 'en'">Investment</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগ</span>
            </a>
            <a href="/gallery" class="nav-link{{ request()->is('gallery') ? ' is-active' : '' }}" @if(request()->is('gallery')) aria-current="page" @endif>
                <span x-show="$store.lang.current === 'en'">Gallery</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">গ্যালারি</span>
            </a>
            <a href="/contact" class="nav-link{{ request()->is('contact') ? ' is-active' : '' }}" @if(request()->is('contact')) aria-current="page" @endif>
                <span x-show="$store.lang.current === 'en'">Contact</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">যোগাযোগ</span>
            </a>
        </nav>

        {{-- Right controls --}}
        <div class="flex items-center gap-1 sm:gap-2 xl:gap-3">
            {{-- Search (sm+: hidden on phones — links reachable via menu) --}}
            <div class="relative hidden sm:block">
                <button @click="searchOpen = !searchOpen" class="flex h-11 w-11 items-center justify-center text-white/80 hover:text-brand-gold transition" aria-label="Search" :aria-expanded="searchOpen">
                    @include('public.partials.icon', ['name' => 'search', 'class' => 'h-5 w-5'])
                </button>
                <div x-show="searchOpen" x-cloak @click.outside="searchOpen = false"
                      class="absolute right-0 top-12 w-[min(18rem,calc(100vw-2.5rem))] bg-white shadow-xl border border-brand-navy/10 p-3">
                    <input x-model="query" type="search" placeholder="Search pages… / পেজ খুঁজুন…"
                            class="field !min-h-[3rem]">
                    <ul class="mt-2 divide-y divide-brand-navy/5 max-h-56 overflow-auto">
                        <template x-for="l in results" :key="l.href">
                            <li>
                                <a :href="l.href" class="flex min-h-[44px] items-center justify-between gap-3 px-2 py-2.5 text-sm hover:bg-brand-bg">
                                    <span x-text="$store.lang.current === 'en' ? l.label_en : l.label_bn"></span>
                                    <span class="text-brand-slate/50 text-xs" x-text="l.href"></span>
                                </a>
                            </li>
                        </template>
                        <li x-show="results.length === 0" class="px-2 py-3 text-sm text-brand-slate">No matches.</li>
                    </ul>
                </div>
            </div>

            {{-- Language switcher (sm+: phones use the menu row) --}}
            <div class="hidden sm:flex h-11 items-center text-sm font-semibold text-white/90 bg-white/5 px-3 border border-white/10 whitespace-nowrap" role="group" aria-label="Language">
                <button @click="$store.lang.set('en')" :class="$store.lang.current === 'en' ? 'text-brand-gold' : 'text-white/50'" class="min-h-[44px] px-1 transition">EN</button>
                <span class="text-white/20 mx-1">|</span>
                <button @click="$store.lang.set('bn')" :class="$store.lang.current === 'bn' ? 'text-brand-gold' : 'text-white/50'" class="min-h-[44px] px-1 transition font-bengali">বাংলা</button>
            </div>

            {{-- Call Now (md+: ghost w/ phone icon, calm next to gold CTA) --}}
            <a href="tel:01XXXXXXXXX" class="btn btn-line-light btn-sm hidden md:inline-flex">
                @include('public.partials.icon', ['name' => 'phone', 'class' => 'h-4 w-4'])
                <span x-show="$store.lang.current === 'en'">Call Now</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">কল করুন</span>
            </a>

            {{-- Invest Now: always visible — compact label on phones --}}
            <a href="/investment#calculator" class="btn btn-gold btn-sm inline-flex">
                <span class="sm:hidden">Invest</span>
                <span class="hidden sm:inline" x-show="$store.lang.current === 'en'">Invest Now</span>
                <span class="hidden sm:inline font-bengali" x-show="$store.lang.current === 'bn'">বিনিয়োগ করুন</span>
            </a>

            {{-- Hamburger (below xl) --}}
            <button @click="mobileOpen = !mobileOpen" class="flex h-11 w-11 items-center justify-center text-white xl:hidden" aria-label="Menu" :aria-expanded="mobileOpen">
                <span x-show="!mobileOpen">@include('public.partials.icon', ['name' => 'menu', 'class' => 'h-6 w-6'])</span>
                <span x-show="mobileOpen" x-cloak>@include('public.partials.icon', ['name' => 'close', 'class' => 'h-6 w-6'])</span>
            </button>
        </div>
    </div>

    {{-- Mobile nav: full-height sheet, thumb-sized rows, momentum scroll --}}
    <div x-show="mobileOpen" x-cloak class="xl:hidden bg-brand-navy border-t border-white/10">
        <nav class="max-h-[calc(100dvh-68px)] overflow-y-auto px-6 pt-2 pb-[calc(1.5rem+env(safe-area-inset-bottom))]" aria-label="Mobile">
            {{-- Language (phones: switcher lives here, not in the bar) --}}
            <div class="sm:hidden flex items-center justify-between py-3 border-b border-white/5" role="group" aria-label="Language">
                <span class="text-[11px] font-bold uppercase tracking-[0.24em] text-white/40">Language / ভাষা</span>
                <span class="text-sm font-semibold">
                    <button @click="$store.lang.set('en')" :class="$store.lang.current === 'en' ? 'text-brand-gold' : 'text-white/50'" class="min-h-[44px] px-2">EN</button>
                    <span class="text-white/20">|</span>
                    <button @click="$store.lang.set('bn')" :class="$store.lang.current === 'bn' ? 'text-brand-gold' : 'text-white/50'" class="min-h-[44px] px-2 font-bengali">বাংলা</button>
                </span>
            </div>
            <template x-for="l in links" :key="l.href">
                <a :href="l.href" @click="mobileOpen = false" :class="window.location.pathname === l.href ? 'text-brand-gold' : ''" class="flex min-h-[52px] items-center border-b border-white/5 text-sm uppercase tracking-[0.18em] text-white/85 active:text-brand-gold" x-text="$store.lang.current === 'en' ? l.label_en : l.label_bn"></a>
            </template>
            <a href="/investment#calculator" class="btn btn-gold w-full mt-5">Invest</a>
            <a href="tel:01XXXXXXXXX" class="btn btn-line-light w-full mt-3">Call Advisor</a>
        </nav>
    </div>
</header>
