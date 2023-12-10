<?php

namespace App\Http\Middleware;

use Closure;

class ContentSecurityPolicy
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.bunny.net https://ecoswapx.test https://www.google.com https://www.gstatic.com; style-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.bunny.net https://ecoswapx.test; img-src 'self' https://i.imgur.com https://ui-avatars.com data:; font-src 'self' https://fonts.bunny.net;";

        $csp .= " connect-src 'self' https://ecoswapx.test;";

        $csp .= " frame-src 'self' https:;";

        $response->header('Content-Security-Policy', $csp);

        $response->header('Cross-Origin-Embedder-Policy', 'unsafe-none');
        $response->header('Cross-Origin-Opener-Policy', 'same-origin');
        $response->header('Content-Security-Policy-Report-Only', $csp);

        return $response;
    }
}
