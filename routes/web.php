
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produit;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemandeCommercantController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Commercant\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;

// PAGE D'ACCUEIL
Route::get('/', function () {
    $recherche = request('recherche');

    $produits = Produit::with('boutique')
        ->where('actif', true)
        ->when($recherche, function ($query) use ($recherche) {
            $query->where(function ($q) use ($recherche) {
                $q->where('nom', 'like', '%' . $recherche . '%')
                  ->orWhere('description', 'like', '%' . $recherche . '%');
            });
        })
        ->latest()
        ->get();

    return view('welcome', compact('produits', 'recherche'));
})->name('accueil');


// ESPACE DES UTILISATEURS CONNECTÉS
Route::middleware(['auth'])->group(function () {

    // TABLEAU DE BORD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROFIL
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // DEMANDE POUR DEVENIR COMMERCANT
    Route::get('/devenir-commercant', [
        DemandeCommercantController::class,
        'create'
    ])->name('commercant.demande');

    Route::post('/devenir-commercant', [
        DemandeCommercantController::class,
        'store'
    ])->name('commercant.demande.store');

    // PANIER
    Route::get('/panier', [PanierController::class, 'index'])
        ->name('panier.index');

    Route::post('/panier/ajouter/{produit}', [
        PanierController::class,
        'ajouter'
    ])->name('panier.ajouter');

    Route::patch('/panier/modifier/{id}', [
        PanierController::class,
        'modifier'
    ])->name('panier.modifier');

    Route::delete('/panier/supprimer/{id}', [
        PanierController::class,
        'supprimer'
    ])->name('panier.supprimer');

    // COMMANDES
    Route::get('/commandes/creer', [CommandeController::class, 'create'])
        ->name('commandes.create');

    Route::post('/commandes', [CommandeController::class, 'store'])
        ->name('commandes.store');

    Route::get('/mes-commandes', [CommandeController::class, 'index'])
        ->name('commandes.index');

    Route::get('/commandes/{commande}', [CommandeController::class, 'show'])
        ->name('commandes.show');


    // ADMINISTRATION
    Route::middleware(['admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // GESTION DES PRODUITS
            Route::resource('commercant/produits', ProduitController::class)
                ->names('commercant.produits')
                ->except(['show']);

            // AFFICHER LES DEMANDES
            Route::get('/demandes', [
                DemandeController::class,
                'index'
            ])->name('demandes');

            // ACCEPTER UNE DEMANDE
            Route::post('/demandes/{demande}/accepter', [
                DemandeController::class,
                'accepter'
            ])->name('demandes.accepter');

            // REFUSER UNE DEMANDE
            Route::post('/demandes/{demande}/refuser', [
                DemandeController::class,
                'refuser'
            ])->name('demandes.refuser');
        });

});

require __DIR__.'/auth.php';
