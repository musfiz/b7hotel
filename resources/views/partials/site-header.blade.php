<div x-data="{
    scrolled: false,
    mobileOpen: false,
    searchOpen: false,
    query: '',
    pages: [
        { name: 'Home', bn: 'হোম', url: '{{ route('site.home') }}', keys: 'home hotel b7hotel হোম' },
        { name: 'About Us', bn: 'আমাদের সম্পর্কে', url: '{{ route('site.about') }}', keys: 'about company vision mission সম্পর্কে' },
        { name: 'Our Project', bn: 'আমাদের প্রকল্প', url: '{{ route('site.project') }}', keys: 'project land building rooms প্রকল্প' },
        { name: 'Investment', bn: 'বিনিয়োগ', url: '{{ route('site.investment') }}', keys: 'investment share package calculator বিনিয়োগ শেয়ার' },
        { name: 'Shareholders', bn: 'শেয়ারহোল্ডার', url: '{{ route('site.shareholders') }}', keys: 'shareholder owner list শেয়ারহোল্ডার' },
        { name: 'Gallery', bn: 'গ্যালারি', url: '{{ route('site.gallery') }}', keys: 'gallery photos images গ্যালারি ছবি' },
        { name: 'Contact Us', bn: 'যোগাযোগ', url: '{{ route('site.contact') }}', keys: 'contact phone email address যোগাযোগ' },
    ],
    get results() {
        if (!this.query.trim()) return [];
        const q = this.query.toLowerCase();
        return this.pages.filter(p => (p.name + ' ' + p.bn + ' ' + p.keys).toLowerCase().includes(q)).slice(0, 6);
    }
}" @scroll.window="scrolled = (window.pageYOffset > 24)">

    {{-- Top info bar --}}
    <div class="bg-brand-navy text-white/70 text-xs hidden md:block border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-2 flex justify-between items-center">
            <p class="tracking-wide">Patuakhali, Bangladesh &nbsp;•&nbsp; Premium Hospitality + Land Share Investment</p>
            <div class="flex items-center gap-5">
                <a href="tel:01XXXXXXXXX" class="hover:text-brand-gold transition">Call: 01XXXXXXXXX</a>
                <a href="mailto:info@b7hotel.com" class="hover:text-brand-gold transition">info@b7hotel.com</a>
                <div class="font-semibold bg-white/5 px-2.5 py-0.5 border border-white/10">
                    <button type="button" @click="$store.lang.set('en')" :class="$store.lang.current === 'en' ? 'text-brand-gold' : 'text-white/50'">EN</button>
                    <span class="text-white/20 mx-1">|</span>
                    <button type="button" @click="$store.lang.set('bn')" :class="$store.lang.current === 'bn' ? 'text-brand-gold' : 'text-white/50'">বাংলা</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Main header --}}
    <header :class="scrolled ? 'bg-brand-navy/95 backdrop-blur-md shadow-lg' : 'bg-brand-navy'"
        class="sticky top-0 z-50 transition-all duration-300 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between gap-4" :class="scrolled ? 'py-3' : 'py-4'">

            {{-- Logo --}}
            <a href="{{ route('site.home') }}" class="flex items-center gap-3 shrink-0">
                <span class="w-10 h-10 bg-brand-gold text-brand-navy flex items-center justify-center font-extrabold text-lg tracking-tight">B7</span>
                <span class="leading-tight">
                    <span class="block text-white text-xl font-bold tracking-widest">B7HOTEL</span>
                    <span class="block text-brand-gold text-[10px] uppercase tracking-[0.3em]">Patuakhali • Investment</span>
                </span>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden lg:flex items-center gap-7 text-[13px] uppercase tracking-widest text-white/80 font-medium">
                <a href="{{ route('site.home') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.home') ? 'text-brand-gold' : '' }}">Home</a>
                <a href="{{ route('site.about') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.about') ? 'text-brand-gold' : '' }}">About</a>
                <a href="{{ route('site.project') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.project') ? 'text-brand-gold' : '' }}">Project</a>
                <a href="{{ route('site.investment') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.investment') ? 'text-brand-gold' : '' }}">Investment</a>
                <a href="{{ route('site.shareholders') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.shareholders') ? 'text-brand-gold' : '' }}">Shareholders</a>
                <a href="{{ route('site.gallery') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.gallery') ? 'text-brand-gold' : '' }}">Gallery</a>
                <a href="{{ route('site.contact') }}" class="hover:text-brand-gold transition {{ request()->routeIs('site.contact') ? 'text-brand-gold' : '' }}">Contact</a>
            </nav>

            {{-- Right controls --}}
            <div class="flex items-center gap-3">
                {{-- Search toggle --}}
                <button type="button" @click="searchOpen = !searchOpen" aria-label="Search"
                    class="w-10 h-10 border border-white/15 text-white/80 hover:text-brand-gold hover:border-brand-gold flex items-center justify-center transition">
                    <svg x-show="!searchOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3" stroke-linecap="round"/></svg>
                    <svg x-show="searchOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12" stroke-linecap="round"/></svg>
                </button>

                <a href="{{ route('site.investment') }}" class="hidden sm:inline-block bg-brand-gold text-brand-navy px-5 py-2.5 text-xs font-bold uppercase tracking-widest hover:bg-white transition">Invest Now</a>

                {{-- Hamburger --}}
                <button type="button" @click="mobileOpen = !mobileOpen" aria-label="Menu" class="lg:hidden w-10 h-10 border border-white/15 text-white flex items-center justify-center">
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
                    <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12" stroke-linecap="round"/></svg>
                </button>
            </div>
        </div>

        {{-- Expanding search bar --}}
        <div x-show="searchOpen" x-cloak class="border-t border-white/10 bg-brand-navy/95 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-6 py-4 relative">
                <input x-model="query" type="search" placeholder="Search pages — e.g. investment, শেয়ার, gallery…"
                    class="w-full bg-white/5 border border-white/15 text-white placeholder-white/40 px-4 py-3 text-sm outline-none focus:border-brand-gold">
                <div x-show="query.trim()" class="absolute left-6 right-6 top-full bg-white shadow-xl border border-brand-navy/10 z-50">
                    <template x-for="p in results" :key="p.url">
                        <a :href="p.url" class="flex justify-between items-center px-4 py-3 text-sm hover:bg-brand-ivory border-b border-brand-navy/5">
                            <span class="font-medium text-brand-navy" x-text="p.name"></span>
                            <span class="text-brand-slate text-xs font-bengali" x-text="p.bn"></span>
                        </a>
                    </template>
                    <p x-show="results.length === 0" class="px-4 py-3 text-sm text-brand-slate">No matching pages found.</p>
                </div>
            </div>
        </div>

        {{-- Mobile nav --}}
        <div x-show="mobileOpen" x-cloak class="lg:hidden border-t border-white/10 bg-brand-navy">
            <nav class="px-6 py-4 grid gap-1 text-sm uppercase tracking-widest text-white/85 font-medium">
                @foreach([['site.home','Home'],['site.about','About Us'],['site.project','Our Project'],['site.investment','Investment'],['site.shareholders','Shareholders'],['site.gallery','Gallery'],['site.contact','Contact Us']] as [$r,$label])
                    <a href="{{ route($r) }}" class="py-2.5 border-b border-white/5 hover:text-brand-gold {{ request()->routeIs($r) ? 'text-brand-gold' : '' }}">{{ $label }}</a>
                @endforeach
                <div class="flex items-center gap-3 pt-3 text-xs">
                    <span class="text-white/50 uppercase tracking-widest">Language:</span>
                    <button type="button" @click="$store.lang.set('en')" :class="$store.lang.current === 'en' ? 'text-brand-gold' : 'text-white/50'" class="font-bold">EN</button>
                    <button type="button" @click="$store.lang.set('bn')" :class="$store.lang.current === 'bn' ? 'text-brand-gold' : 'text-white/50'" class="font-bold">বাংলা</button>
                </div>
            </nav>
        </div>
    </header>
</div>
