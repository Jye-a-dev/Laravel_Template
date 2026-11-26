<x-layouts::app title="{{ config('app.name', 'Laravel Template') }}">
    <section class="space-y-8">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-semibold tracking-wider text-slate-500 uppercase">Production-Ready Starter</p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Laravel Feature-Based Template
                    </h1>
                    <p class="mt-2 max-w-2xl text-sm text-slate-600">
                        Thin Routes &rarr; Thin Controllers &rarr; FormRequests &rarr; Actions &rarr; Readonly DTOs +
                        Blade Components, Alpine.js, and Tailwind CSS v4.
                    </p>
                </div>
            </div>

            <div class="mt-6 border-t border-slate-100 pt-6" x-data="{
                title: '',
                description: '',
                submitting: false,
                message: '',
                error: '',
                async submit() {
                    this.submitting = true;
                    this.message = '';
                    this.error = '';
                    try {
                        const res = await fetch('{{ route('examples.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.getAttribute('content') ?? '',
                            },
                            body: JSON.stringify({
                                title: this.title,
                                description: this.description || null,
                            }),
                        });
                        const json = await res.json();
                        if (!res.ok) {
                            this.error = json.message ?? 'Validation failed';
                            return;
                        }
                        this.message = `Created #${json.data.id}: ${json.data.title}`;
                        this.title = '';
                        this.description = '';
                    } catch {
                        this.error = 'Network error';
                    } finally {
                        this.submitting = false;
                    }
                },
            }">
                <form class="flex flex-col gap-3 sm:flex-row sm:items-end" x-on:submit.prevent="submit">
                    <div class="flex-1">
                        <label for="example-title" class="mb-1 block text-xs font-medium text-slate-700">
                            Test Action Endpoint (POST /examples)
                        </label>
                        <x-ui.input id="example-title" x-model="title" placeholder="Enter example title..." required />
                    </div>
                    <x-ui.button type="submit" x-bind:disabled="submitting">
                        <x-lucide-plus class="h-4 w-4" />
                        <span x-text="submitting ? 'Sending...' : 'Create Example'"></span>
                    </x-ui.button>
                </form>
                <p x-show="message" x-text="message" class="mt-2 text-xs font-medium text-emerald-700"></p>
                <p x-show="error" x-text="error" class="mt-2 text-xs font-medium text-rose-600"></p>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            @foreach ($examples as $example)
                @include('features.example.card', ['example' => $example])
            @endforeach
        </div>
    </section>
</x-layouts::app>
