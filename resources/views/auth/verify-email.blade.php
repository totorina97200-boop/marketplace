
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-5xl mb-4">📧</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Vérifie ton adresse email
                </h2>
            </div>

            <p class="text-sm text-gray-600 leading-6 mb-6">
                Merci de ton inscription ! Avant de commencer, vérifie ton adresse email en cliquant sur le lien que nous venons de t'envoyer.

                Si tu n'as pas reçu le message, tu peux demander un nouvel envoi.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-5 p-4 rounded-lg bg-green-50 text-green-700 text-sm">
                    Un nouveau lien de vérification vient d'être envoyé à ton adresse email.
                </div>
            @endif

            <div class="space-y-4">

                <!-- Renvoyer le lien -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Renvoyer le lien de vérification
                    </button>
                </form>

                <!-- Déconnexion -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full border border-[#76533b] text-[#76533b] hover:bg-[#f5f0e8] font-semibold py-3 rounded-lg transition duration-200"
                    >
                        Se déconnecter
                    </button>
                </form>

            </div>

            <div class="text-center mt-7 pt-6 border-t border-gray-200">
                <a
                    href="{{ route('accueil') }}"
                    class="text-sm text-[#9b713f] hover:underline"
                >
                    ← Retour à l'accueil
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>
