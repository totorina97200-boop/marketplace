
<x-app-layout>

    <x-slot name="header">
        <div>
            <p style="font-size:11px;letter-spacing:2px;color:#9b713f;font-weight:bold;">
                MA MARKETPLACE
            </p>
            <h2 style="font-size:22px;font-weight:bold;color:#29251f;">
                ✏️ Modifier un produit
            </h2>
        </div>
    </x-slot>

    <style>
        .modification-page {
            background: #faf8f5;
            min-height: 80vh;
            padding: 35px 15px 60px;
        }

        .modification-container {
            max-width: 800px;
            margin: auto;
        }

        .modification-intro {
            background: linear-gradient(120deg, #f3eadf, #e8d5bd);
            padding: 27px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .modification-intro h1 {
            font-size: 25px;
            font-weight: bold;
            color: #29251f;
            margin-bottom: 8px;
        }

        .modification-intro p {
            color: #625442;
        }

        .formulaire {
            background: white;
            padding: 30px;
            border-radius: 13px;
            box-shadow: 0 4px 18px #00000009;
        }

        .champ {
            margin-bottom: 22px;
        }

        .champ label {
            display: block;
            color: #29251f;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .champ input,
        .champ textarea {
            width: 100%;
            border: 1px solid #ded5ca;
            border-radius: 8px;
            padding: 12px 14px;
            color: #29251f;
            background: #fffdfa;
            outline: none;
        }

        .champ input:focus,
        .champ textarea:focus {
            border-color: #9b713f;
            box-shadow: 0 0 0 2px #9b713f20;
        }

        .champ textarea {
            min-height: 120px;
            resize: vertical;
        }

        .aide {
            font-size: 13px;
            color: #888;
            margin-top: 7px;
        }

        .erreur {
            color: #b42318;
            font-size: 13px;
            margin-top: 6px;
        }

        .image-actuelle {
            width: 180px;
            height: 150px;
            object-fit: cover;
            border-radius: 9px;
            margin-top: 12px;
            border: 1px solid #eee;
        }

        .actions-formulaire {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .bouton-enregistrer {
            background: #9b713f;
            color: white;
            padding: 13px 21px;
            border: none;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .bouton-enregistrer:hover {
            background: #76532d;
        }

        .bouton-annuler {
            color: #76532d;
            text-decoration: none;
            font-weight: bold;
        }

        .bouton-annuler:hover {
            text-decoration: underline;
        }

        @media(max-width: 600px) {
            .formulaire {
                padding: 20px;
            }

            .modification-intro h1 {
                font-size: 22px;
            }

            .bouton-enregistrer {
                width: 100%;
            }
        }
    </style>

    <div class="modification-page">

        <div class="modification-container">

            <div class="modification-intro">
                <h1>Mettre à jour ton produit 🛍️</h1>
                <p>
                    Modifie les informations, le prix, le stock ou la photo
                    de ton produit.
                </p>
            </div>

            <div class="formulaire">

                <form action="{{ route('admin.commercant.produits.update', $produit) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="champ">
                        <label for="nom">Nom du produit *</label>

                        <input type="text"
                               id="nom"
                               name="nom"
                               value="{{ old('nom', $produit->nom) }}"
                               required>

                        @error('nom')
                            <p class="erreur">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="champ">
                        <label for="description">Description</label>

                        <textarea id="description"
                                  name="description">{{ old('description', $produit->description) }}</textarea>

                        @error('description')
                            <p class="erreur">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="champ">
                        <label for="prix">Prix (€) *</label>

                        <input type="number"
                               id="prix"
                               name="prix"
                               value="{{ old('prix', $produit->prix) }}"
                               step="0.01"
                               min="0"
                               required>

                        @error('prix')
                            <p class="erreur">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="champ">
                        <label for="stock">Quantité en stock *</label>

                        <input type="number"
                               id="stock"
                               name="stock"
                               value="{{ old('stock', $produit->stock) }}"
                               min="0"
                               required>

                        @error('stock')
                            <p class="erreur">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="champ">
                        <label for="image">Changer la photo (facultatif)</label>

                        <input type="file"
                               id="image"
                               name="image"
                               accept="image/*">

                        <p class="aide">
                            Si tu ne sélectionnes aucune nouvelle photo,
                            l'ancienne sera conservée.
                        </p>

                        @if($produit->image)
                            <p class="aide">Photo actuellement enregistrée :</p>

                            <img
                                src="{{ asset('storage/' . $produit->image) }}"
                                alt="{{ $produit->nom }}"
                                class="image-actuelle"
                            >
                        @endif

                        @error('image')
                            <p class="erreur">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="actions-formulaire">

                        <button type="submit" class="bouton-enregistrer">
                            💾 Enregistrer les modifications
                        </button>

                        <a href="{{ route('admin.commercant.produits.index') }}"
                           class="bouton-annuler">
                            Annuler
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
