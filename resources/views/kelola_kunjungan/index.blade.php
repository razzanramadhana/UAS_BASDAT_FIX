<!-- resources/views/kelola_kunjungan/index.blade.php -->
<!DOCTYPE html>
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
        <a href="{{ route('kelola-kunjungan.create') }}" class="btn btn-success mb-3">Tambah Kunjungan</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lansia</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kunjungan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->lansia->nama }}</td>
                        <td>{{ $item->tanggal_kunjungan }}</td>
                        <td>
                            <a href="{{ route('kelola-kunjungan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kelola-kunjungan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
