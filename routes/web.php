<?php

declare(strict_types=1);

use App\Features\Example\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExampleController::class, 'index'])->name('home');
Route::post('/examples', [ExampleController::class, 'store'])->name('examples.store');
