
<x-app-layout>

    <x-slot name="header">
        <div>
            <p style="font-size:11px;letter-spacing:2px;color:#9b713f;font-weight:bold;">
                MA MARKETPLACE
            </p>
            <h2 style="font-size:22px;font-weight:bold;color:#29251f;">
                🛍️ Mes commandes
            </h2>
        </div>
    </x-slot>

    <style>
        .commandes-page {
            background: #faf8f5;
            min-height: 80vh;
            padding: 35px 15px 60px;
        }

        .commandes-container {
            max-width: 1000px;
            margin: auto;
        }

        .commandes-intro {
            background: linear-gradient(120deg, #f3eadf, #e8d5bd);
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .commandes-intro h1 {
            font-size: 27px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 8px;
        }

        .commandes-intro p {
            color: #625442;
        }

        .message-success {
            background: #e4f3e5;
            color: #256029;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .commande-card {
            background: white;
            padding: 25px;
            margin-bottom: 22px;
            border-radius: 13px;
            box-shadow: 0 4px 18px #00000009;
        }

        .commande-entete {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            border-bottom: 1px solid #eee7df;
            padding-bottom: 18px;
            margin-bottom: 18px;
        }

        .commande-entete h2 {
            font-size: 20px;
            font-weight: bold;
            color: #29251f;
        }

        .commande-date {
            color: #888;
            font-size: 14px;
            margin-top: 5px;
        }

        .statut {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            background: #f3eadf;
            color: #76532d;
            font-size: 13px;
            font-weight: bold;
        }

        .commande-card h3 {
            font-size: 16px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 12px;
        }

        .produit-ligne {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 13px 0;
            border-bottom: 1px solid #f0ece7;
            color: #625442;
            flex-wrap: wrap;
        }

        .produit-nom {
            font-weight: bold;
            color: #29251f;
        }

        .commande-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            padding-top: 15px;
        }

        .commande-total span:first-child {
            font-weight: bold;
            color: #625442;
        }

        .commande-total strong {
            font-size: 23px;
            color: #9b713f;
        }

        .bouton-details {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 18px;
            background: #29251f;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.2s;
        }

        .bouton-details:hover {
            background: #9b713f;
        }

        .commandes-vides {
            background: white;
            padding: 55px 20px;
            text-align: center;
            border-radius: 13px;
            box-shadow: 0 4px 18px #00000008;
        }

        .commandes-vides .icone {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .commandes-vides h2 {
            font-size: 21px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 10px;
        }

        .commandes-vides p {
            color: #888;
            margin-bottom: 20px;
        }

        .bouton-decouvrir {
            display: inline-block;
            background: #9b713f;
            color: white;
            padding: 13px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .bouton-decouvrir:hover {
            background: #76532d;
        }

        .retour-dashboard {
            display: inline-block;
            margin-top: 15px;
            color: #76532d;
            text-decoration: none;
            font-weight: bold;
        }

        .retour-dashboard:hover {
            text-decoration: underline;
        }

        @media(max-width: 600px) {
            .commandes-intro {
                padding: 22px;
            }

            .commandes-intro h1 {
                font-size: 23px;
            }

            .commande-card {
                padding: 18px;
            }
        }
    </style>

    <div class="commandes-page">

        <div class="commandes-container">

            <div class="commandes-intro">
                <h1>Retrouve tous tes achats 🛍️</h1>
                <p>
                    Consulte tes commandes, retrouve les produits achetés
                    et vérifie le montant de tes achats.
                </p>
            </div>

            @if(session('success'))
                <div class="message-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @forelse($commandes as $commande)

                <div class="commande-card">

                    <div class="commande-entete">

                        <div>
                            <h2>Commande {{ $commande->numero }}</h2>

                            <p class="commande-date">
                                📅 {{ $commande->created_at->format('d/m/Y à H:i') }}
                            </p>
                        </div>

                        <span class="statut">
                            {{ $commande->statut }}
                        </span>

                    </div>

                    <h3>📦 Produits commandés</h3>

                    @foreach($commande->lignes as $ligne)

                        <div class="produit-ligne">

                            <div>
                                <span class="produit-nom">
                                    {{ $ligne->produit->nom ?? 'Produit indisponible' }}
                                </span>

                                <p style="font-size:13px;color:#888;margin-top:5px;">
                                    Quantité : {{ $ligne->quantite }}
                                </p>
                            </div>

                            <div>
                                {{ number_format((float) $ligne->prix_unitaire, 2, ',', ' ') }} €
                            </div>

                        </div>

                    @endforeach

                    <div class="commande-total">
                        <span>Total de la commande</span>

                        <strong>
                            {{ number_format((float) $commande->total, 2, ',', ' ') }} €
                        </strong>
                    </div>

                    <a href="{{ route('commandes.show', $commande->id) }}"
                       class="bouton-details">
                        Voir les détails →
                    </a>

                </div>

            @empty

                <div class="commandes-vides">

                    <div class="icone">🛍️</div>

                    <h2>Tu n'as pas encore passé de commande.</h2>

                    <p>
                        Tes futurs achats apparaîtront ici.
                    </p>

                    <a href="{{ route('accueil') }}"
                       class="bouton-decouvrir">
                        Découvrir les produits
                    </a>

                </div>

            @endforelse

            <a href="{{ route('dashboard') }}" class="retour-dashboard">
                ← Retour au tableau de bord
            </a>

        </div>

    </div>

</x-app-layout>
