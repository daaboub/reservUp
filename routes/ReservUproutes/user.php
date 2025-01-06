<?php

use App\Http\Controllers\user\reservationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {

    Route::get('/', [reservationController::class, 'index']);
    
});