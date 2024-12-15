<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Kelola Kunjungan</h1>

        <!-- Flash message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol tambah kunjungan -->
        <a href="{{ route('kelola_kunjungan.create') }}" class="btn btn-primary mb-3">Tambah Kunjungan</a>

        <!-- Daftar kunjungan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lansia</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kunjungan as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->lansia->nama }}</td>
                        <td>{{ $item->tanggal_kunjungan }}</td>
                        <td>
                            <a href="{{ route('kelola-kunjungan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kelola-kunjungan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kunjungan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form Tambah dan Edit Kunjungan -->
    @if (request()->routeIs('kelola_kunjungan.create') || request()->routeIs('kelola-kunjungan.edit'))
        <div class="container mt-5">
            <h1>{{ request()->routeIs('kelola_kunjungan.create') ? 'Tambah Kunjungan' : 'Edit Kunjungan' }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ request()->routeIs('kelola_kunjungan.create') ? route('kelola-kunjungan.store') : route('kelola-kunjungan.update', $kunjungan->id ?? '') }}" method="POST">
                @csrf
                @if(request()->routeIs('kelola-kunjungan.edit'))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="id_lansia" class="form-label">Pilih Lansia</label>
                    <select name="id_lansia" id="id_lansia" class="form-control">
                        <option value="">Pilih Lansia</option>
                        @foreach($lansia as $item)
                            <option value="{{ $item->id }}" {{ isset($kunjungan) && $kunjungan->id_lansia == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan', $kunjungan->tanggal_kunjungan ?? '') }}">
                </div>

                <button type="submit" class="btn btn-success">{{ request()->routeIs('kelola_kunjungan.create') ? 'Simpan' : 'Perbarui' }}</button>
                <a href="{{ route('kelola-kunjungan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->
