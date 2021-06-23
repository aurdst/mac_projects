<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location:login.php');
    }

    if(isset($_GET['reg_win'])) {

        $err = htmlentities($_GET['reg_win']);

        switch($err) {
            case "bigwin";
        ?>
            <div class="win_case"> 
                <strong>Impressionant</strong> ! Tu gagnes le grand lot de la semaine, 
                <br> tu es inscrit en tant que partipant au grand tirage final !
            </div>
        <?php 
            break;

            case "littlewin";
        ?>
            <div class="win_case"> 
                <strong>Bravo</strong> ! Tu gagnes le lot de la semaine, 
                <br> tu es inscrit en tant que partipant au grand tirage final !
            </div>
        <?php 
            break;

            case "lose";
        ?>
            <div class="lose_case"> 
                <strong>Dommage</strong> ! Tu as perdu , mais ne t'en fait pas !
                <br> tu es inscrit en tant que partipant au grand tirage final !
            </div>
        <?php
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/landing.css">

    <title>Bonjour <?php echo $_SESSION['user'];?></title>
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
            <a href="../src/controller/disconnect.php" class='button_disconnect'>[<?php echo ucfirst($_SESSION['user']); ?>] Disconnect me</a>
        </ul>
    </nav>
</header>

    <div class="jeton_user">
        <p class="p_jeton"> <?php echo $_SESSION['jeton']; ?> <img src="../assets/img/jeton.png" alt="jeton" class="jeton_img"></p>
        
    </div>

    <h2>Bonjour  <span><?php echo $_SESSION['user'];?></span>! choisis un jeu : </h2>

    <div id='container_game'>
        <div id='vignet_game'>
            <?php

            if($_SESSION['jeton'] > 0) {
                echo ('<a href="./roulet.php"><img src="../assets/img/vignet_roulette.png" alt="" class="img_game"></a>');
                echo ('<a href=""><img src="../assets/img/vignet_remember.png" alt="" class="img_game"></a>');
                echo ('<a href=""><img src="../assets/img/vignet_number.png" alt="" class="img_game"></a>');
            }else {
                echo ('<a href=""><img src="../assets/img/vignet_no_jeton.png" alt="" class="img_game_2"></a>');
            }
        
            ?>

        </div>
    </div>


</body>
</html>