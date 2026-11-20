
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            🛒 Mon panier
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">

                <div class="flex flex-wrap justify-between items-center gap-3 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold" style="color: #76533b;">
                            Mon panier
                        </h1>
                        <p class="text-gray-500 mt-1">
                            Vérifie tes articles avant de commander.
                        </p>
                    </div>

                    <a href="{{ route('accueil') }}"
                       class="px-4 py-2 rounded-xl font-semibold"
                       style="background: #f1e8dc; color: #76533b;">
                        ← Continuer mes achats
                    </a>
                </div>

                @if(session('success'))
                    <div class="p-4 mb-4 rounded-xl"
                         style="background: #e8f5e9; color: #256029;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('erreur'))
                    <div class="p-4 mb-4 rounded-xl"
                         style="background: #fdecea; color: #a12622;">
                        {{ session('erreur') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 mb-4 rounded-xl"
                         style="background: #fdecea; color: #a12622;">
                        {{ session('error') }}
                    </div>
                @endif

                @if(count($panier) > 0)

                    <div class="space-y-4">
                        @foreach($panier as $article)
                            <div class="border rounded-2xl p-5 flex flex-col lg:flex-row lg:justify-between lg:items-center gap-5">

                                <div>
                                    <h3 class="text-lg font-bold" style="color: #44352b;">
                                        {{ $article['nom'] }}
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Prix unitaire :
                                        {{ number_format($article['prix'], 2, ',', ' ') }} €
                                    </p>

                                    <p class="text-gray-500">
                                        Quantité : {{ $article['quantite'] }}
                                    </p>

                                    <p class="font-bold mt-2" style="color: #76533b;">
                                        Sous-total :
                                        {{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }} €
                                    </p>
                                </div>

                                <div class="flex flex-wrap items-center gap-3">

                                    <form action="{{ route('panier.modifier', $article['id']) }}"
                                          method="POST"
                                          class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')

                                        <input
                                            type="number"
                                            name="quantite"
                                            value="{{ $article['quantite'] }}"
                                            min="1"
                                            max="{{ $article['stock'] }}"
                                            required
                                            class="w-20 rounded-lg border-gray-300"
                                        >

                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg text-white font-semibold"
                                                style="background: #76533b;">
                                            Modifier
                                        </button>
                                    </form>

                                    <form action="{{ route('panier.supprimer', $article['id']) }}"
                                          method="POST"
                                          onsubmit="return confirm('Veux-tu vraiment supprimer ce produit du panier ?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg text-white font-semibold"
                                                style="background: #b94a48;">
                                            Supprimer
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 rounded-2xl p-6 text-right"
                         style="background: #f8f3ed;">

                        <p class="text-gray-600 mb-2">
                            Total de ton panier
                        </p>

                        <p class="text-3xl font-bold" style="color: #76533b;">
                            {{ number_format($total, 2, ',', ' ') }} €
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Vérifie ton panier avant de confirmer ta commande.
                        </p>

                        <a href="{{ route('commandes.create') }}"
                           class="inline-block mt-5 px-7 py-3 rounded-xl text-white font-bold"
                           style="background: #76533b;">
                            Passer commande →
                        </a>
                    </div>

                @else

                    <div class="text-center py-12 px-4 rounded-2xl"
                         style="background: #f8f3ed;">

                        <div class="text-5xl mb-4">🛒</div>

                        <h2 class="text-xl font-bold" style="color: #76533b;">
                            Ton panier est vide
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Découvre les produits disponibles sur notre marketplace.
                        </p>

                        <a href="{{ route('accueil') }}"
                           class="inline-block mt-6 px-6 py-3 rounded-xl text-white font-semibold"
                           style="background: #76533b;">
                            Découvrir les produits
                        </a>
                    </div>

                @endif

            </div>
        </div>
    </div>
</x-app-layout>
