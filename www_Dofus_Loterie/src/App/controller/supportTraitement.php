<?php 
    session_start();
    require_once '../../database/connectDB.php';

    if(isset($_POST['message']) && isset($_POST['mail']) && isset($_POST['username'])){
        $username = htmlspecialchars($_POST['username']);
        $mail = htmlspecialchars($_POST['mail']);

        $bdd = connectDB();
        $check = $bdd->prepare('SELECT * FROM users WHERE mail = :mail');
        $check->execute(array(
            "mail" => $mail
        ));
        $data =$check->fetch();
        $row = $check->rowCount();

        $message = '[Ticket] support envoyé depuis la page SUPPORT de [HUMILOTERIE.fr] :
        [Nom concerné]:' . $_POST['username'].'
        [Email concerné]: ' . $_POST['mail'].'
        [Problèmes rencontrés] :' . $_POST['message'];

        $bdd = connectDB();
        $insert = $bdd->prepare('INSERT INTO ticket(content, author) VALUES (:content, :author)');
        $insert->execute(array(
            'content' =>  $message,
            'author' => $mail,
        ));

        $retour = mail('aureliendestailleur@outlook.fr', 'Envoi depuis la page SUPPORT' , $message);
        if($retour) {
            header('Location:support.php?reg_err=success');
        }else{
            header('Location:support.php?reg_err=notsend');
        } 
    }else{
        echo 'test';
    }
?>