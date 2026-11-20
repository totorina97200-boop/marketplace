
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">🔐</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Mot de passe oublié ?
                </h2>
            </div>

            <p class="text-sm text-gray-600 leading-6 mb-6">
                Pas de problème ! Indique ton adresse email ci-dessous.
                Nous t'enverrons un lien pour choisir un nouveau mot de passe.
            </p>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <x-input-label
                        for="email"
                        value="Adresse email"
                        class="text-[#44352b]"
                    />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        placeholder="exemple@email.com"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
                </div>

                <div class="mt-7">
                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Envoyer le lien de réinitialisation
                    </button>
                </div>
            </form>

            <div class="border-t border-gray-200 mt-7 pt-6 text-center">
                <a
                    href="{{ route('login') }}"
                    class="text-sm font-bold text-[#9b713f] hover:underline"
                >
                    ← Retour à la connexion
                </a>
            </div>

            <div class="text-center mt-5">
                <a
                    href="{{ route('accueil') }}"
                    class="text-sm text-gray-500 hover:text-[#76533b]"
                >
                    Retour à l'accueil
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>
