
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration - Marketplace</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            margin: 0;
            padding: 35px;
            color: #222;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-size: 13px;
        }

        button {
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            margin-right: 8px;
        }

        .accept {
            background: #198754;
        }

        .refuse {
            background: #dc3545;
        }

        .success {
            background: #d1e7dd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .error {
            background: #f8d7da;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Administration</h1>
    <p class="subtitle">Gestion des demandes commerçants</p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @forelse($demandes as $demande)

        <div class="card">

            <h2>{{ $demande->nom_boutique }}</h2>

            <p>
                <strong>Commerçant :</strong>
                {{ $demande->utilisateur->name ?? 'Utilisateur inconnu' }}
            </p>

            <p>
                <strong>Email :</strong>
                {{ $demande->utilisateur->email ?? 'Non disponible' }}
            </p>

            <p>
                <strong>Description :</strong>
                {{ $demande->description ?? 'Aucune description' }}
            </p>

            <p>
                <strong>Téléphone :</strong>
                {{ $demande->telephone ?? 'Non renseigné' }}
            </p>

            <p>
                <strong>Statut :</strong>
                <span class="status">{{ $demande->statut }}</span>
            </p>

            @if($demande->statut === 'en_attente')

                <form method="POST"
                    action="{{ route('admin.demandes.accepter', $demande) }}"
                    style="display:inline">

                    @csrf
                    <button type="submit" class="accept">
                        Accepter
                    </button>

                </form>

                <form method="POST"
                    action="{{ route('admin.demandes.refuser', $demande) }}"
                    style="display:inline">

                    @csrf
                    <button type="submit" class="refuse">
                        Refuser
                    </button>

                </form>

            @endif

        </div>

    @empty

        <div class="card">
            <p>Aucune demande commerçant pour le moment.</p>
        </div>

    @endforelse

</div>

</body>
</html>
