<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Food Requests - FOOD+</title>
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
      text-decoration: none;
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
    .btn {
      background-color: #3db4a1;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
    }
    .requests-table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      margin-top: 20px;
    }
    .requests-table th, .requests-table td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #e5e7eb;
    }
    .requests-table th {
      background-color: #3db4a1;
      color: white;
    }
    .status-badge {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: 600;
    }
    .status-pending {
      background-color: #f59e0b;
      color: white;
    }
    .status-approved {
      background-color: #10b981;
      color: white;
    }
    .status-in_transit {
      background-color: #3b82f6;
      color: white;
    }
    .status-received {
      background-color: #6366f1;
      color: white;
    }
    .status-cancelled {
      background-color: #ef4444;
      color: white;
    }
    .action-btn {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
      text-decoration: none;
      margin-right: 5px;
      display: inline-block;
    }
    .btn-view {
      background-color: #3b82f6;
      color: white;
    }
    .btn-received {
      background-color: #10b981;
      color: white;
    }
    .btn-delete {
      background-color: #ef4444;
      color: white;
    }
    .alert {
      padding: 12px 15px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .alert-success {
      background-color: #d1fae5;
      color: #065f46;
      border: 1px solid #a7f3d0;
    }
    .alert-error {
      background-color: #fee2e2;
      color: #b91c1c;
      border: 1px solid #fecaca;
    }
    .filter-section {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .filter-btn {
      padding: 6px 12px;
      border-radius: 4px;
      background-color: #e5e7eb;
      color: #4b5563;
      text-decoration: none;
      font-size: 14px;
    }
    .filter-btn.active {
      background-color: #3db4a1;
      color: white;
    }
  </style>
</head>
<body>
  <aside>
    <div>
      <h1>FOOD+</h1>
      <div class="nav-item">👤 Profile</div>
      <a href="{{ route('receive.requests.index') }}" class="nav-item">📦 My Requests</a>
      <a href="{{ route('receive.dashboard') }}" class="nav-item">📊 Dashboard</a>
    </div>
    <div class="nav-item">🚪 LogOut</div>
  </aside>
  <main>
    <div class="topbar">
      <h2>My Food Requests</h2>
      <a href="{{ route('receive.requests.create') }}" class="btn">+ New Request</a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
    @endif

    <div class="filter-section">
      <a href="{{ route('receive.requests.index') }}" class="filter-btn {{ !request('status') ? 'active' : '' }}">All</a>
      <a href="{{ route('receive.requests.index', ['status' => 'pending']) }}" class="filter-btn {{ request('status') === 'pending' ? 'active' : '' }}">Pending</a>
      <a href="{{ route('receive.requests.index', ['status' => 'approved']) }}" class="filter-btn {{ request('status') === 'approved' ? 'active' : '' }}">Approved</a>
      <a href="{{ route('receive.requests.index', ['status' => 'in_transit']) }}" class="filter-btn {{ request('status') === 'in_transit' ? 'active' : '' }}">In Transit</a>
      <a href="{{ route('receive.requests.index', ['status' => 'received']) }}" class="filter-btn {{ request('status') === 'received' ? 'active' : '' }}">Received</a>
    </div>

    @if($requests->count() > 0)
      <table class="requests-table">
        <thead>
          <tr>
            <th>Food Item</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Requested On</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $request)
            <tr>
              <td>{{ $request->food->name }}</td>
              <td>{{ $request->quantity }}</td>
              <td>
                <span class="status-badge status-{{ $request->status }}">
                  {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                </span>
              </td>
              <td>{{ $request->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('receive.requests.show', $request) }}" class="action-btn btn-view">View</a>
                
                @if($request->status === 'in_transit')
                  <form action="{{ route('receive.requests.received', $request) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="action-btn btn-received">Mark Received</button>
                  </form>
                @endif
                
                @if(in_array($request->status, ['pending', 'approved']))
                  <form action="{{ route('receive.requests.destroy', $request) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn btn-delete" onclick="return confirm('Are you sure you want to cancel this request?')">Cancel</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>No food requests found. <a href="{{ route('receive.requests.create') }}">Create your first request</a>.</p>
    @endif
  </main>
</body>
</html>