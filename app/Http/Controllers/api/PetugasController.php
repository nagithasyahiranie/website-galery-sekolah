<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return response()->json(['data' => $petugas]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required|min:6',
        ]);

        $petugas = Petugas::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['data' => $petugas], 201);
    }

    public function show(Petugas $petuga)
    {
        return response()->json(['data' => $petuga]);
    }

    public function update(Request $request, Petugas $petuga)
    {
        $validated = $request->validate([
            'username' => 'required|unique:petugas,username,' . $petuga->id,
            'password' => 'sometimes|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $petuga->update($validated);

        return response()->json(['data' => $petuga]);
    }

    public function destroy(Petugas $petuga)
    {
        $petuga->delete();
        return response()->json(null, 204);
    }
}