<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Lokasi;
use App\Models\Pengelola;

class UserBookingController extends Controller
{
    public function index()
    {
        $admin = Admin::all(); 
        $lokasi = Lokasi::all(); 

        return view('user.UserBooking', compact('admin', 'lokasi')); 
    }

    public function storePengelola(Request $request)
    {
        $request->validate([
            'namaPemesan' => 'required|string|max:255',
            'lapangan' => 'required|string|max:255',
            'lokasi' => 'required|exists:lokasis,id', 
        ]);

        // Simpan data pengelola ke database
        $pengelola = new Pengelola(); // Sesuaikan dengan model yang digunakan
        $pengelola->nama_pemesan = $request->namaPemesan;
        $pengelola->lapangan = $request->lapangan;
        $pengelola->lokasi_id = $request->lokasi;
        $pengelola->save();

        return redirect()->back()->with('success', 'Pengelola added successfully!');
    }
}
