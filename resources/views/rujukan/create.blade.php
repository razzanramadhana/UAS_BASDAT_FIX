<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Rujukan Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-col flex-1">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <h1 class="text-xl font-bold">Buat Rujukan Baru</h1>
            <a href="/rujukan" class="text-white text-lg font-bold">Kembali</a>
        </header>

        <!-- Content -->
        <div class="flex-1 p-8 bg-gray-100">
            <h2 class="text-2xl font-bold mb-4">Formulir Rujukan Baru</h2>

            <form action="{{ route('rujukan.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
                @csrf

                <!-- Pilih Lansia -->
                <div class="mb-4">
                    <label for="id_kelola_kunjungan" class="block text-sm font-medium text-gray-700">Lansia</label>
                    <select name="id_kelola_kunjungan" id="id_kelola_kunjungan" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @foreach($kelolaKunjunganList as $kelolaKunjungan)
                            <option value="{{ $kelolaKunjungan->id }}">
                                {{ $kelolaKunjungan->lansia->nama ?? 'Tidak Ditemukan' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Rumah Sakit -->
                <div class="mb-4">
                    <label for="id_rumah_sakit" class="block text-sm font-medium text-gray-700">Rumah Sakit</label>
                    <select name="id_rumah_sakit" id="id_rumah_sakit" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @foreach($rumahSakitList as $rumahSakit)
                            <option value="{{ $rumahSakit->id }}">
                                {{ $rumahSakit->nama_rumah_sakit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Rujukan -->
                <div class="mb-4">
                    <label for="status_rujukan" class="block text-sm font-medium text-gray-700">Status Rujukan</label>
                    <select name="status_rujukan" id="status_rujukan" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="Diproses">Diproses</option>
                        <option value="Diterima">Diterima</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
