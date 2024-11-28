<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Foto</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Foto</h1>

        <!-- Add New Foto Button -->
        <a href="{{ route('admin.foto.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Foto
        </a>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Foto Table -->
        <div class="mt-6">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Judul</th>
                        <th class="px-4 py-2 border-b">Galeri</th>
                        <th class="px-4 py-2 border-b">Foto</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fotos as $foto)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $foto->judul }}</td>
                        <td class="px-4 py-2 border-b">
    {{ $foto->galery ? $foto->galery->id : 'Tidak ada Galeri' }}
</td>

<td class="px-4 py-2 border-b">
    <img src="{{ Storage::url($foto->file) }}" alt="{{ $foto->judul }}" class="h-16 w-16 object-cover">
</td>

                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.foto.edit', $foto->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.foto.destroy', $foto->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Back to Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
