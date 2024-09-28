<?php

use Frontend\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/',[HomeController::class, 'home'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'home'])->name('home');
// Route::get('/cars', [PageController::class, 'index'])->name('cars');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/cars', [FrontendCarController::class, 'index'])->name('rentals');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// // Rental booking routes (protected by auth middleware)
// Route::middleware(['auth','customer'])->group(function () {
//     Route::get('/rentals/book/{car}', [App\Http\Controllers\Frontend\RentalController::class, 'create'])->name('rentals.create');
//     Route::post('/rentals/book/{car}', [App\Http\Controllers\Frontend\RentalController::class, 'store'])->name('rentals.store');
//     Route::get('/my-bookings', [App\Http\Controllers\Frontend\RentalController::class, 'userBookings'])->name('rentals.bookings');
//     Route::delete('/bookings/cancel/{rental}', [App\Http\Controllers\Frontend\RentalController::class, 'cancel'])->name('rentals.cancel');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Rental booking routes (protected by auth middleware)
Route::middleware(['auth','customer'])->group(function () {
    Route::get('/rentals/book/{car}', [App\Http\Controllers\Frontend\RentalController::class, 'create'])->name('rental.create');
    Route::post('/rentals/book/{car}', [App\Http\Controllers\Frontend\RentalController::class, 'store'])->name('rental.store');
    Route::get('/my-bookings', [App\Http\Controllers\Frontend\RentalController::class, 'userBookings'])->name('rental.bookings');
    Route::delete('/bookings/cancel/{rental}', [App\Http\Controllers\Frontend\RentalController::class, 'cancel'])->name('rental.cancel');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', RentalController::class);
    Route::resource('customers', CustomerController::class);
});



