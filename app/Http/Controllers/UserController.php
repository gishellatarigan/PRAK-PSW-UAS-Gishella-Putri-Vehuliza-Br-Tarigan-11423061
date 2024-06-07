<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('user.login')->with('error', 'Invalid username or password');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('user.view.user')->with('user', $user);
        } else {
            return redirect()->route('user.login')->with('error', 'You must log in first.');
        }
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('user.login')->with('success', 'Registration successful, please proceed with login.');
    }
}
