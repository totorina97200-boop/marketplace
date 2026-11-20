
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MA MARKETPLACE - Toutes vos boutiques au même endroit</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf8f5;
            color: #29251f;
        }

        a {
            text-decoration: none;
        }

        /* NAVIGATION */

        header {
            background: #fff;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 15px #00000008;
        }

        .logo {
            color: #9b713f;
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        nav a {
            color: #38332d;
            font-size: 14px;
            transition: 0.2s;
        }

        nav a:hover {
            color: #a77943;
        }

        .connexion {
            background: #9b713f;
            color: white !important;
            padding: 12px 19px;
            border-radius: 7px;
        }

        .connexion:hover {
            background: #76532d;
        }

        .panier-lien {
            background: #29251f;
            color: white !important;
            padding: 12px 19px;
            border-radius: 7px;
        }

        .panier-lien:hover {
            background: #9b713f;
        }

        /* BANNIERE */

        .hero {
            background: linear-gradient(120deg, #f3eadf, #e8d5bd);
            padding: 100px 8%;
            text-align: center;
        }

        .hero-contenu {
            max-width: 850px;
            margin: auto;
        }

        .hero-petit-titre {
            display: inline-block;
            color: #91683a;
            background: #ffffff80;
            padding: 9px 17px;
            border-radius: 30px;
            font-size: 13px;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .hero h1 {
            font-size: 46px;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #29251f;
        }

        .hero h1 span {
            color: #9b713f;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.7;
            color: #625442;
            margin-bottom: 32px;
        }

        .hero-boutons {
            display: flex;
            justify-content: center;
            gap: 13px;
            flex-wrap: wrap;
        }

        .bouton-principal {
            display: inline-block;
            background: #9b713f;
            color: white;
            padding: 15px 25px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.2s;
        }

        .bouton-principal:hover {
            background: #76532d;
            transform: translateY(-2px);
        }

        .bouton-secondaire {
            display: inline-block;
            background: white;
            color: #29251f;
            padding: 15px 25px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.2s;
        }

        .bouton-secondaire:hover {
            background: #f8f1e8;
        }

        /* AVANTAGES */

        .avantages {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 35px 8%;
            background: white;
        }

        .avantage {
            text-align: center;
            padding: 15px;
        }

        .avantage-icone {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .avantage h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .avantage p {
            color: #888;
            font-size: 13px;
        }

        /* PRODUITS */

        .section {
            padding: 75px 8%;
        }

        .section-titre {
            margin-bottom: 35px;
        }

        .section-titre h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .section-titre p {
            color: #777;
            line-height: 1.6;
        }

        .produits {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 25px;
        }

        .produit-card {
            background: white;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 4px 18px #00000009;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .produit-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px #00000012;
        }

        .produit-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
            background: #f0e7da;
        }

        .image-vide {
            height: 240px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0e7da;
            font-size: 55px;
        }

        .produit-info {
            padding: 20px;
        }

        .produit-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .description {
            color: #777;
            font-size: 14px;
            margin-bottom: 14px;
            line-height: 1.5;
        }

        .prix {
            color: #9b713f;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .boutique-nom {
            color: #888;
            font-size: 13px;
            margin-bottom: 17px;
        }

        .ajouter-panier {
            width: 100%;
            padding: 13px;
            background: #29251f;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .ajouter-panier:hover {
            background: #9b713f;
        }

        .ajouter-panier:disabled {
            background: #999;
            cursor: not-allowed;
        }

        .acheter-connexion {
            display: block;
            text-align: center;
            background: #9b713f;
            color: white;
            padding: 13px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
        }

        .acheter-connexion:hover {
            background: #76532d;
        }

        /* RECHERCHE */

        .recherche {
            display: flex;
            gap: 10px;
            max-width: 600px;
            margin: 0 auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .recherche input {
            flex: 1;
            min-width: 200px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 15px;
            outline: none;
        }

        .recherche input:focus {
            border-color: #9b713f;
        }

        .recherche button {
            padding: 15px 23px;
            background: #9b713f;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .recherche button:hover {
            background: #76532d;
        }

        /* MESSAGES */

        .message {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 7px;
            background: #e4f3e5;
            color: #256029;
        }

        .erreur {
            background: #fdecea;
            color: #a12622;
        }

        .vide {
            background: white;
            padding: 55px 20px;
            text-align: center;
            border-radius: 12px;
            color: #777;
        }

        .vide-icone {
            font-size: 50px;
            margin-bottom: 15px;
        }

        /* PIED DE PAGE */

        footer {
            background: #29251f;
            color: white;
            padding: 50px 8% 25px;
            margin-top: 30px;
        }

        .footer-contenu {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 35px;
        }

        .footer-logo {
            font-size: 23px;
            color: #d5ae7d;
            font-weight: bold;
            margin-bottom: 12px;
        }

        footer p {
            color: #ccc;
            line-height: 1.7;
            font-size: 14px;
        }

        .footer-liens {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-liens a {
            color: #ddd;
            font-size: 14px;
        }

        .footer-liens a:hover {
            color: #d5ae7d;
        }

        .copyright {
            border-top: 1px solid #ffffff20;
            padding-top: 22px;
            text-align: center;
            font-size: 13px;
        }

        /* TELEPHONE */

        @media (max-width: 700px) {
            header {
                padding: 18px 5%;
                flex-direction: column;
            }

            nav {
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 70px 6%;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 15px;
            }

            .avantages {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            .section {
                padding: 50px 5%;
            }

            .section-titre h2 {
                font-size: 25px;
            }

            .footer-contenu {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header>

    <a href="{{ route('accueil') }}" class="logo">
        MA MARKETPLACE
    </a>

    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="#produits">Produits</a>

        @auth
            <a href="{{ route('dashboard') }}">Mon espace</a>

            <a href="{{ route('panier.index') }}" class="panier-lien">
                🛒 Mon panier
            </a>
        @else
            <a href="{{ route('login') }}">Connexion</a>

            <a href="{{ route('register') }}" class="connexion">
                Créer un compte
            </a>
        @endauth
    </nav>

</header>


<!-- BANNIERE PRINCIPALE -->

<section class="hero">

    <div class="hero-contenu">

        <div class="hero-petit-titre">
            BIENVENUE SUR MA MARKETPLACE
        </div>

        <h1>
            Découvrez plusieurs boutiques
            <span>au même endroit.</span>
        </h1>

        <p>
            Retrouvez vos produits préférés, découvrez de nouveaux commerçants
            et faites vos achats simplement sur une seule plateforme.
        </p>

        <div class="hero-boutons">

            <a href="#produits" class="bouton-principal">
                Découvrir les produits
            </a>

            @guest
                <a href="{{ route('register') }}" class="bouton-secondaire">
                    Créer un compte
                </a>
            @endguest

        </div>

    </div>

</section>


<!-- AVANTAGES -->

<section class="avantages">

    <div class="avantage">
        <div class="avantage-icone">🏪</div>
        <h3>Plusieurs boutiques</h3>
        <p>Découvrez différents commerçants au même endroit.</p>
    </div>

    <div class="avantage">
        <div class="avantage-icone">🛍️</div>
        <h3>Achats faciles</h3>
        <p>Retrouvez vos produits et ajoutez-les à votre panier.</p>
    </div>

    <div class="avantage">
        <div class="avantage-icone">🤝</div>
        <h3>Commerçants partenaires</h3>
        <p>Découvrez les produits proposés par nos vendeurs.</p>
    </div>

</section>


<!-- PRODUITS -->

<section class="section" id="produits">

    <div class="section-titre">

        <h2>Nos produits</h2>

        <p>
            Découvrez les produits proposés par nos commerçants.
        </p>

        @if(request('recherche'))
            <p style="margin-top: 15px;">
                Résultats pour :
                <strong>{{ request('recherche') }}</strong>

                <a href="{{ route('accueil') }}"
                   style="color:#9b713f; margin-left:10px;">
                    Voir tous les produits
                </a>
            </p>
        @endif

    </div>


    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('erreur'))
        <div class="message erreur">
            {{ session('erreur') }}
        </div>
    @endif


    <!-- BARRE DE RECHERCHE -->

    <form action="{{ route('accueil') }}" method="GET" class="recherche">

        <input
            type="text"
            name="recherche"
            placeholder="Rechercher un produit..."
            value="{{ request('recherche') }}"
        >

        <button type="submit">
            🔍 Rechercher
        </button>

    </form>


    <div style="height: 35px;"></div>


    @if($produits->isNotEmpty())

        <div class="produits">

            @foreach($produits as $produit)

                <div class="produit-card">

                    @if($produit->image)

                        <img
                            src="{{ asset('storage/' . $produit->image) }}"
                            alt="{{ $produit->nom }}"
                            class="produit-image"
                        >

                    @else

                        <div class="image-vide">
                            📦
                        </div>

                    @endif


                    <div class="produit-info">

                        <h3>{{ $produit->nom }}</h3>

                        <p class="description">
                            {{ $produit->description ?: 'Découvrez ce produit dans notre marketplace.' }}
                        </p>

                        <div class="prix">
                            {{ number_format((float) $produit->prix, 2, ',', ' ') }} €
                        </div>

                        <div class="boutique-nom">
                            🏪 {{ $produit->boutique->nom ?? 'Boutique partenaire' }}
                        </div>


                        @auth

                            <form
                                action="{{ route('panier.ajouter', $produit->id) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="ajouter-panier"
                                    @if($produit->stock < 1) disabled @endif
                                >

                                    @if($produit->stock > 0)
                                        🛒 Ajouter au panier
                                    @else
                                        Rupture de stock
                                    @endif

                                </button>

                            </form>

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="acheter-connexion"
                            >
                                Connecte-toi pour acheter
                            </a>

                        @endauth

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="vide">

            <div class="vide-icone">
                🛍️
            </div>

            <h3>Aucun produit trouvé</h3>

            <p style="margin-top: 10px;">
                Essaie avec un autre nom de produit.
            </p>

        </div>

    @endif

</section>


<!-- PIED DE PAGE -->

<footer>

    <div class="footer-contenu">

        <div>
            <div class="footer-logo">
                MA MARKETPLACE
            </div>

            <p>
                Toutes vos boutiques au même endroit.
                <br>
                Découvrez, choisissez et commandez facilement.
            </p>
        </div>

        <div class="footer-liens">

            <strong>Navigation</strong>

            <a href="{{ route('accueil') }}">Accueil</a>
            <a href="#produits">Nos produits</a>

            @auth
                <a href="{{ route('dashboard') }}">Mon espace</a>
                <a href="{{ route('panier.index') }}">Mon panier</a>
            @else
                <a href="{{ route('login') }}">Connexion</a>
                <a href="{{ route('register') }}">Créer un compte</a>
            @endauth

        </div>

    </div>

    <div class="copyright">
        © {{ date('Y') }} MA MARKETPLACE - Tous droits réservés.
    </div>

</footer>

</body>
</html>
