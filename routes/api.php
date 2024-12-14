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
    Route::delete('/{id}', [AduanController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'role:2'])->group(function () {      //pemerintah
    Route::get('/proses', [AduanController::class, 'proses']);
});


// kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/{id}', [KategoriController::class, 'show']);
});

//Status
Route::prefix('status')->group(function () {
    Route::get('/', [StatusController::class, 'index']); // Get all statuses
    Route::get('/{id}', [StatusController::class, 'show']); // Get a specific status
});

// Aduan
Route::prefix('aduan')->group(function () {
    Route::get('/', [AduanController::class, 'index'])->name('Aduan.index'); // Get all Aduan
    Route::get('/{id}', [AduanController::class, 'show']);
    Route::post('/', [AduanController::class, 'store']);
});

Route::get('/new', [AduanController::class, 'new']);
Route::post('/cari-aduan', [AduanController::class, 'cari']);
Route::get('/total-aduan', [AduanController::class, 'total']);

//logout route for all user login
Route::middleware(['auth:sanctum'])->post('/logout', [AuthController::class, 'logout']);