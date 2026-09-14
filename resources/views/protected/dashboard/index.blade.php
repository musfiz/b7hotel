@extends('protected.layouts.dashboard')
@section('title', 'Overview | B7HOTEL Admin')
@section('nav-active', 'overview')

@section('content')
@php
$stats = [
    ['label' => 'New inquiries', 'value' => '128', 'delta' => '+18 this week', 'icon' => 'mail'],
    ['label' => 'Shares reserved', 'value' => '342', 'delta' => '+26 this month', 'icon' => 'bank'],
    ['label' => 'Pending follow-ups', 'value' => '12', 'delta' => '4 overdue', 'icon' => 'phone'],
    ['label' => 'Pipeline value', 'value' => '৳8.4Cr', 'delta' => 'Illustrative only', 'icon' => 'trend'],
];
$inquiries = [
    ['name' => 'Rahim Uddin', 'detail' => 'Gold Tier • 10 shares', 'phone' => '+880 1XXX XXXXX1', 'time' => '2h ago', 'status' => 'New'],
    ['name' => 'Sharmin Akter', 'detail' => 'Silver Tier • 5 shares', 'phone' => '+880 1XXX XXXXX2', 'time' => '5h ago', 'status' => 'New'],
    ['name' => 'Tanvir Hasan', 'detail' => 'Platinum Tier • 20 shares', 'phone' => '+880 1XXX XXXXX3', 'time' => 'Yesterday', 'status' => 'Contacted'],
    ['name' => 'Nusrat Jahan', 'detail' => 'Gold Tier • 8 shares', 'phone' => '+880 1XXX XXXXX4', 'time' => 'Yesterday', 'status' => 'Contacted'],
    ['name' => 'Arif Chowdhury', 'detail' => 'Silver Tier • 4 shares', 'phone' => '+880 1XXX XXXXX5', 'time' => '2 days ago', 'status' => 'Reserved'],
];
$weekly = [35, 52, 44, 68, 58, 80, 64];
@endphp

{{-- Stat cards --}}
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    @foreach ($stats as $stat)
        <div class="rounded border border-brand-navy/10 bg-white p-5">
            <div class="flex items-center justify-between">
                <span class="flex h-11 w-11 items-center justify-center rounded bg-brand-ivory">
                    @include('public.partials.icon', ['name' => $stat['icon'], 'class' => 'h-5 w-5 text-brand-gold-deep'])
                </span>
                <span class="rounded bg-brand-ivory px-2 py-1 text-[11px] font-bold text-brand-gold-deep">{{ $stat['delta'] }}</span>
            </div>
            <p class="mt-4 font-display text-3xl font-extrabold text-brand-navy">{{ $stat['value'] }}</p>
            <p class="mt-1 text-xs font-bold uppercase tracking-[0.18em] text-brand-slate">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div>

<div class="mt-6 grid gap-6 xl:grid-cols-3">
    {{-- Recent inquiries --}}
    <section class="overflow-hidden rounded border border-brand-navy/10 bg-white xl:col-span-2" aria-labelledby="recent-inquiries">
        <div class="flex items-center justify-between border-b border-brand-navy/10 px-5 py-4">
            <h2 id="recent-inquiries" class="font-display text-base font-extrabold text-brand-navy">Recent inquiries</h2>
            <a href="#" class="rounded text-xs font-bold uppercase tracking-[0.18em] text-brand-gold-deep hover:text-brand-navy">View all</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[36rem] text-left text-sm">
                <thead>
                    <tr class="text-[11px] font-bold uppercase tracking-[0.18em] text-brand-slate">
                        <th scope="col" class="px-5 py-3 font-bold">Investor</th>
                        <th scope="col" class="px-5 py-3 font-bold">Interest</th>
                        <th scope="col" class="px-5 py-3 font-bold">Received</th>
                        <th scope="col" class="px-5 py-3 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-navy/10">
                    @foreach ($inquiries as $inq)
                        <tr class="transition-colors hover:bg-brand-bg">
                            <td class="px-5 py-3.5">
                                <p class="font-bold text-brand-navy">{{ $inq['name'] }}</p>
                                <p class="text-xs text-brand-slate">{{ $inq['phone'] }}</p>
                            </td>
                            <td class="px-5 py-3.5 text-brand-navy/80">{{ $inq['detail'] }}</td>
                            <td class="px-5 py-3.5 text-brand-slate">{{ $inq['time'] }}</td>
                            <td class="px-5 py-3.5">
                                @if ($inq['status'] === 'New')
                                    <span class="inline-block rounded bg-brand-gold/15 px-2.5 py-1 text-[11px] font-extrabold uppercase tracking-[0.12em] text-brand-gold-deep">New</span>
                                @elseif ($inq['status'] === 'Contacted')
                                    <span class="inline-block rounded bg-brand-navy/10 px-2.5 py-1 text-[11px] font-extrabold uppercase tracking-[0.12em] text-brand-navy">Contacted</span>
                                @else
                                    <span class="inline-block rounded bg-emerald-50 px-2.5 py-1 text-[11px] font-extrabold uppercase tracking-[0.12em] text-emerald-700">Reserved</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div class="space-y-6">
        {{-- Weekly inquiries mini chart (pure CSS) --}}
        <section class="rounded border border-brand-navy/10 bg-white p-5" aria-labelledby="weekly-chart">
            <h2 id="weekly-chart" class="font-display text-base font-extrabold text-brand-navy">Inquiries this week</h2>
            <div class="mt-4 flex h-28 items-end gap-2" aria-hidden="true">
                @foreach ($weekly as $day)
                    <div class="flex-1" style="height: {{ $day }}%">
                        <div class="h-full w-full rounded-t {{ $loop->last ? 'bg-brand-gold' : 'bg-brand-navy/70' }}"></div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2 flex justify-between text-[11px] font-semibold text-brand-slate" aria-hidden="true">
                <span>Sat</span><span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span>
            </div>
        </section>

        {{-- Quick actions --}}
        <section class="rounded border border-brand-navy/10 bg-brand-navy-deep p-5 text-white" aria-labelledby="quick-actions">
            <h2 id="quick-actions" class="font-display text-base font-extrabold">Quick actions</h2>
            <ul class="mt-4 space-y-2.5 text-sm font-semibold">
                <li>
                    <a href="#" class="flex items-center gap-3 rounded bg-brand-gold px-4 py-3 text-brand-navy transition-transform hover:-translate-y-0.5">
                        @include('public.partials.icon', ['name' => 'phone', 'class' => 'h-5 w-5'])
                        Call next follow-up
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 rounded border border-white/20 px-4 py-3 text-white transition-colors hover:border-brand-gold hover:text-brand-gold">
                        @include('public.partials.icon', ['name' => 'doc', 'class' => 'h-5 w-5'])
                        Export inquiries
                    </a>
                </li>
                <li>
                    <a href="{{ route('site.investment') }}" class="flex items-center gap-3 rounded border border-white/20 px-4 py-3 text-white transition-colors hover:border-brand-gold hover:text-brand-gold">
                        @include('public.partials.icon', ['name' => 'eye', 'class' => 'h-5 w-5'])
                        Preview investment page
                    </a>
                </li>
            </ul>
        </section>
    </div>
</div>
@endsection
