
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">🏪</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Heureux de te revoir !
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Connecte-toi pour accéder à ton espace.
                </p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Adresse email -->
                <div>
                    <x-input-label for="email" value="Adresse email" class="text-[#44352b]" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
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
                        autocomplete="current-password"
                        placeholder="Ton mot de passe"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Se souvenir de moi -->
                <div class="mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-[#9b713f] shadow-sm focus:ring-[#9b713f]"
                            name="remember"
                        >

                        <span class="ms-2 text-sm text-gray-600">
                            Se souvenir de moi
                        </span>
                    </label>
                </div>

                <!-- Bouton connexion -->
                <div class="mt-7">
                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Se connecter
                    </button>
                </div>

                <!-- Mot de passe oublié -->
                @if (Route::has('password.request'))
                    <div class="text-center mt-5">
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-[#9b713f] hover:underline"
                        >
                            Mot de passe oublié ?
                        </a>
                    </div>
                @endif

            </form>

            <div class="border-t border-gray-200 mt-7 pt-6 text-center">

                <p class="text-sm text-gray-600">
                    Tu n'as pas encore de compte ?
                </p>

                <a
                    href="{{ route('register') }}"
                    class="inline-block mt-2 text-[#9b713f] font-bold hover:underline"
                >
                    Créer un compte
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
