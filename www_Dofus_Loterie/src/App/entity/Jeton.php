<?php

require_once '../../database/connectDB.php';

class Jeton {

    private $bdd;
    private $jeton;

    public function __construct() {
        $this->bdd = connectDB();
    }

    public function GetJeton() :int{
        return $this->jeton;
    }

    public function SetJeton(int $jeton) {
        $this->jeton = $jeton;
        return $this;
    }

    public function AddJeton() {
        $insert = $this->bdd->prepare('INSERT INTO users(jeton) VALUES (:jeton)');
        $insert -> execute(array(
            "jeton" => 1,
        ));
    }

    public function GetUserJeton(int $id) :int{ 
        
        $req = $this->bdd->prepare('SELECT jeton FROM users WHERE id=:id');
        $req -> execute(array(
            "id" => $id
        ));
        $rs = $req->fetch();
        return $rs['jeton']; 
    }

    public function UpdateJeton(int $id) {
        $update = $this->bdd->prepare('UPDATE users SET jeton=:jeton WHERE id=:id');
        $update -> execute(array(
            "jeton" => $jeton--,
            "id" => $id
        ));

        $_SESSION['jeton'] = $this->GetUserJeton($id);

    }
}

