<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-6">Edit Profil: {{ $profile->judul }}</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input 
                        type="text" 
                        name="judul" 
                        id="judul" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('judul') border-red-500 @enderror"
                        value="{{ old('judul', $profile->judul) }}" 
                        required
                    >
                    @error('judul')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi -->
                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                    <textarea 
                        name="isi" 
                        id="isi" 
                        rows="5"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('isi') border-red-500 @enderror"
                        required>{{ old('isi', $profile->isi) }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.profile.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                        Update Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
