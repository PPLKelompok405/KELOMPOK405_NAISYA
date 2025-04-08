<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Routes untuk registrasi
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Dashboard routes
Route::get('/penyedia/dashboard', function () {
    return view('penyedia.dashboard');
})->middleware(['auth', 'role:penyedia'])->name('penyedia.dashboard');

Route::get('/penerima/dashboard', function () {
    return view('penerima.dashboard');
})->middleware(['auth', 'role:penerima'])->name('penerima.dashboard');

// Routes untuk login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
