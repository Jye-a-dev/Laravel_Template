@props(['example'])

<article class="rounded-xl border border-slate-200 bg-white p-5 shadow-xs transition-shadow hover:shadow-sm">
    <div class="flex items-start justify-between gap-3">
        <div class="flex items-center gap-2.5">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-700">
                <x-lucide-layers class="h-4 w-4" />
            </span>
            <h3 class="text-sm font-semibold text-slate-900">{{ $example->title }}</h3>
        </div>
        <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
            {{ $example->status }}
        </span>
    </div>
    <p class="mt-3 text-sm leading-relaxed text-slate-600">
        {{ $example->description }}
    </p>
</article>
