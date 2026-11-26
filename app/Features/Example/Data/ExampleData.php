<?php

declare(strict_types=1);

namespace App\Features\Example\Data;

final readonly class ExampleData
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public string $status,
        public string $createdAt,
    ) {}

    /**
     * @return array{id: int, title: string, description: string, status: string, created_at: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->createdAt,
        ];
    }
}
