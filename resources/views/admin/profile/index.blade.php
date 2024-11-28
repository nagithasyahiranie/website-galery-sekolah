<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Profil</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-6">
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-2xl font-bold">Daftar Profil</h2>
            <a href="{{ route('admin.profile.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Tambah Profil
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Isi</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profile as $profile)
                        <tr>
                            <td class="px-6 py-4 border-b">{{ $profile->id }}</td>
                            <td class="px-6 py-4 border-b">{{ $profile->judul }}</td>
                            <td class="px-6 py-4 border-b">{{ Str::limit($profile->isi, 50) }}</td>
                            <td class="px-6 py-4 border-b">
                                <a href="{{ route('admin.profile.edit', $profile->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                <form action="{{ route('admin.profile.destroy', $profile->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 ml-4" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
