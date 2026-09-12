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
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-brand-navy antialiased">

<div class="grid min-h-screen lg:grid-cols-2">

    {{-- Brand panel --}}
    <div class="relative hidden overflow-hidden bg-brand-navy-deep text-white lg:block" aria-hidden="true">
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1600&auto=format&fit=crop"
             alt="" loading="lazy"
             class="absolute inset-0 h-full w-full object-cover opacity-25">
        <div class="absolute inset-0 bg-brand-navy-deep/70"></div>
        <div class="relative flex h-full flex-col justify-between p-12">
            <a href="{{ route('site.home') }}" class="font-display text-lg font-extrabold tracking-[0.18em]" aria-label="Back to website">B7<span class="text-brand-gold">HOTEL</span></a>
            <div>
                <p class="eyebrow-split">Admin Panel</p>
                <p class="type-h2 mt-5 max-w-md text-balance">Manage inquiries, investors and shares — all in one place.</p>
                <ul class="mt-8 space-y-3 text-sm text-white/75">
                    <li class="flex items-center gap-3">
                        @include('public.partials.icon', ['name' => 'check', 'class' => 'h-5 w-5 text-brand-gold'])
                        Every inquiry tracked from first call to reserved share
                    </li>
                    <li class="flex items-center gap-3">
                        @include('public.partials.icon', ['name' => 'check', 'class' => 'h-5 w-5 text-brand-gold'])
                        Tier-wise pipeline with verified official records
                    </li>
                    <li class="flex items-center gap-3">
                        @include('public.partials.icon', ['name' => 'check', 'class' => 'h-5 w-5 text-brand-gold'])
                        Role-based access for advisors and management
                    </li>
                </ul>
            </div>
            <p class="text-xs uppercase tracking-[0.24em] text-white/40">Patuakhali • Bangladesh</p>
        </div>
    </div>

    {{-- Form column --}}
    <div class="flex items-center justify-center px-5 py-12 sm:px-10">
        <div class="w-full max-w-md" x-data="{
                loading: false,
                show: false,
                email: '',
                password: '',
                error: '',
                submit() {
                    this.error = '';
                    if (!this.email || !this.password) { this.error = 'Please enter both email and password.'; return; }
                    this.loading = true;
                    setTimeout(() => { window.location.href = '{{ route('dashboard.index') }}'; }, 900);
                }
            }">
            <a href="{{ route('site.home') }}" class="font-display text-lg font-extrabold tracking-[0.18em] lg:hidden">B7<span class="text-brand-gold-deep">HOTEL</span></a>

            <p class="eyebrow mt-6 lg:mt-0">Welcome back</p>
            <h1 class="type-h2 mt-3">Sign in to your account</h1>
            <p class="mt-3 leading-relaxed text-brand-slate">Access the admin panel to follow up on inquiries and track reservations.</p>

            <form class="mt-8 space-y-5" @submit.prevent="submit" novalidate>
                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-[0.18em] text-brand-navy" for="login-email">Email address <span class="text-brand-gold-deep">*</span></label>
                    <input id="login-email" type="email" x-model="email" autocomplete="username" placeholder="admin@b7hotel.com"
                           class="field" :class="error && !email ? 'border-red-500' : ''">
                </div>
                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-[0.18em] text-brand-navy" for="login-password">Password <span class="text-brand-gold-deep">*</span></label>
                    <div class="relative">
                        <input id="login-password" :type="show ? 'text' : 'password'" x-model="password" autocomplete="current-password" placeholder="••••••••"
                               class="field pr-12" :class="error && !password ? 'border-red-500' : ''">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center px-4 text-brand-slate transition-colors hover:text-brand-navy" :aria-label="show ? 'Hide password' : 'Show password'">
                            @include('public.partials.icon', ['name' => 'eye', 'class' => 'h-5 w-5'])
                        </button>
                    </div>
                </div>

                <p x-show="error" x-cloak x-text="error" role="alert" class="border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700"></p>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex cursor-pointer items-center gap-2 font-semibold text-brand-slate">
                        <input type="checkbox" checked class="h-4 w-4 accent-[#c9a227]"> Remember me
                    </label>
                    <a href="#" class="font-bold text-brand-gold-deep hover:text-brand-navy">Forgot password?</a>
                </div>

                <button type="submit" :disabled="loading" class="btn btn-gold w-full">
                    <span x-show="!loading">Sign in</span>
                    <span x-show="loading" x-cloak class="inline-flex items-center gap-2">
                        <svg class="h-5 w-5 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/></svg>
                        Signing in…
                    </span>
                </button>

                <p class="flex items-center justify-center gap-2 border border-brand-navy/10 bg-brand-bg px-4 py-3 text-xs font-semibold text-brand-slate">
                    @include('public.partials.icon', ['name' => 'lock', 'class' => 'h-4 w-4 shrink-0 text-brand-gold-deep'])
                    Design preview — authentication is not wired up yet.
                </p>
            </form>

            <p class="mt-8 text-center text-sm text-brand-slate">
                <a href="{{ route('site.home') }}" class="inline-flex items-center gap-2 font-bold text-brand-navy hover:text-brand-gold-deep">
                    @include('public.partials.icon', ['name' => 'arrow-left', 'class' => 'h-4 w-4'])
                    Back to website
                </a>
            </p>
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>
