<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/landing.css">
    <title>INSCRIPTION</title>
</head>
<body>

<img src="../assets/img/LOGO.png" alt="" id="logo">

<header>
    <nav>
        <ul>
            <a href="./play.php" class="a_nav"><li>JOUER</li></a>
            <a href="./rules.php" class="a_nav"><li>RÈGLES DU JEU</li></a>
        </ul>
    </nav>

    <nav>
        <ul>
            <a href="./support.php" class="a_nav_right"><li>SUPPORT</li></a>
            <a href="disconnect.php" class='button_disconnect'>Connexion requise</a>
        </ul>
    </nav>
</header>

<?php 
    if(isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err) {
            case 'success';
            ?>
                <div class="alert_good">
                    <strong>Parfait</strong> ton compte est créer !
                </div>
                <?php 
            break;

            case 'password';
            ?>
                <div class="alert">
                    <strong>Erreur</strong> mot de passe incorrect !
                </div>
                <?php 
            break;

            case 'mail';
            ?>
                <div class="alert">
                   <strong>Erreur</strong> email incorect !
                </div>
                <?php 
            break;

            case 'mail_length';
            ?>
                <div class="alert">
                    <strong>Erreur</strong> email incorect !
                </div>
                <?php 
            break;

            case 'username_length';
            ?>
                <div class="alert">
                    <strong>Erreur</strong> nom d'utilisateur trop long  !
                </div>
                <?php 
            break;

            case 'already';
            ?>
                <div class="alert">
                    <strong>Erreur</strong> le compte existe déja (mail dèja utiliser) !
                </div>
                <?php 
            break;
        }
    }
?>
<h2> <span>WARNING </span> : N'UTILISER PAS VOS IDENTIFIANTS DOFUS ! <br> TOUT SAVOIR SUR LE PHISHING : <span><a href="https://www.dofus.com/fr/mmorpg/actualites/news/653045-savoir-phishing" style="color : black">DOFUS.COM/PHISHING</a></span> </h2>
<form action="../src/controller/registerTraitement.php" method='POST' class='login-form'>
    <label for="" class='label_form'>NOM D'UTILISATEUR :</label>
    <br>
    <input type="text" name='username' class='input_form'>
    <br><br>
    <label for="" class='label_form'>MOT DE PASSE:</label>
    <br>
    <input type="password" name='password' class='input_form'>
    <br><br>
    <label for="" class='label_form'>RETAPER LE MOT DE PASSE:</label>
    <br>
    <input type="password" name='password_retype' class='input_form'>
    <br><br>
    <label for="" class='label_form'>EMAIL :</label>
    <br>
    <input type="text" name='mail' class='input_form'>
    <br>
    <button type='submit' class='cta'>Create your account</button>
    <a href="./login.php" class='go_login'>Go to login</a>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>




