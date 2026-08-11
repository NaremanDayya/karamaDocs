<x-layouts.site :description="'أكاديمية كرامة لتصنيف البيانات — كل ما يحتاجه موسِمو كرامة لفهم عملهم وقياس جودته.'">
    <x-hero eyebrow="Native • Trained • Invested">
        <h1 class="text-3xl font-extrabold text-white sm:text-5xl leading-tight">
            ذكاؤك الاصطناعي العربي<br class="hidden sm:block"> بجودة البشر الذين دربوه
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg text-white/80">
            أهلًا بك في أكاديمية كرامة — دليلك الشامل لفهم من نحن، وكيف نقيس الجودة، وكيف تنجز كل مهمة بثقة.
        </p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('getting-started') }}" class="inline-flex items-center justify-center rounded-md bg-karama-blue px-6 py-3 text-base font-semibold text-white transition hover:bg-karama-blue-dark">
                ابدأ الآن
            </a>
            <a href="{{ route('faq') }}" class="inline-flex items-center justify-center rounded-md bg-white/10 px-6 py-3 text-base font-semibold text-white transition hover:bg-white/20">
                تصفح الأسئلة الشائعة
            </a>
        </div>

        <div class="mt-16 grid grid-cols-2 gap-8 sm:grid-cols-4">
            <x-stat value="%91" label="أعلى دقة مسجّلة" dark />
            <x-stat value="0.623" label="درجة Kappa" dark />
            <x-stat value="+5" label="عائلات لهجات عربية" dark />
            <x-stat value="100%" label="مملوكة للعاملين" dark />
        </div>
    </x-hero>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-karama-navy-dark sm:text-3xl">كل ما تحتاجه في مكان واحد</h2>
            <p class="mx-auto mt-3 max-w-2xl text-slate-500">
                من خطواتك الأولى إلى أدلة المشاريع التفصيلية ومعايير التقييم — هذه الأكاديمية هي مرجعك المستمر.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($sections as $section)
                <x-card href="{{ \App\Support\SectionRoutes::indexRoute($section->key) }}">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-karama-surface-blue text-karama-blue-dark">
                            <x-icon :name="$section->icon" class="h-6 w-6" />
                        </span>
                        <h3 class="font-bold text-karama-navy-dark">{{ $section->title_ar }}</h3>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-slate-500">{{ $section->description_ar }}</p>
                    <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-karama-blue-dark">
                        عرض القسم
                        <x-icon name="arrow" class="h-4 w-4 rotate-180" />
                    </span>
                </x-card>
            @endforeach
        </div>
    </section>

    <section class="border-t border-slate-200 bg-karama-surface-50">
        <div class="mx-auto max-w-4xl px-4 py-16 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-karama-navy-dark">Native. Trained. Invested.</h2>
            <p class="mx-auto mt-4 max-w-2xl leading-7 text-slate-600">
                موسِمونا متحدثون أصليون للعربية بلهجاتها، يمرّون بتدريب منظم قبل أي عمل إنتاجي، ومستثمَرون في نتائج عملهم على المدى الطويل — لا مجرد متعاقدين عابرين. هذا الفرق هو ما يصنع الفارق في كل مجموعة بيانات نسلّمها.
            </p>
        </div>
    </section>
</x-layouts.site>
