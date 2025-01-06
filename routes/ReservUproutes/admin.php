<?php

use App\Http\Controllers\admins\dashController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->prefix("admin/dashboard")->group(function () {


    Route::get('/', [dashController::class, 'index']);

});