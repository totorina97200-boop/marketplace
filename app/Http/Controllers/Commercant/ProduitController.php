<?php
namespace App\Http\Controllers\Commercant;

use App\Http\Controllers\Controller;
use App\Models\Boutique;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    // Récupérer la boutique du commerçant connecté
    private function boutique()
    {
        return Boutique::where('user_id', auth()->id())->firstOrFail();
    }

    // Afficher les produits de sa boutique
    public function index()
    {
        $boutique = $this->boutique();

        $produits = $boutique->produits()
            ->latest()
            ->get();

        return view('commercant.produits.index', compact('produits'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        $this->boutique();

        return view('commercant.produits.create');
    }

    // Enregistrer un produit
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $boutique = $this->boutique();

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('produits', 'public');
        }

        $boutique->produits()->create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom) . '-' . Str::uuid(),
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $image,
            'actif' => true,
        ]);

        return redirect()
            ->route('commercant.produits.index')
            ->with('success', 'Produit ajouté avec succès !');
    }

    // Modifier un produit
    public function edit(Produit $produit)
    {
        $produit = $this->boutique()
            ->produits()
            ->findOrFail($produit->id);

        return view('commercant.produits.edit', compact('produit'));
    }

    // Enregistrer les modifications
    public function update(Request $request, Produit $produit)
    {
        $produit = $this->boutique()
            ->produits()
            ->findOrFail($produit->id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $image = $produit->image;

        if ($request->hasFile('image')) {
            if ($image) {
                Storage::disk('public')->delete($image);
            }

            $image = $request->file('image')->store('produits', 'public');
        }

        $produit->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $image,
        ]);

        return redirect()
            ->route('commercant.produits.index')
            ->with('success', 'Produit modifié avec succès !');
    }

    // Supprimer un produit
    public function destroy(Produit $produit)
    {
        $produit = $this->boutique()
            ->produits()
            ->findOrFail($produit->id);

        if ($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }

        $produit->delete();

        return redirect()
            ->route('commercant.produits.index')
            ->with('success', 'Produit supprimé avec succès !');
    }
}
