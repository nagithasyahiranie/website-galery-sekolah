<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Foto</h1>

        <form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <!-- Select Galeri -->
            <div class="mb-4">
                <label for="galery_id" class="block font-medium">Pilih Galeri</label>
                <select name="galery_id" id="galery_id" class="w-full border-gray-300 rounded mt-1">
                    @foreach ($galeries as $galery)
                        <option value="{{ $galery->id }}" {{ $galery->id == $foto->galery_id ? 'selected' : '' }}>
                            {{ $galery->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Judul Foto -->
            <div class="mb-4">
                <label for="judul" class="block font-medium">Judul Foto</label>
                <input type="text" name="judul" id="judul" class="w-full border-gray-300 rounded mt-1" value="{{ $foto->judul }}" required>
            </div>
            
            <!-- Upload Foto Baru (Optional) -->
            <div class="mb-4">
                <label for="file" class="block font-medium">Upload Foto Baru (Opsional)</label>
                <input type="file" name="file" id="file" class="w-full border-gray-300 rounded mt-1">
                <p class="text-sm text-gray-600 mt-1">Foto saat ini:</p>
                <img src="{{ Storage::url($foto->file) }}" alt="{{ $foto->judul }}" class="h-16 w-16 object-cover mt-2">
            </div>
            
            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
