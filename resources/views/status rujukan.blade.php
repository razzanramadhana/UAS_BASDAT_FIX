<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Rujukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <a href="/dashboard" class="text-xl font-bold">
                Sistem Informasi Posyandu Lansia Terpadu
            </a>
            <a href="/" class="text-white font-bold">Log Out</a>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white p-5 shadow-md">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold mt-4">John Doe</h2>
                    <p class="text-gray-600">1234567890</p>
                    <p class="text-gray-600">Jl. Raya No. 123, Jakarta</p>
                </div>
                <nav>
                    <ul class="space-y-4">
                        <li><a href="/profil-wali" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Wali</a></li>
                        <li><a href="/profil-lansia" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Lansia</a></li>
                        <li><a href="/kelola-kunjungan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Kelola Kunjungan</a></li>
                        <li><a href="/hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Hasil Kesehatan</a></li>
                        <li><a href="/status-rujukan" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Status Rujukan</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-5 bg-gray-100">
                <h2 class="text-2xl mb-6">Daftar Status Rujukan</h2>

                <div class="overflow-x-auto">
                    <table class="table-auto border-collapse border border-gray-300 w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 p-2">No</th>
                                <th class="border border-gray-300 p-2">ID Rujukan</th>
                                <th class="border border-gray-300 p-2">Status Rujukan</th>
                                <th class="border border-gray-300 p-2">Nama Lansia</th>
                                <th class="border border-gray-300 p-2">Tanggal Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rujukan as $index => $r)
                                <tr class="hover:bg-gray-200 transition duration-300">
                                    <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 p-2">{{ $r->id }}</td>
                                    <td class="border border-gray-300 p-2">{{ $r->status_rujukan }}</td>
                                    <td class="border border-gray-300 p-2">{{ $r->kelolaKunjungan->lansia->nama ?? 'Nama Tidak Tersedia' }}</td>
                                    <td class="border border-gray-300 p-2">{{ $r->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-300 p-2 text-center">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-600 text-white text-center py-4">
            ©️ 2024 ALL RIGHTS RESERVED
        </footer>
    </div>
</body>
</html>