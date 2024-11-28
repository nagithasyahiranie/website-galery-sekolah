<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#2c3e50] to-[#3498db]">

    <div class="w-full max-w-md p-8 space-y-6 bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Login Petugas!</h2>

        @if($errors->has('loginError'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-200">
                {{ $errors->first('loginError') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" id="username" name="username" 
                       class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" 
                       required>
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" id="password" name="password" 
                       class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" 
                       required>
            </div>

            <button type="submit" 
                    class="w-full py-3 font-bold text-white bg-gradient-to-r from-[#2948ff] to-[#396afc] rounded-lg hover:from-[#2341eb] hover:to-[#2948ff] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition duration-200 hover:scale-[1.02]">
                Login
            </button>
        </form>
    </div>

</body>
</html>
