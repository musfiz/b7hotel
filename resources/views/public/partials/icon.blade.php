{{-- Minimalist outline icons backed by blade-ui-kit/blade-heroicons (the
     blade-icons package + Heroicons set). Call sites stay unchanged:
     @include('public.partials.icon', ['name' => 'phone', 'class' => 'h-4 w-4'])
     The name maps to a <x-heroicon-o-{heroicon} /> outline component. --}}
@props(['name' => 'check', 'class' => 'h-5 w-5'])
@php
$map = [
    'phone'         => 'phone',
    'mail'          => 'envelope',
    'pin'           => 'map-pin',
    'arrow-right'   => 'arrow-right',
    'arrow-left'    => 'arrow-left',
    'chevron-right' => 'chevron-right',
    'chevron-down'  => 'chevron-down',
    'check'         => 'check',
    'refresh'       => 'arrow-path',
    'search'        => 'magnifying-glass',
    'menu'          => 'bars-3',
    'close'         => 'x-mark',
    'bars'          => 'chart-bar',
    'doc'           => 'document-text',
    'trend'         => 'arrow-trending-up',
    'eye'           => 'eye',
    'eye-off'       => 'eye-slash',
    'lock'          => 'lock-closed',
    'bank'          => 'building-library',
    'external-link' => 'arrow-top-right-on-square',
    'user'          => 'user',
    'users'         => 'users',
    'browser'       => 'window',
    'grid'          => 'squares-2x2',
    'cog'           => 'cog-6-tooth',
    'logout'        => 'arrow-right-on-rectangle',
    'bell'          => 'bell-alert',
    'help'          => 'question-mark-circle',
];
$heroicon = $map[$name] ?? 'check';
@endphp
<x-dynamic-component :component="'heroicon-o-' . $heroicon" class="{{ $class }}" />
