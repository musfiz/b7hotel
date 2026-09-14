<!DOCTYPE html>
<html lang="en" class="font-sans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | B7HOTEL Admin')</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;800&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dashboard bg-brand-bg text-brand-navy antialiased font-sans">

<div x-data="{ sidebarOpen: false }" class="min-h-screen lg:grid lg:grid-cols-[18rem_1fr]">

    {{-- Mobile sidebar overlay --}}
    <div x-show="sidebarOpen" x-cloak
         x-transition.opacity
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-brand-navy-deep/60 backdrop-blur-sm lg:hidden"
         aria-hidden="true"></div>

    @include('protected.partials.sidebar', ['active' => ($__env->yieldContent('nav-active') ?: 'overview')])

    <div class="min-w-0">
        @include('protected.partials.topbar')

        <main class="px-4 py-6 sm:px-6 sm:py-8 lg:px-10">
            @yield('content')
        </main>

        <footer class="px-4 pb-8 sm:px-6 lg:px-10">
            <p class="text-xs text-brand-slate/80">B7HOTEL Admin • Internal use only • Illustrative demo data</p>
        </footer>
    </div>
</div>

@include('public.partials.loader')

@livewireScripts
@vite('resources/js/b7-loader.js')
@stack('scripts')
</body>
</html>
