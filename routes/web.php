<?php

use App\Http\Controllers\CMS\CetakSuratController;
use App\Http\Controllers\CMS\BarangController;
use App\Http\Controllers\CMS\StaffController;
use App\Http\Controllers\CMS\PendudukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('example');
});

Route::prefix('/staff')->group(function () {
    Route::get('/', [StaffController::class, 'getAllStaff'])->name('staff.all');
    Route::post('/', [StaffController::class, 'createStaff']);
    Route::get('/{id}', [StaffController::class, 'getStaffById']);
    Route::patch('/{id}', [StaffController::class, 'updateStaff']);
    Route::delete('/{id}', [StaffController::class, 'deleteStaff']);
});
Route::prefix('penduduk')->group(function () {
    Route::get('/', [PendudukController::class, 'getAllPenduduk'])->name('penduduk.all');
    Route::get('/all', [PendudukController::class, 'getAllData']);
    Route::post('/', [PendudukController::class, 'createPenduduk']);
    Route::get('/{id}', [PendudukController::class, 'getPendudukById']);
    Route::patch('/{id}', [PendudukController::class, 'updatePenduduk']);
    Route::delete('/{id}', [PendudukController::class, 'deletePenduduk']);
});

Route::prefix('cetak')->group(function () {
    Route::get('/', [CetakSuratController::class, 'getAll'])->name('cetak.all');
    Route::post('/', [CetakSuratController::class, 'createCetak']);
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'getAllBarang'])->name('barang.all');
    Route::post('/', [BarangController::class, 'createBarang']);
    Route::get('/{id}', [BarangController::class, 'getBarangById']);
    Route::patch('/{id}', [BarangController::class, 'updateBarang']);
    Route::delete('/{id}', [BarangController::class, 'deleteBarang']);
});
