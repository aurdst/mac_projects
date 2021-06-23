<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location:login.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/support.css">
    <link rel="stylesheet" href="../assets/css/landing.css">
    <title>SUPPORT [HUMILOTERIE]</title>
</head>
<body>

<?php
    include './header.php';
?>

<?php 
        if(isset($_GET['reg_err']))
        {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err)
            {
                case 'success';
                ?>
                    <div class="alert-succes">
                        <strong>Votre demande</strong> est envoyé.
                    </div>
            <?php
            break;

                case 'notsend';
                ?>
                    <div class="alert-err">
                        <strong>Erreur</strong> veuillez réesayer.
                    </div>
            <?php
            break;
            }
        }
    ?>

    <div class="onglet_container">
        <div class="onglet">
            <p> FAQ</p>
        </div>

        <div class="onglet_a">
            <p> SÉCURITÉ</p>
        </div>

        <div class="onglet_b">
            <p> CHANGELOGS</p>
        </div>
    </div>



    <h2>SUPPORT [HUMILOTERIE] <br>Tu rencontres des soucis ? Fait en part via un ticket support !</h2>
    <h3>Ceci n'est pas le support ANKAMA, n'envoyer aucun identifiants officiel ANKAMA</h3>

    <form action="../src/controller/supportTraitement.php" method='POST' class='login-form'>
        <label for=""> Email concernée:</label>
        <br>
        <input type="email" name="mail" class='input_form'>
        <br><br>
        <label for=""> Pseudo concernée:</label>
        <br>
        <input type="text" name="username" class='input_form'>
        <br><br>
        <label for="">Description du / des problèmes rencontrés :</label>
        <br>
        <textarea name="message" id="" cols="30" rows="10" class='input_form_area'></textarea>
        <!-- <input type="textarea" name ="texta" class='input_form_area'> -->
        <br><br>
        <input type='submit' value="Envoyer mon ticket au support" class='cta'>
        <p>Tu n'as pas de compte ?<a href="./templates/register.php"> Inscrit toi maintenant </a> </p>
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>