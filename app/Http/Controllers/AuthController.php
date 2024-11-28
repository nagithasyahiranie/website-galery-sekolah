<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah user ada di database
        $petugas = Petugas::where('username', $request->username)->first();

        if ($petugas && Hash::check($request->password, $petugas->password)) {
            // Login berhasil
            Auth::login($petugas);
            return redirect()->intended('/admin/dashboard'); // Redirect ke dashboard admin
        } else {
            // Login gagal
            return redirect()->back()->withErrors(['loginError' => 'Username atau password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
