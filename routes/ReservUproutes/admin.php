<?php

use App\Http\Controllers\admins\AdminController;
use App\Http\Controllers\admins\dashController;
use App\Http\Controllers\admins\ReservationController;
use App\Http\Controllers\admins\SalleController;
use App\Http\Controllers\admins\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['auth:admin'])->prefix(LaravelLocalization::setLocale() ."/admin/dashboard")->group(function () {

    Route::get('/salles/export', [SalleController::class, 'exportToXml'])->name('salles.export');
    Route::resource('salles', SalleController::class);
    Route::get('/salle/search', [SalleController::class, 'search'])->name('salle.search');
    Route::get('/salle/import', [SalleController::class, 'showImportForm'])->name('salle.import.form');
    Route::post('/salle/import', [SalleController::class, 'import'])->name('salle.import');


    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/suspend', [UsersController::class, 'suspend'])->name('users.suspend');


 // Afficher la liste des administrateurs
 Route::get('/admins', [AdminController::class, 'index'])->name('admin.index');

 // Afficher le formulaire de création d'un administrateur
 Route::get('/admins/create', [AdminController::class, 'create'])->name('admin.create');
 
 // Créer un administrateur
 Route::post('/admins', [AdminController::class, 'store'])->name('admin.store');

 // Supprimer un administrateur
 Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admin.delete');

 Route::put('/admin/{id}/toggle-suspension', [AdminController::class, 'toggleSuspension'])->name('admins.toggleSuspension');

     // Liste des réservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

    // Détails d'une réservation
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    
    Route::get('/admin/reservations/{id}', [ReservationController::class, 'show'])->name('admin.reservations.show');

    // Mise à jour du statut
    Route::put('/reservations/{id}/status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');


    // Route::get('language/{locale}', function ($locale) {
    //     if (in_array($locale, ['en', 'fr'])) {
    //         session()->put('locale', $locale);
    //     }
    //     return redirect()->back();
    // })->name('change.language');

});