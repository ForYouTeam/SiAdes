<?php

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
    Route::get('/', [PendudukController::class, 'getAllPenduduk']);
    Route::post('/', [PendudukController::class, 'createPenduduk']);
    Route::get('/{id}', [PendudukController::class, 'getPendudukById']);
    Route::patch('/{id}', [PendudukController::class, 'updatePenduduk']);
    Route::delete('/{id}', [PendudukController::class, 'deletePenduduk']);
});
