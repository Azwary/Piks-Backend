<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
// kategori
Route::get('/kategori', [kategoriController::class, 'index']);
Route::get('/kategori/{id}', [kategoriController::class, 'show']);
// Setatus
Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id}', [StatusController::class, 'show']);
// Aduan
Route::get('/aduan', [AduanController::class, 'index'])->name('Aduan.index');
Route::get('/aduan/{id}', [AduanController::class, 'show'])->name('Aduan.show');
Route::post('/aduan', [AduanController::class, 'store'])->name('Aduan.store');
Route::put('/aduan/{id}', [AduanController::class, 'update'])->name('Aduan.update');
Route::delete('/aduan/{id}', [AduanController::class, 'destroy'])->name('Aduan.destroy');
Route::get('/cari-aduan/{id}', [AduanController::class, 'cari'])->name('Aduan.cari');


// Middleware untuk memeriksa role
Route::middleware(['auth:sanctum'])->group(function () {
    // pemerintah
    Route::middleware(['role:1'])->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get('/status', [StatusController::class, 'index']);
        // Rute lain untuk role 1
        Route::post('/admin-action', [AuthController::class, 'adminAction']);

    });

    // pengelola
    Route::middleware(['role:2'])->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        // Rute lain untuk role 2
        // Route::get('/status', [StatusController::class, 'index']);
        Route::post('/user-action', [AuthController::class, 'userAction']);

    });

    // Rute logout yang dapat diakses oleh semua role
    Route::post('/logout', [AuthController::class, 'logout']);
});






//Auth
// Route::post('/register', [AuthController::class, 'register']);


// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
//     // Add logout route
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

// auth
