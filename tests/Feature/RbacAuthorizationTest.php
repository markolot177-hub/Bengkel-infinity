<?php

namespace Tests\Feature;

use Tests\TestCase;

class RbacAuthorizationTest extends TestCase
{
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
        $this->markTestSkipped(
            'Pengujian anti-IDOR otomatis menunggu database pengujian.'
        );
    }
}
