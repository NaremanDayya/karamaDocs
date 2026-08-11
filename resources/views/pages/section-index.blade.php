<x-layouts.site :title="$section->title_ar" :description="$section->description_ar">
    <x-hero compact :eyebrow="$section->title_ar">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $section->title_ar }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-white/80">{{ $section->description_ar }}</p>
    </x-hero>

    <section class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        @if ($articles->isEmpty())
            <p class="text-center text-slate-500">لا توجد مقالات في هذا القسم بعد.</p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ($articles as $article)
                    <x-card href="{{ \App\Support\SectionRoutes::showRoute($section->key, $article->slug) }}">
                        <h2 class="font-bold text-karama-navy-dark">{{ $article->title_ar }}</h2>
                        @if ($article->excerpt_ar)
                            <p class="mt-2 text-sm leading-6 text-slate-500">{{ $article->excerpt_ar }}</p>
                        @endif
                        <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-karama-blue-dark">
                            قراءة المزيد
                            <x-icon name="arrow" class="h-4 w-4 rotate-180" />
                        </span>
                    </x-card>
                @endforeach
            </div>
        @endif
    </section>
</x-layouts.site>
