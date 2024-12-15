<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Kunjungan</h1>

        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk input kunjungan -->
        <form action="{{ route('kelola-kunjungan.store') }}" method="POST">
            @csrf
            <!-- Pilih Lansia -->
            <div class="mb-3">
                <label for="id_lansia" class="form-label">Pilih Lansia</label>
                <select name="id_lansia" id="id_lansia" class="form-control">
                    <option value="">Pilih Lansia</option>
                    @foreach($lansia as $item)
                        <option value="{{ $item->id }}" {{ old('id_lansia') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Input Tanggal Kunjungan -->
            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan') }}">
            </div>

            <!-- Pilih Sesi -->
            <div class="form-group">
                <label for="sesi">Pilih Sesi:</label>
                <select name="sesi" id="sesi" class="form-control">
                    <option value="1" {{ old('sesi') == '1' ? 'selected' : '' }}>Sesi 1: 08.00 - 10.00</option>
                    <option value="2" {{ old('sesi') == '2' ? 'selected' : '' }}>Sesi 2: 10.00 - 12.00</option>
                </select>
            </div>


            <!-- Tombol Simpan dan Batal -->
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('kelola-kunjungan.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
</body>
</html>
