
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace - Toutes vos boutiques au même endroit</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            color: #222;
        }

        header {
            background: white;
            padding: 22px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px #00000010;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #9b713f;
        }

        nav a {
            margin-left: 25px;
            text-decoration: none;
            color: #333;
        }

        .hero {
            text-align: center;
            padding: 90px 20px;
            background: #f0e7da;
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .hero input {
            padding: 15px;
            width: 320px;
            max-width: 90%;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .hero button {
            padding: 15px 25px;
            background: #9b713f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .boutiques {
            padding: 55px 8%;
        }

        .boutiques h2 {
            margin-bottom: 25px;
        }

        .boutique-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 300px;
            box-shadow: 0 2px 10px #00000010;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">MA MARKETPLACE</div>

        <nav>
            <a href="#">Accueil</a>
            <a href="#">Boutiques</a>
            <a href="#">Produits</a>
            <a href="#">Connexion</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Découvrez plusieurs boutiques au même endroit</h1>

        <p>Achetez facilement auprès de vos commerçants préférés.</p>

        <input type="text" placeholder="Rechercher un produit...">
        <button>Rechercher</button>
    </section>

    <section class="boutiques">
        <h2>Nos boutiques</h2>

        <div class="boutique-card">
            <h3>Bienvenue aux commerçants !</h3>
            <p>Les premières boutiques arrivent bientôt.</p>
        </div>
    </section>

</body>
</html>
