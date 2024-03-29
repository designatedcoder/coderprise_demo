<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'password.confirm'])->group(function () {
    // Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    // Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    // Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    // Route::get('/vehicles/{vehicle:uuid}', [VehicleController::class, 'show'])->name('vehicles.show');
    // Route::get('/vehicles/{vehicle:uuid}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    // Route::patch('/vehicles/{vehicle:uuid}', [VehicleController::class, 'update'])->name('vehicles.update');
    // Route::delete('/vehicles/{vehicle:uuid}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::resource('vehicles', VehicleController::class)->parameters([
        'vehicles' => 'vehicle:uuid'
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
