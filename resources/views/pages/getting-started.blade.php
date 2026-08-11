<x-layouts.site title="ابدأ الآن" :description="$section->description_ar">
    <x-hero compact eyebrow="خطواتك الأولى">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $section->title_ar }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-white/80">{{ $section->description_ar }}</p>
    </x-hero>

    <section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        <ol class="space-y-6">
            @foreach ($steps as $step)
                <li class="flex gap-4 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-karama-blue font-bold text-white">
                        {{ $loop->iteration }}
                    </span>
                    <div>
                        <h2 class="font-bold text-karama-navy-dark">{{ $step->title_ar }}</h2>
                        @if ($step->excerpt_ar)
                            <p class="mt-1 text-sm text-slate-500">{{ $step->excerpt_ar }}</p>
                        @endif
                        <div class="prose-karama mt-4">
                            {!! $step->body_html !!}
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </section>
</x-layouts.site>
