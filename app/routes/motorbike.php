<?php

use App\Http\Controllers\MotorbikeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Motorbike;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Motorbike Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/dvla-test', function () {
    return view('pages/dvla-test');
});

//Route::get('/motorbike/create', [MotorbikeController::class, 'create'])->middleware('can:create,App\Models\Motorbike');

Route::get('/listings', [MotorbikeController::class, 'index'])->middleware('can:viewAny,App\Models\Motorbike');
Route::get('/motorbikes/{slug}', [MotorbikeController::class, 'show'])->middleware('can:viewAny,App\Models\Motorbike');

Route::middleware('auth')->group(function () {
    Route::get('/motorbike/create', [MotorbikeController::class, 'create'])->middleware('can:create,App\Models\Motorbike');
    Route::post('/motorbike/create', [MotorbikeController::class, 'store'])->middleware('can:create,App\Models\Motorbike')->name('motorbike.store');
    Route::get('/motorbike/edit/{motorbike}', [MotorbikeController::class, 'edit'])->middleware('can:update,motorbike')->name('motorbike.edit');
    Route::put('/motorbike/edit/{motorbike}', [MotorbikeController::class, 'update'])->middleware('can:update,motorbike')->name('motorbike.update');
    //Route::put('/motorbike/edit/{motorbike}', [MotorbikeController::class, 'update'])->name('motorbike.update');
    Route::delete('/motorbike/{motorbike}', [MotorbikeController::class, 'destroy'])->middleware('can:delete,motorbike')->name('motorbike.destroy');
});


require __DIR__.'/auth.php';


