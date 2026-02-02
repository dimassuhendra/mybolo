<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;

use App\Http\Controllers\PublicTestimonialController;


Route::get('/', function () {
    return view('company_profile');
});
Route::get('/testimoni-mybolo', [PublicTestimonialController::class, 'create'])->name('testimonial.create');
Route::post('/testimonial/store', [PublicTestimonialController::class, 'store'])->name('testimonial.store');

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

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::resource('partners', PartnerController::class)->except(['create', 'show', 'edit']);

    Route::resource('teams', TeamController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('testimonials', TestimonialController::class);
    Route::patch('/testimonials/{id}/status', [TestimonialController::class, 'updateStatus'])->name('testimonials.updateStatus');
});
