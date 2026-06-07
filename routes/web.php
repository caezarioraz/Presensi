<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FaceMasterController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MahasiswaDashboardController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', [MahasiswaController::class, 'index']);
        Route::get('/create', [MahasiswaController::class, 'create']);
        Route::post('/store', [MahasiswaController::class, 'store']);
        Route::get('/edit/{id}', [MahasiswaController::class, 'edit']);
        Route::post('/update/{id}', [MahasiswaController::class, 'update']);
        Route::get('/delete/{id}', [MahasiswaController::class, 'destroy']);
    });

    Route::prefix('face-master')->group(function () {
        Route::get('/', [FaceMasterController::class, 'index']);
        Route::get('/create', [FaceMasterController::class, 'create']);
        Route::post('/store', [FaceMasterController::class, 'store']);
    });

    Route::prefix('presensi')->group(function () {
        Route::get('/', [PresensiController::class, 'index']);
        Route::post('/verify', [PresensiController::class, 'verify']);
        Route::get('/data', [PresensiController::class, 'data']);
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/create', [AdminController::class, 'create']);
        Route::post('/store', [AdminController::class, 'store']);
    });
});

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['mahasiswa'])->group(function () {

    Route::prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index']);
        Route::get('/face', [FaceMasterController::class, 'mahasiswaFace']);
        Route::post('/face/store', [FaceMasterController::class, 'mahasiswaStoreFace']);
        Route::get('/presensi', [PresensiController::class, 'mahasiswaPresensi']);
        Route::post('/presensi', [PresensiController::class, 'mahasiswaVerify']);
    });

});