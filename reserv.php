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
    <script>
        function reply_click(clicked_id,clicked_id2)
        {
            let click = clicked_id;
            document.cookie = "selected="+click;
            let click2 = clicked_id2;
            console.log(click2);
            document.cookie = "selected2="+click2;
            location.href = 'reserv.php';
            
        }
    </script>
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
                <?php 
                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                    $timestampArrival = strtotime($slot['arrival_date']);
                    $timestampArrival = ucfirst(strftime("%A %d %B %Y", $timestampArrival));
                    $timestampDeparture = strtotime($slot['departure_date']);
                    $timestampDeparture = ucfirst(strftime("%A %d %B %Y", $timestampDeparture));
                ?>
                <p style="font-size: 18px;margin-top: 10px;">Arrivée : <?= $timestampArrival ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Départ : <?= $timestampDeparture ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Capacité : <?= $room['capacity'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Catégory : <?= $room['category'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Adresse : <?= $room['address'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Tarif : <?= $slot['price']?> €</p>
            </div>
        </div>
        <div>
            <h1 class="city">Autres Produits à <?= $room['city'] ?></h1>
        </div>
        <div class="line"></div>
        <div class="flex_similar">
            <?php
                $rst = $room['city'];
                $idarray = array();
                foreach($result as $room):
                    if($room['city'] == $rst):
                        array_push($idarray,$room['id']);
            ?>
            <?php endif; endforeach; ?>
            <?php 
                $cmpt = 4;
                foreach($slotres as $slot):
                    if($slot['status'] == 'libre' && $cmpt != 0):
                        if($slot['room_id'] == $idarray[0] or $slot['room_id'] == $idarray[1]):
                            foreach($result as $room):
                                if($room['id'] == $slot['room_id']):
                                    $cmpt = $cmpt-1;
            ?>
            <img class="salle" onclick="reply_click(this.id,this.alt)" alt="<?= $slot['id'] ?>" id="<?= $room['id'] ?>" style="height: 70%;width: 24%;display: inline-block;margin-right: 0.5%;margin-top: 10px;cursor: pointer;" src= <?= $room['picture_url'] ?>>
            <?php endif;endforeach;endif;endif;endforeach; ?>
        </div>
        <?php endif; endforeach; ?>
    </div>
    <?php endif; endforeach; ?>
</body>
</html>