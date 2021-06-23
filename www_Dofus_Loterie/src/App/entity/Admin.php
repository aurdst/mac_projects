<?php

require_once '../../database/connectDB.php';

class Admin {
    /**
     * @var int $id   // Identifiant of administrator (generate automatically)
     */
    private $id;

    /**
     * @var string $username   // username of administrator 
     */
    private $username;

    /**
     * @var string $mail   // Mail of administrator 
     */
    private $mail;

        /**
     * @var string $password   // Password of administrator 
     */
    private $password;

    public function GetId() {
        $this->id;
    }
    
    public function GetUserName() {
        $this->username;
    }

    public function SetUserName() {
        $this->username = $username;
        return $this;
    }

    public function GetMail() {
        $this->mail;
    }

    public function SetMail() {
        $this->mail = $mail;
        return $this;
    }

    public function GetPassword() {
        $this->password;
    }
    
    public function SetPassword() {
        $this->password = $password;
        return $this;
    }
}