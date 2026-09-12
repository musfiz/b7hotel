<x-layouts::site title="Investment - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Investment</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Choose Your <span class="font-semibold text-brand-gold">Investment.</span></h1>
            <p class="mt-4 text-white/60 max-w-2xl font-bengali">আপনার বিনিয়োগের সুযোগ নির্বাচন করুন — শেয়ার কাঠামো, প্যাকেজ ও ক্যালকুলেটর।</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">
            @foreach([['Starter','1 Share','৳ XX,XXX',['Land Ownership Share','Hotel Project Participation','Agreement','Investor Support'],'Invest Now',false],['Premium','5 Shares','৳ XXX,XXX',['Land Ownership Share','Hotel Project Participation','Priority Support','Investor Benefits'],'Invest Now',true],['Elite','10 Shares','৳ X,XXX,XXX',['Multiple Shares','Premium Investor Support','Special Benefits','Advisor Line'],'Contact Us',false]] as [$name,$shares,$price,$features,$cta,$hot])
                <div class="p-8 border flex flex-col {{ $hot ? 'border-brand-gold bg-brand-navy text-white shadow-2xl md:-translate-y-2' : 'border-brand-navy/10 bg-brand-bg' }}">
                    @if($hot)<span class="text-[10px] font-bold uppercase tracking-widest bg-brand-gold text-brand-navy self-start px-3 py-1 mb-4">Recommended</span>@endif
                    <h2 class="text-sm font-bold uppercase tracking-widest {{ $hot ? 'text-brand-gold' : 'text-brand-navy' }}">{{ $name }}</h2>
                    <p class="text-3xl font-bold mt-2">{{ $shares }}</p>
                    <p class="text-2xl font-semibold mt-1 {{ $hot ? 'text-brand-gold' : 'text-brand-navy' }}">{{ $price }}</p>
                    <ul class="mt-5 space-y-2.5 text-sm {{ $hot ? 'text-white/70' : 'text-brand-slate' }}">
                        @foreach($features as $f)<li>✓ {{ $f }}</li>@endforeach
                    </ul>
                    <a href="{{ route('site.contact') }}" class="mt-6 text-center text-xs font-bold uppercase tracking-widest py-3.5 transition {{ $hot ? 'bg-brand-gold text-brand-navy hover:bg-white' : 'bg-brand-navy text-white hover:bg-brand-gold hover:text-brand-navy' }}">{{ $cta }}</a>
                </div>
            @endforeach
        </div>
        <p class="max-w-3xl mx-auto text-center text-[11px] italic text-brand-slate/80 mt-8 px-6">Actual share price, ownership structure, benefits and payment terms follow legally approved documents only. No guaranteed profit, return or risk-free claim is made.</p>
    </section>

    {{-- Livewire calculator island: server-computed totals --}}
    <div id="calculator">
        <livewire:investment-calculator />
    </div>

    <section class="py-16 bg-brand-ivory">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-2xl font-light text-center">Investment <span class="font-semibold">Process</span></h2>
            <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
            <div class="mt-10 grid sm:grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm">
                @foreach([['01','Explore B7HOTEL'],['02','Review Documents'],['03','Talk to an Advisor'],['04','Select Shares'],['05','Complete Agreement'],['06','Payment & Confirmation'],['07','Investor Updates'],['08','Long-Term Participation']] as [$n,$t])
                    <div class="bg-white border border-brand-navy/10 p-5 hover:border-brand-gold transition"><p class="text-brand-gold font-bold">{{ $n }}</p><p class="font-semibold mt-1">{{ $t }}</p></div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts::site>
