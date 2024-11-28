
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-black text-2xl font-semibold">Admin Dashboard</h1>
            <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-gray-100 hover:text-black font-medium">Logout</button>
        </form>
        </div>
    </nav>
 
    <!-- Sidebar & Content -->
    <div class="flex">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-gray-200 min-h-screen p-6">
    <h2 class="text-lg font-bold mb-4 text-gray-100">Data Manajemen</h2>
    <ul class="space-y-3">
        <!-- Kelola Kategori -->
        <li>
            <a href="{{ route('admin.kategori.index') }}" class="block py-2 px-3 bg-blue-600 rounded-lg text-black font-semibold hover:bg-blue-500">
                <i class="fas fa-folder mr-2"></i> Kelola Kategori
            </a>
        </li>
        <!-- Manajemen Admin -->
        <li>
            <a href="{{ route('admin.petugas.index') }}" class="block py-2 px-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                <i class="fas fa-user-cog mr-2"></i> Manajemen Petugas
            </a>
        </li>
        <!-- Posts -->
        <li>
            <a href="{{ route('admin.post.index') }}" class="block py-2 px-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                <i class="fas fa-edit mr-2"></i> Posts
            </a>
        </li>
        <!-- Galeri -->
        <li>
            <a href="{{ route('admin.galery.index') }}" class="block py-2 px-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                <i class="fas fa-images mr-2"></i> Galeri
            </a>
        </li>
        <!-- Foto -->
        <li>
            <a href="{{ route('admin.foto.index') }}" class="block py-2 px-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                <i class="fas fa-camera mr-2"></i> Foto
            </a>
        </li>
        <!-- Profile -->
        <li>
            <a href="{{ route('admin.profile.index') }}" class="block py-2 px-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300">
                <i class="fas fa-user-circle mr-2"></i> Profile
            </a>
        </li>
    </ul>
</div>
        <!-- Content -->
<div class="flex-1 p-6">
<h2 class="text-4xl font-semibold text-gray-700 mb-4">Selamat Datang, {{ Auth::user()->username }}</h2>
    <p class="mb-6 text-gray-600">Ini adalah halaman dashboard utama. Anda bisa mengelola data dari sini.</p>

    <!-- Contoh Card Informasi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Card Jumlah Kategori -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Kategori</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahKategori }}</p>
        </div>
        <!-- Card Jumlah Admin -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Petugas</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahPetugas }}</p>
        </div>
        <!-- Card Total Posts -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Total Posts</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahPost }}</p>
        </div>
        <!-- Card Total Galeri -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Total Galeri</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahGalery }}</p>
        </div>
        <!-- Card Total Foto -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Total Foto</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahFoto }}</p>
        </div>
        <!-- Card Jumlah Profile -->
        <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-blue-500">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Profile</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahProfile }}</p>
        </div>
    </div>
</div>
    </div>

</body>
</html>