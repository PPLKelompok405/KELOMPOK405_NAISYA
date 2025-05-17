<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Penerima - FOOD+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      display: flex;
      background-color: #f5f5f5;
      color: #0f172a;
    }
    aside {
      width: 250px;
      background-color: #fff;
      padding: 40px 20px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-right: 1px solid #e5e7eb;
    }
    aside h1 {
      font-weight: 700;
      font-size: 24px;
      color: #0f172a;
      margin-bottom: 40px;
    }
    aside .nav-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      color: #64748b;
      font-size: 16px;
      cursor: pointer;
    }
    aside .nav-item i {
      margin-right: 10px;
    }
    main {
      flex: 1;
      padding: 30px;
    }
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }
    .summary {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }
    .summary .card {
      background-color: #3db4a1;
      padding: 20px;
      color: white;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .summary .card i {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .donasi-harian {
      background-color: #3db4a1;
      color: white;
      padding: 20px;
      border-radius: 10px;
      width: 250px;
      margin-left: auto;
      margin-bottom: 30px;
    }
    .donasi-harian h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }
    .restoran {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }
    .restoran-card {
      background-color: #3db4a1;
      padding: 15px;
      border-radius: 10px;
      color: white;
      display: flex;
      align-items: center;
    }
    .restoran-card img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      margin-right: 15px;
    }
    .restoran-info {
      flex: 1;
    }
    .restoran-info h4 {
      margin-bottom: 5px;
    }
    .restoran-info .tags {
      font-size: 12px;
      margin-bottom: 5px;
    }
    .restoran-info .stats {
      font-size: 10px;
    }
    .footer-note {
      text-align: right;
      margin-top: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <aside>
    <div>
      <h1>FOOD+</h1>
      <div class="nav-item">👤 Profile</div>
      <div class="nav-item">📈 Donasi</div>
    </div>
    <div class="nav-item">🚪 LogOut</div>
  </aside>
  <main>
    <div class="topbar">
      <h2>Dashboard</h2>
      <div>
        🔔 <span>Eng (US)</span>
      </div>
    </div>

    <div class="summary">
      <div class="card">
        👤
        <div>Total Donatur<br><strong>13</strong></div>
      </div>
      <div class="card">
        🍽
        <div>Total Restoran<br><strong>16</strong></div>
      </div>
      <div class="card">
        ⬇
        <div>Total Penerima<br><strong>0</strong></div>
      </div>
      <div class="card">
        🍱
        <div>Total Makanan Tersedia<br><strong>13</strong></div>
      </div>
      <div class="card">
        💸
        <div>Total Pengeluaran<br><strong>13</strong></div>
      </div>
      <div class="card">
        🚚
        <div>Total Pengiriman<br><strong>13</strong></div>
      </div>
    </div>

    <div class="donasi-harian">
      <h3>Donasi Harian</h3>
      <p style="font-size: 24px; font-weight: bold;">90pcs</p>
      <p>9 February 2025</p>
    </div>

    <h3 style="margin-bottom: 20px;">Restoran</h3>
    <div class="restoran">
      @php
        // Data dummy untuk restoran
        $restorans = [
          (object) [
            'nama' => 'Gacoan',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Makanan, Cepat Saji, Mie',
            'views' => '302,624',
            'likes' => '30,908',
            'comments' => '33'
          ],
          (object) [
            'nama' => 'Solaria',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Makanan, Restoran, Terjamin',
            'views' => '101,650',
            'likes' => '26,743',
            'comments' => '209'
          ],
          (object) [
            'nama' => 'Kopi Kenangan',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Minuman, Kopi, Cepat Saji',
            'views' => '234,504',
            'likes' => '13,301',
            'comments' => '184'
          ],
          (object) [
            'nama' => 'Wings O Wings',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Makanan, Ayam, Aneka Ragam',
            'views' => '433,204',
            'likes' => '36,050',
            'comments' => '38'
          ],
          (object) [
            'nama' => 'Ayam Crisbar',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Ayam, Cepat Saji, Murah',
            'views' => '401,456',
            'likes' => '24,753',
            'comments' => '260'
          ],
          (object) [
            'nama' => 'Burger King',
            'logo_url' => 'https://via.placeholder.com/50',
            'kategori' => 'Makanan, Cepat Saji, Restoran',
            'views' => '242,634',
            'likes' => '23,430',
            'comments' => '134'
          ]
        ];
      @endphp
      
      {{-- Loop ini bisa kamu ganti nanti pakai data dari controller --}}
      @foreach($restorans as $resto)
      <div class="restoran-card">
        <img src="{{ $resto->logo_url ?? 'https://via.placeholder.com/50' }}" alt="Logo">
        <div class="restoran-info">
          <h4>{{ $resto->nama }}</h4>
          <div class="tags">{{ $resto->kategori }}</div>
          <div class="stats">{{ $resto->views }} Views · {{ $resto->likes }} Likes · {{ $resto->comments }} comments</div>
        </div>
      </div>
      @endforeach
    </div>
    <p class="footer-note">See Details</p>
  </main>
</body>
</html>

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <div class="summary">
      <div class="card">
        📦
        <div>Total Permintaan<br><strong>{{ $requests->count() }}</strong></div>
      </div>
      <div class="card">
        ✅
        <div>Permintaan Diterima<br><strong>{{ $requests->where('status', 'received')->count() }}</strong></div>
      </div>
      <div class="card">
        ⏳
        <div>Permintaan Pending<br><strong>{{ $requests->where('status', 'pending')->count() }}</strong></div>
      </div>
    </div>

    <div class="request-section">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3>Permintaan Saya</h3>
        <a href="{{ route('receive.create') }}" class="btn btn-primary">+ Buat Permintaan Baru</a>
      </div>
      
      @if($requests->count() > 0)
      <div class="request-table-container">
        <table class="request-table">
          <thead>
            <tr>
              <th>Makanan</th>
              <th>Tanggal Permintaan</th>
              <th>Status</th>
              <th>Catatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($requests as $request)
            <tr>
              <td>{{ $request->food->name }}</td>
              <td>{{ $request->created_at->format('d M Y, H:i') }}</td>
              <td>
                <span class="status-badge status-{{ $request->status }}">
                  @if($request->status == 'pending')
                    Menunggu
                  @elseif($request->status == 'approved')
                    Disetujui
                  @elseif($request->status == 'received')
                    Diterima
                  @else
                    Dibatalkan
                  @endif
                </span>
              </td>
              <td>{{ $request->notes ?? '-' }}</td>
              <td>
                <div style="display: flex; gap: 5px;">
                  <a href="{{ route('receive.show', $request->id) }}" class="btn btn-secondary">Detail</a>
                  
                  @if($request->status == 'approved')
                  <form action="{{ route('receive.mark-received', $request->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Terima</button>
                  </form>
                  @endif
                  
                  @if($request->status == 'pending')
                  <a href="{{ route('receive.edit', $request->id) }}" class="btn btn-primary">Edit</a>
                  
                  <form action="{{ route('receive.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div style="text-align: center; padding: 30px; background-color: white; border-radius: 10px;">
        <p>Anda belum memiliki permintaan. Silakan buat permintaan baru.</p>
      </div>
      @endif
    </div>

    <div class="request-section">
      <h3 style="margin-bottom: 15px;">Makanan Tersedia</h3>
      
      <div class="restoran">
        @foreach($availableFoods as $food)
        <div class="restoran-card">
          <img src="{{ $food->image_url ?? 'https://via.placeholder.com/50' }}" alt="Food Image">
          <div class="restoran-info">
            <h4>{{ $food->name }}</h4>
            <div class="tags">{{ $food->category }}</div>
            <div class="stats">Dari: {{ $food->donor_name }} · Tersedia hingga: {{ \Carbon\Carbon::parse($food->expiry_date)->format('d M Y') }}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>
</body>
</html>