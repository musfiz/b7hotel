<!DOCTYPE html>
<html lang="en" class="font-sans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | B7HOTEL Admin</title>
    <meta name="description" content="Sign in to the B7HOTEL admin panel.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/b7-loader.js'])
</head>
<body class="bg-white font-sans text-brand-navy antialiased">

{{-- ============================================================
     Sign-in form — single centered column
     ============================================================ --}}
<main class="flex min-h-screen items-center justify-center bg-brand-bg/40 px-6 py-12">
    <div class="w-full max-w-sm" x-data="{
                loading: false,
                show: false,
                email: '',
                password: '',
                error: '',
                submit() {
                    this.error = '';
                    if (!this.email || !this.password) { this.error = 'Please enter both email and password.'; return; }
                    this.loading = true;
                    if (window.B7Loader) window.B7Loader.show('Signing in…');
                    setTimeout(() => { window.location.href = '{{ route('dashboard.index') }}'; }, 900);
                }
            }">
            {{-- Intro — centered --}}
            <div class="text-center">
                <a href="{{ route('site.home') }}" class="font-display text-lg font-extrabold tracking-[0.18em]">B7<span class="text-brand-gold-deep">HOTEL</span></a>

                <div class="mt-6">
                    <p class="type-h3">Welcome back</p>
                    {{-- <h1 class="type-h3">Sign in to your account</h1> --}}
                    <p class="mt-2 text-sm leading-relaxed text-brand-slate">Enter your credentials to access the admin panel.</p>
                </div>
            </div>

            <form class="mt-8 space-y-4" @submit.prevent="submit" novalidate>
                {{-- Group-input: icon inside the bordered box, everything vertically centred (h-11 = 44px) --}}
                <div>
                    <label class="mb-1.5 block text-xs font-bold uppercase tracking-[0.18em] text-brand-navy" for="login-email">Email address <span class="text-brand-gold-deep">*</span></label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-brand-slate/60">@include('public.partials.icon', ['name' => 'mail', 'class' => 'h-5 w-5'])</span>
                        <input id="login-email" type="email" x-model="email" autocomplete="username" placeholder="admin@b7hotel.com"
                               class="field h-11" style="padding-left: 2.75rem;" :class="error && !email ? 'border-red-500' : ''">
                    </div>
                </div>
                <div>
                    <div class="mb-1.5 flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-[0.18em] text-brand-navy" for="login-password">Password <span class="text-brand-gold-deep">*</span></label>
                        <a href="#" class="text-xs font-bold text-brand-gold-deep transition-colors hover:text-brand-navy">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-brand-slate/60">@include('public.partials.icon', ['name' => 'lock', 'class' => 'h-5 w-5'])</span>
                        <input id="login-password" :type="show ? 'text' : 'password'" x-model="password" autocomplete="current-password" placeholder="••••••••"
                               class="field h-11" style="padding-left: 2.75rem; padding-right: 3rem;" :class="error && !password ? 'border-red-500' : ''">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center px-4 text-brand-slate transition-colors hover:text-brand-navy" :aria-label="show ? 'Hide password' : 'Show password'">
                            <span x-show="!show">@include('public.partials.icon', ['name' => 'eye', 'class' => 'h-5 w-5'])</span>
                            <span x-show="show" x-cloak>@include('public.partials.icon', ['name' => 'eye-off', 'class' => 'h-5 w-5'])</span>
                        </button>
                    </div>
                </div>

                <p x-show="error" x-cloak x-text="error" role="alert" class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700"></p>

                <label class="flex cursor-pointer items-center gap-2.5 text-sm font-semibold text-brand-slate">
                    <input type="checkbox" checked class="h-4 w-4 rounded border-brand-navy/25 accent-[#10b981]"> Remember me on this device
                </label>

                <button type="submit" :disabled="loading" class="btn btn-sm btn-gold h-11 w-full rounded-sm">
                    <span x-show="!loading">Sign in</span>
                    <span x-show="loading" x-cloak class="inline-flex items-center gap-2">
                        <svg class="h-5 w-5 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                        Signing in…
                    </span>
                </button>
            </form>

            <div class="mt-6 flex items-center gap-3 text-xs font-semibold text-brand-slate">
                <span class="h-px flex-1 bg-brand-navy/10"></span>
                Design preview — authentication is not wired up yet
                <span class="h-px flex-1 bg-brand-navy/10"></span>
            </div>

            <p class="mt-8 text-center text-sm text-brand-slate">
                <a href="{{ route('site.home') }}" class="inline-flex items-center gap-2 font-bold text-brand-navy transition-colors hover:text-brand-gold-deep">
                    @include('public.partials.icon', ['name' => 'arrow-left', 'class' => 'h-4 w-4'])
                    Back to website
                </a>
            </p>
    </div>
</main>

@include('public.partials.loader')

@stack('scripts')
</body>
</html>
