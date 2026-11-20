
<x-app-layout>

    <x-slot name="header">
        <div>
            <p style="font-size:11px;letter-spacing:2px;color:#9b713f;font-weight:bold;">
                MA MARKETPLACE
            </p>
            <h2 style="font-size:22px;font-weight:bold;color:#29251f;">
                📦 Gestion de mes produits
            </h2>
        </div>
    </x-slot>

    <style>
        .produits-page {
            background: #faf8f5;
            min-height: 80vh;
            padding: 35px 20px 60px;
        }

        .produits-container {
            max-width: 1150px;
            margin: auto;
        }

        .produits-intro {
            background: linear-gradient(120deg, #f3eadf, #e8d5bd);
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .produits-intro h1 {
            font-size: 27px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 8px;
        }

        .produits-intro p {
            color: #625442;
        }

        .produits-entete {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .produits-entete h3 {
            font-size: 21px;
            font-weight: bold;
            color: #29251f;
        }

        .bouton-ajouter {
            display: inline-block;
            background: #9b713f;
            color: white;
            padding: 13px 19px;
            border-radius: 7px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .bouton-ajouter:hover {
            background: #76532d;
            transform: translateY(-2px);
        }

        .message-success {
            background: #e4f3e5;
            color: #256029;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .produits-grille {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 22px;
        }

        .produit-card {
            background: white;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 4px 18px #00000009;
            transition: 0.2s;
        }

        .produit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 9px 22px #00000012;
        }

        .produit-photo {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
            background: #f0e7da;
        }

        .photo-vide {
            height: 210px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0e7da;
            font-size: 55px;
        }

        .produit-contenu {
            padding: 20px;
        }

        .produit-contenu h4 {
            font-size: 18px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 12px;
        }

        .produit-prix {
            color: #9b713f;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .produit-stock {
            display: inline-block;
            background: #f3eadf;
            color: #76532d;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .produit-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .bouton-modifier {
            display: block;
            text-align: center;
            background: #29251f;
            color: white;
            padding: 11px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .bouton-modifier:hover {
            background: #9b713f;
        }

        .bouton-supprimer {
            width: 100%;
            background: #fff0ee;
            color: #a12622;
            border: none;
            padding: 11px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .bouton-supprimer:hover {
            background: #fbdedb;
        }

        .produits-vide {
            background: white;
            padding: 55px 20px;
            text-align: center;
            border-radius: 13px;
            box-shadow: 0 4px 18px #00000008;
        }

        .produits-vide .icone {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .produits-vide h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .produits-vide p {
            color: #888;
            margin-bottom: 20px;
        }

        @media(max-width: 600px) {
            .produits-page {
                padding: 25px 12px;
            }

            .produits-intro {
                padding: 22px;
            }

            .produits-intro h1 {
                font-size: 23px;
            }

            .produits-entete {
                align-items: stretch;
                flex-direction: column;
            }

            .bouton-ajouter {
                text-align: center;
            }
        }
    </style>

    <div class="produits-page">
        <div class="produits-container">

            <div class="produits-intro">
                <h1>Ma boutique, mes produits 🏪</h1>
                <p>
                    Retrouve tous tes produits et gère facilement
                    tes prix, tes stocks et tes annonces.
                </p>
            </div>

            <div class="produits-entete">
                <h3>Liste de mes produits</h3>

                <a href="{{ route('commercant.produits.create') }}"
                   class="bouton-ajouter">
                    ➕ Ajouter un produit
                </a>
            </div>

            @if(session('success'))
                <div class="message-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if($produits->isEmpty())

                <div class="produits-vide">
                    <div class="icone">📦</div>

                    <h3>Aucun produit pour le moment</h3>

                    <p>
                        Tu n'as pas encore ajouté de produit à ta boutique.
                    </p>

                    <a href="{{ route('commercant.produits.create') }}"
                       class="bouton-ajouter">
                        ➕ Ajouter mon premier produit
                    </a>
                </div>

            @else

                <div class="produits-grille">

                    @foreach($produits as $produit)

                        <div class="produit-card">

                            @if($produit->image)
                                <img
                                    src="{{ asset('storage/' . $produit->image) }}"
                                    alt="{{ $produit->nom }}"
                                    class="produit-photo"
                                >
                            @else
                                <div class="photo-vide">📦</div>
                            @endif

                            <div class="produit-contenu">

                                <h4>{{ $produit->nom }}</h4>

                                <div class="produit-prix">
                                    {{ number_format((float) $produit->prix, 2, ',', ' ') }} €
                                </div>

                                <div class="produit-stock">
                                    📊 Stock : {{ $produit->stock }}
                                </div>

                                <div class="produit-actions">

                                    <a href="{{ route('commercant.produits.edit', $produit) }}"
                                       class="bouton-modifier">
                                        ✏️ Modifier
                                    </a>

                                    <form
                                        action="{{ route('commercant.produits.destroy', $produit) }}"
                                        method="POST"
                                        onsubmit="return confirm('Veux-tu vraiment supprimer ce produit ?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bouton-supprimer">
                                            🗑️ Supprimer
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>

            @endif

        </div>
    </div>

</x-app-layout>
