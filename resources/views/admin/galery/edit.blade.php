<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Galeri</h1>

        <form action="{{ route('admin.galery.update', $galery->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <!-- Post ID -->
            <div class="mb-4">
                <label for="post_id" class="block text-sm font-medium text-gray-700">Post ID</label>
                <input type="text" name="post_id" id="post_id" value="{{ $galery->post_id }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <!-- Position -->
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Posisi</label>
                <input type="number" name="position" id="position" value="{{ $galery->position }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="number" name="status" id="status" value="{{ $galery->status }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Update</button>
        </form>
    </div>
</body>
</html>
