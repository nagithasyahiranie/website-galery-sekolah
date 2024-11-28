<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // Ubah dari Posts menjadi Post
use App\Models\Kategori;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel 'post' (nama tabel yang baru)
        $posts = Post::with(['kategori', 'petugas'])->get();
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('admin.post.index', compact('posts', 'kategori'));
        
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $petugases = Petugas::all();
        return view('admin.post.create', compact('kategoris', 'petugases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'nullable|in:draft,published'
        ]);

        Post::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'petugas_id' => auth()->id(),
            'status' => $request->status ?? 'published'  // Default ke 'published' jika tidak ada input
        ]);

        return redirect()->route('admin.post.index')
            ->with('success', 'Post berhasil ditambahkan');
    }

    public function edit(Post $post) // Ubah Post menjadi Post
    {
        $kategori = Kategori::all();
        $petugases = Petugas::all();
        return view('admin.post.edit', compact('post', 'kategori', 'petugases'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|integer',
            'petugas_id' => 'required|integer',
            'status' => 'required|string|in:aktif,tidak aktif',
        ]);

        $post = Post::findOrFail($id); // Menggunakan model Post
        $post->update($request->all());

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Menggunakan model Post
        $post->delete();

        return redirect()->route('admin.post.index')->with('success', 'Post berhasil dihapus.');
    }
}

