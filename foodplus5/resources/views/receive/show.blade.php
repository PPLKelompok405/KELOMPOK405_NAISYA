<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Permintaan - FOOD+</title>
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
    .detail-container {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      max-width: 800px;
    }
    .detail-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #e5e7eb;
    }
    .status-badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
    }
    .status-pending {
      background-color: #fef9c3;
      color: #854d0e;
    }
    .status-approved {
      background-color: #dbeafe;
      color: #1e40af;
    }
    .status-received {
      background-color: #dcfce7;
      color: #166534;
    }
    .status-cancelled {
      background-color: #fee2e2;
      color: #991b1b;
    }
    .food-detail {
      display: flex;
      margin-bottom: 30px;
    }
    .food-detail img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 10px;
      margin-right: 20px;
    }
    .food-info h3 {
      margin-bottom: 10px;
    }
    .food-info .details {
      color: #64748b;
      margin-bottom: 5px;
    }
    .detail-section {
      margin-bottom: 20px;
    }
    .detail-section h4 {
      margin-bottom: 10px;
      color: #64748b;
    }
    .timeline {
      margin-top: 30px;
    }
    .timeline-item {
      display: flex;
      margin-bottom: 15px;
    }
    .timeline-icon {
      width: 30px;
      height: 30px;
      background-color: #3db4a1;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      margin-right: 15px;
    }
    .timeline-content {
      flex: 1;
    }
    .timeline-content h5 {
      margin-bottom: 5px;
    }
    .timeline-content p {
      color: #64748b;
      font-size: 14px;
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
    .btn-success {
      background-color: #22c55e;
      color: white;
      border: none;
    }
    .btn-danger {
      background-color: #ef4444;
      color: white;
      border: none;
    }
    .action-buttons {
      display: flex;
      gap: 10px;
      margin-top: 30px;
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