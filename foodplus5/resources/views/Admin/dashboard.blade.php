<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ Admin Dashboard</title>
    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2E7D32;
            --primary-light: #4CAF50;
            --background: #F8F9FA;
            --card-bg: #FFFFFF;
            --text-dark: #212529;
            --text-medium: #495057;
            --text-light: #6C757D;
            --shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', Arial, sans-serif;
        }
        
        body {
            background-color: var(--background);
            padding: 30px;
            min-height: 100vh;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-icon {
            background-color: var(--primary);
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 22px;
            box-shadow: var(--shadow);
        }
        
        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: 0.5px;
        }
        
        .logo-text span {
            color: var(--primary);
        }
        
        .date {
            font-size: 16px;
            color: var(--text-medium);
            font-weight: 500;
        }
        
        /* Section Title */
        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--primary);
            font-size: 22px;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .stat-title {
            font-size: 16px;
            color: var(--text-medium);
            font-weight: 500;
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: rgba(46, 125, 50, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 18px;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
        }
        
        /* Highlight Card */
        .highlight-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            margin-top: 30px;
        }
        
        .highlight-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .highlight-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .highlight-title i {
            color: var(--primary);
            font-size: 20px;
        }
        
        .highlight-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .highlight-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
        }
        
        .highlight-date {
            font-size: 16px;
            color: var(--text-medium);
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <div class="logo">
                <div class="logo-icon">F</div>
                <div class="logo-text">FOOD<span>+</span></div>
            </div>
            <div class="date">{{ now()->format('j F Y') }}</div>
        </div>
        
        <div class="section-title">
            <i class="fas fa-database"></i>
            <span>Data</span>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Donatur</div>
                    <div class="stat-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalDonatur ?? '0' }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Restoran</div>
                    <div class="stat-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalRestoran ?? '0' }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Penerima</div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalPenerima ?? '0' }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Makanan Tersedia</div>
                    <div class="stat-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalMakanan ?? '0' }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Pengeluaran</div>
                    <div class="stat-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalPengeluaran ?? '0' }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Pengiriman</div>
                    <div class="stat-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $totalPengiriman ?? '0' }}</div>
            </div>
        </div>
        
        <div class="highlight-card">
            <div class="highlight-header">
                <div class="highlight-title">
                    <i class="fas fa-star"></i>
                    <span>Danaal Harlan</span>
                </div>
            </div>
            <div class="highlight-content">
                <div class="highlight-value">{{ $highlightValue ?? '0' }}pcs</div>
                <div class="highlight-date">{{ now()->format('j F Y') }}</div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>