<!DOCTYPE html>
<html lang="en" x-data>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'B7HOTEL | Premium Hotel & Land Share Investment in Patuakhali' }}</title>
    <meta name="description" content="Explore B7HOTEL, a premium hospitality and land ownership investment project in Patuakhali, Bangladesh.">
    @include('partials.head')
    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-brand-bg text-brand-navy font-sans antialiased scroll-smooth">

    @include('partials.site-header')

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    @include('partials.site-footer')

    {{-- Mobile sticky CTA --}}
    <div class="fixed bottom-0 inset-x-0 z-40 md:hidden grid grid-cols-2 border-t border-white/10">
        <a href="tel:01XXXXXXXXX" class="bg-brand-navy text-white text-center py-3 text-sm font-semibold uppercase tracking-wider">Call Advisor</a>
        <a href="{{ route('site.investment') }}" class="bg-brand-gold text-brand-navy text-center py-3 text-sm font-bold uppercase tracking-wider">Invest Now</a>
    </div>
    <div class="h-12 md:hidden"></div>

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

    @livewireScripts
</body>
</html>
