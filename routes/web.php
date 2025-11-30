<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TukangTimbang\WebSawit;
use App\Http\Controllers\Admin\AdminController;

// Routes untuk Authentication (Login, Register, Logout)
Route::get('/login', [WebSawit::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [WebSawit::class, 'login'])->name('auth.login');
Route::get('/logout', [WebSawit::class, 'logout'])->name('auth.logout');
Route::get('/register', [WebSawit::class, 'registerForm'])->name('auth.registerForm');
Route::post('/register', [WebSawit::class, 'register'])->name('auth.register');

// Routes untuk Tukang Timbang
Route::prefix('tukang')->group(function () {
    Route::get('/', [WebSawit::class, 'dashboardTukang'])->name('tukang.dashboard');
    Route::get('/input', [WebSawit::class, 'inputTimbangan'])->name('tukang.input');
    Route::get('/data', [WebSawit::class, 'dataTimbangan'])->name('tukang.data');

    Route::post('/store', [WebSawit::class, 'storeTimbangan'])->name('timbangan.store');
    Route::put('/update/{id}', [WebSawit::class, 'updateTimbangan'])->name('timbangan.update');
    Route::delete('/delete/{id}', [WebSawit::class, 'destroyTimbangan'])->name('timbangan.destroy');
});

// Routes untuk Admin (Harga TBS, Timbangan, Pengguna, Laporan)
Route::prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.pages.dashboard');  // Menampilkan dashboard

    // Kelola Harga TBS
    Route::prefix('harga')->group(function () {
        Route::get('/', [AdminController::class, 'kelolaHargaTbs'])->name('admin.harga.index'); // Menampilkan daftar harga
        Route::get('create', [AdminController::class, 'tambahHargaTbs'])->name('admin.harga.create'); // Form untuk tambah harga
        Route::post('/', [AdminController::class, 'simpanHargaTbs'])->name('admin.harga.store'); // Menyimpan harga
        Route::get('{id}/edit', [AdminController::class, 'editHargaTbs'])->name('admin.harga.edit'); // Form edit harga
        Route::put('{id}', [AdminController::class, 'updateHargaTbs'])->name('admin.harga.update'); // Update harga
        Route::delete('{id}', [AdminController::class, 'hapusHargaTbs'])->name('admin.harga.delete'); // Hapus harga
    });

    // Kelola Timbangan
    Route::prefix('timbangan')->group(function () {
        Route::get('/', [AdminController::class, 'kelolaTimbangans'])->name('admin.timbangan.index'); // Daftar timbangan
        Route::get('create', [AdminController::class, 'tambahTimbangan'])->name('admin.timbangan.create'); // Form tambah timbangan
        Route::post('/', [AdminController::class, 'simpanTimbangan'])->name('admin.timbangan.store'); // Menyimpan timbangan
        Route::get('{id}/edit', [AdminController::class, 'editTimbangan'])->name('admin.timbangan.edit'); // Form edit timbangan
        Route::put('{id}', [AdminController::class, 'updateTimbangan'])->name('admin.timbangan.update'); // Update timbangan
        Route::delete('{id}', [AdminController::class, 'hapusTimbangan'])->name('admin.timbangan.delete'); // Hapus timbangan
    });

    // Kelola Pengguna
    Route::prefix('pengguna')->group(function () {
        Route::get('/', [AdminController::class, 'kelolaPengguna'])->name('admin.pengguna.index'); // Daftar pengguna
        Route::get('{id}/edit', [AdminController::class, 'editPengguna'])->name('admin.pengguna.edit'); // Edit pengguna
        Route::put('{id}', [AdminController::class, 'updatePengguna'])->name('admin.pengguna.update'); // Update pengguna
    });

    // Laporan
    Route::prefix('laporan')->group(function () {
        Route::get('/', [AdminController::class, 'laporan'])->name('admin.laporan.index'); // Laporan timbangan
    });
});
