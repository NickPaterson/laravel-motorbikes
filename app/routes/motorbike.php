<?php

use App\Http\Controllers\MotorbikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Motorbike Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/listings', [MotorbikeController::class, 'index']);
Route::get('/motorbike/create', [MotorbikeController::class, 'create']);

Route::post('/motorbike/create', [MotorbikeController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('motorbike.store');

Route::get('/motorbikes/{slug}', [MotorbikeController::class, 'show']);
require __DIR__.'/auth.php';
