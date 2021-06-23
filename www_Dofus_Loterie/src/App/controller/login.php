<?php 
    session_start();
    require_once '../../database/connectDB.php';

    if(isset($_POST['mail']) && isset($_POST['password']))
    {

        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        var_dump($mail, $password);

        $bdd = connectDB();
        $check = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
        $check->execute(array($mail));
        $data =$check->fetch();
        $row = $check->rowCount();

        $_SESSION['jeton'] = $data[7];
        $_SESSION['win'] = $data[6];

        if($row == 1)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $password = hash ('sha256', $password); 
                if($data['password'] === $password)
                {
                    $_SESSION['user'] = $data['username'];
                    $_SESSION['id'] = $data['id'];
                    header('Location:../../templates/landing.php');
                }else header('Location:../../index.php?login_err=password');
            }else header('Location:../../index.php?login_err=mail');
        }else header('Location:../../index.php?login_err=already');
    }else header('Location:../../index.php?login_err=already');