
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #76533b;">
            👤 Mon profil
        </h2>
    </x-slot>

    <div class="py-12" style="background: #f5f0e8; min-height: 80vh;">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-2xl font-bold" style="color: #76533b;">
                    Gérer mon compte
                </h1>
                <p class="text-gray-500 mt-2">
                    Modifie tes informations personnelles et sécurise ton compte.
                </p>
            </div>

            <div class="space-y-6">

                <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-6 sm:p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>

            <div class="mt-8">
                <a href="{{ route('dashboard') }}"
                   class="inline-block px-5 py-3 rounded-xl font-semibold"
                   style="background: #76533b; color: white;">
                    ← Retour à mon espace
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
