@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Agenda dan Informasi</h1>
        <p class="text-gray-600 mt-2">Jelajahi berbagai agenda dan informasi terbaru yang kami sediakan!</p>
    </div>

    <!-- Kategori Section -->
    <div class="flex flex-col gap-6">
        @forelse ($kategoris as $kategori)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 cursor-pointer">
                <div class="p-6" onclick="toggleContent('{{ $kategori->id }}')">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $kategori->judul }}</h2>

                    <!-- Data Posts untuk Kategori ini -->
                    <div class="space-y-3 mb-4">
                        @forelse($kategori->posts as $post)
                            <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <h3 class="font-semibold text-gray-700">{{ $post->judul }}</h3>
                                <p class="text-gray-600 text-sm mt-1">{{ Str::limit($post->konten, 100) }}</p>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-sm text-gray-500">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-3">Belum ada post dalam kategori ini.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Isi Agenda yang akan di-toggle -->
                <div id="content-{{ $kategori->id }}" class="hidden p-6 bg-gray-100 rounded-lg mt-4">
                    <p class="text-gray-800">{{ $kategori->isi_agenda ?? 'Isi agenda tidak tersedia' }}</p>
                </div>
            </div>
        @empty
            <div>
                <div class="text-center py-8 bg-white rounded-lg shadow">
                    <i class="fas fa-folder-open text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Tidak ada kategori yang tersedia.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Peta Sekolah Section -->
    <div class="mt-12 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Peta Sekolah</h2>
        <p class="text-gray-600 mb-4">Lokasi sekolah kami dapat ditemukan pada peta berikut:</p>

        <!-- Flex container to display image and map navigation side by side -->
        <div class="flex justify-center items-center space-x-8">
            <!-- Gambar Peta Sekolah -->
            <div class="relative w-full max-w-md mx-auto overflow-hidden rounded-lg shadow-lg">
                <img 
                    src="{{ asset('images/peta-sekolah.jpg') }}"
                    alt="Peta Sekolah SMK Negeri 4 Kota Bogor" 
                    class="w-full h-auto">
            </div>

            <!-- Google Maps Navigation -->
            <div class="flex flex-col justify-center items-center max-w-md mx-auto">
                <p class="text-gray-600 mb-4">Klik tombol di bawah untuk membuka peta di Google Maps:</p>
                <a 
                    href="https://maps.app.goo.gl/2pRXDRZuWGEuyKVSA" 
                    target="_blank" 
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Arahkan Saya ke Lokasi
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Fungsi untuk menampilkan/menyembunyikan konten kategori
    function toggleContent(kategoriId) {
        const content = document.getElementById('content-' + kategoriId);
        console.log('Menampilkan konten untuk kategori ID: ' + kategoriId);
        console.log(content); // Memastikan elemen ditemukan

        if(content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            console.log('Konten ditampilkan');
        } else {
            content.classList.add('hidden');
            console.log('Konten disembunyikan');
        }
    }
</script>
@endpush
