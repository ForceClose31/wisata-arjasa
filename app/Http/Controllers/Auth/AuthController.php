<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
        } elseif (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $email = $user->email;
            $role = $user->role;

            $request->session()->flash('nama_login', $email);
            $request->session()->flash('alert_tampil', true);

            if ($role === 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('index')->with('warning', 'Peran pengguna tidak dikenali.');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau password tidak terdaftar.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

