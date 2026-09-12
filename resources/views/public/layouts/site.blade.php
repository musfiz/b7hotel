<!DOCTYPE html>
<html lang="en" x-data :class="$store.lang?.current === 'bn' ? 'font-bengali' : 'font-sans'">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'B7HOTEL | Premium Hotel & Land Share Investment in Patuakhali')</title>
    <meta name="description" content="@yield('meta_description', 'Explore B7HOTEL, a premium hospitality and land ownership investment project in Patuakhali, Bangladesh.')">
    <meta property="og:title" content="@yield('title', 'B7HOTEL | Premium Hotel & Land Share Investment in Patuakhali')">
    <meta property="og:description" content="@yield('meta_description', 'Premium hospitality and land ownership investment project in Patuakhali, Bangladesh.')">
    <meta property="og:type" content="website">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <noscript><style>.reveal,.reveal-fade,.reveal-img{opacity:1 !important;transform:none !important;clip-path:none !important;}</style></noscript>
    @livewireStyles
</head>
<body class="bg-brand-bg text-brand-navy antialiased scroll-smooth font-sans">

    @include('public.partials.site-header')

    <main>
        @yield('content')
    </main>

    @include('public.partials.site-footer')

    {{-- Sticky mobile CTA (docs §27): safe-area aware, thumb-sized, works from every page --}}
    <div class="fixed bottom-0 inset-x-0 z-40 md:hidden grid grid-cols-2 border-t border-white/10 pb-[env(safe-area-inset-bottom)]">
        <a href="tel:01XXXXXXXXX" class="flex min-h-[54px] items-center justify-center bg-brand-navy text-white font-display text-xs font-bold uppercase tracking-[0.2em]">Call</a>
        <a href="/investment#calculator" class="flex min-h-[54px] items-center justify-center bg-brand-gold text-brand-navy font-display text-xs font-bold uppercase tracking-[0.2em]">Invest</a>
    </div>
    <div class="h-[54px] md:hidden"></div>

    {{-- Global Alpine stores: language + search. Must register BEFORE Livewire boots Alpine. --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('lang', {
                current: localStorage.getItem('b7_lang') || 'en',
                set(lang) {
                    this.current = lang;
                    localStorage.setItem('b7_lang', lang);
                    document.documentElement.lang = lang === 'bn' ? 'bn' : 'en';
                }
            });
        });
    </script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
