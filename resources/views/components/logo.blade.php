@props(['class' => 'h-9 w-auto'])

<svg viewBox="0 0 40 46" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class]) }}>
    <rect width="40" height="46" rx="8" fill="#0f2040" />
    <line x1="11" y1="6" x2="11" y2="40" stroke="white" stroke-width="8" stroke-linecap="round" />
    <line x1="15" y1="23" x2="34" y2="6" stroke="white" stroke-width="7" stroke-linecap="round" />
    <line x1="15" y1="23" x2="34" y2="40" stroke="#3b82f6" stroke-width="7" stroke-linecap="round" />
    <circle cx="15" cy="23" r="5" fill="#06b6d4" />
</svg>
