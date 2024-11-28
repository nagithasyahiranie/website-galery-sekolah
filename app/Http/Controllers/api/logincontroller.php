<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        if (!Auth::attempt($request->only('username', 'password'))) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah.'],
            ]);
        }

        // Dapatkan petugas yang sedang login
        $petugas = Petugas::where('username', $request->username)->first();

        // Buat token (jika menggunakan Passport atau Sanctum)
        $token = $petugas->createToken('token_name')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil.',
            'data' => $petugas,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        // Hapus token autentikasi pengguna
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
