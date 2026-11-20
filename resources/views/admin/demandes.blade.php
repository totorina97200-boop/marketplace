
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            ⚙️ Administration
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-2xl font-bold" style="color: #76533b;">
                    Gestion des demandes commerçants
                </h1>

                <p class="text-gray-500 mt-2">
                    Consulte les demandes et décide qui peut rejoindre notre marketplace.
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

            @forelse($demandes as $demande)

                <div class="bg-white rounded-2xl shadow-sm p-6 mb-5">

                    <div class="flex flex-wrap justify-between items-center gap-3 mb-5">
                        <h2 class="text-xl font-bold" style="color: #76533b;">
                            🏪 {{ $demande->nom_boutique }}
                        </h2>

                        <span class="px-4 py-2 rounded-full text-sm font-semibold"
                              style="background: #fff3cd; color: #856404;">
                            {{ ucfirst($demande->statut) }}
                        </span>
                    </div>

                    <div class="space-y-3 text-gray-600">

                        <div>
                            <span class="font-semibold" style="color: #44352b;">
                                Commerçant :
                            </span>
                            {{ $demande->utilisateur->name ?? 'Utilisateur inconnu' }}
                        </div>

                        <div>
                            <span class="font-semibold" style="color: #44352b;">
                                Email :
                            </span>
                            {{ $demande->utilisateur->email ?? 'Non disponible' }}
                        </div>

                        <div>
                            <span class="font-semibold" style="color: #44352b;">
                                Description :
                            </span>
                            {{ $demande->description ?? 'Aucune description' }}
                        </div>

                        <div>
                            <span class="font-semibold" style="color: #44352b;">
                                Téléphone :
                            </span>
                            {{ $demande->telephone ?? 'Non renseigné' }}
                        </div>

                    </div>

                    @if($demande->statut === 'en_attente')

                        <div class="flex flex-wrap gap-3 mt-6 pt-5 border-t">

                            <form method="POST"
                                  action="{{ route('admin.demandes.accepter', $demande) }}"
                                  onsubmit="return confirm('Confirmer l’acceptation de cette demande ?')">
                                @csrf

                                <button type="submit"
                                        class="px-5 py-3 rounded-xl text-white font-semibold"
                                        style="background: #39845b;">
                                    ✓ Accepter la demande
                                </button>
                            </form>

                            <form method="POST"
                                  action="{{ route('admin.demandes.refuser', $demande) }}"
                                  onsubmit="return confirm('Confirmer le refus de cette demande ?')">
                                @csrf

                                <button type="submit"
                                        class="px-5 py-3 rounded-xl text-white font-semibold"
                                        style="background: #b94a48;">
                                    ✕ Refuser la demande
                                </button>
                            </form>

                        </div>

                    @else

                        <div class="mt-5 pt-4 border-t text-sm text-gray-500">
                            Cette demande a déjà été traitée.
                        </div>

                    @endif

                </div>

            @empty

                <div class="bg-white rounded-2xl shadow-sm p-10 text-center">

                    <div class="text-5xl mb-4">📋</div>

                    <h2 class="text-xl font-bold" style="color: #76533b;">
                        Aucune demande pour le moment
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Les nouvelles demandes de commerçants apparaîtront ici.
                    </p>

                </div>

            @endforelse

            <div class="mt-8">
                <a href="{{ route('dashboard') }}"
                   class="inline-block px-5 py-3 rounded-xl font-semibold text-white"
                   style="background: #76533b;">
                    ← Retour au tableau de bord
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
