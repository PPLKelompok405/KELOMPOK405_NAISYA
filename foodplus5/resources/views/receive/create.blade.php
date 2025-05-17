<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Permintaan - FOOD+</title>
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
    .form-container {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      max-width: 800px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }
    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #e5e7eb;
      border-radius: 5px;
      font-size: 16px;
    }
    .form-control:focus {
      outline: none;
      border-color: #3db4a1;
    }
    textarea.form-control {
      min-height: 100px;
      resize: vertical;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
    }
    .btn-primary {
      background-color: #3db4a1;
      color: white;
      border: none;
    }
    .btn-secondary {
      background-color: #64748b;
      color: white;
      border: none;
    }
    .food-cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      margin-top: 20px;
    }
    .food-card {
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 15px;
      display: flex;
      align-items: center;
      cursor: pointer;
    }
    .food-card.selected {
      border-color: #3db4a1;
      background-color: #f0fdfa;
    }
    .food-card img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      margin-right: 15px;
    }
    .food-info h4 {
      margin-bottom: 5px;
    }
    .food-info .details {
      font-size: 12px;
      color: #64748b;
    }
    .error-message {
      color: #ef4444;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <aside>
    <div>
      <h1>FOOD+</h1>
      <div class="nav-item">👤 Profile</div>
      <div class="nav-item">📦 Permintaan Saya</div>
      <div class="nav-item">🍽️ Makanan Tersedia</div>
    </div>
    <div class="nav-item">🚪 LogOut</div>
  </aside>
  <main>
    <div class="topbar">
      <h2>Buat Permintaan Baru</h2>
      <div>
        🔔 <span>Eng (US)</span>
      </div>
    </div>

    <div class="form-container">
      <form action="{{ route('receive.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
          <label for="food_id">Pilih Makanan</label>
          
          @if($availableFoods->count() > 0)
          <div class="food-cards">
            @foreach($availableFoods as $food)
            <div class="food-card" onclick="selectFood(this, {{ $foodood->id }})">
              <img src="{{ $food->image_url ?? 'https://via.placeholder.com/60' }}" alt="Food Image">
              <div class="food-info">
                <h4>{{ $food->name }}</h4>
                <div class="details">
                  <div>Dari: {{ $food->donor_name }}</div>
                  <div>Tersedia hingga: {{ \Carbon\Carbon::parse($food->expiry_date)->format('d M Y') }}</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <input type="hidden" name="food_id" id="food_id" required>
          @if($errors->has('food_id'))
          <div class="error-message">{{ $errors->first('food_id') }}</div>
          @endif
          @else
          <p>Tidak ada makanan yang tersedia saat ini.</p>
          @endif
        </div>
        
        <div class="form-group">
          <label for="notes">Catatan (Opsional)</label>
          <textarea name="notes" id="notes" class="form-control" placeholder="Tambahkan catatan atau informasi tambahan...">{{ old('notes') }}</textarea>
          @if($errors->has('notes'))
          <div class="error-message">{{ $errors->first('notes') }}</div>
          @endif
        </div>
        
        <div style="display: flex; gap: 10px;">
          <a href="{{ route('receive.dashboard') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
        </div>
      </form>
    </div>
  </main>

  <script>
    function selectFood(element, foodId) {
      // Hapus kelas selected dari semua kartu
      document.querySelectorAll('.food-card').forEach(card => {
        card.classList.remove('selected');
      });
      
      // Tambahkan kelas selected ke kartu yang dipilih
      element.classList.add('selected');
      
      // Set nilai food_id
      document.getElementById('food_id').value = foodId;
    }
  </script>
</body>
</html>