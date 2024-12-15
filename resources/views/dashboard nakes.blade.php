<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Posyandu Lansia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center rounded-t-lg">
            <h1 class="text-xl font-semibold">Sistem Informasi Posyandu Lansia Terpadu</h1>
            <a href="{{ route('logout') }}" class="text-white font-bold">Log Out</a> <!-- Logout Route -->
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="bg-white w-64 p-5 shadow-md">
                <div class="text-center mb-8">
                    <!-- Menampilkan Nama Lengkap Pengguna -->
                    <h2 class="text-xl font-semibold mt-4">{{ $user->nama }}</h2>
                    <!-- Menampilkan NIK Pengguna -->
                    <p class="text-gray-600">{{ $user->nik }}</p>
                    <!-- Menampilkan Alamat Pengguna -->
                    <p class="text-gray-600">{{ $user->address }}</p>
                </div>

                <nav>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('jadwal-nakes') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a>
                        </li>
                        <li>
                            <a href="{{ route('input-hasil-kesehatan') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a>
                        </li>
                        <li>
                            <a href="{{ route('rujukan.index') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a>
                        </li>
                        <li>
                            <a href="{{ route('data-pasien') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <section class="flex-1 p-8 bg-gray-100">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('img/gambar.jpeg') }}" alt="Profile Image" class="w-60 h-auto rounded-full">
                        <div>
                            <h2 class="text-2xl font-bold">Selamat Datang, {{ $user->name }}!</h2>
                            <p class="text-gray-600">Selamat datang di Portal Posyandu Lansia</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-auto">
        © 2024 ALL RIGHTS RESERVED
    </footer>
</body>
</html>
