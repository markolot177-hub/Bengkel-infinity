<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('pengelola')->attempt($data)) {
            $request->session()->regenerate();
            return redirect('/pengelola/dashboard');
        }

        if (Auth::guard('pelanggan')->attempt($data)) {
            $request->session()->regenerate();
            return redirect('/pelanggan/dashboard');
        }

        return back()
            ->withErrors(['username' => 'Username atau password salah'])
            ->withInput();
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:pelanggan,username',
            'password' => 'required|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);
        Pelanggan::create($data);

        return redirect('/login')->with('success', 'Akun dibuat, silakan login');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        Auth::guard('pengelola')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
