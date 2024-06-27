<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsGuru;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // ->withMiddleware(function (Middleware $middleware) {
    //     $middleware->alias([
    //         "isGuru" => IsGuru::class,
    //     ]);
    // })
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(IsGuru::class);
   })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
