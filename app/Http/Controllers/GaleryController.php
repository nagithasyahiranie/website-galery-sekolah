<?php

// app/Http/Controllers/GaleriController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::select(['id', 'judul', 'foto'])->with('foto')->get();
        
        return view('galery', compact('galeries'));
    }
}

