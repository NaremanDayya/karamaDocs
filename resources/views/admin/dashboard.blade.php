<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-karama-navy-dark leading-tight">لوحة التحكم</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
            <a href="{{ route('admin.articles.index') }}" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md">
                <p class="text-sm text-slate-500">المقالات</p>
                <p class="mt-2 text-3xl font-extrabold text-karama-navy-dark">{{ $counts['articles'] }}</p>
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md">
                <p class="text-sm text-slate-500">الأسئلة الشائعة</p>
                <p class="mt-2 text-3xl font-extrabold text-karama-navy-dark">{{ $counts['faqs'] }}</p>
            </a>
            <a href="{{ route('admin.project-guides.index') }}" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md">
                <p class="text-sm text-slate-500">أدلة المشاريع</p>
                <p class="mt-2 text-3xl font-extrabold text-karama-navy-dark">{{ $counts['project_guides'] }}</p>
            </a>
        </div>
    </div>
</x-app-layout>
