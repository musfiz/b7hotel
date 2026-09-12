@extends('public.layouts.site')
@section('title', 'B7HOTEL | Contact & Investment Inquiry')
@section('meta_description', 'Contact B7HOTEL to learn more about our hospitality project, investment opportunities, ownership structure and investor services in Patuakhali, Bangladesh.')

@section('content')
<div class="bg-white text-brand-navy">

    {{-- ============ HERO (matches investment page: dark navy cinematic + breadcrumb) ============ --}}
    <section class="relative overflow-hidden bg-brand-navy-deep text-white" aria-labelledby="contact-heading">
        <div class="absolute inset-0" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2400&auto=format&fit=crop"
                 alt="" fetchpriority="high"
                 class="h-full w-full object-cover opacity-30">
            <div class="absolute inset-0 bg-brand-navy-deep/75"></div>
            <div class="absolute inset-x-0 bottom-0 h-24" style="background: linear-gradient(0deg, rgb(7 15 29 / 0.85) 0%, transparent 100%);"></div>
        </div>
        <div class="relative mx-auto max-w-4xl px-5 sm:px-6 pt-28 sm:pt-36 pb-12 sm:pb-16 text-center">
            <p class="hero-animate hero-delay-1 eyebrow-split">
                <span x-show="$store.lang.current === 'en'">Contact</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">যোগাযোগ</span>
            </p>
            <h1 id="contact-heading" class="hero-animate hero-delay-2 type-hero text-balance mt-5">
                <span x-show="$store.lang.current === 'en'">Start your investment journey</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">আপনার বিনিয়োগের যাত্রা শুরু করুন</span>
            </h1>
            <p class="hero-animate hero-delay-3 mx-auto mt-6 max-w-2xl text-base sm:text-lg font-light leading-relaxed text-white/70">
                <span x-show="$store.lang.current === 'en'">Speak with our investment advisors to learn more about ownership shares, projected returns, and the B7HOTEL opportunity.</span>
                <span x-show="$store.lang.current === 'bn'" class="font-bengali">মালিকানা শেয়ার, সম্ভাব্য রিটার্ন এবং B7HOTEL-এর বিনিয়োগের সুযোগ সম্পর্কে আরও জানতে আমাদের বিনিয়োগ পরামর্শকদের সাথে কথা বলুন।</span>
            </p>
            <nav class="hero-animate hero-delay-4 mt-7 flex items-center justify-center gap-2 text-xs font-display font-semibold uppercase tracking-[0.22em]" aria-label="Breadcrumb">
                <a href="/" class="text-white/55 transition-colors hover:text-brand-gold">
                    <span x-show="$store.lang.current === 'en'">Home</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali normal-case tracking-normal">হোম</span>
                </a>
                <span class="text-brand-gold" aria-hidden="true">/</span>
                <span class="text-brand-gold" aria-current="page">
                    <span x-show="$store.lang.current === 'en'">Contact</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali normal-case tracking-normal">যোগাযোগ</span>
                </span>
            </nav>
        </div>
    </section>

    {{-- ============ MAIN CONTACT SECTION (45% intro / 55% form) ============ --}}
    <section class="relative overflow-hidden">
        {{-- Subtle architectural visual: desaturated, very low opacity, white fade --}}
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2000&auto=format&fit=crop"
                 alt="" loading="lazy"
                 class="absolute -right-40 top-0 h-full w-[60rem] max-w-none object-cover opacity-[0.05] grayscale">
            <div class="absolute inset-0" style="background: linear-gradient(90deg, #ffffff 30%, rgb(255 255 255 / 0.75) 60%, rgb(255 255 255 / 0.25) 100%);"></div>
            {{-- Minimal luxury details: thin gold line + tiny dots --}}
            <span class="absolute left-0 top-32 hidden h-px w-24 bg-brand-gold/40 lg:block"></span>
            <span class="absolute right-10 top-40 hidden h-1.5 w-1.5 rounded-full bg-brand-gold/50 lg:block"></span>
            <span class="absolute right-24 top-56 hidden h-1 w-1 rounded-full bg-brand-gold/40 lg:block"></span>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 py-14 sm:py-20 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">

                {{-- ============ LEFT: contact intro (≈45%) ============ --}}
                <div class="lg:col-span-5">
                    <p class="hero-animate hero-delay-1 eyebrow">
                        <span x-show="$store.lang.current === 'en'">Contact</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">যোগাযোগ</span>
                    </p>

                    <h2 class="reveal type-h2 text-brand-navy">
                        <span x-show="$store.lang.current === 'en'">Get in touch with our advisors</span>
                        <span x-show="$store.lang.current === 'bn'" class="font-bengali">আমাদের পরামর্শকদের সাথে যোগাযোগ করুন</span>
                    </h2>

                    {{-- Contact information rows --}}
                    <ul class="mt-10 space-y-2" aria-label="Contact information">
                        <li class="reveal" style="--reveal-delay:0ms">
                            <a href="tel:01XXXXXXXXX" aria-label="Call us: +880 1XXX XXXXXX"
                               class="group flex items-center gap-4 py-4 border-b border-brand-navy/10">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center bg-brand-ivory transition-transform duration-300 group-hover:-translate-y-0.5">
                                    @include('public.partials.icon', ['name' => 'phone', 'class' => 'h-5 w-5 text-brand-gold-deep'])
                                </span>
                                <span>
                                    <span class="block text-[11px] font-bold uppercase tracking-[0.22em] text-brand-slate">Call us</span>
                                    <span class="block font-display font-bold text-brand-navy transition-colors duration-300 group-hover:text-brand-gold-deep">+880 1XXX XXXXXX</span>
                                </span>
                            </a>
                        </li>
                        <li class="reveal" style="--reveal-delay:80ms">
                            <a href="mailto:invest@b7hotel.com" aria-label="Email us: invest@b7hotel.com"
                               class="group flex items-center gap-4 py-4 border-b border-brand-navy/10">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center bg-brand-ivory transition-transform duration-300 group-hover:-translate-y-0.5">
                                    @include('public.partials.icon', ['name' => 'mail', 'class' => 'h-5 w-5 text-brand-gold-deep'])
                                </span>
                                <span>
                                    <span class="block text-[11px] font-bold uppercase tracking-[0.22em] text-brand-slate">Email us</span>
                                    <span class="block font-display font-bold text-brand-navy transition-colors duration-300 group-hover:text-brand-gold-deep">invest@b7hotel.com</span>
                                </span>
                            </a>
                        </li>
                        <li class="reveal" style="--reveal-delay:160ms">
                            <a href="https://maps.google.com/?q=Patuakhali,Bangladesh" target="_blank" rel="noopener" aria-label="Visit us: Patuakhali, Bangladesh — view on map"
                               class="group flex items-center gap-4 py-4 border-b border-brand-navy/10">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center bg-brand-ivory transition-transform duration-300 group-hover:-translate-y-0.5">
                                    @include('public.partials.icon', ['name' => 'pin', 'class' => 'h-5 w-5 text-brand-gold-deep'])
                                </span>
                                <span>
                                    <span class="block text-[11px] font-bold uppercase tracking-[0.22em] text-brand-slate">Visit us</span>
                                    <span class="block font-display font-bold text-brand-navy transition-colors duration-300 group-hover:text-brand-gold-deep">Patuakhali, Bangladesh</span>
                                </span>
                            </a>
                        </li>
                    </ul>

                    {{-- Calculate Investment text CTA --}}
                    <div class="reveal mt-7" style="--reveal-delay:220ms">
                        <a href="/investment#calculator"
                           class="group inline-flex items-center gap-2 font-display text-sm font-semibold uppercase tracking-[0.18em] text-brand-gold-deep transition-colors duration-300 hover:text-brand-gold">
                            <span x-show="$store.lang.current === 'en'">Calculate Investment</span>
                            <span x-show="$store.lang.current === 'bn'" class="font-bengali normal-case tracking-normal text-base">বিনিয়োগ হিসাব করুন</span>
                            <span aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1.5">→</span>
                        </a>
                    </div>
                </div>

                {{-- ============ RIGHT: investment inquiry form (≈55%) ============ --}}
                <div class="lg:col-span-7" x-data="inquiryForm()">
                    <div class="reveal-right rounded-[18px] border border-[#E5E7EB] bg-white p-6 sm:p-9 lg:p-10 shadow-[0_1px_2px_rgb(11_25_44/0.05),0_20px_48px_-24px_rgb(11_25_44/0.18)]">

                        {{-- Form header --}}
                        <h2 class="font-display text-2xl sm:text-[1.7rem] font-bold leading-snug text-brand-navy">
                            <span x-show="$store.lang.current === 'en'">Request Investment Details</span>
                            <span x-show="$store.lang.current === 'bn'" class="font-bengali">বিনিয়োগের বিস্তারিত জানতে যোগাযোগ করুন</span>
                        </h2>
                        <p class="font-bengali mt-1.5 text-brand-navy/75" lang="bn">বিনিয়োগের বিস্তারিত জানতে যোগাযোগ করুন</p>
                        <div class="mt-4 h-0.5 w-12 bg-brand-gold" aria-hidden="true"></div>
                        <p class="mt-4 text-[0.95rem] leading-relaxed text-brand-slate">
                            <span x-show="$store.lang.current === 'en'">Fill out the form and our investment advisor will contact you.</span>
                            <span x-show="$store.lang.current === 'bn'" class="font-bengali">ফর্মটি পূরণ করুন। আমাদের বিনিয়োগ পরামর্শক আপনার সাথে যোগাযোগ করবেন।</span>
                        </p>
                        <p class="font-bengali mt-1 text-[0.95rem] text-brand-slate" lang="bn">ফর্মটি পূরণ করুন। আমাদের বিনিয়োগ পরামর্শক আপনার সাথে যোগাযোগ করবেন।</p>

                        {{-- Form --}}
                        <form x-show="!sent" @submit.prevent="submit()" class="mt-7 space-y-5" novalidate>
                            {{-- Full Name --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-name">
                                    Full Name <span class="text-brand-gold-deep" aria-hidden="true">*</span>
                                </label>
                                <input x-model="name" @input="errors.name = ''" :aria-invalid="errors.name ? 'true' : 'false'" aria-describedby="inquiry-name-error"
                                       required id="inquiry-name" name="name" type="text" placeholder="Your name"
                                       autocomplete="name" enterkeyhint="next"
                                       class="field" :class="errors.name && '!border-red-500'">
                                <p x-show="errors.name" x-cloak x-text="errors.name" id="inquiry-name-error" role="alert" class="mt-1.5 text-[13px] text-red-600"></p>
                            </div>

                            {{-- Email + Phone --}}
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-email">
                                        Email <span class="text-brand-gold-deep" aria-hidden="true">*</span>
                                    </label>
                                    <input x-model="email" @input="errors.email = ''" :aria-invalid="errors.email ? 'true' : 'false'" aria-describedby="inquiry-email-error"
                                           required id="inquiry-email" name="email" type="email" placeholder="you@example.com"
                                           inputmode="email" autocomplete="email" enterkeyhint="next"
                                           class="field" :class="errors.email && '!border-red-500'">
                                    <p x-show="errors.email" x-cloak x-text="errors.email" id="inquiry-email-error" role="alert" class="mt-1.5 text-[13px] text-red-600"></p>
                                </div>
                                <div>
                                    <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-phone">
                                        Phone <span class="text-brand-gold-deep" aria-hidden="true">*</span>
                                    </label>
                                    <input x-model="phone" @input="errors.phone = ''" :aria-invalid="errors.phone ? 'true' : 'false'" aria-describedby="inquiry-phone-error"
                                           required id="inquiry-phone" name="phone" type="tel" placeholder="+880 1XXX XXXXXX"
                                           inputmode="tel" autocomplete="tel" enterkeyhint="next"
                                           class="field" :class="errors.phone && '!border-red-500'">
                                    <p x-show="errors.phone" x-cloak x-text="errors.phone" id="inquiry-phone-error" role="alert" class="mt-1.5 text-[13px] text-red-600"></p>
                                </div>
                            </div>

                            {{-- Interested Investment --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-investment">Interested Investment</label>
                                <select id="inquiry-investment" name="investment_type" x-model="investment" class="field">
                                    <option value="">Select investment option</option>
                                    <option value="starter">Starter Share</option>
                                    <option value="premium">Premium Share</option>
                                    <option value="executive">Executive Share</option>
                                    <option value="unsure">Not sure yet</option>
                                </select>
                            </div>

                            {{-- Number of Shares --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-shares">Number of Shares</label>
                                <select id="inquiry-shares" name="share_count" x-model="shares" class="field">
                                    <option value="">Number of shares</option>
                                    <option value="1">1 Share</option>
                                    <option value="2">2 Shares</option>
                                    <option value="3">3 Shares</option>
                                    <option value="5">5 Shares</option>
                                    <option value="10">10 Shares</option>
                                </select>
                            </div>

                            {{-- Message --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-semibold text-brand-navy" for="inquiry-message">Message</label>
                                <textarea id="inquiry-message" name="message" rows="4" x-model="message"
                                          placeholder="I'd like to learn more about investment opportunities..."
                                          enterkeyhint="send" class="field"></textarea>
                            </div>

                            {{-- CTA --}}
                            <button type="submit" :disabled="submitting" :aria-busy="submitting"
                                    class="btn btn-gold w-full !text-[0.95rem] !normal-case !tracking-normal !font-semibold">
                                <span x-show="!submitting" class="inline-flex items-center gap-2">
                                    Send Inquiry
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-4 w-4" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.27 3.13a1 1 0 011.32-1.32L21 6l-5.18 16.4a1 1 0 01-1.5.58L9 18l-3 3v-3l-2.07-2.07a1 1 0 01-.24-1.04L6 12zm0 0h7.5" /></svg>
                                </span>
                                <span x-show="submitting" x-cloak class="inline-flex items-center gap-2">
                                    <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                                    Sending…
                                </span>
                            </button>

                            {{-- Footnote --}}
                            <p class="text-xs leading-relaxed text-brand-slate/70">
                                By submitting, you agree to be contacted by a B7HOTEL investment advisor.
                                <span class="font-bengali mt-0.5 block" lang="bn">ফর্ম জমা দেওয়ার মাধ্যমে আপনি B7HOTEL-এর বিনিয়োগ পরামর্শকের সাথে যোগাযোগের জন্য সম্মতি প্রদান করছেন।</span>
                            </p>
                        </form>

                        {{-- Success state --}}
                        <div x-show="sent" x-cloak class="py-10 text-center" role="status">
                            <span class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full border border-brand-gold/50 bg-brand-ivory">
                                @include('public.partials.icon', ['name' => 'check', 'class' => 'h-7 w-7 text-brand-gold-deep'])
                            </span>
                            <h3 class="type-h3 font-display font-bold text-brand-navy">Thank You</h3>
                            <p class="mt-3 text-brand-slate">Your inquiry has been received.<br>Our investment advisor will contact you soon.</p>
                            <p class="font-bengali mt-3 text-brand-slate" lang="bn">ধন্যবাদ।</p>
                            <p class="font-bengali text-brand-slate" lang="bn">আপনার অনুসন্ধান সফলভাবে গ্রহণ করা হয়েছে। আমাদের বিনিয়োগ পরামর্শক শীঘ্রই আপনার সাথে যোগাযোগ করবেন।</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============ TRUST STRIP ============ --}}
    <section class="border-t border-brand-navy/5 bg-white" aria-label="Trust indicators">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 py-10">
            <div class="flex flex-col items-center justify-center gap-6 sm:flex-row sm:gap-10">
                <div class="flex items-center gap-2.5 text-center">
                    @include('public.partials.icon', ['name' => 'lock', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep'])
                    <span class="text-sm font-medium text-brand-navy">Secure Inquiry
                        <span class="font-bengali font-normal text-brand-slate/70"> · নিরাপদ যোগাযোগ</span>
                    </span>
                </div>
                <span class="hidden h-4 w-px bg-brand-navy/10 sm:block" aria-hidden="true"></span>
                <div class="flex items-center gap-2.5 text-center">
                    @include('public.partials.icon', ['name' => 'eye', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep'])
                    <span class="text-sm font-medium text-brand-navy">Transparent Information
                        <span class="font-bengali font-normal text-brand-slate/70"> · স্বচ্ছ তথ্য</span>
                    </span>
                </div>
                <span class="hidden h-4 w-px bg-brand-navy/10 sm:block" aria-hidden="true"></span>
                <div class="flex items-center gap-2.5 text-center">
                    @include('public.partials.icon', ['name' => 'bank', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep'])
                    <span class="text-sm font-medium text-brand-navy">Professional Assistance
                        <span class="font-bengali font-normal text-brand-slate/70"> · পেশাদার সহায়তা</span>
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MAP / LOCATION ============ --}}
    <section class="border-t border-brand-navy/5 bg-brand-bg" aria-labelledby="visit-heading">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 py-16 sm:py-20">
            <div class="mb-10 text-center">
                <p class="eyebrow eyebrow-center"><span>Location</span></p>
                <h2 id="visit-heading" class="type-h2 font-display font-bold text-brand-navy">
                    <span x-show="$store.lang.current === 'en'">Visit B7HOTEL</span>
                    <span x-show="$store.lang.current === 'bn'" class="font-bengali">B7HOTEL-এ আসুন</span>
                </h2>
                <p class="font-bengali mt-2 text-brand-slate" lang="bn">B7HOTEL-এ আসুন</p>
            </div>
            <div class="grid items-start gap-8 lg:grid-cols-2">
                <div class="reveal-left">
                    <p class="font-display text-lg font-bold text-brand-navy">B7HOTEL</p>
                    <p class="mt-1 text-brand-slate">Patuakhali, Bangladesh</p>
                    <a href="https://maps.google.com/?q=Patuakhali,Bangladesh" target="_blank" rel="noopener"
                       class="group mt-5 inline-flex items-center gap-2 font-display text-sm font-semibold uppercase tracking-[0.18em] text-brand-gold-deep transition-colors duration-300 hover:text-brand-gold">
                        Get Directions
                        <span aria-hidden="true" class="transition-transform duration-300 group-hover:translate-x-1.5">→</span>
                    </a>
                </div>
                <div class="reveal-right border border-brand-navy/10 bg-brand-ivory p-10 text-center text-sm leading-relaxed text-brand-slate">
                    Interactive map embeds here — use verified project coordinates only.
                </div>
            </div>
        </div>
    </section>

</div>

<script>
function inquiryForm() {
    return {
        name: '', email: '', phone: '', investment: '', shares: '', message: '',
        errors: {}, submitting: false, sent: false,
        submit() {
            this.errors = {};
            if (!this.name.trim()) this.errors.name = 'Please enter your full name.';
            if (!this.email.trim()) this.errors.email = 'Please enter your email address.';
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email.trim())) this.errors.email = 'Please enter a valid email address.';
            if (!this.phone.trim()) this.errors.phone = 'Please enter your phone number.';
            if (Object.keys(this.errors).length) return;
            this.submitting = true;
            setTimeout(() => { this.submitting = false; this.sent = true; }, 1200);
        }
    };
}
</script>
@endsection
