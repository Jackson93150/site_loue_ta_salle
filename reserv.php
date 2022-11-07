<?php

session_start();
require_once('./tpl/init.php');

$room = $pdo->query('SELECT * FROM room');
$result = $room->fetchAll();

$slot = $pdo ->query("SELECT * FROM slot");
$slotres = $slot->fetchAll();

$valuepass = $_COOKIE['selected'];
$valuepass2 = $_COOKIE['selected2'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loue Ta Salle Reserv</title>
    <link rel="stylesheet" href="./tpl/style2.css" />
</head>
<body>
    <?php 
        foreach($result as $room):
            if($room['id'] == $valuepass):
                
    ?>
    <div class="container">
        <div class="flexing">
            <h1 class="room_name"><?= $room['name'] ?></h1>
            <button class="bt" type="button">Reservez</button>
        </div>
        <div class="line"></div>
        <div class="flexing2">
            <img class="img-salle" src= <?= $room['picture_url'] ?>>
            <div class="description-flex">
                <h1 class="desc-title">Description</h1>
                <p class="description"><?= $room['description']?></p>
                <h2>Informations complémentaires</h2>
                <?php
                    foreach($slotres as $slot):
                        if($slot['id'] == $valuepass2):
                ?>
                <p style="font-size: 18px;margin-top: 10px;">Arrivée : <?= $slot['arrival_date'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Départ : <?= $slot['departure_date'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Capacité : <?= $room['capacity'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Catégory : <?= $room['category'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Adresse : <?= $room['address'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Tarif : <?= $slot['price']?> €</p>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; endforeach; ?>
</body>
</html>