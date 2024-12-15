<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Posyandu Lansia</title>
    <link href="https://fonts.googleapis.com/css2?family=Arial:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex flex-col h-screen">
        <header class="bg-blue-700 text-white p-5 flex justify-between items-center">
            <a href="/dashboard" class="text-xl">
                <h1>Sistem Informasi Posyandu Lansia Terpadu</h1>
            </a>
            <a href="/" class="text-white text-lg font-bold">Log Out</a>
        </header>

        <div class="flex flex-1">
            <aside class="w-64 bg-white p-5 shadow-md">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold mt-4">John Doe</h2> <!-- Nama pengguna -->
                    <p class="text-gray-600">1234567890</p> <!-- NIK pengguna -->
                    <p class="text-gray-600">Jl. Raya No. 123, Jakarta</p> <!-- Alamat pengguna -->
                </div>
                <nav>
                    <ul class="space-y-4">
                        <li><a href="/profil-wali" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Wali</a></li>
                        <li><a href="/profil-lansia" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Lansia</a></li>
                        <li><a href="/kelola-kunjungan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Kelola Kunjungan</a></li>
                        <li><a href="/hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Hasil Kesehatan</a></li>
                        <li><a href="/status-rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Status Rujukan</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Content -->
            <div class="flex-1 p-5 bg-gray-100">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Lansia</h2>
                
                <!-- Form untuk menambah lansia -->
                <form action="{{ route('lansia.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="font-bold text-gray-700">Nama Lansia:</p>
                            <input type="text" name="nama" placeholder="Masukkan Nama Lansia" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">NIK:</p>
                            <input type="text" name="nik_lansia" placeholder="Masukkan NIK" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                            @error('nik_lansia')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Tanggal Lahir:</p>
                            <input type="date" name="tanggal_lahir" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                            @error('tanggal_lahir')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Alamat:</p>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                            @error('alamat')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Jenis Kelamin:</p>
                            <select name="jenis_kelamin" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                                <option>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Alergi Obat:</p>
                            <input type="text" name="alergi_obat" placeholder="Masukkan Alergi Obat (jika ada)" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            @error('alergi_obat')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Nomor Telepon:</p>
                            <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                            @error('no_telpon')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <p class="font-bold text-gray-700">Riwayat Penyakit:</p>
                            <input type="text" name="riwayat_penyakit" placeholder="Masukkan Riwayat Penyakit Lansia" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            @error('riwayat_penyakit')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pilih Wali (Pengguna dengan Role 'wali') -->
                        <div>
                            <p class="font-bold text-gray-700">Wali (Pengguna):</p>
                            <select name="id_pengguna" class="w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all" required>
                                <option value="">Pilih Wali</option>
                                @foreach ($wali as $pengguna)
                                    <option value="{{ $pengguna->id }}">{{ $pengguna->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pengguna')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="bg-blue-700 text-white py-3 px-6 rounded-lg mt-6 hover:bg-blue-800 transition-all duration-300 transform hover:scale-105 shadow-md">Tambahkan Lansia</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4">
        © 2024 ALL RIGHTS RESERVED
    </footer>
</body>

</html>
