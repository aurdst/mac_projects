<?php

session_start();
if(!isset($_SESSION['user'])) {
    header('Location:login.php');
}

require_once '../../database/connectDB.php';
require_once '../entity/Jeton.php';

$start = false;

if(isset($_POST['play']) && isset($_POST['numberBet']) && $_SESSION['jeton'] = 1) {
    $start = true;

    while ($start){
        if(isset($_POST['numberBet'])) {
            if($_POST['numberBet'] > 0 && $_POST['numberBet'] < 11) {
                $numberBet = $_POST['numberBet'];
                $numberRandom = rand(0, 10);
                
                if($numberRandom === $numberBet) {
                    $jeton = new Jeton();
                    $jeton->UpdateJeton($_SESSION['id']);
                    var_dump($jeton->UpdateJeton($_SESSION['id']));
                    $_SESSION['win'] += 1;
                    $start = false;
                    // header("Location:../../templates/landing.php?reg_win=bigwin");
                }elseif($numberRandom === $numberBet / 2){
                    $jeton = new Jeton();
                    $jeton->UpdateJeton($_SESSION['id']);
                    var_dump($jeton->UpdateJeton($_SESSION['id']));
                    $_SESSION['win'] += 1;
                    $start = false;
                    // header("Location:../../templates/landing.php?reg_win=littlewin");
                }else {
                    $jeton = new Jeton();
                    $jeton->UpdateJeton($_SESSION['id']);
                    var_dump($jeton->UpdateJeton($_SESSION['id']));
                    $start = false;
                    // header("Location:../../templates/landing.php?reg_win=lose");
                }
            }
        }
    }
}else{
    echo ('Une erreur est survenue. Réesayer');
    $jeton = new Jeton();
    var_dump($jeton->UpdateJeton($_SESSION['id']));
}

