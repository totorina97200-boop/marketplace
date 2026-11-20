
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            🚚 Adresse de livraison
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">

                <div class="text-center mb-8">
                    <div class="text-5xl mb-3">📦</div>

                    <h1 class="text-2xl font-bold" style="color: #76533b;">
                        Où souhaites-tu recevoir ta commande ?
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Renseigne tes coordonnées pour organiser la livraison.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="p-4 mb-5 rounded-xl"
                         style="background: #ffe5e5; color: #a00000;">
                        <strong>Attention, vérifie les informations suivantes :</strong>

                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-5 rounded-xl"
                         style="background: #ffe5e5; color: #a00000;">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('commandes.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="nom_complet" class="block font-semibold mb-2"
                               style="color: #44352b;">
                            Nom complet
                        </label>

                        <input
                            type="text"
                            id="nom_complet"
                            name="nom_complet"
                            value="{{ old('nom_complet') }}"
                            placeholder="Exemple : Jean Dupont"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                        >
                    </div>

                    <div class="mb-5">
                        <label for="telephone" class="block font-semibold mb-2"
                               style="color: #44352b;">
                            Numéro de téléphone
                        </label>

                        <input
                            type="tel"
                            id="telephone"
                            name="telephone"
                            value="{{ old('telephone') }}"
                            placeholder="Exemple : 0696 00 00 00"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                        >
                    </div>

                    <div class="mb-5">
                        <label for="adresse" class="block font-semibold mb-2"
                               style="color: #44352b;">
                            Adresse complète
                        </label>

                        <input
                            type="text"
                            id="adresse"
                            name="adresse"
                            value="{{ old('adresse') }}"
                            placeholder="Numéro et nom de rue"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                        >
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="code_postal" class="block font-semibold mb-2"
                                   style="color: #44352b;">
                                Code postal
                            </label>

                            <input
                                type="text"
                                id="code_postal"
                                name="code_postal"
                                value="{{ old('code_postal') }}"
                                placeholder="Exemple : 97200"
                                required
                                class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                            >
                        </div>

                        <div>
                            <label for="ville" class="block font-semibold mb-2"
                                   style="color: #44352b;">
                                Ville
                            </label>

                            <input
                                type="text"
                                id="ville"
                                name="ville"
                                value="{{ old('ville') }}"
                                placeholder="Exemple : Fort-de-France"
                                required
                                class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                            >
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="pays" class="block font-semibold mb-2"
                               style="color: #44352b;">
                            Pays
                        </label>

                        <input
                            type="text"
                            id="pays"
                            name="pays"
                            value="{{ old('pays', 'France') }}"
                            required
                            class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                        >
                    </div>

                    <div class="rounded-xl p-4 mb-6"
                         style="background: #f8f3ed;">
                        <p class="text-sm" style="color: #76533b;">
                            🔒 Vérifie bien ton adresse et ton numéro de téléphone avant de confirmer ta commande.
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="w-full px-6 py-4 rounded-xl text-white font-bold text-base"
                        style="background: #76533b;">
                        Confirmer ma commande →
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="{{ route('panier.index') }}"
                       class="font-semibold"
                       style="color: #76533b;">
                        ← Retour au panier
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
