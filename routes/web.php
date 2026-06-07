<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FaceMasterController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaAuthController;

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
// Login
Route::get('/dashboard', function () {
    return "Login Berhasil";
});
// Admin
Route::get('/dashboard', function () {
    return view('dashboard');
});
// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
// Dummy
Route::view('/jadwal', 'coming-soon');
Route::view('/laporan', 'coming-soon');
// Wajah
Route::get('/face-master', [FaceMasterController::class, 'index']);
Route::get('/face-master/create', [FaceMasterController::class, 'create']);
Route::post('/face-master/store', [FaceMasterController::class, 'store']);
// Tes Python
Route::get(
    '/python-test',
    [FaceMasterController::class, 'testPython']
);
// Upload Python
Route::get(
    '/upload-python',
    [FaceMasterController::class, 'uploadToPython']
);
// Halaman Presensi
Route::get(
    '/presensi',
    [PresensiController::class, 'index']
);
Route::post('/presensi/verify', [PresensiController::class, 'verify'])
    ->name('presensi.verify');
// History
Route::get(
    '/presensi-data',
    [PresensiController::class,'data']
);
// Dashboard
Route::get(
    '/dashboard',
    [DashboardController::class,'index']
);
// Mahasiswa
Route::get(
    '/mahasiswa/login',
    [MahasiswaAuthController::class,
    'loginForm']
);
Route::post(
    '/mahasiswa/login',
    [MahasiswaAuthController::class,
    'login']
);
Route::get(
    '/mahasiswa/dashboard',
    [MahasiswaAuthController::class,
    'dashboard']
);
// Register Wajah Mahasiswa
Route::get(
    '/mahasiswa/face',
    [FaceMasterController::class,'mahasiswaFace']
);
Route::post(
    '/mahasiswa/face/store',
    [FaceMasterController::class,'mahasiswaStoreFace']
);
// Presensi Mahasiswa
Route::get(
    '/mahasiswa/presensi',
    [PresensiController::class,'mahasiswaPresensi']
);
Route::post(
    '/mahasiswa/presensi',
    [PresensiController::class,'mahasiswaVerify']
);
