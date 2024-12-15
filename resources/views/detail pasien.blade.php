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
            <a href="/dashboard-nakes" class="text-xl">
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
                    <p class="text-gray-600">NIK123456789</p> <!-- Static placeholder -->
                    <p class="text-gray-600">Alamat: Jalan Raya No.123</p> <!-- Static placeholder -->
                </div>

                <nav>
                    <ul class="space-y-4">
                        <li>
                            <a href="jadwal-nakes" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a>
                        </li>
                        <li>
                            <a href="input-hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a>
                        </li>
                        <li>
                            <a href="rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a>
                        </li>
                        <li>
                            <a href="data-pasien" class="text-black hover:bg-yellow-500 bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Content -->
            <div class="flex-1 p-8 bg-gray-50">
                <h2 class="text-2xl font-bold mb-6">Detail Profil Lansia</h2>
                
                <div class="flex flex-col md:flex-row gap-8 items-start">

                    <!-- Detail Lansia -->
                    <div class="text-lg space-y-4">
                        <p><span class="font-bold">Nama Lansia:</span> John Doe</p>
                        <p><span class="font-bold">NIK:</span> 987654321</p>
                        <p><span class="font-bold">Nama Wali:</span> Jane Smith</p>
                        <p><span class="font-bold">Umur:</span> 75 tahun</p>
                        <p><span class="font-bold">Tanggal Lahir:</span> 1949-06-12</p>
                        <p><span class="font-bold">Jenis Kelamin:</span> Laki-laki</p>
                        <p><span class="font-bold">Nomor Telepon:</span> 08123456789</p>
                        <p><span class="font-bold">Alamat:</span> Jalan Merdeka No.123, Jakarta</p>
                        <p><span class="font-bold">Alergi Obat:</span> Tidak ada</p>
                        <p><span class="font-bold">Diagnosa:</span> Hipertensi, Diabetes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>