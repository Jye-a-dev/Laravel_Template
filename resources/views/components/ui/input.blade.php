@props([
    'type' => 'text',
])

<input type="{{ $type }}"
    {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500']) }} />
