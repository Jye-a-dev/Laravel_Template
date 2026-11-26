<?php

declare(strict_types=1);

namespace App\Features\Example\Http\Controllers;

use App\Features\Example\Actions\CreateExampleAction;
use App\Features\Example\Actions\GetExamplesAction;
use App\Features\Example\Http\Requests\StoreExampleRequest;
use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

final class ExampleController extends Controller
{
    public function index(GetExamplesAction $action): View
    {
        return view('pages.home', [
            'examples' => $action->execute(),
        ]);
    }

    public function store(StoreExampleRequest $request, CreateExampleAction $action): JsonResponse
    {
        $validated = $request->validated();
        $title = is_string($validated['title'] ?? null) ? $validated['title'] : '';
        $description = is_string($validated['description'] ?? null) ? $validated['description'] : null;

        $example = $action->execute($title, $description);

        return ApiResponse::success(
            data: $example->toArray(),
            message: 'Example item created.',
            status: 201,
        );
    }
}
