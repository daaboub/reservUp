<?php

use App\Http\Controllers\user\reservationController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'create'])->name('user.create');

Route::get('/', function()
{
return view('user.welcome');
});
Route::middleware(['auth:web'])->group(function () {
    

    Route::get('/reservations/xml', [ReservationController::class, 'ReservationHistory'])->name('reservations.xml');
    Route::get('/reservations', [reservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservations/{id}', [reservationController::class, 'show'])->name('reservation.show');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    
});