<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckRole;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checklogin' => CheckLogin::class,
            'role' => CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // Logging exception
        $exceptions->report(function (\Throwable $e): void {
            Log::error('Aplikasi mengalami exception', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        });

        // Error validasi tetap ditangani Laravel
        $exceptions->render(function (
            ValidationException $e,
            Request $request
        ) {
            return null;
        });

        // Error 404
        $exceptions->render(function (
            NotFoundHttpException $e,
            Request $request
        ) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Halaman atau data tidak ditemukan.',
                ], 404);
            }

            return response()->view('errors.404', [], 404);
        });

        // Error 403
        $exceptions->render(function (
            AccessDeniedHttpException $e,
            Request $request
        ) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Akses ditolak.',
                ], 403);
            }

            return response()->view('errors.403', [], 403);
        });

        // Error query database
        $exceptions->render(function (
            QueryException $e,
            Request $request
        ) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Terjadi masalah pada database.',
                ], 500);
            }

            return response()->view('errors.500', [], 500);
        });

        // Error umum, termasuk kegagalan koneksi yang tidak
        // ditangani oleh QueryException
        $exceptions->render(function (
            \Throwable $e,
            Request $request
        ) {
            if (
                $e instanceof ValidationException ||
                $e instanceof HttpExceptionInterface
            ) {
                return null;
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Terjadi kesalahan pada server.',
                ], 500);
            }

            return response()->view('errors.500', [], 500);
        });
    })->create();
