<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Hasil Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-600 text-white p-5">
        <h1 class="text-xl">Sistem Informasi Kesehatan</h1>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar Navigasi -->
        <aside class="bg-white w-64 p-5 shadow-md">
            <div class="text-center mb-8">
                <h2 class="text-xl font-semibold mt-4">Nama Lengkap</h2>
                <p class="text-gray-600">NIK</p>
                <p class="text-gray-600">Alamat</p>
            </div>
            <ul class="space-y-4">
                <li><a href="jadwal-nakes" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a></li>
                <li><a href="input-hasil-kesehatan" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a></li>
                <li><a href="rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a></li>
                <li><a href="data-pasien" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a></li>
            </ul>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-8 bg-gray-100">
            <h2 class="text-2xl font-bold mb-6">Form Input Hasil Kesehatan</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                    <p><strong>Success!</strong></p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ url('/input-hasil-kesehatan') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_lansia" class="block font-semibold">Pilih Lansia:</label>
                    <select id="id_lansia" name="id_lansia" required class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">Pilih Lansia</option>
                        @foreach($lansia as $l)
                            <option value="{{ $l->id }}">{{ $l->nama }} ({{ $l->id }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="id_kunjungan" class="block font-semibold">Pilih Kunjungan:</label>
                    <select id="id_kunjungan" name="id_kunjungan" required class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">Pilih Kunjungan</option>
                        @foreach($kelolaKunjungan as $kunjungan)
                            <option value="{{ $kunjungan->id }}">Kunjungan pada: {{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d-m-Y') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="berat_badan" class="block font-semibold">Berat Badan (kg):</label>
                    <input type="number" name="berat_badan" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="tinggi_badan" class="block font-semibold">Tinggi Badan (cm):</label>
                    <input type="number" name="tinggi_badan" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="tekanan_darah" class="block font-semibold">Tekanan Darah (mmHg):</label>
                    <input type="number" name="tekanan_darah" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="gula_darah" class="block font-semibold">Gula Darah (mg/dL):</label>
                    <input type="number" name="gula_darah" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="kolesterol" class="block font-semibold">Kolesterol (mg/dL):</label>
                    <input type="number" name="kolesterol" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="komentar_nakes" class="block font-semibold">Komentar Nakes:</label>
                    <textarea id="komentar_nakes" name="komentar_nakes" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Tambahkan komentar atau catatan terkait pasien..."></textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Simpan</button>
            </form>
        </main>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4">
        © 2024 ALL RIGHTS RESERVED
    </footer>
</body>
</html>
