<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengacaraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SewaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/pengacara')->group(function () {
    Route::get('/register', [PengacaraController::class, 'getregister'])->name('pengacara.getregister');
    Route::post('/register', [PengacaraController::class, 'register'])->name('pengacara.register');
    Route::get('/offering', [PengacaraController::class, 'getAllOffering'])->name('pengacara.offering');
});

Route::prefix('/sewa')->group(function () {
    Route::get('/pilihkasus', [SewaController::class, 'pilihkasus'])->name('sewa.pilihkasus');
    Route::post('/pilihpengacara', [SewaController::class, 'pilihpengacara'])->name('sewa.pilihpengacara');
    Route::post('/form', [SewaController::class, 'index'])->name('sewa');
    Route::post('/', [SewaController::class, 'create'])->name('sewa.create');
    Route::post('/offer/{id}', [SewaController::class, 'offer'])->name('sewa.offer');
});

Route::get('/chat', [ChatController::class, 'index'])->name('chat');

require __DIR__.'/auth.php';
