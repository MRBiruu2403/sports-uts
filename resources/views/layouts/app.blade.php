<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Fasilitas Olahraga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @stack('styles') <!-- Tempat untuk menambahkan style tambahan -->
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="my-4">
            <h1>Sistem Pemesanan Fasilitas Olahraga</h1>
        </header>

        <!-- Navigasi -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('facilities.index') }}">Beranda</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('facilities.index') }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings.index') }}">Pemesanan</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Konten -->
        <main>
            @yield('content') <!-- Konten dinamis untuk halaman -->
        </main>

        <!-- Footer -->
        <footer class="my-4 text-center">
            <p>&copy; 2024 Pemesanan Fasilitas Olahraga. Semua Hak Dilindungi.</p>
        </footer>
    </div>

    <!-- JavaScript (opsional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts') <!-- Tempat untuk menambahkan script tambahan -->
</body>
</html>
