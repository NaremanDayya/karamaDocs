@props(['eyebrow' => null, 'compact' => false])

<section class="relative overflow-hidden bg-karama-navy-dark {{ $compact ? 'py-16' : 'py-20 sm:py-28' }}">
    <div class="absolute inset-0 bg-karama-pattern bg-repeat opacity-40" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        @if ($eyebrow)
            <p class="mb-4 text-sm font-bold tracking-wide text-karama-cyan">{{ $eyebrow }}</p>
        @endif
        {{ $slot }}
    </div>
</section>
