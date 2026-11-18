
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemandeCommercantController;
use App\Http\Controllers\Admin\DemandeController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Espace accessible uniquement aux utilisateurs connectés
Route::middleware(['auth'])->group(function () {

    // Tableau de bord
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Demande pour devenir commerçant
    Route::get('/devenir-commercant', [
        DemandeCommercantController::class,
        'create'
    ])->name('commercant.demande');

    Route::post('/devenir-commercant', [
        DemandeCommercantController::class,
        'store'
    ])->name('commercant.demande.store');

    // Administration
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        // Afficher les demandes
        Route::get('/demandes', [
            DemandeController::class,
            'index'
        ])->name('demandes');

        // Accepter une demande
        Route::post('/demandes/{demande}/accepter', [
            DemandeController::class,
            'accepter'
        ])->name('demandes.accepter');

        // Refuser une demande
        Route::post('/demandes/{demande}/refuser', [
            DemandeController::class,
            'refuser'
        ])->name('demandes.refuser');

    });

});

require __DIR__.'/auth.php';
