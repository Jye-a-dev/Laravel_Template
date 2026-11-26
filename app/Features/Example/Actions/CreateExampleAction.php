<?php

declare(strict_types=1);

namespace App\Features\Example\Actions;

use App\Features\Example\Data\ExampleData;

final class CreateExampleAction
{
    public function execute(string $title, ?string $description = null): ExampleData
    {
        return new ExampleData(
            id: random_int(100, 999),
            title: $title,
            description: $description ?? 'Created via Thin Controller -> FormRequest -> Action.',
            status: 'active',
            createdAt: now()->toDateString(),
        );
    }
}
