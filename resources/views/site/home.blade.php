<x-layouts::site title="B7HOTEL | Premium Hotel & Land Share Investment in Patuakhali">

    @include('partials.hero-slider')

    {{-- Stats --}}
    <section class="py-16 bg-white border-b border-brand-navy/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-light uppercase tracking-wide">
                    <span x-show="$store.lang.current === 'en'">B7HOTEL at a Glance</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">এক নজরে B7HOTEL</span>
                </h2>
                <div class="w-16 h-0.5 bg-brand-gold mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">
                @foreach([['Total Land','XX Decimal'],['Total Shares','XX Shares'],['Hotel Rooms','XX Rooms'],['Project Area','XX Sq. Ft.'],['Investment From','৳ XX,XXX'],['Location','Patuakhali']] as [$label,$value])
                    <div class="p-6 bg-brand-bg border border-brand-navy/5 text-center hover:border-brand-gold/50 hover:shadow-lg transition">
                        <span class="text-[11px] uppercase tracking-widest text-brand-slate block mb-2 font-semibold">{{ $label }}</span>
                        <span class="text-lg font-bold block {{ $label === 'Investment From' ? 'text-brand-gold' : 'text-brand-navy' }}">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
            <p class="text-center text-xs text-brand-slate/70 italic mt-6">Figures are placeholders until verified project documents are published.</p>
        </div>
    </section>

    {{-- Why B7HOTEL --}}
    <section class="py-20 bg-brand-ivory">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Why B7HOTEL?</span>
                <h2 class="mt-3 text-3xl md:text-4xl font-light leading-tight">
                    <span x-show="$store.lang.current === 'en'">One investment, <span class="font-semibold">multiple possibilities.</span></span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">একটি বিনিয়োগ, <span class="font-semibold">একাধিক সম্ভাবনা।</span></span>
                </h2>
                <p class="mt-5 text-brand-slate leading-relaxed">B7HOTEL combines hospitality business potential with land ownership through a structured, documented investment model — designed for long-term asset thinking, not speculation.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('site.about') }}" class="bg-brand-navy text-white px-7 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-gold hover:text-brand-navy transition">About Us</a>
                    <a href="{{ route('site.investment') }}" class="border border-brand-navy/20 px-7 py-3 text-xs font-bold uppercase tracking-widest hover:border-brand-gold hover:text-brand-gold transition">Investment Model</a>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                @foreach([['Land Ownership','জমির মালিকানার অংশ'],['Hospitality Business','হোটেল ব্যবসায় অংশগ্রহণ'],['Strategic Location','কৌশলগত অবস্থান'],['Professional Management','পেশাদার ব্যবস্থাপনা']] as [$en,$bn])
                    <div class="bg-white p-6 border border-brand-navy/10 hover:border-brand-gold hover:shadow-xl transition">
                        <span class="w-10 h-10 bg-brand-navy text-brand-gold flex items-center justify-center font-bold">◆</span>
                        <h3 class="mt-4 font-semibold">{{ $en }}</h3>
                        <p class="text-sm text-brand-slate font-bengali mt-1">{{ $bn }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Project preview + packages --}}
    <section class="py-20 bg-brand-navy text-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <span class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">The Project</span>
                <h2 class="mt-3 text-3xl font-light">A planned modern <span class="font-semibold text-brand-gold">Hotel & Hospitality Project.</span></h2>
                <p class="mt-4 text-white/60 text-sm leading-relaxed">Land area, building plan, rooms, restaurant, conference and parking — full details on the project page.</p>
                <a href="{{ route('site.project') }}" class="inline-block mt-6 border border-brand-gold text-brand-gold px-7 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-gold hover:text-brand-navy transition">View Project Details →</a>
            </div>
            @foreach([['Starter','1 Share','৳ XX,XXX',false],['Premium','5 Shares','৳ XXX,XXX',true],['Elite','10 Shares','৳ X,XXX,XXX',false]] as [$name,$shares,$price,$hot])
                <div class="{{ $hot ? 'bg-brand-gold text-brand-navy' : 'bg-white/5 border border-white/10' }} p-8 flex flex-col">
                    @if($hot)<span class="text-[10px] font-bold uppercase tracking-widest bg-brand-navy text-brand-gold self-start px-3 py-1 mb-4">Recommended</span>@endif
                    <h3 class="text-sm font-bold uppercase tracking-widest {{ $hot ? '' : 'text-brand-gold' }}">{{ $name }}</h3>
                    <p class="text-2xl font-bold mt-2">{{ $shares }}</p>
                    <p class="text-xl font-semibold mt-1 {{ $hot ? '' : 'text-brand-gold' }}">{{ $price }}</p>
                    <ul class="mt-5 space-y-2 text-sm {{ $hot ? 'text-brand-navy/80' : 'text-white/60' }}">
                        <li>✓ Land Ownership Share</li>
                        <li>✓ Hotel Project Participation</li>
                        <li>✓ Agreement + Investor Support</li>
                    </ul>
                    <a href="{{ route('site.investment') }}" class="mt-6 text-center text-xs font-bold uppercase tracking-widest py-3 transition {{ $hot ? 'bg-brand-navy text-white hover:bg-black' : 'bg-brand-gold text-brand-navy hover:bg-white' }}">Invest Now</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Calculator teaser (Livewire island) --}}
    <div id="calculator">
        <livewire:investment-calculator />
    </div>

    {{-- Trust + CTA --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-5 text-center">
            @foreach(['Verified Project Information','Transparent Documentation','Professional Management','Clear Agreements'] as $t)
                <div class="border border-brand-navy/10 py-6 px-4 text-sm font-semibold"><span class="text-brand-gold font-bold">✓</span> {{ $t }}</div>
            @endforeach
        </div>
    </section>

    <section class="relative py-24 bg-brand-navy overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 50% 20%, #D4AF37 0, transparent 40%);"></div>
        <div class="relative max-w-3xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-light text-white">Be Part of <span class="font-bold text-brand-gold">B7HOTEL</span></h2>
            <p class="mt-4 text-white/60 font-bengali">আজই আপনার Investment Journey শুরু করুন।</p>
            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('site.contact') }}" class="border border-brand-gold text-brand-gold px-8 py-3.5 text-sm font-semibold uppercase tracking-widest hover:bg-brand-gold hover:text-brand-navy transition">Talk to an Advisor</a>
                <a href="{{ route('site.investment') }}" class="bg-brand-gold text-brand-navy px-8 py-3.5 text-sm font-bold uppercase tracking-widest hover:bg-white transition">Invest Now</a>
            </div>
        </div>
    </section>

</x-layouts::site>
