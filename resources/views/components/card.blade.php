@props(['href' => null])

@php
$classes = 'group block rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md hover:border-karama-blue/40';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
@endif
