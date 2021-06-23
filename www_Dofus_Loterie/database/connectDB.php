<?php 
        function connectDB() {
            try{
               return $bdd = new PDO ("mysql:host=localhost;dbname=bddlogin;charset=utf8", 'root', 'root');
            }catch(PDOException $e)
            {
                die( "Error : " . $e->getMessage());
            }
        }