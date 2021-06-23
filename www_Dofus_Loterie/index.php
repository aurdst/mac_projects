<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/landing.css">
    <title>Connecte toi !</title>
</head>
<body>

<?php
    include 'templates/header_index.php';
?>

<?php 
        if(isset($_GET['login_err']))
        {
            $err = htmlspecialchars($_GET['login_err']);

            switch($err)
            {
                case 'password';
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe non valide.
                    </div>
            <?php
            break;

                case 'mail';
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email incorrect.
                    </div>
            <?php
            break;

                case 'already';
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte non existant.
                    </div>
            <?php
            break;
            }
        }
    ?>
    <h2>Bienvenue à toi jeune aventurier, <br>connecte toi ou rejoinds nous via le bouton "nous rejoindre"</h2>
    <form action="src/controller/login.php" method='POST' class='login-form'> 
        <label for=""> Email :</label>
        <br>
        <input type="email" name="mail" class='input_form'>
        <br><br>
        <label for="">mot de passe :</label>
        <br>
        <input type="password" name ="password" class='input_form'>
        <br><br>
        <input type='submit' value="connexion" class='cta'>
        <p>Tu n'as pas de compte ?<a href="./templates/register.php"> Inscrit toi maintenant </a> </p>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>