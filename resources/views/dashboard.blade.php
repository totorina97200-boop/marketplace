
<x-app-layout>

    <x-slot name="header">
        <div class="dashboard-header">
            <div>
                <p class="dashboard-surtitle">MA MARKETPLACE</p>
                <h2>Mon tableau de bord</h2>
            </div>
        </div>
    </x-slot>

    <style>
        .dashboard-page {
            background: #faf8f5;
            min-height: 80vh;
            padding: 35px 20px 60px;
        }

        .dashboard-container {
            max-width: 1150px;
            margin: auto;
        }

        .welcome-card {
            background: linear-gradient(120deg, #f3eadf, #e8d5bd);
            padding: 38px;
            border-radius: 15px;
            margin-bottom: 28px;
        }

        .welcome-card h1 {
            font-size: 30px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 10px;
        }

        .welcome-card p {
            color: #625442;
            font-size: 15px;
        }

        .dashboard-section {
            background: white;
            padding: 28px;
            border-radius: 13px;
            margin-bottom: 25px;
            box-shadow: 0 4px 18px #00000008;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .section-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3eadf;
            border-radius: 10px;
            font-size: 21px;
        }

        .dashboard-section h3 {
            font-size: 20px;
            font-weight: bold;
            color: #29251f;
        }

        .section-description {
            color: #888;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .dashboard-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .dashboard-button {
            display: inline-block;
            padding: 13px 19px;
            border-radius: 7px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .dashboard-button:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .button-brown {
            background: #9b713f;
        }

        .button-dark {
            background: #29251f;
        }

        .button-green {
            background: #398052;
        }

        .button-blue {
            background: #3866a5;
        }

        .dashboard-header h2 {
            color: #29251f;
            font-size: 21px;
        }

        .dashboard-surtitle {
            color: #9b713f;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 4px;
        }

        @media (max-width: 600px) {
            .welcome-card {
                padding: 25px;
            }

            .welcome-card h1 {
                font-size: 24px;
            }

            .dashboard-section {
                padding: 20px;
            }

            .dashboard-buttons {
                flex-direction: column;
            }

            .dashboard-button {
                text-align: center;
            }
        }
    </style>

    <div class="dashboard-page">

        <div class="dashboard-container">

            <!-- BIENVENUE -->

            <div class="welcome-card">

                <h1>
                    Bonjour {{ auth()->user()->name }} !
                </h1>

                <p>
                    Bienvenue dans ton espace personnel.
                    Que souhaites-tu faire aujourd'hui ?
                </p>

            </div>


            <!-- ESPACE CLIENT -->

            <div class="dashboard-section">

                <div class="section-heading">

                    <div class="section-icon">🛍️</div>

                    <h3>Espace client</h3>

                </div>

                <p class="section-description">
                    Découvre les produits, effectue tes achats
                    et retrouve tes commandes.
                </p>

                <div class="dashboard-buttons">

                    <a href="{{ route('accueil') }}"
                       class="dashboard-button button-brown">
                        Découvrir les produits
                    </a>

                    <a href="{{ route('panier.index') }}"
                       class="dashboard-button button-dark">
                        🛒 Mon panier
                    </a>

                    <a href="{{ route('commandes.index') }}"
                       class="dashboard-button button-blue">
                        📦 Mes commandes
                    </a>

                </div>

            </div>


            <!-- ESPACE COMMERCANT -->

            @if(in_array(auth()->user()->role, ['commercant', 'admin']))

                <div class="dashboard-section">

                    <div class="section-heading">

                        <div class="section-icon">🏪</div>

                        <h3>Espace commerçant</h3>

                    </div>

                    <p class="section-description">
                        Gère tes produits et développe ta boutique.
                    </p>

                    <div class="dashboard-buttons">

                        <a href="{{ route('commercant.produits.index') }}"
                           class="dashboard-button button-blue">
                            Mes produits
                        </a>

                        <a href="{{ route('commercant.produits.create') }}"
                           class="dashboard-button button-green">
                            + Ajouter un produit
                        </a>

                    </div>

                </div>

            @endif


            <!-- ADMINISTRATION -->

            @if(auth()->user()->role === 'admin')

                <div class="dashboard-section">

                    <div class="section-heading">

                        <div class="section-icon">⚙️</div>

                        <h3>Administration</h3>

                    </div>

                    <p class="section-description">
                        Gère les demandes des commerçants
                        et l'administration du marketplace.
                    </p>

                    <div class="dashboard-buttons">

                        <a href="{{ route('admin.demandes') }}"
                           class="dashboard-button button-dark">
                            Gérer les demandes commerçants
                        </a>

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
