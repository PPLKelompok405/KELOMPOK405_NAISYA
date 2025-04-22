<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Food Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .food-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .food-card:hover {
            transform: translateY(-5px);
        }
        .welcome-banner {
            background-color: #4a959b;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard.user') }}">Food+</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donate.create') }}">Donasi Makanan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome-banner">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>Terima kasih telah bergabung dengan platform Food+. Anda dapat melihat makanan yang tersedia atau mendonasikan makanan Anda sendiri.</p>
            <a href="{{ route('donate.create') }}" class="btn btn-warning">Donasi Sekarang</a>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Makanan yang Tersedia</h5>
                <a href="{{ route('donate.create') }}" class="btn btn-primary">Donasi Makanan</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Ini akan diisi dengan data makanan yang didonasikan -->
                    <div class="col-md-4">
                        <div class="card food-card">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                                <h5 class="card-title">Nasi Kotak</h5>
                                <p class="card-text">Nasi dengan lauk ayam, sayur, dan sambal.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Jakarta Selatan</small></p>
                                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card food-card">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                                <h5 class="card-title">Roti Gandum</h5>
                                <p class="card-text">Roti gandum segar dari toko roti premium.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Bandung</small></p>
                                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card food-card">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                                <h5 class="card-title">Buah-buahan Segar</h5>
                                <p class="card-text">Campuran buah-buahan segar: apel, jeruk, dan pisang.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Surabaya</small></p>
                                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->role == 'Penyedia')
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Donasi Saya</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Makanan</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nasi Kotak</td>
                                <td>Nasi dengan lauk ayam, sayur, dan sambal.</td>
                                <td>Jakarta Selatan</td>
                                <td><span class="badge bg-success">Tersedia</span></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">
            <p>© 2023 Food+ | Platform Donasi Makanan</p>
            <p>Dibuat dengan ❤️ untuk mengurangi pemborosan makanan</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>