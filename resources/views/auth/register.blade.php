
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">🏪</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Crée ton compte !
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Rejoins notre marketplace et découvre toutes nos boutiques.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div>
                    <x-input-label for="name" value="Nom complet" class="text-[#44352b]" />

                    <x-text-input
                        id="name"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Ton nom complet"
                    />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-5">
                    <x-input-label for="email" value="Adresse email" class="text-[#44352b]" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="exemple@email.com"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="mt-5">
                    <x-input-label for="password" value="Mot de passe" class="text-[#44352b]" />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Choisis un mot de passe"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmation -->
                <div class="mt-5">
                    <x-input-label for="password_confirmation" value="Confirmer le mot de passe" class="text-[#44352b]" />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Répète ton mot de passe"
                    />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Bouton inscription -->
                <div class="mt-7">
                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Créer mon compte
                    </button>
                </div>

            </form>

            <div class="border-t border-gray-200 mt-7 pt-6 text-center">

                <p class="text-sm text-gray-600">
                    Tu as déjà un compte ?
                </p>

                <a
                    href="{{ route('login') }}"
                    class="inline-block mt-2 text-[#9b713f] font-bold hover:underline"
                >
                    Se connecter
                </a>

            </div>

            <div class="text-center mt-6">
                <a
                    href="{{ route('accueil') }}"
                    class="text-sm text-gray-500 hover:text-[#76533b]"
                >
                    ← Retour à l'accueil
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>
