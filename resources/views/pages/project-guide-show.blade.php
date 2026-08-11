@php
    $tocSections = [
        ['id' => 'overview', 'label' => 'النظرة العامة', 'html' => $guide->overview_html],
        ['id' => 'foundations', 'label' => 'الأساسيات', 'html' => $guide->foundations_html],
        ['id' => 'foundation-breakdown', 'label' => 'تفصيل الأساسيات', 'html' => $guide->foundation_breakdown_html],
        ['id' => 'checklist', 'label' => 'قائمة التحقق', 'checklist' => $guide->checklist_ar],
        ['id' => 'reviewer-criteria', 'label' => 'معايير المراجعة', 'html' => $guide->reviewer_criteria_html],
        ['id' => 'evaluation-rubric', 'label' => 'معايير التقييم', 'html' => $guide->evaluation_rubric_html],
        ['id' => 'examples', 'label' => 'أمثلة وحالات حدّية', 'html' => $guide->examples_edge_cases_html],
        ['id' => 'non-evaluated', 'label' => 'إرشادات غير مُقيَّمة', 'html' => $guide->non_evaluated_guidance_html],
    ];
@endphp

<x-layouts.site :title="$guide->title_ar" :description="$guide->summary_ar">
    <x-hero compact eyebrow="دليل مشروع">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $guide->title_ar }}</h1>
        @if ($guide->summary_ar)
            <p class="mx-auto mt-4 max-w-2xl text-white/80">{{ $guide->summary_ar }}</p>
        @endif
    </x-hero>

    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-[220px_1fr] lg:gap-12">
            <aside class="hidden lg:block">
                <nav class="sticky top-24 space-y-1 text-sm">
                    @foreach ($tocSections as $item)
                        @if (!empty($item['html']) || !empty($item['checklist']))
                            <a href="#{{ $item['id'] }}" class="block rounded-md px-3 py-1.5 text-slate-500 hover:bg-karama-surface-100 hover:text-karama-navy-dark">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>
            </aside>

            <div class="min-w-0 space-y-14">
                @foreach ($tocSections as $item)
                    @continue(empty($item['html']) && empty($item['checklist']))
                    <section id="{{ $item['id'] }}" class="scroll-mt-24">
                        <h2 class="mb-4 flex items-center gap-2 text-xl font-bold text-karama-navy-dark">
                            <span class="h-2 w-2 rounded-full bg-karama-blue"></span>
                            {{ $item['label'] }}
                        </h2>

                        @if (!empty($item['checklist']))
                            <ul class="space-y-2">
                                @foreach ($item['checklist'] as $checkItem)
                                    <li class="flex items-start gap-2 rounded-lg border border-slate-200 bg-white p-3">
                                        <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-karama-cyan" />
                                        <span class="text-slate-700">{{ $checkItem }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="prose-karama">
                                {!! $item['html'] !!}
                            </div>
                        @endif
                    </section>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.site>
