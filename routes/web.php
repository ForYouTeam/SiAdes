<?php

use App\Http\Controllers\Auth\AkunController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CMS\ArsipSuratController;
use App\Http\Controllers\CMS\CetakSuratController;
use App\Http\Controllers\CMS\BarangController;
use App\Http\Controllers\CMS\StaffController;
use App\Http\Controllers\CMS\PendudukController;
use App\Http\Controllers\CMS\TandaTanganController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/process', [LoginController::class, 'process'])->name('auth.process');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::middleware(['auth', 'role:super-admin|admin|kades'])->group(function () {
    Route::get('/', function () {
        return view('example');
    });
});

Route::middleware(['auth', 'role:super-admin|kades'])->group(function () {
    Route::prefix('/staff')->group(function () {
        Route::get('/', [StaffController::class, 'getAllStaff'])->middleware('permission:read-data')->name('staff.all');
        Route::post('/', [StaffController::class, 'createStaff'])->middleware('permission:create-data');
        Route::get('/{id}', [StaffController::class, 'getStaffById']);
        Route::patch('/{id}', [StaffController::class, 'updateStaff'])->middleware('permission:update-data');
        Route::delete('/{id}', [StaffController::class, 'deleteStaff'])->middleware('permission:delete-data');
    });
    Route::prefix('penduduk')->group(function () {
        Route::get('/', [PendudukController::class, 'getAllPenduduk'])->middleware('permission:read-data')->name('penduduk.all');
        Route::get('/all', [PendudukController::class, 'getAllData']);
        Route::post('/', [PendudukController::class, 'createPenduduk'])->middleware('permission:create-data');
        Route::patch('/{id}', [PendudukController::class, 'updatePenduduk'])->middleware('permission:update-data');
        Route::delete('/{id}', [PendudukController::class, 'deletePenduduk'])->middleware('permission:delete-data');
    });
});

Route::middleware(['auth', 'role:super-admin|admin'])->group(function () {
    Route::prefix('cetak')->group(function () {
        Route::get('/', [CetakSuratController::class, 'getAll'])->middleware('permission:read-data')->name('cetak.all');
        Route::post('/', [CetakSuratController::class, 'createCetak'])->middleware('permission:create-data');
        Route::delete('/{id}', [CetakSuratController::class, 'deleteStaff'])->middleware('permission:delete-data');
    });

    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'getAllBarang'])->middleware('permission:read-data')->name('barang.all');
        Route::post('/', [BarangController::class, 'createBarang'])->middleware('permission:create-data');
        Route::get('/{id}', [BarangController::class, 'getBarangById']);
        Route::patch('/{id}', [BarangController::class, 'updateBarang'])->middleware('permission:update-data');
        Route::delete('/{id}', [BarangController::class, 'deleteBarang'])->middleware('permission:delete-data');
    });

    Route::prefix('arsip_surat')->group(function () {
        Route::get('/', [ArsipSuratController::class, 'getAllArsip'])->middleware('permission:read-data')->name('arsip.all');
        Route::post('/', [ArsipSuratController::class, 'createArsip'])->middleware('permission:create-data');
        Route::get('/{id}', [ArsipSuratController::class, 'getArsipById']);
        Route::patch('/{id}', [ArsipSuratController::class, 'updateArsip'])->middleware('permission:update-data');
        Route::delete('/{id}', [ArsipSuratController::class, 'deleteArsip'])->middleware('permission:delete-data');
    });

    Route::prefix('tanda_tangan')->group(function () {
        Route::get('/', [TandaTanganController::class, 'getAllTandaTangan'])->middleware('permission:read-data')->name('tanda_tangan.all');
        Route::post('/', [TandaTanganController::class, 'createTandaTangan'])->middleware('permission:create-data');
        Route::get('/{id}', [TandaTanganController::class, 'getTandaTanganById']);
        Route::patch('/{id}', [TandaTanganController::class, 'updateTandaTangan'])->middleware('permission:update-data');
        Route::delete('/{id}', [TandaTanganController::class, 'deleteTandaTangan'])->middleware('permission:delete-data');
    });

    Route::prefix('akun')->group(function () {
        Route::get('/', [AkunController::class, 'getAllAkun'])->middleware('permission:read-data')->name('akun.all');
        Route::post('/', [AkunController::class, 'createAkun'])->middleware('permission:create-data');
        Route::delete('/{id}', [AkunController::class, 'deleteAkun'])->middleware('permission:delete-data');
    });

    Route::get('/exportPdf/{id}', [CetakSuratController::class, 'export'])->middleware('permission:create-data');
});
