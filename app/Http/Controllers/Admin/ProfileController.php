<?php

// app/Http/Controllers/Admin/ProfileController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan daftar semua profile
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile.index', compact('profile'));
    }

    // Menampilkan form untuk menambah profile baru
    public function create()
    {
        return view('admin.profile.create');
    }

    // Menyimpan data profile baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        // Menyimpan data ke database
        Profile::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit profile
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    // Mengupdate data profile yang ada
    public function update(Request $request, Profile $profile)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        // Update data profile
        $profile->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

    // Menghapus profile
    public function destroy(Profile $profile)
    {
        // Menghapus profile
        $profile->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil dihapus.');
    }
}

