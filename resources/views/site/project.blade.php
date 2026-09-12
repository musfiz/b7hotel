<x-layouts::site title="Our Project - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Our Project</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Hotel, Land <span class="font-semibold text-brand-gold">& Facilities.</span></h1>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="bg-gradient-to-br from-brand-navy to-[#274a7a] min-h-[320px] flex items-center justify-center text-white/60 p-10 text-center">
                <p class="text-sm uppercase tracking-widest">Project render / video<br><span class="text-brand-gold font-bold">Coming from official media kit</span></p>
            </div>
            <div>
                <h2 class="text-2xl font-light">Project <span class="font-semibold">Overview</span></h2>
                <div class="w-12 h-0.5 bg-brand-gold mt-3"></div>
                <dl class="mt-6 grid sm:grid-cols-2 gap-4 text-sm">
                    @foreach([['Project Location','Patuakhali, Bangladesh'],['Land Area','XX Decimal'],['Building Area','XX Sq. Ft.'],['Floors','XX'],['Hotel Rooms','XX Rooms'],['Restaurant','Yes — premium dining'],['Conference / Events','Yes'],['Parking','Secure parking']] as [$k,$v])
                        <div class="border border-brand-navy/10 p-4"><dt class="text-[11px] uppercase tracking-widest text-brand-slate font-bold">{{ $k }}</dt><dd class="font-semibold mt-1">{{ $v }}</dd></div>
                    @endforeach
                </dl>
                <a href="{{ route('site.investment') }}" class="inline-block mt-6 bg-brand-gold text-brand-navy px-7 py-3 text-xs font-bold uppercase tracking-widest hover:bg-brand-navy hover:text-white transition">View Investment Details →</a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-brand-ivory">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-light text-center">World-Class <span class="font-semibold">Facilities</span></h2>
            <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([['Luxury Rooms','আরামদায়ক আধুনিক রুম'],['Restaurant','Premium Dining Experience'],['Swimming Pool','Relax & Recreation'],['Conference Hall','Corporate & Social Events'],['Banquet Space','Weddings & gatherings'],['Secure Parking','Monitored parking'],['Rooftop','Sunset views'],['Lobby Lounge','Welcome & waiting']] as [$en,$bn])
                    <div class="bg-white border border-brand-navy/10 overflow-hidden hover:shadow-xl hover:border-brand-gold transition group">
                        <div class="h-32 bg-gradient-to-br from-brand-navy to-[#33507e] flex items-center justify-center text-brand-gold text-2xl group-hover:scale-105 transition">◆</div>
                        <div class="p-5"><h3 class="font-bold text-sm">{{ $en }}</h3><p class="text-xs text-brand-slate font-bengali mt-1">{{ $bn }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-2xl font-light text-center">From Land to <span class="font-semibold">Landmark</span></h2>
            <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
            <div class="mt-10 grid md:grid-cols-5 gap-4 text-center text-sm">
                @foreach([['01','Land Acquisition','Completed',true],['02','Planning & Design','Completed',true],['03','Construction','In Progress',false],['04','Interior & Finishing','Upcoming',false],['05','Hotel Opening','Upcoming',false]] as [$n,$t,$s,$done])
                    <div class="border p-5 {{ $done ? 'border-brand-gold bg-brand-ivory' : 'border-brand-navy/10' }}">
                        <p class="text-brand-gold font-bold">{{ $n }}</p>
                        <p class="font-bold mt-1">{{ $t }}</p>
                        <p class="text-xs mt-1 {{ $done ? 'text-green-700' : 'text-brand-slate' }}">{{ $s }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts::site>
