<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
        
            $rules = [
                'username' => 'required|min:5',
                'password' => 'required|min:6',
            ];
        
            $messages = [
                'username.required' => 'Kolom username harus diisi',
                'username.min' => 'Username minimal 5 karakter',
                'password.required' => 'Kolom password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
            ];
        
            $this->validate($request, $rules, $messages);
        
            // Logika autentikasi
            if (Auth::guard('pengelola')->attempt(['username' => $data['username'], 'password' => $data['password']])) {
                return redirect('/pengelola/index');
            } else {
                return redirect()->back()->with('error_message', 'Invalid username or password');
            }
        }
        return view('pengelola.login');
    }

    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('pengelola.index');
    }

    /**
     * Logout the authenticated user.
     */
    public function logout()
    {
        Auth::guard('pengelola')->logout();
        return redirect('/');
    }
}
