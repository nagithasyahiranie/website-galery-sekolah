<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery; // Pastikan Anda mengimpor model Galery
use Illuminate\Http\Request;
use App\Models\Post;

class GaleryController extends Controller
{
    // Menampilkan daftar galery
    public function index()
    {
        $galeries = Galery::all(); // Ambil semua data galeri
        return view('admin.galery.index', compact('galeries')); // Teruskan data ke view
    }

    // Menampilkan form untuk menambah galery baru
    public function create()
    {
        return view('admin.galery.create'); // Tampilkan view create
    }

    // Menyimpan galery baru
    public function store(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'post_id' => 'required|exists:post,id',
        'position' => 'nullable|integer', // position boleh kosong
        'status' => 'nullable|boolean', // pastikan status diisi
    ]);

    // Atur nilai default untuk 'position' jika tidak ada di request
    $data['position'] = $data['position'] ?? 0;  // default value untuk position

    // Atur nilai default untuk 'status' jika tidak ada di request
    $data['status'] = $data['status'] ?? 1;  // default value untuk status

    // Simpan data ke database
    Galery::create($data);

    return redirect()->route('galery.index');
}

    // Menampilkan form untuk mengedit galery
    public function edit($id)
    {
        $galery = Galery::findOrFail($id); // Temukan galery berdasarkan ID
        return view('admin.galery.edit', compact('galery')); // Tampilkan view edit dengan data galery
    }

    // Memperbarui data galery
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'post_id' => 'required|numeric',
            'position' => 'required|numeric',
            'status' => 'required|numeric'
        ]);

        // Cari galery berdasarkan ID
        $galery = Galery::findOrFail($id);
        
        // Update data
        $galery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.galery.index')
            ->with('success', 'Galery berhasil diupdate!');
    }

    // Menghapus galery
    public function destroy($id)
{
    $galery = Galery::find($id);

    if ($galery) {
        $galery->delete();
        return redirect()->route('admin.galery.index')->with('success', 'Galeri berhasil dihapus');
    }

    return redirect()->route('admin.galery.index')->with('error', 'Galeri tidak ditemukan');
}
}