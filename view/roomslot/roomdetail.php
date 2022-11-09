<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loue Ta Salle Reserv</title>
    <link rel="stylesheet" href="./tpl/style2.css" />
</head>
<body>
    <div class="container">
        <div class="flexing">
            <h1 class="room_name"><?= $slot['name'] ?></h1>
            <button class="bt" type="button">Reservez</button>
        </div>
        <div class="line"></div>
        <div class="flexing2">
            <img class="img-salle" src= <?= $slot['picture_url'] ?>>
            <div class="description-flex">
                <h1 class="desc-title">Description</h1>
                <p class="description"><?= $slot['description']?></p>
                <h2>Informations complémentaires</h2>
                <?php 
                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                    $timestampArrival = strtotime($slot['arrival_date']);
                    $timestampArrival = ucfirst(strftime("%A %d %B %Y", $timestampArrival));
                    $timestampDeparture = strtotime($slot['departure_date']);
                    $timestampDeparture = ucfirst(strftime("%A %d %B %Y", $timestampDeparture));
                ?>
                <p style="font-size: 18px;margin-top: 10px;">Arrivée : <?= $timestampArrival ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Départ : <?= $timestampDeparture ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Capacité : <?= $slot['capacity'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Catégory : <?= $slot['category'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Adresse : <?= $slot['address'] ?></p>
                <p style="font-size: 18px;margin-top: 10px;">Tarif : <?= $slot['price']?> €</p>
            </div>
        </div>
        <div>
            <h1 class="city">Autres Produits à <?= $slot['city'] ?></h1>
        </div>
        <div class="line"></div>
        <div class="flex_similar">
            <?php 
                $cmpt = 4;
                $rst = $slot['city'];
                foreach($result2 as $room2):
                    if($cmpt != 0):
                        $cmpt = $cmpt-1;
            ?>
            <a href="index.php?route=reservation&slotid=<?= $room2['id'] ?>&roomid=<?= $room2['room_id'] ?>"><img class="salle" style="height: 70%;width: 24%;display: inline-block;margin-right: 0.5%;margin-top: 10px;cursor: pointer;" src= <?= $room2['picture_url'] ?>></a>
            <?php endif;endforeach;?>
        </div>
        <table style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;width: 100%;">
            <tr style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;">
                <th style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;">Pseudo</th>
                <th style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;">Commentaires</th>
                <th style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;">Notes</th>
            </tr>
            <?php 
                foreach($comscres as $comscr):
            ?>
            <tr style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;">
                <td style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;"><?= $comscr['username'] ?></td> 
                <td style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;"><?= $comscr['comment'] ?></td> 
                <td style="border: 2px solid rgb(0, 0, 0);border-collapse: collapse;"><?= $comscr['score'] ?></td> 
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>