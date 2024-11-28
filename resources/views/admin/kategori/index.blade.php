<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Kelola Kategori</h1>
        
        <!-- Tombol Tambah Kategori -->
        <a href="{{ route('admin.kategori.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 mb-4">Tambah Kategori</a>

        <!-- Form Tambah Kategori -->
        <div class="mb-6">
            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id" class="block text-gray-700 font-bold mb-2">ID Kategori:</label>
                    <input type="text" id="id" name="id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                    <input type="text" id="judul" name="judul" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Button Tambah di bawah deskripsi -->
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-black font-semibold rounded hover:bg-green-600">Tambah</button>
                </div>
            </form>
        </div>

        <!-- Tabel Kategori -->
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-black">
                <tr>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">ID Kategori</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Kategori</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($kategori as $kategori)
                <tr>
                    <td class="py-3 px-4">{{ $kategori->id }}</td>
                    <td class="py-3 px-4">{{ $kategori->judul }}</td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke Dashboard</a>
    </div>
</body>
</html>
