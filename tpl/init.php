<?php
// Connexion a la BDD
function initbdd() {
    try{
        return new PDO('mysql:host=localhost;dbname=loutasale','root','root',array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        ));
    }catch (\Throwable $th) {
        var_dump($th);
      }
}
?>