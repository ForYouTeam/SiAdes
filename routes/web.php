<?php

use App\Http\Controllers\CMS\PendudukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('example');
});

Route::prefix('penduduk')->group(function () {
    Route::get('/', [PendudukController::class, 'getAllPenduduk']);
    Route::post('/', [PendudukController::class, 'createPenduduk']);
    Route::get('/{id}', [PendudukController::class, 'getPendudukById']);
    Route::patch('/{id}', [PendudukController::class, 'updatePenduduk']);
    Route::delete('/{id}', [PendudukController::class, 'deletePenduduk']);
});
