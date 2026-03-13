<?php

namespace App\Http\Middleware;

use Closure;

class ContentSecurityPolicy
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $vite = app()->environment('local') ? ' http://localhost:5173' : '';
        $viteWs = app()->environment('local') ? ' ws://localhost:5173' : '';

        $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.bunny.net https://ecoswapx.test https://www.google.com https://www.gstatic.com{$vite}; style-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.bunny.net https://ecoswapx.test{$vite}; img-src 'self' http://ecoswapx.test https://i.imgur.com https://ui-avatars.com https://www.fillster.com data:; font-src 'self' https://fonts.bunny.net;";

        $csp .= " connect-src 'self' https://ecoswapx.test{$vite}{$viteWs};";

        $csp .= " frame-src 'self' https:;";

        $response->header('Content-Security-Policy', $csp);

        $response->header('Cross-Origin-Embedder-Policy', 'unsafe-none');
        $response->header('Cross-Origin-Opener-Policy', 'same-origin');
        $response->header('Content-Security-Policy-Report-Only', $csp);

        return $response;
    }
}
