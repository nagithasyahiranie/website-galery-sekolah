<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post Baru</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6">
                <h3 class="text-2xl font-bold">Tambah Post Baru</h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.post.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                        <input type="text" name="judul" class="form-input w-full rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Isi Post</label>
                        <textarea name="isi" class="form-textarea w-full rounded" rows="5" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                        <select name="kategori_id" class="form-select w-full rounded" required>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select name="status" class="form-select w-full rounded" required>
                            <option value="published">Aktif</option>
                            <option value="draft">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Waktu Dibuat</label>
                        <input type="datetime-local" name="created_at" class="form-input w-full rounded" value="{{ now()->format('Y-m-d\TH:i') }}">
                        <small class="text-gray-500">Default: waktu saat ini</small>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
