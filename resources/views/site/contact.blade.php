<x-layouts::site title="Contact Us - B7HOTEL">
    <section class="bg-brand-navy text-white pt-16 pb-14">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.35em]">Contact</p>
            <h1 class="mt-3 text-4xl md:text-5xl font-light">Let's Talk About <span class="font-semibold text-brand-gold">Your Investment.</span></h1>
            <p class="mt-4 text-white/60 font-bengali">আপনার বিনিয়োগ নিয়ে কথা বলুন — উপদেষ্টা শীঘ্রই যোগাযোগ করবেন।</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-5 gap-10">
            <div class="lg:col-span-2 space-y-4">
                <div class="border border-brand-navy/10 p-6"><p class="text-[11px] uppercase tracking-widest text-brand-slate font-bold">Phone</p><p class="font-bold text-lg mt-1">01XXXXXXXXX</p></div>
                <div class="border border-brand-navy/10 p-6"><p class="text-[11px] uppercase tracking-widest text-brand-slate font-bold">Email</p><p class="font-bold text-lg mt-1">info@b7hotel.com</p></div>
                <div class="border border-brand-navy/10 p-6"><p class="text-[11px] uppercase tracking-widest text-brand-slate font-bold">Address</p><p class="font-bold mt-1">Patuakhali, Bangladesh</p><p class="text-sm text-brand-slate mt-2">Nearby: Market — XX km • Bus Terminal — XX km • Hospital — XX km (verified data only).</p></div>
                <div class="bg-brand-navy text-white p-6"><p class="text-brand-gold text-xs font-bold uppercase tracking-widest">Office Hours</p><p class="text-sm mt-2 text-white/70">Saturday – Thursday. No response-time promise is made unless an SLA exists.</p></div>
            </div>

            <div class="lg:col-span-3 border border-brand-navy/10 bg-brand-bg p-8" x-data="{ sent: false }">
                <h2 class="text-xl font-light">Submit <span class="font-semibold">Inquiry</span></h2>
                <div class="w-12 h-0.5 bg-brand-gold mt-3"></div>
                <form x-show="!sent" @submit.prevent="sent = true" class="mt-6 grid sm:grid-cols-2 gap-4">
                    <input required placeholder="Full Name *" class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold">
                    <input required placeholder="Phone Number *" class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold">
                    <input type="email" required placeholder="Email *" class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold">
                    <input type="number" min="1" placeholder="Number of Shares" class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold">
                    <select class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold sm:col-span-2">
                        <option>Preferred Contact Method: Phone</option>
                        <option>Email</option>
                        <option>WhatsApp</option>
                        <option>In-person visit</option>
                    </select>
                    <textarea rows="4" placeholder="Message" class="border border-brand-navy/15 bg-white px-4 py-3 text-sm outline-none focus:border-brand-gold sm:col-span-2"></textarea>
                    <button class="sm:col-span-2 bg-brand-gold text-brand-navy py-4 text-xs font-bold uppercase tracking-widest hover:bg-brand-navy hover:text-white transition">Submit Inquiry</button>
                </form>
                <div x-show="sent" x-cloak class="mt-6 bg-white border border-green-200 p-8 text-center">
                    <p class="text-3xl">✓</p>
                    <h3 class="font-bold text-lg mt-2">Thank you.</h3>
                    <p class="text-sm text-brand-slate mt-2">Our investment advisor will contact you soon.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-brand-ivory border border-brand-navy/10 p-10 text-center text-sm text-brand-slate">Interactive map embeds here — use verified project coordinates only.</div>
        </div>
    </section>
</x-layouts::site>
