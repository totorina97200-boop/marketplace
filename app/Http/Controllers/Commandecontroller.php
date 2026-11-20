<?php
namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\AdresseLivraison;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CommandeController extends Controller
{
    // Afficher le formulaire de livraison
    public function create()
    {
        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect()->route('panier.index')
                ->with('error', 'Ton panier est vide.');
        }

        return view('commandes.create');
    }

    // Enregistrer une nouvelle commande
    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'telephone' => 'required|string|max:30',
            'adresse' => 'required|string|max:255',
            'code_postal' => 'required|string|max:20',
            'ville' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
        ]);

        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect()->route('panier.index')
                ->with('error', 'Ton panier est vide.');
        }

        DB::transaction(function () use ($request, $panier) {

            $total = 0;
            $produits = [];

            // Vérifier les produits et les stocks
            foreach ($panier as $id => $article) {

                $produit = Produit::whereKey($id)
                    ->lockForUpdate()
                    ->first();

                if (!$produit) {
                    throw ValidationException::withMessages([
                        'panier' => 'Un produit de ton panier n’existe plus.',
                    ]);
                }

                $quantite = (int) ($article['quantite'] ?? 0);

                if (
                    $quantite < 1 ||
                    $produit->stock < $quantite ||
                    !$produit->actif
                ) {
                    throw ValidationException::withMessages([
                        'panier' => 'Stock insuffisant ou produit indisponible : '
                            . $produit->nom,
                    ]);
                }

                $prix = (float) $produit->prix;

                $total += $prix * $quantite;

                $produits[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'prix' => $prix,
                ];
            }

            // Créer la commande
            $commande = Commande::create([
                'numero' => 'CMD-' . strtoupper(Str::random(10)),
                'user_id' => auth()->id(),
                'total' => round($total, 2),
                'statut' => 'en_attente',
                'statut_paiement' => 'en_attente',
            ]);

            // Enregistrer l'adresse de livraison
            AdresseLivraison::create([
                'commande_id' => $commande->id,
                'nom_complet' => $request->nom_complet,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'code_postal' => $request->code_postal,
                'ville' => $request->ville,
                'pays' => $request->pays,
            ]);

            // Enregistrer les lignes et diminuer les stocks
            foreach ($produits as $article) {

                $produit = $article['produit'];

                LigneCommande::create([
                    'commande_id' => $commande->id,
                    'produit_id' => $produit->id,
                    'boutique_id' => $produit->boutique_id,
                    'quantite' => $article['quantite'],
                    'prix_unitaire' => $article['prix'],
                ]);

                $produit->decrement(
                    'stock',
                    $article['quantite']
                );
            }
        });

        // Vider le panier après la création réussie
        session()->forget('panier');

        return redirect()->route('commandes.index')
            ->with('success', 'Ta commande a été enregistrée avec succès !');
    }

    // Afficher les commandes du client
    public function index()
    {
        $commandes = Commande::with([
            'lignes.produit',
            'adresseLivraison'
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('commandes.index', compact('commandes'));
    }

    // Afficher le détail d'une commande
    public function show(Commande $commande)
    {
        abort_unless(
            $commande->user_id === auth()->id(),
            403
        );

        $commande->load([
            'lignes.produit',
            'adresseLivraison'
        ]);

        return view('commandes.show', compact('commande'));
    }
}
