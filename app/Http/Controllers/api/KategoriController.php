<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json(['data' => $kategori]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($validated);

        return response()->json(['data' => $kategori], 201);
    }

    public function show(Kategori $kategori)
    {
        return response()->json(['data' => $kategori]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori->update($validated);

        return response()->json(['data' => $kategori]);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(null, 204);
    }
}