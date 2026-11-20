
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            🏪 Devenir commerçant
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">

                <div class="text-center mb-8">
                    <div class="text-5xl mb-4">🏪</div>

                    <h1 class="text-2xl font-bold" style="color: #76533b;">
                        Rejoins notre marketplace !
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Présente-nous ta boutique et propose tes produits à nos clients.
                    </p>
                </div>

                @if(session('success'))
                    <div class="p-4 mb-5 rounded-xl"
                         style="background: #e8f5e9; color: #256029;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 mb-5 rounded-xl"
                         style="background: #fdecea; color: #a12622;">
                        {{ session('error') }}
                    </div>
                @endif

                @if($demande)

                    <div class="rounded-2xl p-6 text-center"
                         style="background: #f8f3ed;">

                        <div class="text-4xl mb-3">📋</div>

                        <h2 class="text-xl font-bold" style="color: #76533b;">
                            Ta demande a déjà été envoyée
                        </h2>

                        <p class="text-gray-600 mt-3">
                            Nom de la boutique :
                            <strong>{{ $demande->nom_boutique }}</strong>
                        </p>

                        <p class="mt-3 text-gray-600">
                            Statut de ta demande :
                        </p>

                        <span class="inline-block mt-2 px-4 py-2 rounded-full font-semibold text-sm"
                              style="background: #fff3cd; color: #856404;">
                            {{ ucfirst($demande->statut) }}
                        </span>

                        <p class="text-sm text-gray-500 mt-4">
                            Tu pourras accéder à ton espace commerçant après validation de ta demande.
                        </p>

                    </div>

                @else

                    @if($errors->any())
                        <div class="p-4 mb-5 rounded-xl"
                             style="background: #fdecea; color: #a12622;">

                            <strong>Attention, vérifie les informations suivantes :</strong>

                            <ul class="list-disc ml-5 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('commercant.demande.store') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="nom_boutique"
                                   class="block font-semibold mb-2"
                                   style="color: #44352b;">
                                Nom de ta boutique
                            </label>

                            <input
                                type="text"
                                id="nom_boutique"
                                name="nom_boutique"
                                value="{{ old('nom_boutique') }}"
                                placeholder="Exemple : Ma jolie boutique"
                                required
                                class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="description"
                                   class="block font-semibold mb-2"
                                   style="color: #44352b;">
                                Description de ta boutique
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Présente les produits que tu souhaites vendre..."
                                class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="telephone"
                                   class="block font-semibold mb-2"
                                   style="color: #44352b;">
                                Téléphone
                            </label>

                            <input
                                type="text"
                                id="telephone"
                                name="telephone"
                                value="{{ old('telephone') }}"
                                placeholder="Exemple : 0696 00 00 00"
                                class="w-full rounded-xl border-gray-300 focus:border-amber-700 focus:ring-amber-700"
                            >
                        </div>

                        <div class="rounded-xl p-4 mb-6"
                             style="background: #f8f3ed;">
                            <p class="text-sm" style="color: #76533b;">
                                💡 Après l'envoi, l'administrateur examinera ta demande. Tu pourras devenir commerçant une fois celle-ci acceptée.
                            </p>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-4 rounded-xl text-white font-bold"
                            style="background: #76533b;">
                            Envoyer ma demande →
                        </button>
                    </form>

                @endif

                <div class="text-center mt-6">
                    <a href="{{ route('dashboard') }}"
                       class="font-semibold"
                       style="color: #76533b;">
                        ← Retour à mon espace
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
