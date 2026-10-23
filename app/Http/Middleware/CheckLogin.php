<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login
        if (!session('logged_in')) {
            return redirect('/')->withErrors([
                'error' => 'Silakan login terlebih dahulu.'
            ]);
        }

        return $next($request);
    }
}
