<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Posyandu Lansia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center rounded-">
            <h1 class="text-xl">Sistem Informasi Posyandu Lansia Terpadu</h1>
            <a href="/logout" class="text-white font-bold">Log Out</a> <!-- Pastikan URL logout sesuai -->
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

                <nav>
                    <ul class="space-y-4">
                        <!-- Navigation Links -->
                        <li><a href="/profil-wali" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Wali</a></li>
                        <li><a href="/profil-lansia" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Profil Lansia</a></li>
                        <li><a href="/kelola-kunjungan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Kelola Kunjungan</a></li>
                        <li><a href="/hasil-kesehatan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Hasil Kesehatan</a></li>
                        <li><a href="/status-rujukan" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Status Rujukan</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Content -->
            <section class="flex-1 p-8 bg-gray-100">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <img src="img/gambar.jpeg" alt="Profile Image" class="w-60 h-auto rounded-full">
                        <div>
                            <h2 class="text-2xl font-bold">Selamat Datang, {{ $user->nama }}!</h2>
                            <p class="text-gray-600">Selamat datang di Portal Posyandu Lansia, di sini kamu bisa mengelola berbagai data lansia dan kesehatan.</p>
                        </div>
                    </div>
                </div>

                <!-- Section for Visualization -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold mb-4">Visualisasi Data Kesehatan</h3>
                    <canvas id="healthChart" width="400" height="200"></canvas>
                </div>
            </section>
        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4">
        ©️ 2024 ALL RIGHTS RESERVED
    </footer>

    <script>
        // Mengambil data untuk grafik dari server
        fetch('/dashboard/visualization-data')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.skor_kesehatan); // Mengambil kategori skor kesehatan
                const values = data.map(item => item.total); // Mengambil jumlah untuk setiap kategori

                const ctx = document.getElementById('healthChart').getContext('2d');
                const healthChart = new Chart(ctx, {
                    type: 'bar', // Jenis grafik: 'bar', 'line', dll.
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Lansia',
                            data: values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</body>
</html>