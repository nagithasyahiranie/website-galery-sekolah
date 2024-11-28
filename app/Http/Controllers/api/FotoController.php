<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('galery')->get();
        return response()->json(['data' => $fotos]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('fotos', 'public');
            
            $foto = Foto::create([
                'galery_id' => $validated['galery_id'],
                'file' => $path,
                'judul' => $validated['judul']
            ]);

            return response()->json(['data' => $foto], 201);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }

    public function show(Foto $foto)
    {
        $foto->load('galery');
        return response()->json(['data' => $foto]);
    }

    public function update(Request $request, Foto $foto)
    {
        $validated = $request->validate([
            'galery_id' => 'sometimes|required|exists:galery,id',
            'file' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'sometimes|required|string|max:255'
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($foto->file) {
                Storage::disk('public')->delete($foto->file);
            }
            
            // Store new file
            $file = $request->file('file');
            $validated['file'] = $file->store('fotos', 'public');
        }

        $foto->update($validated);

        return response()->json(['data' => $foto]);
    }

    public function destroy(Foto $foto)
    {
        if ($foto->file) {
            Storage::disk('public')->delete($foto->file);
        }
        
        $foto->delete();
        return response()->json(null, 204);
    }
}