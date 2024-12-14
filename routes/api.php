<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Fetch authenticated user details
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Add logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Kategori routes
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);

// Status routes
Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id}', [StatusController::class, 'show']);

// Aduan routes
Route::get('/aduan', [AduanController::class, 'index'])->name('aduan.index');
Route::get('/aduan/{id}', [AduanController::class, 'show'])->name('aduan.show');
Route::post('/aduan', [AduanController::class, 'store'])->name('aduan.store');
Route::put('/aduan/{id}', [AduanController::class, 'update'])->name('aduan.update');
Route::delete('/aduan/{id}', [AduanController::class, 'destroy'])->name('aduan.destroy');
