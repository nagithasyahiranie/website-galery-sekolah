<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Petugas</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold mb-4">Daftar Petugas</h1>

        <!-- Display Success Message if exists -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button to Add New Petugas -->
        <a href="{{ route('admin.petugas.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md mb-4 inline-block">Tambah Petugas</a>

        <!-- Table to Display Petugas -->
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $petugasItem)
                    <tr>
                        <td class="px-4 py-2 border">{{ $petugasItem->id }}</td>
                        <td class="px-4 py-2 border">{{ $petugasItem->username }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.petugas.edit', $petugasItem->id) }}" class="bg-blue-600 text-white py-1 px-4 rounded-md hover:bg-blue-700">Edit</a>
                            <form action="{{ route('admin.petugas.destroy', $petugasItem->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus petugas ini?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-4 rounded-md hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link to go back to Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke Dashboard</a>
    </div>
</body>
</html>
