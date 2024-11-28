<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;  // Pastikan ini ada

class PetugasController extends Controller
{
    // Menampilkan daftar petugas
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('admin.petugas.create');
    }

    // Menyimpan petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas',
            'password' => 'required|string|min:8',
        ]);

        Petugas::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    // Mengupdate petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas,username,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->username = $request->username;
        if ($request->password) {
            $petugas->password = Hash::make($request->password);
        }
        $petugas->save();

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil diperbarui!');
    }

    // Menghapus petugas
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus!');
    }
}
