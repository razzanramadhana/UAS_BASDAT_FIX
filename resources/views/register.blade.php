<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white rounded-lg p-10 shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Registrasi Akun</h1>

        <!-- Error Message (If any) -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Registrasi -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf  <!-- CSRF Token untuk keamanan -->
            
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Lengkap" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{ old('nama') }}">
            </div>
            
            <div class="form-group">
                <input type="text" name="nik" placeholder="NIK" required 
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                    inputmode="numeric" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    value="{{ old('nik') }}">
            </div>
            
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{ old('email') }}">
            </div>
            
            <div class="form-group">
                <input type="text" name="no_telephone" placeholder="Nomor Telepon" required 
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
                       inputmode="numeric" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                       value="{{ old('no_telephone') }}">
            </div>
            
            <div class="form-group">
                <input type="password" name="password" placeholder="Kata Sandi" minlength="8" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div>
            
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" minlength="8" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div>
            
            <div class="form-group">
                <input type="date" name="tanggal_lahir" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{ old('tanggal_lahir') }}">
            </div>
            
            <div class="form-group">
                <select name="jenis_kelamin" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <textarea name="alamat" placeholder="Alamat" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">{{ old('alamat') }}</textarea>
            </div>
            
            <button type="submit" class="bg-yellow-500 text-white py-3 px-4 rounded hover:bg-yellow-600 transition-all w-full mt-4">Registrasi</button>
        </form>

        <div class="mt-6 text-sm">
            Sudah punya akun? <a href="{{ route('login.form') }}" class="text-blue-500 hover:underline">Masuk</a>
        </div>

        <div class="mt-6 text-xs text-gray-500">
            ©️ 2024 ALL RIGHTS RESERVED
        </div>
    </div>
</body>
</html>