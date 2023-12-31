<?php

namespace App\Http\Middleware;

use Closure;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-Frame-Options', 'SAMEORIGIN');
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header('Content-Security-Policy', "default-src 'self'");
        $response->header('Cross-Origin-Embedder-Policy', 'require-corp');
        $response->header('Cross-Origin-Opener-Policy', 'same-origin');
        $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');

        $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        return $response;
    }
}
