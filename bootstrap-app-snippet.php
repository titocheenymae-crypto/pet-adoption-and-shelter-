<?php
// In bootstrap/app.php, replace the ->withMiddleware(...) block with this:

->withMiddleware(function (Illuminate\Foundation\Configuration\Middleware $middleware): void {
    $middleware->redirectGuestsTo(fn () => route('login'));        // not logged in  -> /login
    $middleware->redirectUsersTo(fn () => route('dashboard'));     // already logged in -> /dashboard

    $middleware->web(append: [\App\Http\Middleware\NoCacheHeaders::class]);
    $middleware->alias(['once' => \App\Http\Middleware\PreventDoubleSubmit::class]);
})
