<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\PetugasController;
use App\Http\Controllers\api\KategoriController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\GaleryController;
use App\Http\Controllers\api\FotoController;
use App\Http\Controllers\api\ProfileController;



Route::apiResource('petugas', PetugasController::class);
Route::apiResource('kategori', KategoriController::class);
Route::apiResource('post', PostController::class);
Route::apiResource('galery', GaleryController::class);
Route::apiResource('foto', FotoController::class);
Route::apiResource('profile', ProfileController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);
