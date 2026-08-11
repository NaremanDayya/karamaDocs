@php
    $editing = $guide->exists;
    $checklistText = old('checklist_ar', is_array($guide->checklist_ar) ? implode("\n", $guide->checklist_ar) : '');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-karama-navy-dark leading-tight">
            {{ $editing ? 'تعديل دليل مشروع' : 'دليل مشروع جديد' }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{ $editing ? route('admin.project-guides.update', $guide) : route('admin.project-guides.store') }}" class="space-y-8 rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
            @csrf
            @if ($editing) @method('PUT') @endif

            <div>
                <x-input-label for="title_ar" value="عنوان المشروع" />
                <x-text-input id="title_ar" name="title_ar" type="text" class="mt-1 block w-full" :value="old('title_ar', $guide->title_ar)" required />
                <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="slug" value="الرابط المختصر (Slug) — اتركه فارغًا للإنشاء التلقائي" />
                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" dir="ltr" :value="old('slug', $guide->slug)" />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="summary_ar" value="ملخص قصير" />
                <textarea id="summary_ar" name="summary_ar" rows="2" class="mt-1 block w-full rounded-md border-slate-300 focus:border-karama-blue focus:ring-karama-blue">{{ old('summary_ar', $guide->summary_ar) }}</textarea>
            </div>

            <hr class="border-slate-200">

            @foreach ([
                ['overview_ar', 'النظرة العامة (Project Overview)'],
                ['foundations_ar', 'الأساسيات (Foundations)'],
                ['foundation_breakdown_ar', 'تفصيل الأساسيات (Foundation Breakdown)'],
            ] as [$field, $label])
                <div>
                    <x-input-label :for="$field" :value="$label.' — Markdown'" />
                    <textarea id="{{ $field }}" name="{{ $field }}" rows="6" class="mt-1 block w-full rounded-md border-slate-300 font-mono text-sm focus:border-karama-blue focus:ring-karama-blue">{{ old($field, $guide->$field) }}</textarea>
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <div>
                <x-input-label for="checklist_ar" value="قائمة التحقق (Checklist) — عنصر واحد في كل سطر" />
                <textarea id="checklist_ar" name="checklist_ar" rows="6" class="mt-1 block w-full rounded-md border-slate-300 text-sm focus:border-karama-blue focus:ring-karama-blue">{{ $checklistText }}</textarea>
            </div>

            @foreach ([
                ['reviewer_criteria_ar', 'معايير المراجعة (Reviewer Criteria)'],
                ['evaluation_rubric_ar', 'معايير التقييم (Evaluation Rubric)'],
                ['examples_edge_cases_ar', 'أمثلة وحالات حدّية (Examples & Edge Cases)'],
                ['non_evaluated_guidance_ar', 'إرشادات غير مُقيَّمة (Non-Evaluated Guidance)'],
            ] as [$field, $label])
                <div>
                    <x-input-label :for="$field" :value="$label.' — Markdown'" />
                    <textarea id="{{ $field }}" name="{{ $field }}" rows="6" class="mt-1 block w-full rounded-md border-slate-300 font-mono text-sm focus:border-karama-blue focus:ring-karama-blue">{{ old($field, $guide->$field) }}</textarea>
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <hr class="border-slate-200">

            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="published" value="1" class="rounded border-slate-300 text-karama-blue focus:ring-karama-blue" @checked(old('published', (bool) $guide->published_at))>
                <span class="text-sm text-slate-700">منشور</span>
            </label>

            <div class="flex items-center gap-4">
                <button type="submit" class="inline-flex items-center rounded-md bg-karama-blue px-5 py-2.5 text-sm font-semibold text-white hover:bg-karama-blue-dark">
                    {{ $editing ? 'حفظ التعديلات' : 'إنشاء الدليل' }}
                </button>
                <a href="{{ route('admin.project-guides.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">إلغاء</a>
            </div>
        </form>
    </div>
</x-app-layout>
