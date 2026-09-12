<x-layouts::site title="About Us - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">About B7HOTEL</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Company, Vision <span class="font-semibold text-brand-gold">& Mission.</span></h1>
            <p class="mt-4 text-white/60 max-w-2xl font-bengali">B7HOTEL — প্রিমিয়াম আতিথেয়তা, জমির মালিকানা ও কাঠামোবদ্ধ বিনিয়োগের সমন্বয়।</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-light">Who <span class="font-semibold">We Are</span></h2>
                <div class="w-12 h-0.5 bg-brand-gold mt-3"></div>
                <p class="mt-5 text-brand-slate leading-relaxed">B7HOTEL is a planned hospitality and land-ownership investment project in Patuakhali, Bangladesh. It brings together a premium hotel business with structured land-share ownership so investors participate in a real, tangible asset — not a promise on paper.</p>
                <p class="mt-4 text-brand-slate leading-relaxed">Our approach is documentation-first: every material claim — land area, share structure, pricing, benefits — must trace back to legally approved documents and executed agreements.</p>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div class="bg-brand-ivory border border-brand-navy/10 p-6"><h3 class="font-bold text-brand-navy">Vision</h3><p class="text-sm text-brand-slate mt-2">A landmark hospitality destination in Patuakhali built on trust and transparency.</p></div>
                <div class="bg-brand-ivory border border-brand-navy/10 p-6"><h3 class="font-bold text-brand-navy">Mission</h3><p class="text-sm text-brand-slate mt-2">Combine professional hotel management with clear, fair land-share ownership.</p></div>
                <div class="bg-brand-ivory border border-brand-navy/10 p-6"><h3 class="font-bold text-brand-navy">Transparency</h3><p class="text-sm text-brand-slate mt-2">Investor access to documents, progress updates and written agreements.</p></div>
                <div class="bg-brand-ivory border border-brand-navy/10 p-6"><h3 class="font-bold text-brand-navy">Long-Term Value</h3><p class="text-sm text-brand-slate mt-2">Real estate + operating hospitality revenue potential over time.</p></div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-brand-ivory">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-light text-center">Management <span class="font-semibold">Team</span></h2>
            <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([['Chairman','Strategic leadership and governance.'],['Managing Director','Operations and execution oversight.'],['Director','Business development and partnerships.'],['Project Director','Construction and delivery management.']] as [$role,$bio])
                    <div class="bg-white border border-brand-navy/10 p-6 text-center hover:border-brand-gold hover:shadow-xl transition">
                        <span class="w-16 h-16 mx-auto bg-brand-navy text-brand-gold flex items-center justify-center text-xl font-bold">{{ substr($role,0,1) }}</span>
                        <h3 class="mt-4 font-bold">{{ $role }}</h3>
                        <p class="text-xs uppercase tracking-widest text-brand-slate mt-1">Name — TBA</p>
                        <p class="text-sm text-brand-slate mt-3">{{ $bio }}</p>
                    </div>
                @endforeach
            </div>
            <p class="text-center text-xs text-brand-slate/70 italic mt-6">Names and biographies will be published after official confirmation. No names are invented.</p>
        </div>
    </section>
</x-layouts::site>
