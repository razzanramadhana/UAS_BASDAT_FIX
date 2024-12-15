<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col justify-between bg-gray-100 font-sans">

    <div class="flex flex-1">
        <div class="flex-1 flex flex-col justify-center p-10">
            <h1 class="text-2xl font-bold mb-4">Login</h1>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 border border-gray-300 rounded-md" required>
                <input type="password" name="password" placeholder="Minimal 8 karakter" class="w-full p-3 mb-4 border border-gray-300 rounded-md" required>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700">Masuk</button>
            </form>
            <div class="text-center mt-6">
                Belum punya akun? <a href="/register" class="text-blue-500 hover:underline">Daftar</a>
            </div>
        </div>
    </div>

</body>
</html>