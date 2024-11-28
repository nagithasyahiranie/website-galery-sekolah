<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Petugas;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
{
    $jumlahKategori = Kategori::count();
    $jumlahPetugas = Petugas::count(); // Atur nilai untuk $jumlahAdmin
    $jumlahPost = Post::count();
    $jumlahGalery = Galery::count();
    $jumlahFoto = Foto::count();
    $jumlahProfile = Profile::count();

    return view('admin.dashboard', compact(
        'jumlahKategori', 'jumlahPetugas', 'jumlahPost', 'jumlahGalery', 'jumlahFoto', 'jumlahProfile'
    ));
}

}

