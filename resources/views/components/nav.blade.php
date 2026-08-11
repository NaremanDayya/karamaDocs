@php
    use App\Models\Section;
    use App\Support\SectionRoutes;

    $navSections = Section::whereNot('key', Section::KEY_HOME)->orderBy('sort_order')->get();
    $routeFor = fn (string $key) => SectionRoutes::indexRoute($key);
@endphp

<header x-data="{ open: false }" class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
            <x-logo class="h-9 w-auto" />
            <span class="font-bold text-karama-navy-dark hidden sm:inline">أكاديمية كرامة</span>
        </a>

        <nav class="hidden lg:flex items-center gap-1">
            @foreach ($navSections as $section)
                <a
                    href="{{ $routeFor($section->key) }}"
                    class="rounded-md px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-karama-surface-100 hover:text-karama-navy-dark {{ request()->url() === $routeFor($section->key) ? 'text-karama-navy-dark bg-karama-surface-100' : '' }}"
                >
                    {{ $section->title_ar }}
                </a>
            @endforeach
        </nav>

        <div class="hidden lg:block">
            <a href="{{ route('getting-started') }}" class="inline-flex items-center rounded-md bg-karama-blue px-4 py-2 text-sm font-semibold text-white transition hover:bg-karama-blue-dark">
                ابدأ الآن
            </a>
        </div>

        <button @click="open = !open" type="button" class="lg:hidden inline-flex items-center justify-center rounded-md p-2 text-slate-500 hover:bg-karama-surface-100">
            <x-icon name="menu" class="h-6 w-6" x-show="!open" />
            <x-icon name="close" class="h-6 w-6" x-show="open" />
        </button>
    </div>

    <div x-show="open" class="lg:hidden border-t border-slate-200 bg-white">
        <nav class="space-y-1 px-4 py-3">
            @foreach ($navSections as $section)
                <a href="{{ $routeFor($section->key) }}" class="block rounded-md px-3 py-2 text-sm font-medium text-slate-600 hover:bg-karama-surface-100 hover:text-karama-navy-dark">
                    {{ $section->title_ar }}
                </a>
            @endforeach
            <a href="{{ route('getting-started') }}" class="mt-2 block rounded-md bg-karama-blue px-4 py-2 text-center text-sm font-semibold text-white">
                ابدأ الآن
            </a>
        </nav>
    </div>
</header>
