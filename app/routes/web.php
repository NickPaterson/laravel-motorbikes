<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MotorbikeController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;
use App\Models\Motorbike;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Create a homepage the listings page is the homepage for now
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MotorbikeController::class, 'index']);

// Route::get('/phpinfo', function () {
//     return view('pages/phpinfo');
// });


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
require __DIR__.'/motorbike.php';
require __DIR__.'/admin.php';

