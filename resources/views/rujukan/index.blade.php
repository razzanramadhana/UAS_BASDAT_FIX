<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rujukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-col flex-1">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <a href="/dashboard" class="text-xl font-bold">Sistem Informasi Posyandu Lansia Terpadu</a>
            <a href="/" class="text-white text-lg font-bold">Log Out</a>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white p-5 shadow-md flex-none">
                <nav>
                    <ul class="space-y-4">
                        <li><a href="jadwal-nakes" class="text-black hover:bg-yellow-500 block p-3 rounded-lg">Jadwal Nakes</a></li>
                        <li><a href="input-hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg">Input Hasil Kesehatan</a></li>
                        <li><a href="rujukan" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg">Rujukan</a></li>
                        <li><a href="data-pasien" class="text-black hover:bg-yellow-500 block p-3 rounded-lg">Data Pasien</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Content Section -->
            <div class="flex-1 p-8 bg-gray-100">
                <h2 class="text-2xl font-bold mb-4">Daftar Rujukan</h2>

                <!-- Success message -->
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Button to create new Rujukan -->
                <div class="mb-4">
                    <a href="{{ route('rujukan.create') }}">
                        <button class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-200 ease-in-out">
                            Buat Rujukan Baru
                        </button>
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Nama Lansia</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Rumah Sakit</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Status Rujukan</th>
                                <th class="bg-gray-200 p-3 border border-gray-300 text-left text-sm font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rujukanList as $rujukan)
                            <tr class="bg-gray-50 hover:bg-yellow-100 transition duration-200 ease-in-out">
                                <!-- Nama Lansia -->
                                <td class="p-3 border border-gray-300">
                                    {{ $rujukan->kelolaKunjungan->lansia->nama ?? 'Nama Tidak Ditemukan' }}
                                </td>

                                <!-- Rumah Sakit -->
                                <td class="p-3 border border-gray-300">
                                    {{ $rujukan->rumahSakit->nama_rumah_sakit ?? 'Rumah Sakit Tidak Ditemukan' }}
                                </td>

                                <!-- Status Rujukan -->
                                <td class="p-3 border border-gray-300">
                                    {{ $rujukan->status_rujukan }}
                                </td>

                                <!-- Aksi -->
                                <td class="p-3 border border-gray-300">
                                    <a href="{{ route('rujukan.edit', $rujukan->id) }}">
                                        <button class="bg-blue-500 text-white py-1 px-3 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out">Edit</button>
                                    </a>
                                    <form action="{{ route('rujukan.destroy', $rujukan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600 transition duration-200 ease-in-out">Delete</button>
                                    </form>
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
        ©️ 2024 ALL RIGHTS RESERVED
    </footer>
</body>
</html>
