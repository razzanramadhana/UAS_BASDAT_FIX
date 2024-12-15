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
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <a href="/dashboard" class="text-xl">
                <h1>Sistem Informasi Posyandu Lansia Terpadu</h1>
            </a>
            <a href="/" class="text-white font-bold">Log Out</a>
        </header>

        <div class="flex flex-1">
            <aside class="bg-white w-64 p-5 shadow-md">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold mt-4">Nama Lengkap</h2>
                    <p class="text-gray-600">NIK</p>
                    <p class="text-gray-600">Alamat</p>
                </div>

                <nav>
                    <ul class="space-y-4">
                        <li><a href="/profil-wali" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Wali</a></li>
                        <li><a href="/profil-lansia" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Lansia</a></li>
                        <li><a href="/kelola-kunjungan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Kelola Kunjungan</a></li>
                        <li><a href="/hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out bg-yellow-500">Hasil Kesehatan</a></li>
                        <li><a href="/status-rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Status Rujukan</a></li>
                    </ul>
                </nav>
            </aside>

            <div class="flex-1 p-8 bg-gray-100">
                <h2 class="text-2xl font-bold mb-6">Hasil Kesehatan</h2>

                @if($hasilKesehatan->isEmpty())
                    <p class="text-gray-500">Tidak ada data hasil kesehatan yang ditemukan.</p>
                @else
                    <!-- Table Structure -->
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">Nama Lansia</th>
                                <th class="border border-gray-300 p-2">Tanggal Check Up</th>
                                <th class="border border-gray-300 p-2">Tekanan Darah</th>
                                <th class="border border-gray-300 p-2">Berat Badan</th>
                                <th class="border border-gray-300 p-2">Tinggi Badan</th>
                                <th class="border border-gray-300 p-2">Gula Darah</th>
                                <th class="border border-gray-300 p-2">Kolesterol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasilKesehatan as $hasil)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $hasil->kelolaKunjungan->lansia->nama}}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->kelolaKunjungan->tanggal }}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->tekanan_darah }}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->berat_badan }}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->tinggi_badan }}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->gula_darah }}</td>
                                    <td class="border border-gray-300 p-2">{{ $hasil->kolesterol }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <!-- Blok tambahan -->
                @if ($hasilKesehatan->isEmpty())
                    <p>Belum ada hasil kesehatan tersedia.</p>
                @else
                    @foreach ($hasilKesehatan as $hasil)
                        <p>{{ $hasil->kelolaKunjungan->lansia->nama ?? 'Tidak diketahui' }}</p>
                    @endforeach
                @endif        
            </div>
        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4">
        ©️ 2024 ALL RIGHTS RESERVED
    </footer>
</body>
</html>