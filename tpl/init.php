<?php

// Connexion a la BDD

$pdo = new PDO('mysql:host=localhost;dbname=loutasal','root','root',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
));

?>