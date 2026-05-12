<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Gabungkan semua konfigurasi middleware di sini

        $middleware->trustProxies(at: '*');
        
        $middleware->web(append: [
            \App\Http\Middleware\LogUserActivity::class,
        ]);

        // Jika ada alias, tambahkan di sini juga
        // $middleware->alias([
        //    'role' => \App\Http\Middleware\RoleMiddleware::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
