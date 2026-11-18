<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeCommercant;
use App\Models\Boutique;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = DemandeCommercant::with('utilisateur')
            ->latest()
            ->get();

        return view('admin.demandes', compact('demandes'));
    }

    public function accepter(DemandeCommercant $demande)
    {
        if ($demande->statut !== 'en_attente') {
            return back()->with('error', 'Cette demande a déjà été traitée.');
        }

        DB::transaction(function () use ($demande) {

            $user = $demande->utilisateur;

            Boutique::create([
                'user_id' => $user->id,
                'nom' => $demande->nom_boutique,
                'slug' => Str::slug($demande->nom_boutique)
                    . '-' . $user->id,
                'description' => $demande->description,
                'telephone' => $demande->telephone,
                'statut' => 'active',
            ]);

            $user->update([
                'role' => 'commercant',
            ]);

            $demande->update([
                'statut' => 'acceptee',
            ]);
        });

        return back()->with('success', 'Commerçant accepté et boutique créée !');
    }

    public function refuser(DemandeCommercant $demande)
    {
        if ($demande->statut !== 'en_attente') {
            return back()->with('error', 'Cette demande a déjà été traitée.');
        }

        $demande->update([
            'statut' => 'refusee',
        ]);

        return back()->with('success', 'Demande refusée.');
    }
}