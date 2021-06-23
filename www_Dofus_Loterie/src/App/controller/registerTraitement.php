<?php 
    session_start();
    require_once '../../database/connectDB.php';

    if(isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password_retype'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        $mail = htmlspecialchars($_POST['mail']);

        $bdd = connectDB();
        $check = $bdd->prepare('SELECT * FROM users WHERE mail = ? ');
        $check->execute(array($mail));
        $data =$check->fetch();
        $row = $check->rowCount();
        

        if($row == 0) { 
            if(strlen($username) <= 100) {
                if(strlen($mail) <= 100) {
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        if($password == $password_retype) {
                            $password = hash('sha256', $password);
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $bdd->prepare('INSERT INTO users(username, mail,  password, jeton, role, id) VALUES (:username, :mail, :password, :jeton, :role)');
                            $insert->execute(array(
                                'username' => $username,
                                'password' => $password,
                                'jeton' => 1,
                                'mail' => $mail,
                                'role' => 'user',
                            ));
                            header('Location:../../templates/register.php?reg_err=success');
                        }else header('Location:../../templates/register.php?reg_err=password');
                    }else header('Location:../../templates/register.php?reg_err=mail');
                }else header('Location:../../templates/register.php?reg_err=mail_length');
            }else header('Location:../../templates/register.php?reg_err=username_length');
        }else header('Location:../../templates/register.php?reg_err=already');
    }