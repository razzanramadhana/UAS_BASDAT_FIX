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
            <a href="dashboard-nakes" class="text-xl">
                <h1>Sistem Informasi Posyandu Lansia Terpadu</h1>
            </a>
            <a href="/" class="text-white font-bold">Log Out</a>
        </header>

        <!-- Main Content -->
        <div class="flex flex-1">

            <!-- Sidebar -->
            <aside class="bg-white w-64 p-5 shadow-md">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold mt-4">Nama Lengkap</h2> <!-- Static placeholder -->
                    <p class="text-gray-600">NIK</p> <!-- Static placeholder -->
                    <p class="text-gray-600">Alamat</p> <!-- Static placeholder -->
                </div>
                <nav>
                    <ul class="space-y-4">
                        <li><a href="jadwal-nakes" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a></li>
                        <li><a href="input-hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a></li>
                        <li><a href="rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a></li>
                        <li><a href="data-pasien" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Content Section -->
            <div class="flex-1 p-8 bg-gray-100">
                <h2 class="text-2xl font-bold mb-4">Data Pasien</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Id Lansia</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Nama Lansia</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Jenis Kelamin</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Nama Wali</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Diagnosa</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lansia as $item)
                                <tr class="bg-gray-50 hover:bg-yellow-100 transition duration-200 ease-in-out">
                                    <td class="p-3 border border-gray-300">{{ $item->id }}</td>
                                    <td class="p-3 border border-gray-300">{{ $item->nama }}</td>
                                    <td class="p-3 border border-gray-300">{{ $item->jenis_kelamin }}</td>
                                    <td class="p-3 border border-gray-300">
                                        {{ $item->pengguna->nama ?? 'Nama Wali Tidak Tersedia' }}
                                    </td>
                                    <td class="p-3 border border-gray-300">{{ $item->diagnosa }}</td>
                                    <td class="p-3 border border-gray-300">
                                        <a href="#">
                                            <button class="bg-yellow-500 text-white py-1 px-3 rounded-lg hover:bg-yellow-600 transition duration-200 ease-in-out">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4">
        © 2024 ALL RIGHTS RESERVED
    </footer>

</body>
</html>
