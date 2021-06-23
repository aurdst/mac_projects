<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de la Roulette</title>
</head>
<body>
    <h1>Bienvenue au jeu de la roulette !</h1>
    <div class="onglet_rules">
        <p>Les règles sont les suivantes : Insérez un nombre sur lequel vous pariez votre victoire, 
        si vous tomber sur le chiffre du bot vous remporter deux lots, et si vous avez un chiffre de même categorie que le bot (pair/impair) 
        vous remportez un lot. Dans ces deux cas vous êtes sélectionnez pour le tirage au sort du lot de la semaine</p>
    </div>

    <form action="../src/controller/rouletTraitement.php" method='POST'>
        <label>Nombre misé :</label>
        <input type="number" min="1" max="10" name="numberBet">
        <input type="submit" name="play" value="Jouer">
    </form>
</body>
</html>