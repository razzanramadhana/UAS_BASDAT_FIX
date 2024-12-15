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
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <h1 class="text-xl">Sistem Informasi Posyandu Lansia Terpadu</h1>
            <a href="/" class="text-white font-bold">Log Out</a>
        </header>

        <!-- Main Content -->
        <div class="flex flex-1">
        <aside class="w-64 bg-white p-5 shadow-md">
        <div class="text-center mb-8">
                    <!-- Tampilkan nama lengkap, NIK, dan alamat pengguna -->
                    <h2 class="text-xl font-semibold mt-4">{{ $user->nama }}</h2>
                    <p class="text-gray-600">{{ $user->nik }}</p>
                    <p class="text-gray-600">{{ $user->alamat }}</p>
                </div>
                <!-- Navigation -->
                <nav>
                    <ul class="space-y-4">
                        <li><a href="jadwal-nakes" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a></li>
                        <li><a href="input-hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a></li>
                        <li><a href="rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a></li>
                        <li><a href="data-pasien" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Content -->
            <main class="flex-1 p-8 bg-gray-100">
                <h2 class="text-2xl font-bold mb-4">Jadwal Nakes</h2>
                <p class="text-gray-600 mb-6">{{ now()->format('F Y') }}</p>

                @if($message)
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                        {{ $message }}
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">ID Jadwal</th>
                                    <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Tanggal</th>
                                    <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwals as $jadwal)
                                    <tr class="bg-gray-50 hover:bg-yellow-100 transition duration-200 ease-in-out">
                                        <td class="p-3 border border-gray-300">{{ $jadwal->id }}</td>
                                        <td class="p-3 border border-gray-300">{{ $jadwal->tanggal }}</td>
                                        <td class="p-3 border border-gray-300">{{ $jadwal->jam_mulai ?? '-' }} - {{ $jadwal->jam_selesai ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-3 border border-gray-300 text-center text-gray-500">
                                            Tidak ada jadwal tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-600 text-white text-center py-4">
            © 2024 ALL RIGHTS RESERVED
        </footer>
    </div>
</body>
</html>
