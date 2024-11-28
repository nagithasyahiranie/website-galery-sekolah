<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriController extends Controller
{


    /**
     * Menampilkan halaman kelola kategori.
     */
    public function index()
    {
        $kategori = Kategori::all(); // mengambil semua data kategori
        return view('admin.kategori.index', compact('kategori')); // mengirim data ke view
    }

    /**
     * Menampilkan form untuk menambah kategori baru.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
    ]);

    // Simpan kategori baru
    Kategori::create([
        'judul' => $request->input('judul'),
    ]);

    // Redirect kembali ke halaman daftar kategori dengan pesan sukses
    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
}

public function edit($id)
{
    // Mencari kategori berdasarkan ID
    $kategori = Kategori::findOrFail($id); // Menggunakan findOrFail untuk mendapatkan kategori atau menghasilkan error jika tidak ditemukan
    
    // Mengirim data kategori ke view edit
    return view('admin.kategori.edit', compact('kategori'));
}


/**
 * Memperbarui kategori yang ada di database.
 */
public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
    ]);

    $kategori = Kategori::find($id);
    
    if (!$kategori) {
        return redirect()->route('admin.kategori.index')->with('error', 'Kategori tidak ditemukan.');
    }

    $kategori->judul = $request->judul;
    $kategori->save();

    return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
}


    /**
     * Menghapus kategori dari database.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function input($id)
{
    // Ambil kategori berdasarkan ID
    $kategori = Kategori::find($id);

    // Pastikan kategori ditemukan
    if (!$kategori) {
        return redirect()->route('admin.kategori.index')->with('error', 'Kategori tidak ditemukan.');
    }

    return view('admin.kategori.input', compact('kategori'));
}
    
}