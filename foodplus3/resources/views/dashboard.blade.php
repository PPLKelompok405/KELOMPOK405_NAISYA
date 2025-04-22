<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Food Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Food Donation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
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
                    @endguest
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

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Makanan yang Didonasikan</h5>
                @auth
                    <a href="{{ route('donate.create') }}" class="btn btn-primary">Donasi Makanan</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login untuk Donasi</a>
                @endauth
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Contoh item makanan (nanti akan diambil dari database) -->
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Makanan">
                            <div class="card-body">
                                <h5 class="card-title">Nasi Kotak</h5>
                                <p class="card-text">Nasi dengan lauk ayam, sayur, dan sambal.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Jakarta Selatan</small></p>
                                <p class="card-text"><small class="text-muted">Donatur: John Doe</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Makanan">
                            <div class="card-body">
                                <h5 class="card-title">Roti Gandum</h5>
                                <p class="card-text">Roti gandum segar dengan selai coklat.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Bandung</small></p>
                                <p class="card-text"><small class="text-muted">Donatur: Jane Smith</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Makanan">
                            <div class="card-body">
                                <h5 class="card-title">Buah-buahan Segar</h5>
                                <p class="card-text">Paket buah-buahan segar terdiri dari apel, jeruk, dan pisang.</p>
                                <p class="card-text"><small class="text-muted">Lokasi: Surabaya</small></p>
                                <p class="card-text"><small class="text-muted">Donatur: Robert Johnson</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>