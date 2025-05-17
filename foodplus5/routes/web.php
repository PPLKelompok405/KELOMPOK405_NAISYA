<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Redirect halaman awal ke dashboard guest
Route::get('/', function () {
    return redirect('/guest/dashboard');
});

// Route untuk dashboard guest
Route::get('/guest/dashboard', function () {
    return view('guest.dashboard');
})->name('dashboard.guest');

// Route untuk autentikasi
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Tambahkan route POST untuk register dengan redirect berdasarkan role
Route::post('/register', function (Request $request) {
    $controller = new AuthController();
    $response = $controller->register($request);
    
    // Jika response berhasil, redirect berdasarkan role
    if ($response->getStatusCode() === 201) {
        // Ambil data user dari response
        $responseData = json_decode($response->getContent());
        $userData = $responseData->data;
        
        // Login user secara manual dengan email
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Auth::login($user);
            
            // Redirect berdasarkan role
            if ($user->role === 'penyedia') {
                return redirect()->route('dashboard.donate');
            } else {
                return redirect()->route('dashboard.receive');
            }
        }
    }
    
    // Jika gagal, kembalikan response dari controller
    return $response;
})->name('register.submit');

// Route untuk autentikasi login dengan redirect berdasarkan role
Route::post('/login', function (Request $request) {
    $controller = new AuthController();
    $response = $controller->login($request);
    
    // Jika response berhasil, redirect berdasarkan role
    if ($response->getStatusCode() === 200) {
        // Ambil token dari response
        $responseData = json_decode($response->getContent());
        $token = $responseData->data->accessToken ?? null;
        
        if ($token) {
            // Login user dengan token menggunakan email
            $user = User::where('email', $request->email)->first();
            if ($user) {
                Auth::login($user);
                
                // Redirect berdasarkan role
                if ($user->role === 'penyedia') {
                    return redirect()->route('dashboard.donate');
                } else {
                    return redirect()->route('dashboard.receive');
                }
            }
        }
    }
    
    // Jika gagal, kembalikan response dari controller
    return $response;
})->name('login.submit');

// Route untuk dashboard donatur (yang sudah login)
Route::middleware(['auth:sanctum'])->group(function () {
    // Dashboard donatur
    Route::get('/donate/dashboard', function () {
        return view('donate.dashboard');
    })->name('dashboard.donate');
    
    // Dashboard penerima
    Route::get('/receive/dashboard', function () {
        return view('receive.dashboard');
    })->name('dashboard.receive');
    
    // Dashboard user (general)
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard.user');
    
    // Route untuk donasi
    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/create', function () {
        return view('donate.create');
    })->name('donations.create');
    // Add the alias route with the donate.create name
    Route::get('/donate/create', function () {
        return view('donate.create');
    })->name('donate.create');
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
    
    // Perbaikan route edit yang bermasalah
    Route::get('/donations/{donation}/edit', function ($donation) {
        return view('donate.edit', ['donation_id' => $donation]);
    })->name('donations.edit');
    
    Route::put('/donations/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    
    // Route untuk logout
    Route::post('/logout', function (Request $request) {
        // Instead of calling controller method, handle logout directly
        Auth::guard('web')->logout();
        
        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect ke halaman guest setelah logout
        return redirect()->route('dashboard.guest');
    })->name('logout');
});

// Route untuk manajemen donasi (guest)
Route::get('/guest/manajemendonasi', function () {
    $donations = \App\Models\Donation::all();
    return view('guest.manajemendonasi', ['donations' => $donations]);
})->name('guest.manajemendonasi');

// Routes untuk penerima donasi
Route::middleware(['auth', 'role:receiver'])->prefix('receive')->name('receive.')->group(function () {
    Route::get('/dashboard', [FoodRequestController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [FoodRequestController::class, 'create'])->name('create');
    Route::post('/store', [FoodRequestController::class, 'store'])->name('store');
    Route::get('/show/{id}', [FoodRequestController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [FoodRequestController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [FoodRequestController::class, 'update'])->name('update');
    Route::put('/mark-received/{id}', [FoodRequestController::class, 'markAsReceived'])->name('mark-received');
    Route::delete('/destroy/{id}', [FoodRequestController::class, 'destroy'])->name('destroy');
});
