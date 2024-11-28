@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-gray-800">Galeri Foto</h1>
    <p class="text-gray-600 mt-2">Jelajahi koleksi foto terbaru yang kami tampilkan di galeri ini</p>
</div>

<!-- Galeri Section -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($galeries as $galery)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Gambar -->
            @if($galery->foto && $galery->foto->count() > 0)
                <img src="{{ asset('storage/' . $galery->foto->first()->file) }}" 
                     alt="{{ $galery->judul }}"
                     class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 flex items-center justify-center bg-gray-200">
                    <span class="text-gray-500">Tidak ada gambar</span>
                </div>
            @endif
            <!-- Judul -->
            <div class="p-4">
                <h3 class="text-lg font-medium">{{ $galery->judul }}</h3>
                @if($galery->deskripsi)
                    <p class="text-gray-600 mt-2">{{ $galery->deskripsi }}</p>
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500 col-span-full text-center py-8">Belum ada galeri yang tersedia.</p>
    @endforelse
</div>
@endsection
