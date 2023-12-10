<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

        protected function unauthenticated($request, array $guards)
    {
        throw ValidationException::withMessages([
            'message' => ['Your session has expired. Please log in again.'],
        ])->redirectTo(route('login'));
    }
}
