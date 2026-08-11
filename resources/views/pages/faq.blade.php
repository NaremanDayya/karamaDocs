<x-layouts.site title="الأسئلة الشائعة" description="إجابات سريعة على الأسئلة الأكثر تكرارًا من فريق التوسيم.">
    <x-hero compact eyebrow="نجيبك بسرعة">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">الأسئلة الشائعة</h1>
        <p class="mx-auto mt-4 max-w-2xl text-white/80">ابدأ من هنا دائمًا — معظم الأسئلة لها إجابة جاهزة.</p>
    </x-hero>

    <section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        @forelse ($faqsByCategory as $category => $faqs)
            <div class="mb-10">
                <h2 class="mb-2 text-lg font-bold text-karama-navy-dark">{{ $category }}</h2>
                <div>
                    @foreach ($faqs as $faq)
                        <x-accordion-item :question="$faq->question_ar">
                            {{ $faq->answer_ar }}
                        </x-accordion-item>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-center text-slate-500">لا توجد أسئلة شائعة بعد.</p>
        @endforelse
    </section>
</x-layouts.site>
