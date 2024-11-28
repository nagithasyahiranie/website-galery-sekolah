<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="px-4 py-2 bg-green-500 text-black font-semibold rounded hover:bg-green-600">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="ml-4 px-4 py-2 bg-gray-500 text-white font-semibold rounded hover:bg-gray-600 inline-block">Selesai Mengedit</a>
            </div>
        </form>
    </div>
</body>
</html>