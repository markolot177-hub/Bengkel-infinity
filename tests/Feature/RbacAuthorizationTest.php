<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Booking;
use App\Support\BookingAccessValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class RbacAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_booking_servis(): void
    {
        $this->get('/booking-servis')->assertRedirect('/');
    }

    public function test_guest_cannot_access_customer_portal(): void
    {
        $this->get('/portal-pelanggan')->assertRedirect('/');
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $this->get('/dashboard-admin')->assertRedirect('/');
    }

    public function test_customer_cannot_access_admin_dashboard(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ])->get('/dashboard-admin')->assertForbidden();
    }

    public function test_customer_cannot_access_cashier_page(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ])->get('/kasir')->assertForbidden();
    }

    public function test_customer_cannot_access_mechanic_workstation(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ])->get('/workstation-mekanik')->assertForbidden();
    }

    public function test_customer_portal_only_shows_own_bookings(): void
    {
        $customerA = DB::table('pelanggan')->insertGetId([
            'nama' => 'Pelanggan Test A',
            'no_hp' => '080000000001',
            'alamat' => 'Alamat Test A',
            'username' => 'test_customer_a',
            'password' => bcrypt('password-test'),
        ], 'id_pelanggan');

        $customerB = DB::table('pelanggan')->insertGetId([
            'nama' => 'Pelanggan Test B',
            'no_hp' => '080000000002',
            'alamat' => 'Alamat Test B',
            'username' => 'test_customer_b',
            'password' => bcrypt('password-test'),
        ], 'id_pelanggan');

        $bookingA = DB::table('bookings')->insertGetId([
            'no_booking' => 'BC-TEST00001',
            'id_pelanggan' => $customerA,
            'nopol' => 'D1234AAA',
            'nama_pelanggan' => 'Pelanggan Test A',
            'kendaraan' => 'Motor Test A',
            'jenis_layanan' => 'Servis ringan',
            'tanggal_kedatangan' => '2026-10-25',
            'sesi_waktu' => 'Pagi',
            'keluhan' => 'Booking milik A',
            'status' => 'Menunggu',
            'created_at' => now(),
            'updated_at' => now(),
        ], 'id');

        DB::table('bookings')->insert([
            'no_booking' => 'BC-TEST00002',
            'id_pelanggan' => $customerB,
            'nopol' => 'D5678BBB',
            'nama_pelanggan' => 'Pelanggan Test B',
            'kendaraan' => 'Motor Test B',
            'jenis_layanan' => 'Servis ringan',
            'tanggal_kedatangan' => '2026-10-25',
            'sesi_waktu' => 'Siang',
            'keluhan' => 'Booking milik B',
            'status' => 'Menunggu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => $customerA,
        ])->get('/portal-pelanggan');

        $response->assertOk();

        $response->assertViewHas('bookings', function ($bookings) use ($customerA, $bookingA) {
            return $bookings->count() === 1
                && (int) $bookings->first()->id === $bookingA
                && (int) $bookings->first()->id_pelanggan === $customerA;
        });
    }

    public function test_customer_cannot_access_another_customers_booking(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ]);

        $booking = new Booking([
            'id_pelanggan' => 2,
        ]);

        $validator = app(BookingAccessValidator::class);

        $this->assertFalse(
            $validator->customerOwnsBooking($booking)
        );
    }

    public function test_guest_cannot_access_api_pelanggan(): void
    {
        $this->getJson('/api/pelanggan')->assertUnauthorized();
    }

    public function test_guest_cannot_access_api_transaksi(): void
    {
        $this->getJson('/api/transaksi')->assertUnauthorized();
    }

    public function test_customer_cannot_access_admin_api_pelanggan(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ])->getJson('/api/pelanggan')->assertForbidden();
    }

    public function test_customer_cannot_access_admin_api_pengelola(): void
    {
        $this->withSession([
            'logged_in' => true,
            'role' => 'pelanggan',
            'id_pelanggan' => 1,
        ])->getJson('/api/pengelola')->assertForbidden();
    }

    public function test_admin_api_pengelola_does_not_expose_password(): void
    {
        DB::table('pengelola')->insert([
            'nama' => 'Admin Test',
            'no_hp' => '080000000099',
            'username' => 'admin_security_test',
            'password' => bcrypt('password-rahasia'),
            'role' => 'admin',
        ]);

        $response = $this->withSession([
            'logged_in' => true,
            'role' => 'admin',
        ])->getJson('/api/pengelola');

        $response->assertOk();
        $response->assertJsonMissingPath('data.0.password');
    }
}
