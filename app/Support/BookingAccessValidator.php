<?php

namespace App\Support;

use App\Models\Booking;

class BookingAccessValidator
{
    public function customerOwnsBooking(Booking $booking): bool
    {
        return session('role') === 'pelanggan'
            && session()->has('id_pelanggan')
            && (int) session('id_pelanggan') === (int) $booking->id_pelanggan;
    }
}
