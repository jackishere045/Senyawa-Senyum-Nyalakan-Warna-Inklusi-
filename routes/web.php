<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PameranController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===================
// HALAMAN PUBLIK
// ===================

Route::get('/', function () {
    return view('index');
});

// Lowongan Publik
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{lowongan}', [LowonganController::class, 'show'])->name('lowongan.show');

// Event Publik
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

// Pameran Publik
Route::get('/pameran', [PameranController::class, 'index'])->name('pameran.index');
Route::get('/pameran/{pameran}', [PameranController::class, 'show'])->name('pameran.show');

// Sekolah Publik
Route::get('/sekolah', [SekolahController::class, 'index']); // Halaman view HTML
Route::get('/api/sekolah', [SekolahController::class, 'data']); // API JSON
Route::get('/api/sekolah/options', [SekolahController::class, 'options']); // API opsi filter


// ===================
// HALAMAN LOGIN ADMIN
// ===================

// Login form
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Submit login
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// ===================
// HALAMAN ADMIN (PAKAI MIDDLEWARE BENAR!)
// ===================

Route::prefix('admin')->middleware('adminauth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Lowongan (ADMIN)
    Route::prefix('lowongan')->group(function () {
        Route::get('/', [LowonganController::class, 'adminIndex'])->name('admin.lowongan.index');
        Route::get('/create', [LowonganController::class, 'create'])->name('admin.lowongan.create');
        Route::post('/', [LowonganController::class, 'store'])->name('admin.lowongan.store');
        Route::get('/{lowongan}/edit', [LowonganController::class, 'edit'])->name('admin.lowongan.edit');
        Route::put('/{lowongan}', [LowonganController::class, 'update'])->name('admin.lowongan.update');
        Route::delete('/{lowongan}', [LowonganController::class, 'destroy'])->name('admin.lowongan.destroy');
    });

    // Event (ADMIN)
    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'adminIndex'])->name('admin.event.index');
        Route::get('/create', [EventController::class, 'create'])->name('admin.event.create');
        Route::post('/', [EventController::class, 'store'])->name('admin.event.store');
        Route::get('/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
        Route::put('/{id}', [EventController::class, 'update'])->name('admin.event.update');
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
    });

    // Pameran (ADMIN)
    Route::prefix('pameran')->group(function () {
        Route::get('/', [PameranController::class, 'adminIndex'])->name('admin.pameran.index');
        Route::get('/create', [PameranController::class, 'create'])->name('admin.pameran.create');
        Route::post('/', [PameranController::class, 'store'])->name('admin.pameran.store');
        Route::get('/{pameran}/edit', [PameranController::class, 'edit'])->name('admin.pameran.edit');
        Route::put('/{pameran}', [PameranController::class, 'update'])->name('admin.pameran.update');
        Route::delete('/{pameran}', [PameranController::class, 'destroy'])->name('admin.pameran.destroy');
    });
});
