<x-layouts.site :title="$article->title_ar" :description="$article->excerpt_ar">
    <div class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-slate-500">
            <a href="{{ \App\Support\SectionRoutes::indexRoute($section->key) }}" class="font-medium text-karama-blue-dark hover:underline">
                {{ $section->title_ar }}
            </a>
            <span class="mx-2">/</span>
            <span>{{ $article->title_ar }}</span>
        </nav>

        <h1 class="text-2xl font-extrabold text-karama-navy-dark sm:text-3xl">{{ $article->title_ar }}</h1>
        @if ($article->excerpt_ar)
            <p class="mt-3 text-lg text-slate-500">{{ $article->excerpt_ar }}</p>
        @endif

        <div class="prose-karama mt-8">
            {!! $article->body_html !!}
        </div>

        @if ($related->isNotEmpty())
            <div class="mt-16 border-t border-slate-200 pt-10">
                <h2 class="mb-4 text-sm font-bold text-slate-400">اقرأ أيضًا في {{ $section->title_ar }}</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($related as $item)
                        <x-card href="{{ \App\Support\SectionRoutes::showRoute($section->key, $item->slug) }}">
                            <h3 class="font-bold text-karama-navy-dark">{{ $item->title_ar }}</h3>
                        </x-card>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.site>
