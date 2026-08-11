@props(['color' => 'blue'])

@php
$colors = [
    'blue' => 'bg-karama-surface-blue text-karama-blue-dark',
    'navy' => 'bg-karama-surface-100 text-karama-navy-dark',
    'cyan' => 'bg-cyan-50 text-cyan-700',
];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold '.($colors[$color] ?? $colors['blue'])]) }}>
    {{ $slot }}
</span>
