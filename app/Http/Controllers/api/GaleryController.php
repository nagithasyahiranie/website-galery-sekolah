<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::with('post')->get();
        return response()->json(['data' => $galeries]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|boolean'
        ]);

        $galery = Galery::create($validated);

        return response()->json(['data' => $galery], 201);
    }

    public function show(Galery $galery)
    {
        $galery->load('post');
        return response()->json(['data' => $galery]);
    }

    public function update(Request $request, Galery $galery)
    {
        $validated = $request->validate([
            'post_id' => 'sometimes|required|exists:posts,id',
            'position' => 'sometimes|required|integer',
            'status' => 'sometimes|required|boolean'
        ]);

        $galery->update($validated);

        return response()->json(['data' => $galery]);
    }

    public function destroy(Galery $galery)
    {
        $galery->delete();
        return response()->json(null, 204);
    }
}