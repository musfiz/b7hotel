# B7HOTEL — Premium Hotel + Land Share Investment Platform
## Complete Technical UI/UX Architecture & Production Blueprint

This document contains the complete frontend components, localized language handling configurations, responsive design tokens, and technical blueprint for **B7HOTEL** in Patuakhali, Bangladesh. It is built for a high-performance architecture using **Laravel**, **Alpine.js**, and **Tailwind CSS** to achieve near-instantaneous load times matching decoupled static-site generators (like Next.js).

---

## 🎨 1. Brand Tokens & Design System (`tailwind.config.js`)

Configure your design variables to match a trustworthy, premium, high-luxury architectural and investment layout.

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        brand: {
          navy: '#0B192C',       // Primary: Deep Midnight Navy
          gold: '#D4AF37',       // Secondary: Champagne/Warm Gold
          ivory: '#F9F8F6',      // Supporting: Off-White/Ivory
          slate: '#4A5568',      // Neutral: Slate Gray
          bgLight: '#FCFBFA',    // Background: Very Light Soft Gray
        }
      },
      fontFamily: {
        sans: ['Inter', 'Manrope', 'sans-serif'],
        bengali: ['Noto Sans Bengali', 'sans-serif'],
      }
    }
  }
}
```

---

## 🏗️ 2. Database Schema (Core Platform Infrastructure)

Run these migrations inside your Laravel project to handle real-time configurations, statistic numbers, pricing tiers, and client inquiry generation.

### A. Statistics Table (`project_stats`)
```php
Schema::create('project_stats', function (Blueprint $table) {
    $table->id();
    $table->string('key_name')->unique(); // e.g., 'total_land', 'total_shares'
    $table->string('value_en');           // e.g., '50 Decimal'
    $table->string('value_bn');           // e.g., '৫০ ডেসিমেল'
    $table->timestamps();
});
```

### B. Investment Tiers Table (`investment_packages`)
```php
Schema::create('investment_packages', function (Blueprint $table) {
    $table->id();
    $table->string('name_en');            // 'Starter', 'Premium', 'Elite'
    $table->string('name_bn');            // 'স্টারটার', 'প্রিমিয়াম', 'এলিট'
    $table->integer('min_shares');        // 1, 5, 10
    $table->decimal('price_per_share', 12, 2); 
    $table->json('features_en');          // Array of premium benefits
    $table->json('features_bn');          // বাংলায় ফিচারের তালিকা
    $table->timestamps();
});
```

### C. Client Lead Collection Table (`investment_inquiries`)
```php
Schema::create('investment_inquiries', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('phone');
    $table->integer('requested_shares');
    $table->text('message')->nullable();
    $table->enum('status', ['pending', 'contacted', 'completed'])->default('pending');
    $table->timestamps();
});
```

---

## 🌍 3. Multi-Language Reactive Shell (`layouts/app.blade.php`)

This root layout shell uses an Alpine.js global reactive state synchronization engine to dynamically swap structural text fields, layout direction configurations, and font families smoothly without inducing sudden component paint glitches or unnecessary server trips.

```html
<!DOCTYPE html>
<html lang="en" x-data :class="$store.lang.current === 'bn' ? 'font-bengali' : 'font-sans'">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B7HOTEL — Premium Hotel + Land Share Investment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-bgLight text-brand-navy antialiased scroll-smooth">
    
    {{ $slot }}

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('lang', {
                current: localStorage.getItem('b7_lang') || 'en',
                set(lang) {
                    this.current = lang;
                    localStorage.setItem('b7_lang', lang);
                }
            });
        });
    </script>
</body>
</html>
```

---

## 🚀 4. Production-Ready UI Components

### A. Section 5: Header & Navigation
```html
<header x-data="{ scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'bg-brand-navy/95 backdrop-blur-md py-3 shadow-lg' : 'bg-transparent py-5'"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-2xl font-bold tracking-wider text-white">
            B7<span class="text-brand-gold">HOTEL</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-8 text-sm uppercase tracking-widest text-white/80">
            <a href="#about" class="hover:text-brand-gold transition">
                <span x-show="$store.lang.current === 'en'">About</span>
                <span x-show="$store.lang.current === 'bn'">পরিচিতি</span>
            </a>
            <a href="#project" class="hover:text-brand-gold transition">
                <span x-show="$store.lang.current === 'en'">Our Project</span>
                <span x-show="$store.lang.current === 'bn'">প্রকল্প</span>
            </a>
            <a href="#investment" class="hover:text-brand-gold transition">
                <span x-show="$store.lang.current === 'en'">Investment</span>
                <span x-show="$store.lang.current === 'bn'">বিনিয়োগ</span>
            </a>
            <a href="#location" class="hover:text-brand-gold transition">
                <span x-show="$store.lang.current === 'en'">Location</span>
                <span x-show="$store.lang.current === 'bn'">অবস্থান</span>
            </a>
        </nav>

        <!-- Right System Controls -->
        <div class="flex items-center space-x-6">
            <!-- Language Switcher Toggle -->
            <div class="text-sm font-semibold text-white/90 bg-white/5 px-3 py-1 rounded-sm border border-white/10">
                <button @click="$store.lang.set('en')" :class="$store.lang.current === 'en' ? 'text-brand-gold' : 'text-white/50'" class="transition">EN</button>
                <span class="text-white/20 mx-1">|</span>
                <button @click="$store.lang.set('bn')" :class="$store.lang.current === 'bn' ? 'text-brand-gold' : 'text-white/50'" class="transition">বাংলা</button>
            </div>
            
            <a href="#calculator" class="bg-brand-gold text-brand-navy px-5 py-2.5 font-semibold text-sm uppercase tracking-wider hover:bg-white transition duration-300">
                <span x-show="$store.lang.current === 'en'">Invest Now</span>
                <span x-show="$store.lang.current === 'bn'">বিনিয়োগ করুন</span>
            </a>
        </div>
    </div>
</header>
```

### B. Section 6: Full-Screen Cinematic Hero
```html
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-brand-navy">
    <!-- Architectural Asset Frame Background -->
    <div class="absolute inset-0 bg-[url('/images/hotel-render.jpg')] bg-cover bg-center opacity-40 scale-105 transform motion-safe:animate-[pulse_8s_infinite]"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-brand-navy/40 to-brand-navy/60"></div>

    <div class="relative z-10 text-center max-w-4xl px-6">
        <span class="text-brand-gold uppercase tracking-[0.4em] text-xs md:text-sm block mb-4 font-semibold">
            B7HOTEL &bull; PREMIUM HOSPITALITY
        </span>
        
        <h1 class="text-4xl md:text-6xl font-light text-white leading-tight tracking-tight">
            <span x-show="$store.lang.current === 'en'">A New Destination. <br><span class="font-semibold text-brand-gold">A Smart Investment.</span></span>
            <span x-show="$store.lang.current === 'bn'">পটুয়াখালীতে হোটেল ও জমির <br><span class="font-semibold text-brand-gold">মালিকানার অংশীদার হওয়ার সুযোগ</span></span>
        </h1>

        <p class="mt-6 text-white/70 max-w-2xl mx-auto font-light text-base md:text-lg">
            <span x-show="$store.lang.current === 'en'">Co-own premier commercial real estate land asset alongside high-yield international resort standard operations.</span>
            <span x-show="$store.lang.current === 'bn'">আন্তর্জাতিক মানের রিসোর্ট ও হোটেল ব্যবসার সাথে লাভজনক বাণিজ্যিক জমির যৌথ মালিকানার নির্ভরযোগ্য সুযোগ।</span>
        </p>

        <div class="mt-10 flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="#project" class="w-full sm:w-auto border border-brand-gold text-brand-gold px-8 py-3.5 tracking-wider uppercase text-sm font-semibold hover:bg-brand-gold hover:text-brand-navy transition duration-300">
                <span x-show="$store.lang.current === 'en'">Explore Project</span>
                <span x-show="$store.lang.current === 'bn'">প্রজেক্ট দেখুন</span>
            </a>
            <a href="#calculator" class="w-full sm:w-auto bg-brand-gold text-brand-navy px-8 py-3.5 tracking-wider uppercase text-sm font-semibold hover:bg-white transition duration-300">
                <span x-show="$store.lang.current === 'en'">Invest Now</span>
                <span x-show="$store.lang.current === 'bn'">বিনিয়োগ শুরু করুন</span>
            </a>
        </div>
    </div>
    
    <!-- Micro-interaction down indicator arrow -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/30 animate-bounce text-sm uppercase tracking-widest hidden md:block">
        Scroll Down
    </div>
</section>
```

### C. Section 7: Project At A Glance (Dynamic Statistics Grid)
```html
<section class="py-20 bg-white border-b border-brand-navy/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light text-brand-navy uppercase tracking-wide">
                <span x-show="$store.lang.current === 'en'">B7HOTEL at a Glance</span>
                <span x-show="$store.lang.current === 'bn'">এক নজরে B7HOTEL</span>
            </h2>
            <div class="w-16 h-0.5 bg-brand-gold mx-auto mt-4"></div>
        </div>

        <!-- 6 Premium Structural KPI Statistics Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <!-- Card 1 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Total Land</span>
                <span class="text-xl font-bold text-brand-navy block">
                    <span x-show="$store.lang.current === 'en'">XX Decimal</span>
                    <span x-show="$store.lang.current === 'bn'">XX ডেসিমেল</span>
                </span>
            </div>
            <!-- Card 2 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Total Shares</span>
                <span class="text-xl font-bold text-brand-navy block">
                    <span x-show="$store.lang.current === 'en'">XX Shares</span>
                    <span x-show="$store.lang.current === 'bn'">XX শেয়ার</span>
                </span>
            </div>
            <!-- Card 3 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Hotel Rooms</span>
                <span class="text-xl font-bold text-brand-navy block">
                    <span x-show="$store.lang.current === 'en'">XX Rooms</span>
                    <span x-show="$store.lang.current === 'bn'">XX রুম</span>
                </span>
            </div>
            <!-- Card 4 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Project Area</span>
                <span class="text-xl font-bold text-brand-navy block">
                    <span x-show="$store.lang.current === 'en'">XX Sq. Ft.</span>
                    <span x-show="$store.lang.current === 'bn'">XX স্কয়ার ফিট</span>
                </span>
            </div>
            <!-- Card 5 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Investment From</span>
                <span class="text-xl font-bold text-brand-gold block">
                    <span x-show="$store.lang.current === 'en'">৳ XX,XXX</span>
                    <span x-show="$store.lang.current === 'bn'">৳ XX,XXX</span>
                </span>
            </div>
            <!-- Card 6 -->
            <div class="p-6 bg-brand-bgLight border border-brand-navy/5 text-center shadow-sm hover:border-brand-gold/40 transition duration-300">
                <span class="text-xs uppercase tracking-wider text-brand-slate block mb-2">Location</span>
                <span class="text-xl font-bold text-brand-navy block">
                    <span x-show="$store.lang.current === 'en'">Patuakhali</span>
                    <span x-show="$store.lang.current === 'bn'">পটুয়াখালী</span>
                </span>
            </div>
        </div>
    </div>
</section>
```

### D. Section 11: Real-time Interactive Reactive Investment Calculator
```html
<section id="calculator" class="py-24 bg-brand-ivory border-y border-brand-gold/10">
    <div class="max-w-3xl mx-auto px-6 bg-white p-8 md:p-12 shadow-xl border border-brand-navy/5">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-light tracking-tight text-brand-navy">
                <span x-show="$store.lang.current === 'en'">Calculate Your Investment</span>
                <span x-show="$store.lang.current === 'bn'">আপনার বিনিয়োগ হিসাব করুন</span>
            </h2>
            <div class="w-12 h-0.5 bg-brand-gold mx-auto mt-3"></div>
        </div>

        <!-- Dynamic Reactive Alpine Engine Context Scope -->
        <div x-data="{ shares: 5, pricePerShare: 25000 }" class="space-y-8">
            <div class="flex flex-col items-center justify-center bg-brand-bgLight p-6 border border-brand-navy/5">
                <label class="text-xs uppercase tracking-widest text-brand-slate mb-4 font-semibold">
                    <span x-show="$store.lang.current === 'en'">Number of Shares</span>
                    <span x-show="$store.lang.current === 'bn'">শেয়ার সংখ্যা</span>
                </label>
                
                <div class="flex items-center space-x-6">
                    <button type="button" @click="if(shares > 1) shares--" class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold hover:text-brand-gold transition duration-200">-</button>
                    <span class="text-4xl font-bold text-brand-navy w-20 text-center" x-text="shares"></span>
                    <button type="button" @click="shares++" class="w-12 h-12 rounded-full bg-white border border-brand-navy/10 flex items-center justify-center text-xl font-semibold shadow-sm hover:border-brand-gold hover:text-brand-gold transition duration-200">+</button>
                </div>
            </div>

            <div class="px-2 flex justify-between items-center text-sm border-b border-brand-navy/5 pb-4">
                <span class="text-brand-slate uppercase tracking-wider">Price per Share:</span>
                <span class="text-lg font-medium text-brand-navy">৳ <span x-text="pricePerShare.toLocaleString()"></span></span>
            </div>

            <div class="bg-brand-navy p-6 flex justify-between items-center text-white">
                <span class="text-xs uppercase tracking-widest text-white/70 font-medium">Total Strategic Asset Value:</span>
                <span class="text-2xl md:text-3xl font-bold text-brand-gold">৳ <span x-text="(shares * pricePerShare).toLocaleString()"></span></span>
            </div>
            
            <a href="#contact" class="block w-full text-center bg-brand-gold text-brand-navy py-4 uppercase tracking-widest text-xs font-bold hover:bg-brand-navy hover:text-white transition duration-300">
                <span x-show="$store.lang.current === 'en'">Request Investment Verification Portfolio</span>
                <span x-show="$store.lang.current === 'bn'">বিনিয়োগের বিস্তারিত নথিপত্র সংগ্রহ করুন</span>
            </a>

            <!-- Legally Required Disclaimer Footer Text Frame -->
            <p class="text-[11px] text-brand-slate/80 leading-relaxed text-center italic mt-4">
                <span x-show="$store.lang.current === 'en'">* Actual share price, ownership structure, benefits, payment terms and investment conditions must be displayed only according to the project's legally approved documents and agreements. No fixed or risk-free appreciation guaranteed.</span>
                <span x-show="$store.lang.current === 'bn'">* প্রকৃত শেয়ার মূল্য, মালিকানার কাঠামো, সুবিধা, পেমেন্ট পদ্ধতি ও বিনিয়োগের শর্ত প্রকল্পের বৈধ দলিল ও চুক্তি অনুযায়ী নির্ধারিত হবে। কোনো পূর্বনির্ধারিত বা ঝুঁকিহীন লভ্যাংশ নিশ্চিত করা হয় না।</span>
            </p>
        </div>
    </div>
</section>
```

---

## ⚡ 5. Production Speed Optimization Directive

To stay matching Next.js execution benchmarks, run this build configuration sequence inside your production container hosting stack:

1. **Static Pre-Compilation**: Compile assets using Vite with minification maps turned off: `npm run build`.
2. **Caching Matrix Engine**: Bootstrap Framework speeds instantly using:
   ```bash
   php artisan route:cache
   php artisan view:cache
   php artisan config:cache
   ```
3. **Asset Encoding Format**: Serve all static render graphics as `.webp` or `.avif` with `loading="lazy"` flags handled on non-hero layouts.
4. **Edge CDN Delivery**: Position a proxy edge CDN network layer like Cloudflare in front of the platform server to guarantee low time-to-first-byte (TTFB).