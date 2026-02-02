<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('company_profile');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard Utama dengan statistik dinamis
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Nanti rute CRUD CMS lainnya ditaruh di sini, contoh:
    // Route::resource('services', ServiceController::class);
});
