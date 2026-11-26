<?php

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('serve:env', function () {
    $rawPort = config('app.server_port', 5000);
    $port = is_numeric($rawPort) ? (int) $rawPort : 5000;

    $this->call('serve', ['--port' => $port]);
})->purpose('Serve the application using SERVER_PORT from .env');
