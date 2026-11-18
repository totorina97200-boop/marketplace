<?php
namespace App\Http\Controllers;

use App\Models\DemandeCommercant;
use Illuminate\Http\Request;

class DemandeCommercantController extends Controller
{
    // Afficher le formulaire de demande
    public function create(Request $request)
    {
        $demande = DemandeCommercant::where(
            'user_id',
            $request->user()->id
        )->first();

        return view('commercant.demande', compact('demande'));
    }

    // Enregistrer la demande
    public function store(Request $request)
    {
        $user = $request->user();

        // Vérifier si une demande existe déjà
        $existe = DemandeCommercant::where(
            'user_id',
            $user->id
        )->exists();

        if ($existe) {
            return redirect()->route('commercant.demande')
                ->with('error', 'Tu as déjà envoyé une demande.');
        }

        // Vérifier les informations du formulaire
        $donnees = $request->validate([
            'nom_boutique' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'telephone' => 'nullable|string|max:30',
        ]);

        // Associer la demande à l'utilisateur connecté
        $donnees['user_id'] = $user->id;
        $donnees['statut'] = 'en_attente';

        DemandeCommercant::create($donnees);

        return redirect()->route('commercant.demande')
            ->with('success', 'Ta demande a bien été envoyée !');
    }
}
