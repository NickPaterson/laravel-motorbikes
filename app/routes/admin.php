<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

