<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return response()->json(['data' => $profiles]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string'
        ]);

        $profile = Profile::create($validated);

        return response()->json(['data' => $profile], 201);
    }

    public function show(Profile $profile)
    {
        return response()->json(['data' => $profile]);
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'isi' => 'sometimes|required|string'
        ]);

        $profile->update($validated);

        return response()->json(['data' => $profile]);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json(null, 204);
    }
}