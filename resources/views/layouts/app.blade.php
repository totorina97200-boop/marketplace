
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ma Marketplace') }}</title>

    <!-- Polices -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles et scripts Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f5f0e8] text-[#44352b]">

    <div class="min-h-screen bg-[#f5f0e8]">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- En-tête de page -->
        @isset($header)
            <header class="bg-white border-b border-[#e8ded0] shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="text-[#44352b]">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        <!-- Contenu principal -->
        <main class="min-h-[70vh]">
            {{ $slot }}
        </main>

        <!-- Pied de page -->
        <footer class="bg-[#44352b] text-white mt-12">
            <div class="max-w-7xl mx-auto px-6 py-8">

                <div class="text-center">
                    <h2 class="text-xl font-bold mb-2">
                        🏪 MA MARKETPLACE
                    </h2>

                    <p class="text-sm text-[#e8ded0]">
                        Votre marketplace, vos commerces, vos envies.
                    </p>

                    <p class="text-xs text-[#cbbba8] mt-5">
                        © {{ date('Y') }} Ma Marketplace. Tous droits réservés.
                    </p>
                </div>

            </div>
        </footer>

    </div>

</body>
</html>
