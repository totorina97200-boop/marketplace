
<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-20">

            <!-- Logo et nom -->
            <div class="flex items-center">
                <a href="{{ route('accueil') }}"
                   class="text-xl sm:text-2xl font-bold"
                   style="color: #76533b;">
                    🏪 MA MARKETPLACE
                </a>
            </div>

            <!-- Menu ordinateur -->
            <div class="hidden md:flex items-center gap-6">

                <a href="{{ route('accueil') }}"
                   class="font-semibold hover:opacity-70"
                   style="color: #76533b;">
                    Accueil
                </a>

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="font-semibold hover:opacity-70"
                       style="color: #76533b;">
                        Mon espace
                    </a>

                    <a href="{{ route('panier.index') }}"
                       class="font-semibold hover:opacity-70"
                       style="color: #76533b;">
                        🛒 Mon panier
                    </a>

                    <a href="{{ route('commandes.index') }}"
                       class="font-semibold hover:opacity-70"
                       style="color: #76533b;">
                        Mes commandes
                    </a>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.demandes') }}"
                           class="font-semibold hover:opacity-70"
                           style="color: #76533b;">
                            Administration
                        </a>
                    @elseif(auth()->user()->role !== 'commercant')
                        <a href="{{ route('commercant.demande') }}"
                           class="font-semibold hover:opacity-70"
                           style="color: #76533b;">
                            Devenir commerçant
                        </a>
                    @endif

                    <div class="border-l pl-5 flex items-center gap-4"
                         style="border-color: #e5ddd3;">

                        <a href="{{ route('profile.edit') }}"
                           class="font-semibold"
                           style="color: #76533b;">
                            👤 {{ auth()->user()->name }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="px-4 py-2 rounded-lg text-white font-semibold"
                                    style="background: #76533b;">
                                Déconnexion
                            </button>
                        </form>

                    </div>

                @else

                    <a href="{{ route('login') }}"
                       class="font-semibold"
                       style="color: #76533b;">
                        Connexion
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-lg text-white font-semibold"
                       style="background: #76533b;">
                        Créer un compte
                    </a>

                @endauth

            </div>

            <!-- Bouton menu téléphone -->
            <div class="md:hidden">
                <button
                    @click="open = !open"
                    class="p-2 rounded-lg"
                    style="color: #76533b; background: #f8f3ed;">

                    <svg x-show="!open"
                         class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg x-show="open"
                         x-cloak
                         class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>
            </div>

        </div>
    </div>

    <!-- Menu téléphone -->
    <div x-show="open"
         x-cloak
         @click.outside="open = false"
         class="md:hidden border-t"
         style="border-color: #eee5db; background: white;">

        <div class="px-5 py-4 space-y-4">

            <a href="{{ route('accueil') }}"
               class="block font-semibold"
               style="color: #76533b;">
                🏠 Accueil
            </a>

            @auth

                <a href="{{ route('dashboard') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    Mon espace
                </a>

                <a href="{{ route('panier.index') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    🛒 Mon panier
                </a>

                <a href="{{ route('commandes.index') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    Mes commandes
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.demandes') }}"
                       class="block font-semibold"
                       style="color: #76533b;">
                        Administration
                    </a>
                @elseif(auth()->user()->role !== 'commercant')
                    <a href="{{ route('commercant.demande') }}"
                       class="block font-semibold"
                       style="color: #76533b;">
                        Devenir commerçant
                    </a>
                @endif

                <hr style="border-color: #eee5db;">

                <div class="font-semibold" style="color: #44352b;">
                    {{ auth()->user()->name }}
                </div>

                <a href="{{ route('profile.edit') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    Mon profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="w-full text-left px-4 py-3 rounded-lg text-white font-semibold"
                            style="background: #76533b;">
                        Déconnexion
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    Connexion
                </a>

                <a href="{{ route('register') }}"
                   class="block font-semibold"
                   style="color: #76533b;">
                    Créer un compte
                </a>

            @endauth

        </div>
    </div>

</nav>
