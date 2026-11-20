
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ma Marketplace') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f5f0e8] text-[#44352b]">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10">

        <!-- Logo et accueil -->
        <div class="mb-8 text-center">
            <a href="{{ route('accueil') }}" class="inline-block">
                <div class="text-4xl mb-2">🏪</div>

                <h1 class="text-2xl font-bold text-[#76533b]">
                    MA MARKETPLACE
                </h1>
            </a>

            <p class="text-sm text-[#806d5c] mt-2">
                Votre marketplace, vos commerces, vos envies.
            </p>
        </div>

        <!-- Carte principale -->
        <div class="w-full sm:max-w-md bg-white shadow-xl rounded-2xl border border-[#e8ded0] overflow-hidden">

            <div class="h-2 bg-[#76533b]"></div>

            <div class="px-6 py-8 sm:px-8">
                {{ $slot }}
            </div>

        </div>

        <!-- Retour à l'accueil -->
        <div class="mt-6 text-center">
            <a href="{{ route('accueil') }}"
               class="text-sm font-semibold text-[#76533b] hover:text-[#44352b]">
                ← Retour à l'accueil
            </a>
        </div>

        <!-- Copyright -->
        <p class="text-xs text-[#8b7968] mt-6">
            © {{ date('Y') }} Ma Marketplace. Tous droits réservés.
        </p>

    </div>

</body>
</html>
