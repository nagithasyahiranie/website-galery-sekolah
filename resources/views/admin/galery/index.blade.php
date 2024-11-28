<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Manajemen Galeri</h1>

        <div class="mb-4">
            <a href="{{ route('admin.galery.create') }}" class="block py-2 px-3 rounded-lg bg-blue-600 hover:bg-blue-500 text-white">
                Tambah Galeri Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Post ID</th>
                    <th class="py-2 px-4 border-b">Posisi</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Tanggal Dibuat</th> <!-- Added created_at column -->
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galeries as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->post_id }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->position }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->status }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->created_at->format('d-m-Y H:i') }}</td> <!-- Displaying created_at -->
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.galery.edit', $item->id) }}" class="text-blue-600 hover:text-blue-500">Edit</a>
                        <form action="{{ route('admin.galery.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-500">Hapus</button>
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
