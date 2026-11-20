
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#f5f0e8] px-4 py-12">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="text-4xl mb-3">🔐</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>

                <h2 class="text-xl font-semibold text-[#44352b] mt-4">
                    Nouveau mot de passe
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Choisis un nouveau mot de passe pour ton compte.
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Jeton de réinitialisation -->
                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

                <!-- Email -->
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
                        :value="old('email', $request->email)"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="exemple@email.com"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Nouveau mot de passe -->
                <div class="mt-5">
                    <x-input-label
                        for="password"
                        value="Nouveau mot de passe"
                        class="text-[#44352b]"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-lg border-gray-300 focus:border-[#9b713f] focus:ring-[#9b713f]"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Nouveau mot de passe"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmation -->
                <div class="mt-5">
                    <x-input-label
                        for="password_confirmation"
                        value="Confirmer le mot de passe"
                        class="text-[#44352b]"
                    />

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

                <!-- Bouton -->
                <div class="mt-7">
                    <button
                        type="submit"
                        class="w-full bg-[#76533b] hover:bg-[#5c402d] text-white font-bold py-3 rounded-lg transition duration-200"
                    >
                        Réinitialiser mon mot de passe
                    </button>
                </div>

            </form>

            <div class="text-center mt-7 pt-6 border-t border-gray-200">
                <a
                    href="{{ route('login') }}"
                    class="text-sm font-bold text-[#9b713f] hover:underline"
                >
                    ← Retour à la connexion
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>
