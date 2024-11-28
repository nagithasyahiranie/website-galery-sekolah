<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;
use App\Models\Profile;
use App\Models\Galery;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth');

// Profile
Route::resource('/admin/profile', ProfileController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->names('admin.profile')
    ->middleware('auth');

// Rute untuk form input kategori
Route::get('/admin/kategori/{id}/input-form', [KategoriController::class, 'input'])
    ->name('admin.kategori.input')
    ->middleware('auth');

// Rute resource untuk kategori
Route::resource('/admin/kategori', KategoriController::class)
    ->names('admin.kategori')
    ->middleware('auth');

// Post
Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
Route::resource('/admin/post', PostController::class)->names('admin.post');

// Galery
Route::resource('/admin/foto', FotoController::class)
    ->names('admin.foto')
    ->middleware('auth');

// Petugas
Route::resource('/admin/petugas', PetugasController::class)
    ->names('admin.petugas')
    ->middleware('auth');

// Tambahkan route group baru
Route::prefix('admin')->middleware('auth')->group(function () {
    // Perbaiki route untuk index - hapus /index dari path
    Route::get('/galery', [App\Http\Controllers\Admin\GaleryController::class, 'index'])
        ->name('admin.galery.index');
        
    // Tambahkan route lainnya
    Route::get('/galery/create', [App\Http\Controllers\Admin\GaleryController::class, 'create'])
        ->name('admin.galery.create');
    Route::post('/galery', [App\Http\Controllers\Admin\GaleryController::class, 'store'])
        ->name('admin.galery.store');
    Route::get('/galery/{id}', [App\Http\Controllers\Admin\GaleryController::class, 'show'])
        ->name('admin.galery.show');
    Route::get('/galery/{id}/edit', [App\Http\Controllers\Admin\GaleryController::class, 'edit'])
        ->name('admin.galery.edit');
    Route::put('/galery/{id}', [App\Http\Controllers\Admin\GaleryController::class, 'update'])
        ->name('admin.galery.update');
    Route::delete('/galery/{id}', [App\Http\Controllers\Admin\GaleryController::class, 'destroy'])
        ->name('admin.galery.destroy');
});

Route::get('/profile', function () {
    $profiles = Profile::all(); // Ambil data dari database
    return view('profile', compact('profiles')); // Kirim data ke view
})->name('profile');


Route::get('/galery', function () {
    $galeries = Galery::with('foto')->get(); // Ubah nama variabel dari profiles ke galeries
    return view('galery', compact('galeries')); // Ubah nama view dari profile ke galery
})->name('galery');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/foto', [FotoController::class, 'index'])->name('admin.foto.index');
    // ... route lainnya
});


