
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir commerçant</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f5f1;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
        }

        h1 {
            color: #9b713f;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            padding: 14px 22px;
            background: #9b713f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            padding: 12px;
            background: #e8f5e9;
            margin-bottom: 15px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Devenir commerçant</h1>

    <p>Présente-nous ta boutique pour rejoindre notre marketplace.</p>

    @if(session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    @if($demande)

        <h3>Ta demande a déjà été envoyée.</h3>

        <p>Statut :
            <strong>{{ $demande->statut }}</strong>
        </p>

    @else

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('commercant.demande.store') }}">

            @csrf

            <label>Nom de ta boutique</label>
            <input type="text" name="nom_boutique"
                value="{{ old('nom_boutique') }}" required>

            <label>Description de ta boutique</label>
            <textarea name="description" rows="5">{{ old('description') }}</textarea>

            <label>Téléphone</label>
            <input type="text" name="telephone"
                value="{{ old('telephone') }}">

            <button type="submit">Envoyer ma demande</button>

        </form>

    @endif

</div>

</body>
</html>
