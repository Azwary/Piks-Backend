<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PengelolaController;
use App\Http\Middleware\RoleMiddleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum', 'role:1'])->group(function () {      //pengelola
    Route::post('/pemerintah/add', [PengelolaController::class, 'addPemerintah']);
    Route::get('/total-pending', [AduanController::class, 'total1']);
    Route::get('/pending', [AduanController::class, 'pending']);
    Route::put('/updateStatus/{id}', [AduanController::class, 'updateStatus']);
    Route::post('/logout', [AuthController::class, 'logout']);

});
Route::middleware(['auth:sanctum', 'role:2'])->group(function () {      //pemerintah
    Route::get('/proses', [AduanController::class, 'proses']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/logout', [AuthController::class, 'logout']);

// kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/{id}', [KategoriController::class, 'show']);
});
// Setatus
// Route::prefix('status')->group(function () {
//     Route::get('/', [StatusController::class, 'index']); // Get all statuses
//     Route::get('/{id}', [StatusController::class, 'show']); // Get a specific status
// });
// Aduan
Route::prefix('aduan')->group(function () {
    Route::get('/', [AduanController::class, 'index'])->name('Aduan.index'); // Get all Aduan
    Route::get('/{id}', [AduanController::class, 'show']);
    Route::post('/', [AduanController::class, 'store']);
    Route::delete('/{id}', [AduanController::class, 'destroy']);
});
Route::get('/new', [AduanController::class, 'new']);
Route::post('/cari-aduan', [AduanController::class, 'cari']);
Route::get('/total-aduan', [AduanController::class, 'total']);


// Middleware untuk memeriksa role

    // Rute untuk Pengelola (role:1)
    // Route::middleware(['role:1'])->group(function () {
    // Route::post('/pemerintah/add', [PengelolaController::class, 'addPemerintah']);
    // });

    // // Rute untuk Pemerintah (role:2)
    // Route::middleware(['role:2'])->group(function () {
    //     Route::get('/status', [StatusController::class, 'index']);
    // });
Route::middleware(['auth:sanctum', 'role:1'])->group(function () {      //pengelola
    Route::post('/pemerintah/add', [PengelolaController::class, 'addPemerintah']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum', 'role:2'])->group(function () {      //pemerintah
    Route::post('/pemerintah/add', [PengelolaController::class, 'addPemerintah']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
    // Rute logout (akses untuk semua yang sudah login)
