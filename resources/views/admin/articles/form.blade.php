@php $editing = $article->exists; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-karama-navy-dark leading-tight">
            {{ $editing ? 'تعديل مقالة' : 'مقالة جديدة' }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{ $editing ? route('admin.articles.update', $article) : route('admin.articles.store') }}" class="space-y-6 rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
            @csrf
            @if ($editing) @method('PUT') @endif

            <div>
                <x-input-label for="section_id" value="القسم" />
                <select id="section_id" name="section_id" class="mt-1 block w-full rounded-md border-slate-300 focus:border-karama-blue focus:ring-karama-blue">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" @selected(old('section_id', $article->section_id) == $section->id)>
                            {{ $section->title_ar }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('section_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="title_ar" value="العنوان" />
                <x-text-input id="title_ar" name="title_ar" type="text" class="mt-1 block w-full" :value="old('title_ar', $article->title_ar)" required />
                <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="slug" value="الرابط المختصر (Slug) — اتركه فارغًا للإنشاء التلقائي" />
                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" dir="ltr" :value="old('slug', $article->slug)" />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="excerpt_ar" value="مقتطف قصير" />
                <textarea id="excerpt_ar" name="excerpt_ar" rows="2" class="mt-1 block w-full rounded-md border-slate-300 focus:border-karama-blue focus:ring-karama-blue">{{ old('excerpt_ar', $article->excerpt_ar) }}</textarea>
                <x-input-error :messages="$errors->get('excerpt_ar')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="body_ar" value="المحتوى (Markdown)" />
                <textarea id="body_ar" name="body_ar" rows="14" class="mt-1 block w-full rounded-md border-slate-300 font-mono text-sm focus:border-karama-blue focus:ring-karama-blue" required>{{ old('body_ar', $article->body_ar) }}</textarea>
                <x-input-error :messages="$errors->get('body_ar')" class="mt-2" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="sort_order" value="ترتيب الظهور" />
                    <x-text-input id="sort_order" name="sort_order" type="number" min="0" class="mt-1 block w-full" :value="old('sort_order', $article->sort_order)" />
                </div>
                <div class="flex items-end pb-2">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="published" value="1" class="rounded border-slate-300 text-karama-blue focus:ring-karama-blue" @checked(old('published', (bool) $article->published_at))>
                        <span class="text-sm text-slate-700">منشورة</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="inline-flex items-center rounded-md bg-karama-blue px-5 py-2.5 text-sm font-semibold text-white hover:bg-karama-blue-dark">
                    {{ $editing ? 'حفظ التعديلات' : 'إنشاء المقالة' }}
                </button>
                <a href="{{ route('admin.articles.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">إلغاء</a>
            </div>
        </form>
    </div>
</x-app-layout>
