<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ | Dashboard Donasi</title>
    <!-- Import Google Font: Poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
        }
        
        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 20px;
        }
        
        .logo {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 40px;
            color: #1a237e;
        }
        
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            text-decoration: none;
            padding: 10px 0;
        }
        
        .menu-item.active {
            color: #1a237e;
            font-weight: 600;
        }
        
        .menu-icon {
            width: 24px;
            height: 24px;
            color: #666;
        }
        
        .logout {
            position: absolute;
            bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            text-decoration: none;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .notification {
            position: relative;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 6px;
            height: 6px;
            background-color: red;
            border-radius: 50%;
        }
        
        .content {
            margin-top: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
        }
        
        .btn-primary {
            background-color: #2d7d8a;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #236570;
        }
        
        .table th {
            font-weight: 600;
            color: #555;
        }
        
        .badge {
            padding: 6px 10px;
        }
        
        .welcome-banner {
            background-color: #4a959b;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">FOOD+</div>
            <div class="sidebar-menu">
                <a href="#" class="menu-item">
                    <i class="fas fa-user menu-icon"></i>
                    Profile
                </a>
                <a href="{{ route('donations.index') }}" class="menu-item active">
                    <i class="fas fa-gift menu-icon"></i>
                    Donasi
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout border-0 bg-transparent">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="page-title">Dashboard Donasi</div>
                <div class="header-actions">
                    <div class="notification">
                        <i class="fas fa-bell"></i>
                        <div class="notification-badge"></div>
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="welcome-banner">
                    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p>Terima kasih telah bergabung dengan platform Food+. Anda dapat mendonasikan makanan untuk membantu mereka yang membutuhkan.</p>
                    <a href="{{ route('donations.create') }}" class="btn btn-warning">Donasi Sekarang</a>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Donasi Saya</h5>
                        <a href="{{ route('donations.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Donasi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Makanan</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($donations))
                                        @forelse($donations as $donation)
                                        <tr>
                                            <td>{{ $donation->food_name }}</td>
                                            <td>{{ $donation->category }}</td>
                                            <td>{{ $donation->quantity }}</td>
                                            <td>{{ $donation->location }}</td>
                                            <td>
                                                <span class="badge bg-success">{{ $donation->status ?? 'Tersedia' }}</span>
                                            </td>
                                            <td>{{ $donation->created_at->format('d M Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada donasi</td>
                                        </tr>
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Data donasi tidak tersedia</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>