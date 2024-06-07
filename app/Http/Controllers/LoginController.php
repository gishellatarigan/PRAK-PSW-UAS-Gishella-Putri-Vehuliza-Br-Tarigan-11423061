<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
        
            $required = [
                'username' => 'required|min:5',
                'password' => 'required|min:6',
            ];
        
            $message = [
                'username.required' => 'Kolom username harus diisi',
                'username.min' => 'username minimal 5 karakter',
                'password.required' => 'Kolom password harus diisi',
                'password.min' => 'password minimal 6 karakter',
            ];
        
            $this->validate($request, $required, $message);
            if (Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']])) {
                return redirect('/admin/index');
            } else {
                return redirect()->back()->with('error_message', 'invalid username or password');
            }
        }
        return view('admin.login');
    }

    // public function Login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'username' => 'required',
    //         'password' => 'required|min:6'
    //     ],
    //     [
    //         'required' => ':attribute wajib diisi !!!',
    //         'username' => 'harap masukan format :attribute dengan benar',
    //         'min' => 'jumlah password minimal 6 karakter'
    //     ]);
    //     if($validator->fails()){
    //         $errors = $validator->errors();
    //         return back()->with('errors', $errors)->withInput($request->all());
    //     }
    //     $username = $request->get('username');
    //     $password = Hash::make($request->get('password'));
    //     if (Auth::attempt($request->only('username', 'password'))) {
    //         return redirect('/admin/index');
    //     }
    //     return back()->with('danger', 'Data tidak sesuai')->withInput($request->all());
    // }
}
