<x-layouts.site title="أدلة المشاريع" description="دليل تفصيلي لكل مشروع: النظرة العامة، معايير المراجعة، ومعايير التقييم.">
    <x-hero compact eyebrow="أدلة المشاريع">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">أدلة المشاريع</h1>
        <p class="mx-auto mt-4 max-w-2xl text-white/80">كل مشروع له دليله الخاص — راجعه دائمًا قبل البدء بأي مهمة.</p>
    </x-hero>

    <section class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        @if ($guides->isEmpty())
            <p class="text-center text-slate-500">لا توجد أدلة مشاريع منشورة بعد.</p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ($guides as $guide)
                    <x-card href="{{ route('project-guides.show', $guide->slug) }}">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-karama-surface-blue text-karama-blue-dark">
                                <x-icon name="clipboard" class="h-6 w-6" />
                            </span>
                            <h2 class="font-bold text-karama-navy-dark">{{ $guide->title_ar }}</h2>
                        </div>
                        @if ($guide->summary_ar)
                            <p class="mt-3 text-sm leading-6 text-slate-500">{{ $guide->summary_ar }}</p>
                        @endif
                    </x-card>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.site>
