<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Post</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center">
            <h3 class="text-gray-700 text-3xl font-medium">Manajemen Post</h3>
            <a href="{{ route('admin.post.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded-lg hover:bg-blue-600">
                Tambah Post
            </a>
        </div>

        <div class="mt-8">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $post->judul }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $post->kategori->judul}}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-black">
                                    {{ $post->status }} <!-- Debug nilai status -->
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-4">Edit</a>
                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center">Tidak ada data post</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Link to go back to Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
