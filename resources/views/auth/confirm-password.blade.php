
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-5xl mb-4">🔒</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Confirmation du mot de passe
                </h2>
            </div>

            <p class="text-sm text-gray-600 leading-6 mb-6">
                Cette partie de l'application est sécurisée.
                Pour continuer, confirme ton mot de passe.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-input-label
                        for="password"
                        value="Mot de passe"
                        class="text-[#44352b]"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="password"
                        name="password"
                        required
                        autofocus
                        autocomplete="current-password"
                        placeholder="Entre ton mot de passe"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
                </div>

                <div class="mt-7">
                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Confirmer mon mot de passe
                    </button>
                </div>

            </form>

            <div class="text-center mt-7 pt-6 border-t border-gray-200">
                <a
                    href="{{ route('dashboard') }}"
                    class="text-sm text-[#9b713f] hover:underline"
                >
                    ← Retour à mon espace
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>
