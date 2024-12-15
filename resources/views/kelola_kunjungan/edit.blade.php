<!-- resources/views/kelola_kunjungan/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Kunjungan</h1>
        <form action="{{ route('kelola-kunjungan.update', $kunjungan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_lansia" class="form-label">Pilih Lansia</label>
                <select name="id_lansia" id="id_lansia" class="form-control">
                    @foreach($lansia as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $kunjungan->id_lansia ? 'selected' : '' }}>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ $kunjungan->tanggal_kunjungan }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kelola-kunjungan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
