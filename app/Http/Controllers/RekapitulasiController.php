<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class RekapitulasiController extends Controller
{
    public function index()
    {
        // Mengambil data booking dari database
        $bookings = Booking::all();

        // Menghitung jumlah total booking
        $totalBookings = $bookings->count();

        // Menghitung total pendapatan dari seluruh booking
        $totalIncome = $bookings->sum('total_price');

        // Menghitung rata-rata pendapatan per booking
        $averageIncome = $totalBookings > 0 ? $totalIncome / $totalBookings : 0;

        return view('admin.rekapitulasi', compact('bookings', 'totalBookings', 'totalIncome', 'averageIncome'));
    }
}
