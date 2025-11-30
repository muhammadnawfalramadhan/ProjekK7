<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TukangTimbang\WebSawit;

Route::get('/login', [WebSawit::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [WebSawit::class, 'login'])->name('auth.login');
Route::get('/logout', [WebSawit::class, 'logout'])->name('auth.logout');
Route::get('/register', [WebSawit::class, 'registerForm'])->name('auth.registerForm');
Route::post('/register', [WebSawit::class, 'register'])->name('auth.register');

Route::prefix('tukang')->group(function () {
    Route::get('/', [WebSawit::class, 'dashboardTukang'])->name('tukang.dashboard');
    Route::get('/input', [WebSawit::class, 'inputTimbangan'])->name('tukang.input');
    Route::get('/data', [WebSawit::class, 'dataTimbangan'])->name('tukang.data');

    Route::post('/store', [WebSawit::class, 'storeTimbangan'])->name('timbangan.store');
    Route::put('/update/{id}', [WebSawit::class, 'updateTimbangan'])->name('timbangan.update');
    Route::delete('/delete/{id}', [WebSawit::class, 'destroyTimbangan'])->name('timbangan.destroy');
});
