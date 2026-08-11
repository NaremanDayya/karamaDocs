<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-karama-navy-dark leading-tight">المقالات</h2>
            <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center rounded-md bg-karama-blue px-4 py-2 text-sm font-semibold text-white hover:bg-karama-blue-dark">
                + مقالة جديدة
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-karama-surface-50">
                    <tr>
                        <th class="px-4 py-3 text-start font-semibold text-slate-500">العنوان</th>
                        <th class="px-4 py-3 text-start font-semibold text-slate-500">القسم</th>
                        <th class="px-4 py-3 text-start font-semibold text-slate-500">الحالة</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($articles as $article)
                        <tr>
                            <td class="px-4 py-3 font-medium text-karama-navy-dark">{{ $article->title_ar }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $article->section->title_ar }}</td>
                            <td class="px-4 py-3">
                                @if ($article->published_at)
                                    <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700">منشورة</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">مسودة</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="font-medium text-karama-blue-dark hover:underline">تعديل</a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه المقالة؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ms-3 font-medium text-red-600 hover:underline">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-slate-400">لا توجد مقالات بعد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
