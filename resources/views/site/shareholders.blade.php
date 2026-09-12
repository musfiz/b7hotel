<x-layouts::site title="Shareholders - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Shareholders</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Shareholder <span class="font-semibold text-brand-gold">List.</span></h1>
            <p class="mt-4 text-white/60 max-w-2xl">Transparent ownership record. Private details stay protected — public view shows ranks and tiers only.</p>
        </div>
    </section>

    <section class="py-16 bg-white" x-data="{ q: '', tier: 'all' }">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-4 md:items-center justify-between">
                <div class="flex gap-3 flex-1">
                    <input x-model="q" type="search" placeholder="Search by ID or tier…"
                        class="flex-1 border border-brand-navy/15 px-4 py-3 text-sm outline-none focus:border-brand-gold">
                    <select x-model="tier" class="border border-brand-navy/15 px-4 py-3 text-sm outline-none focus:border-brand-gold">
                        <option value="all">All Tiers</option>
                        <option value="Elite">Elite</option>
                        <option value="Premium">Premium</option>
                        <option value="Starter">Starter</option>
                    </select>
                </div>
                <p class="text-xs text-brand-slate uppercase tracking-widest">Total Shares: <span class="font-bold text-brand-navy">XX</span> • Holders: <span class="font-bold text-brand-navy">XX</span></p>
            </div>

            <div class="mt-6 overflow-x-auto border border-brand-navy/10">
                <table class="w-full text-sm min-w-[640px]">
                    <thead class="bg-brand-navy text-white text-xs uppercase tracking-widest">
                        <tr><th class="text-left px-5 py-3.5">Holder ID</th><th class="text-left px-5 py-3.5">Tier</th><th class="text-left px-5 py-3.5">Shares</th><th class="text-left px-5 py-3.5">Joined</th><th class="text-left px-5 py-3.5">Status</th></tr>
                    </thead>
                    <tbody class="divide-y divide-brand-navy/5">
                        @foreach([['B7H-001','Elite','10','2026','Verified'],['B7H-002','Premium','5','2026','Verified'],['B7H-003','Premium','5','2026','Pending'],['B7H-004','Starter','2','2026','Verified'],['B7H-005','Starter','1','2026','Verified']] as [$id,$t,$s,$y,$st])
                            <tr x-show="(tier === 'all' || tier === '{{ $t }}') && ('{{ strtolower($id.' '.$t) }}'.includes(q.toLowerCase()))" class="hover:bg-brand-ivory">
                                <td class="px-5 py-3.5 font-bold">{{ $id }}</td>
                                <td class="px-5 py-3.5"><span class="text-[11px] font-bold uppercase tracking-widest px-2.5 py-1 {{ $t === 'Elite' ? 'bg-brand-gold text-brand-navy' : 'bg-brand-navy text-white' }}">{{ $t }}</span></td>
                                <td class="px-5 py-3.5 font-semibold">{{ $s }}</td>
                                <td class="px-5 py-3.5 text-brand-slate">{{ $y }}</td>
                                <td class="px-5 py-3.5"><span class="{{ $st === 'Verified' ? 'text-green-700' : 'text-amber-600' }} font-semibold">● {{ $st }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-xs italic text-brand-slate/70 mt-4">Sample rows — connect to the real registry when verified data is available. Never publish private personal data publicly.</p>
            <div class="mt-8 text-center">
                <a href="{{ route('site.contact') }}" class="inline-block bg-brand-gold text-brand-navy px-8 py-3.5 text-xs font-bold uppercase tracking-widest hover:bg-brand-navy hover:text-white transition">Become a Shareholder →</a>
            </div>
        </div>
    </section>
</x-layouts::site>
