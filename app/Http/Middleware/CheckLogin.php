<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('logged_in')) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Silakan login terlebih dahulu.',
                ], 401);
            }

            return redirect('/')->withErrors([
                'error' => 'Silakan login terlebih dahulu.',
            ]);
        }

        return $next($request);
    }
}
