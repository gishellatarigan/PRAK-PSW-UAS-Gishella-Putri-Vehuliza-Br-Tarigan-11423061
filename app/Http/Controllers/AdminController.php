<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengelola;
use App\Models\Member;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexPengelola()
    {
        $pengelola = Pengelola::all();
        $lokasi = Lokasi::all();
        return view('admin.pengelola', compact('pengelola', 'lokasi'));
    }

    public function createPengelola(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengelola' => 'required|string|max:255',
            'username' => 'required|string|min:5|max:20|unique:pengelolas',
            'password' => 'required|string|min:5|max:10',
            'lokasi_id' => 'required|exists:lokasis,id', // tambahkan validasi untuk lokasi_id
        ], [
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username minimal 5 huruf',
            'username.max' => 'Username maksimal 20 huruf',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 huruf',
            'password.max' => 'Password maksimal 10 huruf',
        ]);

        // Simpan data pengelola
        $pengelola = new Pengelola();
        $pengelola->nama_pengelola = $validatedData['nama_pengelola'];
        $pengelola->username = $validatedData['username'];
        $pengelola->password = Hash::make($validatedData['password']);
        $pengelola->lokasi_id = $validatedData['lokasi_id'];
        $pengelola->save();

        Session::flash('success', 'Data Pengelola baru dengan nama "' . $validatedData['nama_pengelola'] . '" berhasil ditambahkan!');

        return redirect()->route('admin.pengelola.index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('username', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('admin.login')->with('error', 'Username atau password salah');
        }
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // Add logic to store data
    }

    public function show(string $id)
    {
        // Add logic to show data based on ID
    }

    public function edit(string $id)
    {
        // Add logic to show edit form
    }

    public function update(Request $request, string $id)
    {
        // Add logic to update data
    }

    public function destroy(string $id)
    {
        // Add logic to delete data
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function saveRole(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required|string|max:255',
        ]);

        DB::table('roles')->insert([
            'role_name' => $validatedData['role'],
        ]);

        return redirect()->route('admin.index')->with('success', 'Role saved successfully.');
    }

    public function showPengelolaForm()
    {
        $members = Member::all(); // Mengambil semua data member
        $lokasis = Lokasi::all();
        return view('admin.createpengelola', compact('members', 'lokasis'));
    }

    public function storePengelola(Request $request)
    {
        $validatedData = $request->validate([
            'member_id' => 'required|exists:members,id',
            'lokasi_id' => 'required|exists:lokasis,id',
        ]);

        $pengelola = new Pengelola();
        $pengelola->member_id = $validatedData['member_id'];
        $pengelola->lokasi_id = $validatedData['lokasi_id'];
        $pengelola->save();

        return redirect()->route('admin.pengelola.index')->with('success', 'Pengelola berhasil ditetapkan.');
    }

    public function tambahPengelola()
    {
        return view('admin.createpengelola');
    }
}
