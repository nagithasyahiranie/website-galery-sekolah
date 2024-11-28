<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil hanya kategori 'agenda' dan 'informasi'
        $kategoris = Kategori::whereIn('judul', ['agenda', 'informasi'])->get();
        
        // Mengirim data ke view
        return view('home', compact('kategoris'));
    }
}


