<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'namaPemesan' => 'required|string|max:255',
            'lapangan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        // Simpan data pesanan ke database
        Order::create([
            'nama_pemesan' => $validatedData['namaPemesan'],
            'lapangan' => $validatedData['lapangan'],
            'lokasi' => $validatedData['lokasi'],
        ]);

        // Redirect atau kirim respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Pesanan berhasil disimpan.');
    }
}
