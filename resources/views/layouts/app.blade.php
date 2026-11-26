<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title ?? config('app.name', 'Laravel Template') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-base font-semibold text-slate-900">
                <x-lucide-box class="h-5 w-5 text-slate-700" />
                <span>{{ config('app.name', 'Laravel Template') }}</span>
            </a>
            <span class="rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs text-slate-600">
                Laravel {{ app()->version() }} &middot; PHP {{ PHP_VERSION }}
            </span>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-10 sm:px-6">
        {{ $slot }}
    </main>
</body>

</html>
