<?php

use App\Http\Controllers\MotorbikeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Motorbike Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/listings', [MotorbikeController::class, 'index']);

Route::get('/motorbike/create', [MotorbikeController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::post('/motorbike/create', [MotorbikeController::class, 'store'])->name('motorbike.store');
    Route::get('/motorbike/edit/{slug}', [MotorbikeController::class, 'edit'])->name('motorbike.edit');
    Route::put('/motorbike/edit/{slug}', [MotorbikeController::class, 'update'])->name('motorbike.update');
    Route::delete('/motorbike/{motorbike}', [MotorbikeController::class, 'destroy'])->name('motorbike.destroy');

});



Route::get('/motorbikes/{slug}', [MotorbikeController::class, 'show']);
require __DIR__.'/auth.php';

