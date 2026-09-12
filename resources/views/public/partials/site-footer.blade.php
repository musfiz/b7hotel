{{-- Premium multi-column footer (docs §22) + disclaimer (§23) --}}
<footer class="bg-brand-navy text-white/70 border-t border-brand-gold/40">
    <div class="max-w-7xl mx-auto px-6 py-20 grid gap-12 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <p class="font-display text-[1.4rem] font-bold tracking-[0.14em] text-white">B7<span class="text-brand-gold">HOTEL</span></p>
            <p class="mt-3 text-sm leading-relaxed">
                <span x-show="$store.lang.current === 'en'">A New Destination. A Smart Investment.</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">নতুন গন্তব্য। স্মার্ট বিনিয়োগ।</span>
            </p>
            <p class="mt-4 text-xs leading-relaxed text-white/40">Premium hospitality + land share investment project in Patuakhali, Bangladesh.</p>
        </div>
        <nav aria-label="Quick links">
            <p class="text-white text-[11px] font-bold uppercase tracking-[0.24em] mb-5">Quick Links</p>
            <ul class="space-y-2.5 text-sm">
                <li><a href="/" class="foot-link">Home</a></li>
                <li><a href="/about" class="foot-link">About</a></li>
                <li><a href="/project" class="foot-link">Project</a></li>
                <li><a href="/investment" class="foot-link">Investment</a></li>
                <li><a href="/gallery" class="foot-link">Gallery</a></li>
                <li><a href="/contact" class="foot-link">Contact</a></li>
            </ul>
        </nav>
        <nav aria-label="Investment">
            <p class="text-white text-[11px] font-bold uppercase tracking-[0.24em] mb-5">Investment</p>
            <ul class="space-y-2.5 text-sm">
                <li><a href="/investment" class="foot-link">Investment Packages</a></li>
                <li><a href="/investment#calculator" class="foot-link">Calculator</a></li>
                <li><a href="/#faq" class="foot-link">FAQ</a></li>
                <li><a href="/docs" class="foot-link">Design Docs</a></li>
            </ul>
        </nav>
        <div>
            <p class="text-white text-[11px] font-bold uppercase tracking-[0.24em] mb-5">Contact</p>
            <ul class="space-y-3 text-sm">
                <li class="flex items-center gap-2.5">@include('public.partials.icon', ['name' => 'phone', 'class' => 'h-4 w-4 shrink-0 text-brand-gold']) 01XXXXXXXXX</li>
                <li class="flex items-center gap-2.5">@include('public.partials.icon', ['name' => 'mail', 'class' => 'h-4 w-4 shrink-0 text-brand-gold']) info@b7hotel.com</li>
                <li class="flex items-center gap-2.5">@include('public.partials.icon', ['name' => 'pin', 'class' => 'h-4 w-4 shrink-0 text-brand-gold']) Patuakhali, Bangladesh</li>
            </ul>
            <p class="mt-4 text-xs text-white/40">Follow: Facebook • YouTube • Instagram • LinkedIn</p>
        </div>
    </div>
    <div class="border-t border-white/10">
        <p class="max-w-7xl mx-auto px-6 py-4 type-small text-white/40 italic">
            Investment Disclaimer: Information on this website is for general purposes only and does not constitute financial, legal, tax or investment advice. Terms, pricing and benefits are subject to official project documents and executed agreements. Projections, if shown, are illustrative estimates — not guaranteed returns.
        </p>
    </div>
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row justify-between gap-3 text-xs text-white/50">
            <p>© 2026 B7HOTEL. All Rights Reserved.</p>
            <p class="flex gap-4"><a href="/docs" class="foot-link">Privacy Policy</a><a href="/docs" class="foot-link">Terms &amp; Conditions</a><a href="/docs" class="foot-link">Investment Disclaimer</a></p>
        </div>
    </div>
</footer>
