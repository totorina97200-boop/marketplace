<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    // Afficher le panier
    public function index()
    {
        $panier = session()->get('panier', []);

        $total = 0;

        foreach ($panier as $article) {
            $total += $article['prix'] * $article['quantite'];
        }

        return view('panier.index', compact('panier', 'total'));
    }

    // Ajouter un produit au panier
    public function ajouter(Produit $produit)
    {
        if (!$produit->actif || $produit->stock < 1) {
            return back()->with('erreur', 'Ce produit n’est pas disponible.');
        }

        $panier = session()->get('panier', []);

        $id = $produit->id;

        if (isset($panier[$id])) {
            if ($panier[$id]['quantite'] >= $produit->stock) {
                return back()->with('erreur', 'Stock insuffisant.');
            }

            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                'id' => $produit->id,
                'nom' => $produit->nom,
                'prix' => (float) $produit->prix,
                'quantite' => 1,
                'image' => $produit->image,
                'stock' => $produit->stock,
            ];
        }

        session()->put('panier', $panier);

        return back()->with('success', 'Produit ajouté au panier !');
    }

    // Modifier la quantité
    public function modifier(Request $request, $id)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
        ]);

        $panier = session()->get('panier', []);

        if (!isset($panier[$id])) {
            return back();
        }

        $produit = Produit::findOrFail($id);

        if ($request->quantite > $produit->stock) {
            return back()->with('erreur', 'Stock insuffisant.');
        }

        $panier[$id]['quantite'] = $request->quantite;

        session()->put('panier', $panier);

        return back()->with('success', 'Quantité modifiée.');
    }

    // Supprimer un produit du panier
    public function supprimer($id)
    {
        $panier = session()->get('panier', []);

        unset($panier[$id]);

        session()->put('panier', $panier);

        return back()->with('success', 'Produit retiré du panier.');
    }
}
