@props(['value', 'label', 'dark' => false])

<div {{ $attributes->merge(['class' => 'text-center']) }}>
    <div class="text-3xl sm:text-4xl font-extrabold {{ $dark ? 'text-white' : 'text-karama-navy-dark' }}">
        {{ $value }}
    </div>
    <div class="mt-1 text-sm {{ $dark ? 'text-white/70' : 'text-slate-500' }}">
        {{ $label }}
    </div>
</div>
