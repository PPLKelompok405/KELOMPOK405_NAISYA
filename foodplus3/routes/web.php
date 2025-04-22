<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route utama langsung ke halaman dashboard guest
Route::get('/', function () {
    return view('dashboard.guest');
})->name('dashboard.guest');

// Route dashboard untuk user yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard.user');
})->middleware('auth')->name('dashboard.user');

// Route untuk autentikasi
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Register
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Fitur donasi hanya untuk user yang login
    Route::get('/donate', function () {
        return view('donate.create');
    })->name('donate.create');
    
    Route::post('/donate', function () {
        // Logic untuk menyimpan donasi
        return redirect()->route('dashboard.user')->with('success', 'Donasi berhasil ditambahkan!');
    })->name('donate.store');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});