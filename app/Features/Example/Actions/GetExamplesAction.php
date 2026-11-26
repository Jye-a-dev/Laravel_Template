<?php

declare(strict_types=1);

namespace App\Features\Example\Actions;

use App\Features\Example\Data\ExampleData;

final class GetExamplesAction
{
    /**
     * @return list<ExampleData>
     */
    public function execute(): array
    {
        return [
            new ExampleData(
                id: 1,
                title: 'Feature-Based Architecture',
                description: 'Business logic isolated in app/Features/* with thin routes and controllers.',
                status: 'ready',
                createdAt: now()->toDateString(),
            ),
            new ExampleData(
                id: 2,
                title: 'Type-Safe Frontend & Env',
                description: 'TypeScript strict mode, Zod env validation, Tailwind CSS v4, and Alpine.js.',
                status: 'ready',
                createdAt: now()->toDateString(),
            ),
            new ExampleData(
                id: 3,
                title: 'Automated Quality Gates',
                description: 'Larastan, Laravel Pint, ESLint v10, Prettier Blade, and Husky pre-commit hooks.',
                status: 'ready',
                createdAt: now()->toDateString(),
            ),
        ];
    }
}
