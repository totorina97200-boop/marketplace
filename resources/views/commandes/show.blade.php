
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            📦 Détail de ma commande
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">

                <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl font-bold" style="color: #76533b;">
                            Ma commande
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">
                            Numéro : {{ $commande->numero }}
                        </p>
                    </div>

                    <span class="px-4 py-2 rounded-full text-sm font-semibold"
                          style="background: #f8f3ed; color: #76533b;">
                        {{ ucfirst($commande->statut) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="rounded-xl p-4" style="background: #f8f3ed;">
                        <p class="text-sm text-gray-500">Date de commande</p>
                        <p class="font-semibold mt-1" style="color: #44352b;">
                            {{ $commande->created_at->format('d/m/Y à H:i') }}
                        </p>
                    </div>

                    <div class="rounded-xl p-4" style="background: #f8f3ed;">
                        <p class="text-sm text-gray-500">Total de la commande</p>
                        <p class="text-xl font-bold mt-1" style="color: #76533b;">
                            {{ number_format((float) $commande->total, 2, ',', ' ') }} €
                        </p>
                    </div>
                </div>

                <h2 class="text-lg font-bold mb-4" style="color: #76533b;">
                    🛍️ Produits commandés
                </h2>

                <div class="space-y-3">
                    @foreach ($commande->lignes as $ligne)
                        <div class="border rounded-xl p-4 flex flex-col sm:flex-row sm:justify-between gap-3">
                            <div>
                                <p class="font-semibold" style="color: #44352b;">
                                    {{ $ligne->produit->nom ?? 'Produit indisponible' }}
                                </p>
                                <p class="text-sm text-gray-500 mt-1">
                                    Quantité : {{ $ligne->quantite }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Prix unitaire :
                                    {{ number_format((float) $ligne->prix_unitaire, 2, ',', ' ') }} €
                                </p>
                            </div>

                            <div class="font-bold sm:text-right" style="color: #76533b;">
                                {{ number_format((float) $ligne->prix_unitaire * $ligne->quantite, 2, ',', ' ') }} €
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-end mt-6 pt-5 border-t">
                    <p class="text-xl font-bold" style="color: #76533b;">
                        Total :
                        {{ number_format((float) $commande->total, 2, ',', ' ') }} €
                    </p>
                </div>

                <h2 class="text-lg font-bold mt-8 mb-4" style="color: #76533b;">
                    📍 Adresse de livraison
                </h2>

                @if ($commande->adresseLivraison)
                    <div class="rounded-xl p-5" style="background: #f8f3ed;">
                        <p class="font-bold" style="color: #44352b;">
                            {{ $commande->adresseLivraison->nom_complet }}
                        </p>
                        <p class="text-gray-600 mt-2">
                            {{ $commande->adresseLivraison->telephone }}
                        </p>
                        <p class="text-gray-600">
                            {{ $commande->adresseLivraison->adresse }}
                        </p>
                        <p class="text-gray-600">
                            {{ $commande->adresseLivraison->code_postal }}
                            {{ $commande->adresseLivraison->ville }}
                        </p>
                        <p class="text-gray-600">
                            {{ $commande->adresseLivraison->pays }}
                        </p>
                    </div>
                @else
                    <p class="text-gray-500">
                        Aucune adresse de livraison enregistrée.
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('commandes.index') }}"
                       class="inline-flex items-center px-5 py-3 rounded-xl font-semibold text-white"
                       style="background: #76533b;">
                        ← Retour à mes commandes
                    </a>

                    <a href="{{ route('accueil') }}"
                       class="inline-flex items-center px-5 py-3 rounded-xl font-semibold"
                       style="background: #f1e8dc; color: #76533b;">
                        Continuer mes achats
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
