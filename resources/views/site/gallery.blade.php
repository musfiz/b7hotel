<x-layouts::site title="Gallery - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Gallery</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Project <span class="font-semibold text-brand-gold">Gallery.</span></h1>
        </div>
    </section>

    <section class="py-16 bg-white" x-data="{ tab: 'all', lightbox: null }">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-wrap gap-2 justify-center">
                @foreach(['all'=>'All','exterior'=>'Exterior','rooms'=>'Rooms','facilities'=>'Facilities','construction'=>'Construction'] as $k=>$v)
                    <button type="button" @click="tab = '{{ $k }}'" :class="tab === '{{ $k }}' ? 'bg-brand-navy text-white' : 'border border-brand-navy/15 hover:border-brand-gold'"
                        class="px-5 py-2 text-xs font-bold uppercase tracking-widest transition">{{ $v }}</button>
                @endforeach
            </div>

            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([['exterior','Hotel Exterior','Architectural render'],['rooms','Deluxe Room','Guest room preview'],['facilities','Restaurant','Premium dining'],['facilities','Swimming Pool','Relax & recreation'],['construction','Site Progress','Construction update'],['exterior','Night View','Evening render'],['rooms','Suite','Suite preview'],['construction','Foundation','Ground work'],['facilities','Conference Hall','Events space']] as [$cat,$title,$cap])
                    <button type="button" @click="lightbox = '{{ $title }}'" x-show="tab === 'all' || tab === '{{ $cat }}'"
                        class="group text-left border border-brand-navy/10 hover:border-brand-gold hover:shadow-xl transition overflow-hidden">
                        <div class="h-52 bg-gradient-to-br from-brand-navy via-[#2b4a75] to-brand-navy flex items-center justify-center text-brand-gold/70 text-4xl group-hover:scale-105 transition duration-500">◈</div>
                        <div class="p-4 flex justify-between items-center">
                            <div><p class="font-bold text-sm">{{ $title }}</p><p class="text-xs text-brand-slate">{{ $cap }}</p></div>
                            <span class="text-[10px] uppercase tracking-widest bg-brand-ivory border border-brand-navy/10 px-2 py-1">{{ $cat }}</span>
                        </div>
                    </button>
                @endforeach
            </div>

            {{-- Lightbox --}}
            <div x-show="lightbox" x-cloak class="fixed inset-0 z-[60] bg-brand-navy/90 flex items-center justify-center p-6" @click.self="lightbox = null" @keydown.escape.window="lightbox = null">
                <div class="bg-white max-w-lg w-full p-8 text-center">
                    <p class="text-xs uppercase tracking-widest text-brand-slate">Preview</p>
                    <h3 class="text-2xl font-bold mt-2" x-text="lightbox"></h3>
                    <div class="h-56 mt-4 bg-gradient-to-br from-brand-navy to-[#33507e] flex items-center justify-center text-brand-gold text-5xl">◈</div>
                    <p class="text-xs text-brand-slate mt-4">Replace with real WebP/AVIF media + lazy loading in production.</p>
                    <button type="button" @click="lightbox = null" class="mt-5 bg-brand-navy text-white px-6 py-2.5 text-xs font-bold uppercase tracking-widest hover:bg-brand-gold hover:text-brand-navy transition">Close</button>
                </div>
            </div>
        </div>
    </section>
</x-layouts::site>
