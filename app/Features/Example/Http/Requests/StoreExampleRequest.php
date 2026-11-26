<?php

declare(strict_types=1);

namespace App\Features\Example\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreExampleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:120'],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
