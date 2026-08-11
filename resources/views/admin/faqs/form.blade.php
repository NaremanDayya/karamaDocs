@php $editing = $faq->exists; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-karama-navy-dark leading-tight">
            {{ $editing ? 'تعديل سؤال' : 'سؤال جديد' }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{ $editing ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" class="space-y-6 rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
            @csrf
            @if ($editing) @method('PUT') @endif

            <div>
                <x-input-label for="category" value="الفئة" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category', $faq->category)" required list="faq-categories" />
                <datalist id="faq-categories">
                    <option value="الحساب والانضمام" />
                    <option value="المهام والتسليم" />
                    <option value="الجودة والتقييم" />
                </datalist>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="question_ar" value="السؤال" />
                <x-text-input id="question_ar" name="question_ar" type="text" class="mt-1 block w-full" :value="old('question_ar', $faq->question_ar)" required />
                <x-input-error :messages="$errors->get('question_ar')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="answer_ar" value="الإجابة" />
                <textarea id="answer_ar" name="answer_ar" rows="6" class="mt-1 block w-full rounded-md border-slate-300 focus:border-karama-blue focus:ring-karama-blue" required>{{ old('answer_ar', $faq->answer_ar) }}</textarea>
                <x-input-error :messages="$errors->get('answer_ar')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="sort_order" value="ترتيب الظهور" />
                <x-text-input id="sort_order" name="sort_order" type="number" min="0" class="mt-1 block w-full sm:w-40" :value="old('sort_order', $faq->sort_order)" />
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="inline-flex items-center rounded-md bg-karama-blue px-5 py-2.5 text-sm font-semibold text-white hover:bg-karama-blue-dark">
                    {{ $editing ? 'حفظ التعديلات' : 'إضافة السؤال' }}
                </button>
                <a href="{{ route('admin.faqs.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700">إلغاء</a>
            </div>
        </form>
    </div>
</x-app-layout>
