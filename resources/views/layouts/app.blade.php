<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 4 Kota Bogor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Menambahkan Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Header dengan Logo, Teks Selamat Datang, dan Menu Navigasi -->
    <header class="bg-gray-400 text-gray-800 py-2">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo dan Teks Selamat Datang -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK" class="w-24 h-24">
                <div>
                    <h1 class="text-3xl font-bold text-white">SMK Negeri 4 Kota Bogor</h1>
                    <p class="text-sm text-gray-200">Kejuruan Empat Hebat (KRABAT)</p>
                </div>
            </div>
            
            <!-- Menu Navigasi -->
            <nav class="space-x-4">
                <a href="{{ url('/') }}" class="text-white hover:text-gray-300">Home</a>
                <a href="{{ route('profile') }}" class="text-white hover:text-gray-300">Profile</a>
                <a href="{{ route('galery') }}" class="text-white hover:text-gray-300">Galeri</a>
            </nav>
        </div>
    </header>

    <!-- Gambar Layar Penuh -->
<div class="relative w-full h-[80vh]"> <!-- Gambar lebih kecil (60vh) -->
    <!-- Gambar -->
    <div class="absolute inset-0 bg-cover bg-center flex items-center justify-center text-white">
        <div class="absolute inset-0 bg-black opacity-70"></div> <!-- Semi transparent overlay -->
        <div class="z-10 text-left px-6">
            <h2 class="text-5xl font-bold text-white font-serif">Selamat Datang di SMK Negeri 4 Kota Bogor</h2>
            <p class="text-xl font-light mt-2">Tempat untuk mengembangkan potensi terbaik Anda</p>
        </div>
    </div>
    <img src="{{ asset('images/sekolah2.jpg') }}" alt="Foto Sekolah" class="w-full h-full object-cover">
</div>


    <!-- Konten Utama -->
    <main class="container mx-auto p-6">
        @yield('content') <!-- Konten dinamis akan dimuat di sini -->
    </main>

   <!-- Footer -->
<footer class="bg-gray-800 text-white py-10 mt-8">
    <div class="container mx-auto text-center">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <!-- Footer Logo and Description -->
            <div class="flex flex-col items-center">
                <h3 class="text-3xl font-semibold text-yellow-400 mb-4">SMK Negeri 4 Kota Bogor</h3>
                <p class="text-gray-400 text-center">Membangun generasi muda yang unggul di bidang teknologi dan kreatifitas.</p>
            </div>

            <!-- Social Media Links -->
            <div class="flex justify-center gap-4 mb-6">
                <a href="https://facebook.com" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-facebook-f text-2xl"></i>
                </a>
                <a href="https://twitter.com" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-twitter text-2xl"></i>
                </a>
                <a href="https://instagram.com" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="https://youtube.com" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-youtube text-2xl"></i>
                </a>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="mt-8">
            <p class="text-gray-500 text-sm">© 2024 SMK Negeri 4 Kota Bogor. All rights reserved.</p>
        </div>
    </div>
</footer>
        <div class="mt-8">
            <p class="text-gray-500 text-sm">&copy; 2024 SMK Negeri 4 Kota Bogor. All rights reserved.</p>
        </div>
    </div>
</footer>


</body>
</html>
