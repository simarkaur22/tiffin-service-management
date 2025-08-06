<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\DashboardControlller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffPaymentController;
use App\Http\Controllers\TiffinController;
use Illuminate\Support\Facades\Route;








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

// Route::get('/', [CustomerController::class, 'index'])->middleware(['auth'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
    Route::resource('customers', CustomerController::class); 
    Route::resource('tiffins', TiffinController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('customer-payments', CustomerPaymentController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('staff-payments', StaffPaymentController::class);
   
});




require __DIR__.'/auth.php';
