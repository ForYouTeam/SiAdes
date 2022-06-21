<?php

use App\Http\Controllers\CMS\StaffController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('example');
});

Route::prefix('/staff')->group(function () {
    Route::get('/', [StaffController::class, 'getAllStaff'])->name('staff.all');
    Route::post('/', [StaffController::class, 'createStaff'])->name('staff.create');
});
