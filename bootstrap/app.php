<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Not logged in -> send to /login
        $middleware->redirectGuestsTo(fn () => route('login'));

        // Already logged in -> send to /dashboard
        $middleware->redirectUsersTo(fn () => route('dashboard'));

        // Stops the Back button from showing cached pages after logout
        $middleware->web(append: [
            \App\Http\Middleware\NoCacheHeaders::class,
        ]);

        // One-time form tokens (prevents double submits)
        $middleware->alias([
            'single.submit' => \App\Http\Middleware\PreventDoubleSubmit::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();