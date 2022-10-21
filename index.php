<?php

session_start();
require_once('./tpl/init.php');

$room = $pdo->query('SELECT * FROM room');
$result = $room->fetchAll();

$slot = $pdo ->query("SELECT * FROM slot");
$slotres = $slot->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loue Ta Salle</title>
    <link rel="stylesheet" href="./tpl/style.css" />
</head>
<body>
    <div class="grid-container">
        <?php
            foreach($slotres as $slot):
        ?>
        <div class="grid-item">
            <?php 
                foreach($result as $room):
                    if($room['id'] == $slot['room_id']):             
            ?>
            <img class="img-salle" src= <?= $room['picture_url'] ?>>
            <div class="flexing">
                <h5 class="item" style="color:cornflowerblue;"><?= $room['name'] ?></h5>
                <h5 class="item"><?= $slot['price'] ?>€</h5>
            </div>
            <p class="description"><?= $room['description']?></p>
            <?php endif; endforeach; ?>
            <h6 class="reserv-date"><?= $slot['arrival_date'] ?> au <?= $slot['departure_date'] ?></h6>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>