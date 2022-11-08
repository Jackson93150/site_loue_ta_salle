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
    <div class="grid-container">
        <?php
            foreach($slotres as $slot):
                if($slot['status'] == 'libre'):
        ?>
        <div class="grid-item">
            <?php 
                foreach($result as $room):
                    if($room['id'] == $slot['room_id']):
            ?>
            <?php 
                setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                $timestampArrival = strtotime($slot['arrival_date']);
                $timestampArrival = ucfirst(strftime(" %d %B %Y", $timestampArrival));
                $timestampDeparture = strtotime($slot['departure_date']);
                $timestampDeparture = ucfirst(strftime(" %d %B %Y", $timestampDeparture));
            ?>
            <img class="img-salle" onclick="reply_click(this.id,this.alt)" alt="<?= $slot['id'] ?>" id="<?= $room['id'] ?>"  src= <?= $room['picture_url'] ?> style="cursor: pointer;">
            <div class="flexing">
                <h5 class="item" style="color:cornflowerblue;"><?= $room['name'] ?></h5>
                <h5 class="item"><?= $slot['price'] ?>€</h5>
            </div>
            <p class="description"><?= $room['description']?></p>
            <h6 class="reserv-date"><?= $timestampArrival ?> au <?= $timestampDeparture ?></h6>
            <div class="line"></div>
            <div class="flex">
                <img class="item1" src="https://www.pngall.com/wp-content/uploads/4/5-Star-Rating-PNG-File.png" style="height:25px;padding:0px 40px;">
                <img class="item2" onclick="reply_click(this.id,this.alt)" alt="<?= $slot['id'] ?>" id="<?= $room['id'] ?>" src="https://icones.pro/wp-content/uploads/2021/06/icone-loupe-bleu.png" style="height:25px;padding:0px 30px;cursor: pointer;">
            </div>
            <?php endif; endforeach; ?>
        </div>
        <?php endif;endforeach; ?>
    </div>
</body>
</html>