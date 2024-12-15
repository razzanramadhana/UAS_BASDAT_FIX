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
        <header class="bg-blue-600 text-white p-5 flex justify-between items-center rounded-t-lg">
            <h1 class="text-xl font-semibold">Sistem Informasi Posyandu Lansia Terpadu</h1>
            <a href="{{ route('logout') }}" class="text-white font-bold">Log Out</a>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="bg-white w-64 p-5 shadow-md">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold mt-4">{{ $user->nama }}</h2>
                    <p class="text-gray-600">{{ $user->nik }}</p>
                    <p class="text-gray-600">{{ $user->alamat }}</p>
                </div>

                <nav>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('jadwal-nakes') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Jadwal Nakes</a>
                        </li>
                        <li>
                            <a href="{{ route('input-hasil-kesehatan') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Input Hasil Kesehatan</a>
                        </li>
                        <li>
                            <a href="{{ route('rujukan.index') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Rujukan</a>
                        </li>
                        <li>
                            <a href="{{ route('data-pasien') }}" class="text-black hover:bg-yellow-500 block p-3 rounded-lg transition duration-200 ease-in-out">Data Pasien</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <section class="flex-1 p-8 bg-gray-100">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('img/gambar.jpeg') }}" alt="Profile Image" class="w-60 h-auto rounded-full">
                        <div>
                            <h2 class="text-2xl font-bold">Selamat Datang, {{ $user->nama }}!</h2>
                            <p class="text-gray-600">Selamat datang di Portal Posyandu Lansia</p>
                        </div>
                    </div>
                </div>

                <!-- Visualisasi Data Kesehatan -->
                <h2 class="text-xl font-bold mt-6">Visualisasi Data Kesehatan</h2>
                <div class="mt-4 bg-white p-4 rounded-lg shadow">
                    <canvas id="healthDistributionChart"></canvas>
                </div>

                <!-- Visualisasi Data Kunjungan -->
                <h2 class="text-xl font-bold mt-6">Visualisasi Data Kunjungan</h2>
                <div class="mt-4 bg-white p-4 rounded-lg shadow">
                    <canvas id="kunjunganChart"></canvas>
                </div>

                <h2 class="text-xl font-bold mt-6">Visualisasi Distribusi Umur</h2>
                <div class="mt-4 bg-white p-4 rounded-lg shadow">
                    <canvas id="umurDistributionChart"></canvas>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-auto">
        ©️ 2024 ALL RIGHTS RESERVED
    </footer>

    <!-- Script untuk Chart.js -->
    <script>
        // Chart untuk Status Kesehatan
        const ctxBar = document.getElementById('healthDistributionChart').getContext('2d');
        const healthDistributionChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Baik', 'Waspada', 'Bahaya'],
                datasets: [{
                    label: 'Status Kesehatan',
                    data: [{{ $jumlahBaik }}, {{ $jumlahWaspada }}, {{ $jumlahBuruk }}],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart untuk Data Kunjungan
        const ctxKunjungan = document.getElementById('kunjunganChart').getContext('2d');
        const kunjunganChart = new Chart(ctxKunjungan, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_values($bulanKunjungan)) !!}, // Menggunakan array_values untuk mendapatkan nama bulan
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode(array_values($jumlahKunjunganPerBulan)) !!}, // Menggunakan array_values untuk mendapatkan jumlah kunjungan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart untuk Distribusi Umur
        const ctxUmur = document.getElementById('umurDistributionChart').getContext('2d');
        const umurDistributionChart = new Chart(ctxUmur, {
            type: 'bar',
            data: {
                labels: {!! json_encode($umurLabels) !!},
                datasets: [{
                    label: 'Jumlah Lansia per Dekade',
                    data: {!! json_encode($umurCounts) !!},
                    backgroundColor: 'rgba(153, 102, 255, 0.8)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Lansia'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Umur (Dekade)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>