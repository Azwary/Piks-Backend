<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Add logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});
// kategori
Route::get('/kategori', [kategoriController::class, 'index']);
Route::get('/kategori/{id}', [kategoriController::class, 'show']);
// Setatus
Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id}', [StatusController::class, 'show']);
// Aduan
Route::get('/Aduan', [AduanController::class, 'index'])->name('Aduan.index');
Route::get('/Aduan/{id}', [AduanController::class, 'show'])->name('Aduan.show');
Route::post('/Aduan', [AduanController::class, 'store'])->name('Aduan.store');
Route::put('/Aduan/{id}', [AduanController::class, 'update'])->name('Aduan.update');
Route::delete('/Aduan/{id}', [AduanController::class, 'destroy'])->name('Aduan.destroy');

