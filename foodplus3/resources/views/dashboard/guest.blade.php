<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Food Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-color: #4a959b;
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        .food-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .food-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard.guest') }}">Food+</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container text-center">
            <h1>Selamat Datang di Food+</h1>
            <p class="lead">Platform donasi makanan untuk mengurangi pemborosan makanan dan membantu yang membutuhkan</p>
            <a href="{{ route('login') }}" class="btn btn-warning btn-lg mt-3">Login untuk Donasi</a>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Makanan yang Tersedia</h2>
        
        <div class="row">
            <!-- Ini akan diisi dengan data makanan yang didonasikan -->
            <div class="col-md-4">
                <div class="card food-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Kotak</h5>
                        <p class="card-text">Nasi dengan lauk ayam, sayur, dan sambal.</p>
                        <p class="card-text"><small class="text-muted">Lokasi: Jakarta Selatan</small></p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pesan</a>
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
                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pesan</a>
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
                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pesan</a>
                    </div>
                </div>
            </div>
        </div>
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