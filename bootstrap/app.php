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
        $middleware->alias([
            'company.auth' => \App\Http\Middleware\RedirectIfNotAuthenticatedCompany::class,
            'customer.auth' => \App\Http\Middleware\RedirectIfNotAuthenticatedCustomer::class,
            'role.customer' => \App\Http\Middleware\RoleMiddlewareCustomer::class,
            'role.company' => \App\Http\Middleware\RoleMiddlewareCompany::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
