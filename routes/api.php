<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login
Route::post('/login', [AuthController::class, 'login']);
// kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/{id}', [KategoriController::class, 'show']);
});
// Setatus
Route::prefix('status')->group(function () {
    Route::get('/', [StatusController::class, 'index']); // Get all statuses
    Route::get('/{id}', [StatusController::class, 'show']); // Get a specific status
});
// Aduan
Route::prefix('aduan')->group(function () {
    Route::get('/', [AduanController::class, 'index'])->name('Aduan.index'); // Get all Aduan
    Route::get('/{id}', [AduanController::class, 'show']);
    Route::post('/', [AduanController::class, 'store']);
    Route::put('/{id}', [AduanController::class, 'update']);
    Route::delete('/{id}', [AduanController::class, 'destroy']);
    Route::post('/cari', [AduanController::class, 'cari']);
});

// Middleware untuk memeriksa role
Route::middleware(['auth:sanctum'])->group(function () {
    // Pemerintah-specific routes
    Route::middleware(['role:1'])->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/status', [StatusController::class, 'index']);
        Route::post('/admin-action', [AuthController::class, 'adminAction']); // Pemerintah-specific action
    });

    // Pengelola-specific routes
    Route::middleware(['role:2'])->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('/user-action', [AuthController::class, 'userAction']); // Pengelola-specific action
    });

    // Logout route (accessible to all authenticated users)
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/assign-roles', [RoleController::class, 'assignRoles']);
