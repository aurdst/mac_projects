<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:login.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/rules.css">
    <title>Règles - RGPD</title>
</head>
<body>

<img src="../assets/img/LOGO.png" alt="" id="logo">

    <header>
        <nav>
            <ul>
                <a href="./landing.php" class="a_nav"><li>JOUER</li></a>
                <a href="./rules.php" class="a_nav"><li>RÈGLES DU JEU</li></a>
            </ul>
        </nav>

        <nav>
            <ul>
                <a href="./support.php" class="a_nav_right"><li>SUPPORT</li></a>
                <a href="disconnect.php" class='button_disconnect'>[<?php echo ucfirst($_SESSION['user']); ?>] Disconnect me</a>
            </ul>
        </nav>
    </header>

    <div class="section_rules">
        <h1>Création d’une plateforme de concours via mini jeux.</h1>

        
        <h2>Comment participer ? </h2>
        
        <p>
            La plateforme proposera un système de connexion inscription propre à elle-même 
            (WARNING : les identifiants Dofus officiel sont interdit ). L’utilisateur indiquera son pseudo, 
            son email, et un mot de passe durant son inscription. 
            Une fois connecter l’utilisateur sera invité à s’abonner à la chaine via un lien Youtube. 
        </p>
         <br>   
        <h2>Un système de jetons ?</h2>

        <p>
            Le système de participation mis en place permet d’éviter les multiples participations avec un seul 
            compte. Un jeton sera donc crédité sur chaque compte utilisateur lors de sa création, de plus tous 
            jours à 00: 00 un jeton est crédité sur chaque compte afin de pouvoir participer au tirage du jour
            suivant. 

            Si le compte possède déjà 1 jeton alors le compte ne sera pas crédité. Le système permet donc une seule et unique 
            participation journalière et donc mettre la possibilité de cumul de jetons va à l’encontre du 
            système lui-même.
        </p>
        <br>   
        <h2>Des minis jeux ?</h2>

        <p>
            Les minis jeux sont disponibles dès la connexion au compte joueur. 
            De nombreux petits jeux seront aux menus ! (Plusieurs en cours de développement) 
            RAPPEL : Participation à un seul petit jeu par jour !

            Pour jouer aux autres patientez le jour suivant ! Un accès au jeu coute 1 jeton, une fois 
            la participation effectuée elle est enregistrée en base de données afin d’éviter les petits 
            malins qui souhaitent faire croire au support que leur participation journalière n’a pas eu lieu !
        </p>
        <br>   
        <h2>La BDD (Base de données)</h2>

        <p>
            La base de données n’utilisera jamais les données utilisateur à des fins commerciales ou 
            publicitaires (newsletter ou autres). L’utilisation de la BDD est uniquement pour les 
            participations concourt via la plateforme. La BDD sera accessible par le support afin de 
            permettre au support de faire du débugage / vérification de données.
        </p>
        <br>   
        <h2>Gestion de problèmes/Bugs :</h2>

        <p>
        Pour la gestion des bugs et problèmes une adresse mail helper sera 
        mis en place afin de permettre au support de faire les traitements 
        de tickets. Les tickets nécessiteront une vérification par mail 
        (IMPORTANT : L’utilisation d’une adresse mail valide est primordial).
        </p>
    </div>
    
</body>
</html>