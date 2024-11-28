<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6">
                <h3 class="text-2xl font-bold">Edit Post</h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="judul" class="block text-gray-700 text-sm font-semibold mb-1">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-input w-full rounded" value="{{ old('judul', $post->judul) }}" required>
                    </div>

                    <div class="mb-6">
                        <label for="kategori_id" class="block text-gray-700 text-sm font-semibold mb-1">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select w-full rounded" required>
                            <option value="" disabled>Pilih kategori</option>
                            @foreach($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $post->kategori_id ? 'selected' : '' }}>{{ $kategori->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="isi" class="block text-gray-700 text-sm font-semibold mb-1">Isi</label>
                        <textarea name="isi" id="isi" class="form-textarea w-full rounded" rows="5" required>{{ old('isi', $post->isi) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="petugas_id" class="block text-gray-700 text-sm font-semibold mb-1">Petugas</label>
                        <select name="petugas_id" id="petugas_id" class="form-select w-full rounded" required>
                            <option value="" disabled>Pilih petugas</option>
                            @foreach($petugases as $petugas)
                                <option value="{{ $petugas->id }}" {{ $petugas->id == $post->petugas_id ? 'selected' : '' }}>{{ $petugas->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-gray-700 text-sm font-semibold mb-1">Status</label>
                        <select name="status" id="status" class="form-select w-full rounded" required>
                            <option value="aktif" {{ $post->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak aktif" {{ $post->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="created_at" class="block text-gray-700 text-sm font-semibold mb-1">Waktu Dibuat</label>
                        <input type="datetime-local" name="created_at" id="created_at" class="form-input w-full rounded" value="{{ old('created_at', $post->created_at->format('Y-m-d\TH:i')) }}">
                        <small class="text-gray-500">Optional: Atur waktu pembuatan</small>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">Perbarui</button>
                        <a href="{{ route('admin.post.index') }}" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-200 ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
