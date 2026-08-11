@props(['question'])

<div x-data="{ open: false }" class="border-b border-slate-200 py-2">
    <button
        type="button"
        @click="open = !open"
        class="flex w-full items-center justify-between gap-4 py-3 text-start"
    >
        <span class="font-semibold text-karama-navy-dark">{{ $question }}</span>
        <x-icon name="chevron-down" class="h-5 w-5 shrink-0 text-karama-blue transition-transform" x-bind:class="{ 'rotate-180': open }" />
    </button>
    <div x-show="open" class="pb-4 pe-8 text-slate-600 leading-7">
        {{ $slot }}
    </div>
</div>
