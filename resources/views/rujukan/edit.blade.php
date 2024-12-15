<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rujukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-col flex-1">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center">
            <h1 class="text-xl font-bold">Edit Rujukan</h1>
            <a href="/rujukan" class="text-white text-lg font-bold">Kembali</a>
        </header>

        <!-- Content -->
        <div class="flex-1 p-8 bg-gray-100">
            <h2 class="text-2xl font-bold mb-4">Edit Data Rujukan</h2>

            <form action="{{ route('rujukan.update', $rujukan->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
                @csrf
                @method('PUT')

                <!-- Lansia -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Lansia</label>
                    <input type="text" value="{{ $rujukan->kelolaKunjungan->lansia->nama ?? 'Tidak Ditemukan' }}" disabled
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>

                <!-- Rumah Sakit -->
                <div class="mb-4">
                    <label for="id_rumah_sakit" class="block text-sm font-medium text-gray-700">Rumah Sakit</label>
                    <select name="id_rumah_sakit" id="id_rumah_sakit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @foreach($rumahSakitList as $rumahSakit)
                            <option value="{{ $rumahSakit->id }}" {{ $rujukan->id_rumah_sakit == $rumahSakit->id ? 'selected' : '' }}>
                                {{ $rumahSakit->nama_rumah_sakit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Rujukan -->
                <div class="mb-4">
                    <label for="status_rujukan" class="block text-sm font-medium text-gray-700">Status Rujukan</label>
                    <select name="status_rujukan" id="status_rujukan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="Diproses" {{ $rujukan->status_rujukan == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Diterima" {{ $rujukan->status_rujukan == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
