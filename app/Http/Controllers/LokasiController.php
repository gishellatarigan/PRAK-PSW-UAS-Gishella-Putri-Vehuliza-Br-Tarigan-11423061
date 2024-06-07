<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('admin.lokasi', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can leave this empty if you're not using a separate create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaLokasi' => 'required|string|max:255',
        ],[
            'namaLokasi.required' => 'Lokasi harus diisi',
        ]);

        DB::table('lokasis')->insert([
            'namaLokasi' => $validatedData['namaLokasi'],
        ]);

        Session::flash('success', 'Data Lokasi baru dengan nama "' . $validatedData['namaLokasi'] . '" berhasil ditambahkan!');

        return redirect()->route('admin.lokasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // You can leave this empty if you're not using a separate show view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.editlokasi', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'namaLokasi' => 'required|string|max:255',
        ],[
            'namaLokasi.required' => 'Lokasi harus diisi',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update([
            'namaLokasi' => $validatedData['namaLokasi'],
        ]);

        Session::flash('success', 'Data Lokasi dengan nama "' . $validatedData['namaLokasi'] . '" berhasil diupdate!');

        return redirect()->route('admin.lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        Session::flash('success', 'Data Lokasi dengan nama "' . $lokasi->namaLokasi . '" berhasil dihapus!');

        return redirect()->route('admin.lokasi.index');
    }
}
