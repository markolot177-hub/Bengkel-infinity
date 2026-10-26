<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_server_error_displays_custom_500_page(): void
    {
        Route::get('/test-error-500', function () {
            abort(500);
        });

        $response = $this->get('/test-error-500');

        $response->assertStatus(500);
        $response->assertSee('Terjadi Kesalahan Server');
    }

    public function test_database_query_error_displays_custom_500_page(): void
    {
        Route::get('/test-database-error', function () {
            throw new QueryException(
                'mysql',
                'select * from table_that_does_not_exist',
                [],
                new \PDOException('Simulated database query failure')
            );
        });

        $response = $this->get('/test-database-error');

        $response->assertStatus(500);
        $response->assertSee('Terjadi Kesalahan Server');
    }

    public function test_exception_is_logged(): void
    {
        Log::spy();

        Route::get('/test-logging-error', function () {
            throw new \RuntimeException('Tes logging otomatis');
        });

        $response = $this->get('/test-logging-error');

        $response->assertStatus(500);

        Log::shouldHaveReceived('error')
            ->with(
                'Aplikasi mengalami exception',
                \Mockery::on(function ($context) {
                    return isset($context['exception'])
                        && $context['exception'] === \RuntimeException::class
                        && isset($context['message'])
                        && $context['message'] === 'Tes logging otomatis';
                })
            )
            ->once();
    }
}
